<?php

namespace TeamQilin\Http\Controllers;

use TeamQilin\Http\Requests;
use TeamQilin\Http\Requests\blockRequest;
use TeamQilin\Http\Controllers\Controller;
use TeamQilin\Custodian;
use TeamQilin\Block;
use TeamQilin\Exchange;
use TeamQilin\Need;
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

        $note_set=array();
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

		$block = Block::create($request->all());

		$text = $user['first_name'] . ' added a new block: ' . str_replace('.', ':', $request->get('symbol')) . ' http://team.qilinfinance.com/blocks/' . $block->id;;

		Telegram::sendMessage([
			'chat_id' => env('TELEGRAM_CHAT_ROOM'),
			'text' => $text
		]);

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

        $block->update($request->all());

        return redirect('blocks');
    }

}