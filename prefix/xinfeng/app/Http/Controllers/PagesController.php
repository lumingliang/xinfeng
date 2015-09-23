<?php namespace App\Http\Controllers;

use App\Page;

class PagesController extends Controller {

  public function show($id)
  {
  	$ggg=Page::find($id);
  	 echo $ggg->id;
    return view('pages.show')->withPage($ggg);
   
  }

}