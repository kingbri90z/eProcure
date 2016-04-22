<?php

namespace TeamQilin\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use TeamQilin\Http\Requests;
use TeamQilin\Http\Requests\noteRequest;
use TeamQilin\Http\Controllers\Controller;
use TeamQilin\Note;
use TeamQilin\User;
use Carbon\Carbon;
use Telegram;

class notesController extends Controller
{
    public function index(){

		$notes = Note::all();

		return view('notes.main')->with('notes', $notes);
	}

	public function show($id){

        $notes = Note
			::join('users', 'notes.user_id', '=', 'users.id')
			->select(
				'notes.id AS id',
				'notes.body AS body',
				'notes.created_at AS created_at',
				'users.avatar AS avatar',
				'users.first_name As first_name',
				'users.last_name As last_name'
				)
			->where('block_id','=', $id)
			->orderBy('created_at', 'DESC')
			->get();

			foreach($notes as $key => $note ){
				$notes[$key]['date'] 		= $note->created_at->diffForHumans();
				$notes[$key]['full_name'] 	= $this->getFullName($note->first_name, $note->last_name);
				$notes[$key]['at_name'] 	= $this->getAtFullName($note->first_name, $note->last_name);
			}

        return response()->json($notes);
	}

	public function store(noteRequest $request){

		$user 				= Auth::user();
		$request['user_id'] = $user->id;
		$input 				= $request->all();

        Note::create($input);

		/*
		 * *****************************
		 * *****************************
		 * Notifications to be send out.
		 * *****************************
		 * *****************************
		 */
		$text = $user['first_name'] . ' added a comment: "' . $request['body'] .
			'" on ' . str_replace('.', ':', $request['symbol']) .
			' http://team.qilinfinance.com/blocks/' . $request['block_id'];

		if(env('APP_ENV') == 'production') {
			Telegram::sendMessage([
				'chat_id' => env('TELEGRAM_CHAT_ROOM'),
				'text' => $text
			]);

			$mail = [
				'id'	=> $request['block_id'],
				'title' => '[Qilin] New Note on ' . $request['symbol'],
				'body' 	=> $text,
				'block'	=> [
					'symbol'	=> $request['symbol']
				]
			];
			\TeamQilin\Http\Controllers\NotificationController::sendNewNote($mail);
		}
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

    private function getFullName($firstName,$lastName){
    	return $firstName . " " . $lastName;
    }

    private function getAtFullName($firstName,$lastName){
    	return $firstName . $lastName;
    }
}
