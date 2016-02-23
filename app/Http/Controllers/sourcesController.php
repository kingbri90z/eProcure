<?php

namespace TeamQilin\Http\Controllers;

use TeamQilin\Http\Requests;
use TeamQilin\Http\Requests\sourcesRequest;
use TeamQilin\Http\Controllers\Controller;
use TeamQilin\Source;
use TeamQilin\User;

class sourcesController extends Controller
{
	public function index(){

		$sources = Source::all();

		return view('sources.main')->with('sources', $sources);
	}

	public function show($id){

	}

	public function store(needRequest $request){

        $input = $request->all();

        Source::create($input);

        return redirect('sources');
	}

	public function create(){
		return view('sources.create');
	}

	public function edit($id){

        $source = Source::findOrFail($id);

		return view('sources.edit')->with('source', $source);
	}

    public function update($id, sourceRequest $request){

        $source = Source::findOrFail($id);

        $source->update($request->all());

        return redirect('sources');

    }
}
