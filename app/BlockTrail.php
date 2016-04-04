<?php

namespace TeamQilin;

use Illuminate\Database\Eloquent\Model;

class BlockTrail extends Model
{
    protected $fillable = [
        'user_id',
        'log_activity'
    ];
}
