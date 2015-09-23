<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model {

	protected $table = 'shops';
	protected $fillable = [ 'name' ,'user_id' , 'adress' ,'img' , 'detail'];

}
