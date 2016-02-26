<?php

namespace TeamQilin;

use Illuminate\Database\Eloquent\Model;

class Symbol extends Model
{
    protected $fillable = [
        'name'
    ];
    /**
     * Symbols can have many blocks
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blocks(){
        return $this->hasMany('TeamQilin\Block');
    }

    public function exchange(){
        return $this->belongsTo('TeamQilin\Exchange');
    }
}
