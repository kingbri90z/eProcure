<?php

namespace TeamQilin\Http\Controllers;

use TeamQilin\Http\Requests;
use TeamQilin\Http\Requests\repRequest;
use TeamQilin\Http\Controllers\Controller;
use TeamQilin\Rep;

class repsController extends Controller
{
	public function index(){

		$reps = Rep::all();

		return view('reps.main')->with('reps', $reps);
	}

	public function show($id){

	}

	public function store(repRequest $request){

        $input = $request->all();

        Rep::create($input);

        return redirect('reps');
	}

	public function create(){
		return view('reps.create');
	}

	public function edit($id){

        $rep = Rep::findOrFail($id);

		return view('reps.edit')->with('rep', $rep);
	}

    public function update($id, repRequest $request){

        $rep = Rep::findOrFail($id);

        $rep->update($request->all());

        return redirect('reps');

    }

}
