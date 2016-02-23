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
        'status',
        'source_id'
    ];

    public function notes(){
    	return $this->hasMany(Note::class);
    }

	/**
	 * This block is owned by the Symbol
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function symbol(){
		return $this->belongsTo(App\Symbol);
	}
}
