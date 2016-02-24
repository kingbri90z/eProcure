<?php

namespace TeamQilin;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
  	protected $fillable = [
    	'symbol_id',
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

	/**
	 * This block has many comments
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function notes(){
    	return $this->hasMany('TeamQilin\Note');
    }

	/**
	 * This block is owned by the Symbol
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function symbol(){
		return $this->belongsTo('TeamQilin\Symbol');
	}

	/**
	 * To get the number of notes
	 * @return mixed
	 */
	public function notesCount(){
		return $this->hasOne('TeamQilin\Note')
			->selectRaw('id, count(*) as aggregate')
			->groupBy('block_id');
	}
	/**
	 * @return mixed
	 */
	public function notesCountAttribute()
	{
		// if relation is not loaded already, let's do it first
		if ( ! array_key_exists('notesCount', $this->relations))
			$this->load('notesCount');

		$related = $this->getRelation('notesCount');

		// then return the count directly

		return ($related) ? (int) $related->aggregate : 0;

	}
}
