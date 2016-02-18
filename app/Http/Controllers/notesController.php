<?php

namespace TeamQilin\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use TeamQilin\Http\Requests;
use TeamQilin\Http\Requests\noteRequest;
use TeamQilin\Http\Controllers\Controller;
use TeamQilin\Note;
use TeamQilin\User;

class notesController extends Controller
{
    public function index(){

		$notes = Note::all();

		return view('notes.main')->with('notes', $notes);
	}

	public function show($id){

        $note = Note::where('block_id','=',$id)->get();

        return response()->json($note);

	}

	public function store(noteRequest $request){

		$request['user_id'] = Auth::user()->id;
		$input 				= $request->all();

        Note::create($input);

        return redirect('/blocks');
	}

	public function create(){
		return view('notes.create');
	}

	public function edit($id){

        $note = Note::findOrFail($id);

		return view('notes.edit')->with('note', $note);
	}

    public function update($id, noteRequest $request){

        $note = Note::findOrFail($id);

        $note->update($request->all());

        return redirect('notes');

    }
}
