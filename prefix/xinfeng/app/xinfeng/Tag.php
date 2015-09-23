<?php namespace xinfeng;

use Illuminate\Database\Eloquent\Model;

class User extends model {

	protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

}