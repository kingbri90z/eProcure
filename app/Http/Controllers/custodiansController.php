<?php

namespace TeamQilin\Http\Controllers;

use TeamQilin\Http\Requests;
use TeamQilin\Http\Requests\custodianRequest;
use TeamQilin\Http\Controllers\Controller;
use TeamQilin\Custodian;

class custodiansController extends Controller

{
	public function index(){

		$custodians = Custodian::orderBy('name', 'asc')->get();

		return view('custodians.main')->with('custodians', $custodians);
	}

	public function show($id){

	}

	public function adminIndex(){

		$custodians = Custodian::orderBy('name', 'asc')->get();

		return view('custodians.admin.main')->with('custodians', $custodians);
	}

	public function store(custodianRequest $request){

        $input = $request->all();

        Custodian::create($input);

        return redirect('/admin/custodians');
	}

	public function create(){
		return view('custodians/admin.create');
	}

	public function edit($id){

        $custodian = Custodian::findOrFail($id);

		return view('custodians.admin.edit')->with('custodian', $custodian);
	}

    public function update($id, custodianRequest $request){

        $custodian = Custodian::findOrFail($id);

        $custodian->update($request->all());

        return redirect('admin/custodians');

    }
}
