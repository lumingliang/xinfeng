<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_Good extends Model {
	protected $table = 'type_good';
	protected $fillable = [ 'typeId' , 'goodId' ];
	
	//

}
