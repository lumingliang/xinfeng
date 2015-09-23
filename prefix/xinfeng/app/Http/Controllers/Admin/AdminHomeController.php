<?php namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Page;


class AdminHomeController extends Controller {

/**
* Display a listing of the resource.
*	 * @return Response
*/
public function index()
{

return view('AdminHome')->withPages(Page::all());
}


}
