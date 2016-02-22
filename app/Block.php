<?php

namespace TeamQilin;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
  	protected $fillable = [
    	'symbol',
    	'exchange_id',
    	'discount',
        'discount_target',
    	'number_shares',
    	'need_id',
    	'custodian_id',
    	'rep_id',
        'status'
    ];

    public function notes(){
    	return $this->hasMany(Note::class);
    }
}
