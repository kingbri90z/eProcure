<?php

namespace TeamQilin\Http\Controllers;

use TeamQilin\Http\Requests;
use TeamQilin\Http\Requests\exchangeRequest;
use TeamQilin\Http\Controllers\Controller;
use TeamQilin\Exchange;

class exchangesController extends Controller

{
	public function index(){

		$exchanges = Exchange::orderBy('name', 'asc')->get();;

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

        $exchange = Exchange::findOrFail($id);

		return view('exchanges.edit')->with('exchange', $exchange);
	}

    public function update($id, exchangeRequest $request){

		$exchange = Exchange::findOrFail($id);

		$exchange->update($request->all());

        return redirect('exchanges');

    }

}
