<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use DB;
use Hash;
class AdminController extends Controller
{
    public function manageUsers()
    {
        $users = User::all();
        return view('dashboard.admin.manageusers', ['users' => $users]);
    }

    public function resetPassword($id){
         DB::beginTransaction();
        try {
      $user=User::find($id);
        $user->password=Hash::make(env('PASSWORD_DEFAULT'));
        $user->save();
            DB::commit();
            $result="success";
        } catch (\Exception $e) {
        DB::rollback();
        $result="error";
    }
        return response()->json([$result]);
    }

    public function disableUser($id){
        DB::beginTransaction();
        try {
            $user=User::find($id);
            $user->status='D';
            $user->save();
            DB::commit();
            $result="success";
        } catch (\Exception $e) {
            DB::rollback();
            $result="error";
        }
        return response()->json([$result]);
    }

    public function enableUser($id){
        DB::beginTransaction();
        try {
            $user=User::find($id);
            $user->status='A';
            $user->save();
            DB::commit();
            $result="success";
        } catch (\Exception $e) {
            DB::rollback();
            $result="error";
        }
        return response()->json([$result]);
    }


}
