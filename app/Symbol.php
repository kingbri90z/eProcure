<?php

namespace TeamQilin;

use Illuminate\Database\Eloquent\Model;

class Securities extends Model
{
    /**
     * Symbols can have many blocks
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blocks(){
        return $this->hasMany('App\Block');
    }
}
