<?php
//use App\User;
//use App\MyClass;
//use App\Services\A;



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
//以下为自带的主页路由

//Route::get('/', 'WelcomeController@index');

Route::get('/', 'HomeController@index');

//这个是自己创建的主页路由

//Route::get('/', 'HomeController@index'); 

//下面这段是用来注册管理员账号的,所有方法以及在服务提提供者内置，不在对应控制器中体现

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('registerEmailCheck' , 'Auth\AuthController@registerEmailCheck');
//Route::get('registerEmailCheck' , 'Auth\AuthController@dd');

Route::get('ddd', 'Auth\AuthController@getLogin');

//以下仅仅保留登陆退出功能
/*
Route::get('auth/login', 'Auth\AuthController@getLogin');  
Route::post('auth/login', 'Auth\AuthController@postLogin');  
//Route::get('auth/logout', 'Auth\AuthController@getLogout'); 

Route::get('auth/logout',function()
{
  echo 'jjjj';
});*/


//以下为路由方法使用测试
Route::get('cats/{id}', function($id){
  $value = Config::get('app.timezone');
  echo $value."hhhhhh" ;  
  return "Cat #$id"; 
})->where('id', '[0-9]+'); 

Route::get('user/{name?}', function($name = 'null')
{
    return $name;
});

Route::get('user/{id}/{name}', function($id, $name)
{
    echo 'hhhhhhhhhhhhh';
});

Route::group(['prefix' => 'admin/{id?}'], function()
{
    Route::get('users', function($id='hh')
    {
        // Matches The "/admin/users" URL
        echo 'hhhhhhaa';
    });

    Route::get('userss', function()
    {
        // Matches The "/admin/users" URL
        echo 'lllllllllllhhhhhhaa';
    });
});
//子域名路由，在路由前端附加子域名,domain意思是子域名，后面是子域名的值
Route::group(['domain' => '{account}.myapp.com'], function()
{

    Route::get('user/{id}', function($account, $id)
    {
        //
        echo 'hh'.$account.$id;
    });

});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin' ,'middleware' => 'auth'], function()
{
  Route::get('/', 'AdminHomeController@index');
   Route::resource('pages', 'PagesController');
    Route::resource('comments', 'CommentsController');
});


//Route::controller('text', 'text');
//Route::controller(['tt' => 'text']);


//如果在内部指向管理员首页，则自动设置了session，可以直接登录
Route::get('admin/pages/{id}', 'admin\AdminHomeController@index');

Route::get('pages/{id}', 'PagesController@show');

Route::post('comment/store', 'CommentsController@store');

//事情倾听器使用


Route::get('jjjj', function()
{
  $user=App\User::first();//与使用use App\User ,再user::   是等价的,其中App\User中的user部分大小写，最好和类名一样
    Event::fire('user.login',$user);
});

Event::listen('user.login', function($user)
{
    //var_dump($user);
    dd($user);
});



 
Route::get('pp','TextIOC@show');
Route::get('bb',function(){
  //App::bind('CarInterface', 'Porche');

  $car=new p;
  echo 'hhhhhhhh';
  //$car = App::make('CarInterface');  
    $car->start();
    $car->gas();
    $car->brake();

});


/*

App::bind('A',function()
{
  return new A;
});
*/

Route::get('facade',function(){
 //App::make('A')->tt();
 A::tt();
});



Route::get('time',function()
{
  echo date("ymdhis");
  echo URL('time');
});

Route::post('file' , 'FilesController@store' );
Route::get( 'fff' , 'FilesController@index' );
Route::get( 'clipimage ' , function(){
  return view('clipimage');
});


Route::get( 'form' , 'formuploadController@index' );
Route::post( 'form' , 'formuploadController@upload' ) ;

Route::get( 'upai' , function(){
  return view('Upaiyun');
});

Route::get('qiniu' , 'imageController@getToken' );
Route::post('ll','imageController@delete');


Route::get('xin','duanxinController@send');

Route::get('ss','messaegeController@send');

Route::get('yuyin','yuyinController@get');

Route::get('video',function(){
  return view('video');
});

Route::get('sendEmail' , function(){

/*  Mail::raw('Text to e-mail', function($message){

   // $message->from('18186493126@163.com', 'Laravel');

    $message->to('156448398@qq.com');
    });*/
$email='156448398@qq.com';
$name='飞无极';
$uid=12;
$code=1111;
$data = ['email'=>$email, 'name'=>$name, 'uid'=>$uid, 'activationcode'=>$code];
Mail::send('activemail', $data, function($message) use($data)
{
   $message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！') ;
  
});

});


Route::get('trans' , function() {
  echo trans('validation.required');
} );


Route::get('jjp' , function(){
  return  redirect('home');
});




