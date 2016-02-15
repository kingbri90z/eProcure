<?php

namespace TeamQilin\Http\Controllers;

use TeamQilin\Http\Requests;
use TeamQilin\Http\Requests\ExchangeRequest;
use TeamQilin\Http\Controllers\Controller;
use TeamQilin\Exchange;

class exchangesController extends Controller

{
	public function index(){

		$exchanges = Exchange::all();

		return view('exchanges.main')->with('exchanges', $exchanges);
	}

	public function show($id){

	}

	public function store(exchangeRequest $request){

        $input = $request->all();

        Exchange::create($input);

        return redirect('exchanges');
	}

	public function create(){
		return view('exchanges.create');
	}

	public function edit($id){

        $custodian = Exchange::findOrFail($id);

		return view('exchanges.edit')->with('custodian', $custodian);
	}

    public function update($id, custodianRequest $request){

        $custodian = Exchange::findOrFail($id);

        $custodian->update($request->all());

        return redirect('exchanges');

    }

}
