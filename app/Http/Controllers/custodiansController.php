<?php

namespace TeamQilin\Http\Controllers;

use TeamQilin\Http\Requests;
use TeamQilin\Http\Requests\CustodianRequest;
use TeamQilin\Http\Controllers\Controller;
use TeamQilin\Custodian;

class custodiansController extends Controller

{
	public function index(){

		$custodians = Custodian::all();

		return view('custodians.main')->with('custodians', $custodians);
	}

	public function show($id){

	}

	public function store(custodianRequest $request){

        $input = $request->all();

        Custodian::create($input);

        return redirect('custodians');
	}

	public function create(){
		return view('custodians.create');
	}

	public function edit($id){

        $custodian = Custodian::findOrFail($id);

		return view('custodians.edit')->with('custodian', $custodian);
	}

    public function update($id, custodianRequest $request){

        $custodian = Custodian::findOrFail($id);

        $custodian->update($request->all());

        return redirect('custodians');

    }

}
