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
    public function block(){

    	return $this->belongsTo(Note::class);
    }
}

