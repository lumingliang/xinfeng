<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag_Post extends Model {
	protected $table = 'tag_post';
	protected $fillable = array('tagId' , 'postId'); 
}
