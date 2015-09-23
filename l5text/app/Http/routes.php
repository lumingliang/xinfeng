<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Gregwar\Captcha\CaptchaBuilder;
Route::get('/', 'WelcomeController@index');
/*
Route::get('home', function($results) {
	return view('user.home')->withResults($results);
});*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	//'password' => 'Auth\PasswordController',
]);

Route::get('registerEmailCheck' , 'User\UserController@registerEmailCheck');

Route::post('jj' , function(){
	//return Request::input('email') ;
	//sleep(8);
	//abort(503);
	return 0;
});

Route::get('home' ,function(){
	return view('home')->withTitle('小燕子科技');
} );

Route::get('red' , function(){
	echo 'i am a redirect !';
});

Route::get('all' , function(){
	return view('all');
});

Route::get('nav', function(){
	return view('nav');
});

Route::get('input' , function(){
	return view('fileinput');
});

Route::get('button' , function(){
	return view('button');

});

Route::get('textRegister' , function(){
	return view('user.register')->withTitle('测试 ');
} );

//下面是应用的真正路由

//管理用户注册，登录，密码找回
Route::controllers([
	'user' => 'User\UserController' ,
	'password' => 'User\PasswordController' ,
]);

use xinfeng\User;

Route::get('rom' , function() {
	/*
	//$users = User::all();
	//print($users);
	echo $users[0]->email;
	foreach ($users as $user) {
		var_dump($user->email);
	}
	//var_dump(User::all() );
	$som = User::where('email', '=', '15644898@qq.com')->firstOrFail();
	print_r($som);
	if($som->id){
		echo 'i';
	} else {
		echo 'jj';
	}*/
	$user = DB::table('users')->where('email', '156448398@qq.com')->first()->email;
	//->pluck('name') ;
	print_r($user);
	echo $user;
});
Route::get('session' , function(){
	var_dump(Session::all() );
});

Route::get('rom', function() {
	 $obj = User::where('email' , '=' , '156448398@qq.com' )->first();//用first方法得到的是对象，用get方法得到的是数组
     var_dump($obj->id);
});

Route::get('redc' , function() {
	return view('user.home')->withResults([ture,'iiii']) ;
});

//Route::get('vieww' , 'User\UserController@view');
Route::get('vieww' , function() {
	return view('user.home')->withTitle('kdfasjf')->withResults( true );
});

Route::get('cookie' , function() {
	echo Request::cookie('remember_token');
	//var_dump( Request::cookie() );
	//echo $_COOKIE["user"];

// A way to view all cookies
print_r($_COOKIE);
});

Route::get('abd' , function() {
	abort(404);
	echo 'fsdhfsd';
});

Route::get('captcha/{tmp}',   'CaptchaController@captcha' );
Route::post('captchaCheck' , 'CaptchaController@check' );
