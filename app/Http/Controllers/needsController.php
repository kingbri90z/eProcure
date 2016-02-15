<?php

namespace TeamQilin\Http\Controllers;

use TeamQilin\Http\Requests;
use TeamQilin\Http\Requests\needRequest;
use TeamQilin\Http\Controllers\Controller;
use TeamQilin\Need;

class needsController extends Controller
{
	public function index(){

		$needs = Need::all();

		return view('needs.main')->with('needs', $needs);
	}

	public function show($id){

	}

	public function store(needRequest $request){

        $input = $request->all();

        Need::create($input);

        return redirect('needs');
	}

	public function create(){
		return view('needs.create');
	}

	public function edit($id){

        $need = Need::findOrFail($id);

		return view('needs.edit')->with('need', $need);
	}

    public function update($id, needRequest $request){

        $need = Need::findOrFail($id);

        $need->update($request->all());

        return redirect('needs');

    }
}
