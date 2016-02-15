<?php

namespace TeamQilin\Http\Controllers;

use TeamQilin\Http\Requests;
use TeamQilin\Http\Requests\UserRequest;
use TeamQilin\Http\Controllers\Controller;
use TeamQilin\User;

class AdminUserController extends Controller
{
    public function index(){

    	$users = User::all();

    	return view('admin.users.main')->with('users', $users);
    }

    public function show($id){

    	$user = User::findOrFail($id);

    	return $user;
    }

    public function create(){

        return view('admin.users.create');

    }

    public function store(UserRequest $request){

        $input = $request->all();

        $input['password'] = bcrypt($input['password']);

        User::create($input);

        return redirect('admin/users');
    }

    public function edit($id){

        $user = User::findOrFail($id);

        return view('admin.users.edit')->with('user', $user);
    }

    public function update($id, UserRequest $request){

        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect('admin/users');

    }
}
