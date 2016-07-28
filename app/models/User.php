<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * User
 */
class User extends Eloquent
{
    protected $fillable = [
        'name',
        'email'
    ];

    public $timestamps = [];
}
