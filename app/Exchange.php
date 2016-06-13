<?php

namespace TeamQilin;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    protected $fillable = [
    	'name',
    	'abbreviation'
    ];

    public function symbols(){
        return $this->hasMany('TeamQilin\Symbol');
    }
    
    /**
     * Exchanges can have many blocks
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blocks(){
        return $this->hasMany('TeamQilin\Block');
    }
}