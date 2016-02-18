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
use TeamQilin\Note;

class blocksController extends Controller
{
	public function index(){

		$blocks = Block
			::join('custodians', 'blocks.custodian_id', '=', 'custodians.id')
			->join('exchanges', 'blocks.exchange_id', '=', 'exchanges.id')
			->join('reps', 'blocks.rep_id', '=', 'reps.id')
			->select(
				'blocks.id AS id',
				'blocks.symbol AS symbol',
				'blocks.discount AS discount',
				'blocks.number_shares AS number_shares',
				'custodians.name AS custodian',
				'exchanges.abbreviation AS exchange',
				'reps.name AS rep'
			)
			->where('status', '=' ,'published')
			->get();

        $note_set=array();
        foreach ($blocks as $block){
            $notes = Note::where('block_id','=',$block['id'])->get();
            array_push($note_set,$notes);
        }
        $note_set=array_flatten($note_set);
		return view('blocks.main')->with('blocks',$blocks,'note_set',$note_set);
	}

	public function show($id){

	}

	public function store(blockRequest $request){

		$input = $request->all();

        Block::create($input);

        return redirect('blocks');

	}

	public function create(){

		$custodians	= Custodian::lists('name','id');
		$exchanges	= Exchange::lists('name','id');
		$needs		= Need::lists('name','id');
		$reps		= Rep::lists('name','id');

		return view('blocks.create')->with([
			'custodians'	=> $custodians,
			'exchanges'		=> $exchanges,
			'needs'			=> $needs,
			'reps' 			=> $reps
		]);
	}

	public function edit($id){

	}

	public function update($id){

	}

}

