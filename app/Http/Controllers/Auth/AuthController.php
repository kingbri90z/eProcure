<?php

namespace TeamQilin\Http\Controllers\Auth;
use SocialAuth;
use TeamQilin\User;
use Exception;
use Auth;
use Redirect;
use Validator;
use TeamQilin\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use SocialNorm\Exceptions\ApplicationRejectedException;
use SocialNorm\Exceptions\InvalidAuthorizationCodeException;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/blocks';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function teamCheck($email){
        $team   = false;
        $domain = explode('@', $email);
        $domain = strtolower($domain[1]);

        if($domain == env('DOMAIN_NAME') || $domain == env('ALT_DOMAIN_NAME')){
            $team = true;
        }
        return ( env('APP_ENV') == 'production' ? $team : true );
    }


    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            SocialAuth::login('google',function($user, $details){


                //check to see if the user has a team email.
                if($this->teamCheck($details->raw()['email']) == false){
                    throw new Exception;
                }

                //explode full name from google
                $name = explode(" ", $details->raw()['name']);

                //check to see if user exists.
                try {
                    $userExists = User::where('email', '=', $details->raw()['email'])->first();
                }
                catch(Exception $e){
                    dd($e);
                }

                //Very ugly code to save users. Needs to be refactored
                if(!is_null($userExists)){
                    $userExists->email        = $details->raw()['email'];
                    $userExists->first_name   = $name[0];
                    $userExists->last_name    = $name[1];
                    $userExists->avatar       = $details->raw()['picture'];
                    try{
                        $userExists->save();
                    }
                    catch(Exception $e){
                        dd($e);
                    }
                }
                else{
                    $user->email              = $details->raw()['email'];
                    $user->first_name         = $name[0];
                    $user->last_name          = $name[1];
                    $user->roles              = 'N';
                    $user->avatar             = $details->raw()['picture'];
                    try{
                        $user->save();
                    }
                    catch(Exception $e){
                        dd($e);
                    }
                }

                //check for admin
                if( env('ADMIN_EMAIL') == $details->raw()['email'] ){
                    session()->put('is_admin', true);
                }

            });
        } catch (ApplicationRejectedException $e) {
            // User rejected application
        } catch (InvalidAuthorizationCodeException $e) {
            // Authorization was attempted with invalid
            // code,likely forgery attempt
        }
        catch(Exception $e){
            return redirect('auth/login');
        }

        // Current user is now available via Auth facade
        $user = Auth::user();

        $is_admin = Auth::user()['roles'];

        if ($is_admin=="A"){
            session()->put('is_admin', true);
        }else{
            session()->put('is_admin', false);
        }

        return Redirect::intended();
    }

    /**
     * Redirect the user to the Provider authentication page.
     *
     * @return Response
     */

    public function redirectToProvider($provider)
    {

        return SocialAuth::authorize($provider);

    }

     /**
     * Override built in registration
     *
     * */

    public function showRegistrationForm()
    {
        return redirect('auth/login');
    }


}
