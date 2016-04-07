<?php

namespace TeamQilin\Http\Controllers;

use TeamQilin\Http\Requests;
use TeamQilin\Http\Requests\blockRequest;
use TeamQilin\Http\Controllers\Controller;
use TeamQilin\Custodian;
use TeamQilin\Block;
use TeamQilin\Exchange;
use TeamQilin\Need;
use TeamQilin\Note;
use TeamQilin\Rep;
use TeamQilin\User;
use TeamQilin\Source;
use TeamQilin\Symbol;
use Auth;
use Telegram;

class blocksController extends Controller
{
	private function getNotesCount($id){
		$note = Block::findOrFail($id);
		return $note->notesCount;
	}

	public function index(){

		$blocks = Block
			::join('custodians', 'blocks.custodian_id', '=', 'custodians.id')
			->join('exchanges', 'blocks.exchange_id', '=', 'exchanges.id')
			->join('needs', 'blocks.need_id', '=', 'needs.id')
			->join('reps', 'blocks.rep_id', '=', 'reps.id')
			->join('sources', 'blocks.source_id', '=', 'sources.id')
			->join('symbols', 'blocks.symbol_id', '=', 'symbols.id')
			->select(
				'blocks.id AS id',
				'symbols.name AS symbol',
				'blocks.discount AS discount',
				'blocks.discount_target AS discount_target',
				'blocks.created_at AS created_at',
				'blocks.number_shares AS number_shares',
				'custodians.name AS custodian',
				'exchanges.abbreviation AS exchange',
				'needs.name AS need',
				'reps.name AS rep',
				'sources.name AS source'
			)
			->where('status', '=' ,'published')
			->orderBy('symbol', 'asc')
			->get();

        $note_set = array();

        foreach ($blocks as $key => $block){
        	$blocks[$key]['date'] = $block->created_at->diffForHumans();
			$blocks[$key]['noteCount'] = $this->getNotesCount($blocks[$key]['id'])['aggregate'];

        }
        //$note_set=array_flatten($note_set);
		return view('blocks.main')->with('blocks',$blocks);
	}

	public function show($id){
		$blocks = Block
			::join('custodians', 'blocks.custodian_id', '=', 'custodians.id')
			->join('exchanges', 'blocks.exchange_id', '=', 'exchanges.id')
			->join('needs', 'blocks.need_id', '=', 'needs.id')
			->join('reps', 'blocks.rep_id', '=', 'reps.id')
			->join('sources', 'blocks.source_id', '=', 'sources.id')
			->join('symbols', 'blocks.symbol_id', '=', 'symbols.id')
			->select(
				'blocks.id AS id',
				'symbols.name AS symbol',
				'blocks.discount AS discount',
				'blocks.discount_target AS discount_target',
				'blocks.created_at AS created_at',
				'blocks.number_shares AS number_shares',
				'custodians.name AS custodian',
				'exchanges.abbreviation AS exchange',
				'needs.name AS need',
				'reps.name AS rep',
				'sources.name AS source'
			)
			->where('status', '=' ,'published')
			->where('blocks.id', '=' , $id)
			->get()->first();


			$blocks['date'] 		= $blocks->created_at->diffForHumans();
			$blocks['noteCount'] 	= $this->getNotesCount($blocks['id'])['aggregate'];

		return view('blocks.show')->with('blocks',$blocks);
	}

	public function store(blockRequest $request){
		//check for symbol.
		$symbol = Symbol::findOrFail(1)
			->where('name', '=', $request->get('symbol'))
			->first();

		if($symbol == null){
			//no symbol in the db.
			//insert new one.
			$request['symbol_id'] = Symbol::create(['name' => $request->get('symbol')])->id;
		}
		else{
			$request['symbol_id'] = $symbol['id'];
		}

		$user 				= Auth::user();
		$request['user_id'] = $user->id;
		$block 				= Block::create($request->all());

		/*
		 * *****************************
		 * *****************************
		 * Notifications to be send out.
		 * *****************************
		 * *****************************
		 */
		$text = $user['first_name'] .
			' added a new block: ' .
			str_replace('.', ':', $request->get('symbol')) .
			' http://team.qilinfinance.com/blocks/' .
			$block->id;
		if(env('APP_ENV') == 'production') {
			Telegram::sendMessage([
				'chat_id' => env('TELEGRAM_CHAT_ROOM'),
				'text' => $text
			]);
		}
		$mail = ['body' => $text];
		\TeamQilin\Http\Controllers\NotificationController::SendUpdateToAll($mail);
		return redirect('blocks');
	}

	public function create(){

		$custodians			= Custodian::lists('name','id');
		$exchanges			= Exchange::lists('name','id');
		$needs				= Need::lists('name','id');
		$reps				= Rep::lists('name','id');
		$sources			= Source::lists('name','id');

		return view('blocks.create')->with([
			'custodians'	=> $custodians,
			'exchanges'		=> $exchanges,
			'needs'			=> $needs,
			'reps' 			=> $reps,
			'sources' 		=> $sources
		]);
	}

	public function edit($id){

       	$block 				= Block::findOrFail($id);
		$block['symbol']	= Symbol::findOrFail($block['symbol_id'])->name;
		$custodians			= Custodian::lists('name','id');
		$exchanges			= Exchange::lists('name','id');
		$needs				= Need::lists('name','id');
		$reps				= Rep::lists('name','id');
		$sources			= Source::lists('name','id');

		return view('blocks.edit')->with([
			'block'			=> $block,
			'custodians'	=> $custodians,
			'exchanges'		=> $exchanges,
			'needs'			=> $needs,
			'reps' 			=> $reps,
			'sources' 		=> $sources
		]);
	}

    public function update($id, blockRequest $request){
		//check for symbol.
		$symbol = Symbol::findOrFail(1);
		$symbol = Symbol::where('name', '=', $request->get('symbol'))->first();

		if($symbol == null){
			//no symbol in the db.
			//insert new one.
			$request['symbol_id'] = Symbol::create(['name' => $request->get('symbol')])->id;
		}
		else{
			$request['symbol_id'] = $symbol['id'];
		}
        $block = Block::findOrFail($id);
        //dd($request->all()['discount_target'],$block->discount_target);

        //Send blocks to log changes
        $this->compareBlocks($id,$block,$request);



       // dd($request->all()['custodian_id'],$block->custodian_id);
       // dd(array_diff($block_new_data,$block_old_data));
        $block->update($request->all());

        //Retrieve Logged in User's name
        //dd($block_old_data,$block_new_data);

        return redirect('blocks');
    }

    public function compareBlocks($block_id, $block_old_data, $block_new_data)
    {
        if ($block_old_data->discount != $block_new_data->all()['discount']) {
            $note = new Note;
            $first_name = Auth::user()->first_name;
            $last_name = Auth::user()->last_name;
            $note->user_id = Auth::user()->id;
            $note->block_id = $block_id;
            $note->body = $first_name . " " . $last_name . " changed our discount from " .
                $block_old_data->discount . " to " . $block_new_data->all()['discount'];
            $note->save();
        }
        if ($block_old_data->number_shares != $block_new_data->all()['number_shares']) {
            $note = new Note;
            $first_name = Auth::user()->first_name;
            $last_name = Auth::user()->last_name;
            $note->user_id = Auth::user()->id;
            $note->block_id = $block_id;
            $note->body = $first_name . " " . $last_name . " changed the number of shares from " .
                $block_old_data->number_shares . " to " . $block_new_data->all()['number_shares'];
            $note->save();
        }

        if ($block_old_data->symbol['name'] != $block_new_data->all()['symbol']) {
            $note = new Note;
            $first_name = Auth::user()->first_name;
            $last_name = Auth::user()->last_name;
            $note->user_id = Auth::user()->id;
            $note->block_id = $block_id;
            $note->body = $first_name . " " . $last_name . " changed the symbol from " .
                $block_old_data->symbol['name'] . " to " . $block_new_data->all()['symbol'];
            $note->save();
        }
        //explode(".",$block_old_data->symbol['name'])[0]

        if ($block_old_data->discount_target != $block_new_data->all()['discount_target']) {
            $note = new Note;
            $first_name = Auth::user()->first_name;
            $last_name = Auth::user()->last_name;
            $note->user_id = Auth::user()->id;
            $note->block_id = $block_id;
            $note->body = $first_name . " " . $last_name . " changed the discount target from " .
                $block_old_data->discount_target . " to " . $block_new_data->all()['discount_target'];
            $note->save();
        }


        if ($block_old_data->need_id != $block_new_data->all()['need_id']) {
            $note = new Note;
            $first_name = Auth::user()->first_name;
            $last_name = Auth::user()->last_name;
            $note->user_id = Auth::user()->id;
            $note->block_id = $block_id;
            $note->body = $first_name . " " . $last_name . " changed the need ID from " .
                $block_old_data->need_id . " to " . $block_new_data->all()['need_id'];
            $note->save();
        }


        if ($block_old_data->exchange_id != $block_new_data->all()['exchange_id']) {
            $note = new Note;
            $first_name = Auth::user()->first_name;
            $last_name = Auth::user()->last_name;
            $note->user_id = Auth::user()->id;
            $note->block_id = $block_id;
            $note->body = $first_name . " " . $last_name . " changed the exchanged ID from " .
                $block_old_data->exchange_id . " to " . $block_new_data->all()['exchange_id'];
        }

        if ($block_old_data->custodian_id != $block_new_data->all()['custodian_id']) {
            $note = new Note;
            $first_name = Auth::user()->first_name;
            $last_name = Auth::user()->last_name;
            $note->user_id = Auth::user()->id;
            $note->block_id = $block_id;
            $note->body = $first_name . " " . $last_name . " changed the custodian ID from " .
                $block_old_data->custodian_id . " to " . $block_new_data->all()['custodian_id'];
            $note->save();
        }


        if ($block_old_data->source_id != $block_new_data->all()['source_id']) {
            $note = new Note;
            $first_name = Auth::user()->first_name;
            $last_name = Auth::user()->last_name;
            $note->user_id = Auth::user()->id;
            $note->block_id = $block_id;
            $note->body = $first_name . " " . $last_name . " changed the source ID  from " .
                $block_old_data->source_id . " to " . $block_new_data->all()['source_id'];
            $note->save();
        }

    return;
    }
}