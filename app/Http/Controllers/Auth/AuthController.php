<?php

namespace TeamQilin\Http\Controllers\Auth;
use SocialAuth;
use TeamQilin\User;
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
//        $team   = false;
//        $domain = explode('@', $email);
//        $domain = strtolower($domain[1]);
//
//        if($domain == env('DOMAIN_NAME')){
//            $team = true;
//        }
//        return $team;
        return true;
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


                $role_if_exist=User::where('email','=',$details->raw()['email'])->get()->all()[0]->roles;

                $name               = explode(" ", $details->raw()['name']);
                $user->email        = $details->raw()['email'];
                $user->first_name   = $name[0];
                $user->last_name    = $name[1];
                $user->roles        = $role_if_exist;
                $user->avatar       = $details->raw()['picture'];

                if(!$this->teamCheck($user->email)){
                    return redirect('/');

                }

                if (env('ADMIN_EMAIL')==$details->raw()['email']){
                    session()->put('is_admin', true);
                }

                $user->save();
            });
        } catch (ApplicationRejectedException $e) {
            // User rejected application
        } catch (InvalidAuthorizationCodeException $e) {
            // Authorization was attempted with invalid
            // code,likely forgery attempt
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
