<?php

namespace TeamQilin;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $fillable = [
    	'block_id',
    	'user_id',
    	'body'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function block(){

    	return $this->belongsTo(Note::class);
    }
}

