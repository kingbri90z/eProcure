<?php

namespace TeamQilin;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
  	protected $fillable = [
    	'symbol',
    	'exchange_id',
    	'discount',
    	'number_shares',
    	'need_id',
    	'custodian_id',
    	'rep_id'
    ];

    public function notes(){
    	return $this->hasMany(Note::class);
    }
}
