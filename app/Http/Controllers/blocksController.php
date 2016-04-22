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

	public function getRelated($blockId,$symbolId){
		return Block
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
			->where(function($q){
				$q->where('status', '=' ,'published')
					->orWhere('status', '=' ,'archived');
			})
			->where('blocks.id', '!=' ,$blockId)
			->where('symbol_id', '=' ,$symbolId)
			->orderBy('symbol', 'asc')
			->get();
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

        foreach ($blocks as $key => $block){
        	$blocks[$key]['date'] = $block->created_at->diffForHumans();
			$blocks[$key]['noteCount'] = $this->getNotesCount($blocks[$key]['id'])['aggregate'];

        }
		return view('blocks.main')->with('blocks',$blocks);
	}

	public function showAll(){

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
			->where('status', '!=' ,'boo')
			->orderBy('symbol', 'asc')
			->get();

		foreach ($blocks as $key => $block){
			$blocks[$key]['date'] 		= $block->created_at->diffForHumans();
			$blocks[$key]['noteCount'] 	= $this->getNotesCount($blocks[$key]['id'])['aggregate'];
		}
		return view('blocks.main')->with('blocks',$blocks);
	}

	public function show($id){
		$block = Block
			::join('custodians', 'blocks.custodian_id', '=', 'custodians.id')
			->join('exchanges', 'blocks.exchange_id', '=', 'exchanges.id')
			->join('needs', 'blocks.need_id', '=', 'needs.id')
			->join('reps', 'blocks.rep_id', '=', 'reps.id')
			->join('sources', 'blocks.source_id', '=', 'sources.id')
			->join('symbols', 'blocks.symbol_id', '=', 'symbols.id')
			->select(
				'blocks.id AS id',
				'symbols.name AS symbol',
				'symbols.id AS symbol_id',
				'blocks.discount AS discount',
				'blocks.status AS status',
				'blocks.discount_target AS discount_target',
				'blocks.created_at AS created_at',
				'blocks.number_shares AS number_shares',
				'custodians.name AS custodian',
				'exchanges.abbreviation AS exchange',
				'needs.name AS need',
				'reps.name AS rep',
				'sources.name AS source'
			)
			->where(function($q){
				$q->where('status', '=' ,'published')
					->orWhere('status', '=' ,'archived');
			})
			->where('blocks.id', '=' , $id)
			->get()->first();


			$block['date'] 			= $block->created_at->diffForHumans();
			$block['noteCount'] 	= $this->getNotesCount($block['id'])['aggregate'];

		return view('blocks.show')
			->with('block',$block)
			->with('blocks', $this->getRelated($block['id'],$block['symbol_id']));
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


			$mail = [
				'id'	=> $block->id,
				'title' => '[Qilin] New Block ' . $request->get('symbol'),
				'body' 	=> $text,
				'block'	=> [
					'symbol'	=> $request->get('symbol')
				]
			];

			\TeamQilin\Http\Controllers\NotificationController::sendNewBlock($mail);
		}

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

    public function compareBlocks($block_id, $block_old_data, $block_new_data){
		$arr = [];

        if ($block_old_data->discount != $block_new_data->all()['discount']) {
            $arr[] = "Our Discount from " .
                $block_old_data->discount . " to " . $block_new_data->all()['discount'];
        }
        if ($block_old_data->number_shares != $block_new_data->all()['number_shares']) {
			$arr[] = "Number of shares from " .
                $block_old_data->number_shares . " to " . $block_new_data->all()['number_shares'];
        }

        if ($block_old_data->symbol['name'] != $block_new_data->all()['symbol']) {
			$arr[] = "Symbol from " .
                $block_old_data->symbol['name'] . " to " . $block_new_data->all()['symbol'];
        }
        //explode(".",$block_old_data->symbol['name'])[0]

        if ($block_old_data->discount_target != $block_new_data->all()['discount_target']) {
			$arr[] = "Discount target from " .
                $block_old_data->discount_target . " to " . $block_new_data->all()['discount_target'];
        }

        if ($block_old_data->need_id != $block_new_data->all()['need_id']) {
			$arr[] = "Need a from " .
                $block_old_data->need_id . " to " . $block_new_data->all()['need_id'];
        }

        if ($block_old_data->exchange_id != $block_new_data->all()['exchange_id']) {
			$arr[] = "Exchanged ID from " .
                $block_old_data->exchange_id . " to " . $block_new_data->all()['exchange_id'];
        }

        if ($block_old_data->custodian_id != $block_new_data->all()['custodian_id']) {
			$arr[] = "Custodian ID from " .
                $block_old_data->custodian_id . " to " . $block_new_data->all()['custodian_id'];
        }

        if ($block_old_data->source_id != $block_new_data->all()['source_id']) {
			$arr[] = "Source ID  from " .
                $block_old_data->source_id . " to " . $block_new_data->all()['source_id'];
        }

		if(!empty($arr)){
			$note = new Note;
			$first_name = Auth::user()->first_name;
			$last_name = Auth::user()->last_name;
			$note->user_id = Auth::user()->id;
			$note->block_id = $block_id;

			$str = $first_name . " " . $last_name . " made the following updates:<br>";

			foreach ($arr as $val){
				$str = $str . $val . '<br>';
			}

			$note->body = rtrim($str,'<br>');
			$note->save();
		}

    return;
    }
}