<?php

namespace TeamQilin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	// MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = [
    	'first_name',
    	'last_name',
    	'email',
    	'password'
    ];
}
