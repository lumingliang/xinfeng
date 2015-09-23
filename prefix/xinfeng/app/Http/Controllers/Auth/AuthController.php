<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use Illuminate\Contracts\Auth\Guard;
//use Illuminate\Contracts\Auth\Registrar;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Session;
use Mail;
use Request;
use App\User;
//use App\Comment;
use Validator;
use Auth;


class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	//use AuthenticatesAndRegistersUsers;

	public function getRegister()
	{
		return view('auth.register');
	}

	public function getLogin()
	{
		return view('auth.login');
	}

	public function getLogout()
	{
		Auth::logout();

		return redirect('/');
	}

    public function postLogin () {
    	return redirect('home');
    	//$re=Request::all();
    	//$this->validate($request , [
			//'email' => 'required|email', 'password' => 'required',
		//]);

		$v = Validator::make(Request::all(), [
        'email' => 'required|email', 'password' => 'required',
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors('输入的格式不正确');
        }    

		if ( Auth::attempt(['email' => Request::input('email') , 'password' => Request::input('password') ] , true ) )
        {
            return redirect()->intended('home');
        }
        return redirect( 'auth/login' )
					->withInput(Request::only('email', 'remember'))
					->withErrors('认证失败');     

    }

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(  ) //Guard $auth, Registrar $registrar)
	{
		//$this->auth = $auth;
		//$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/*protected function postRegister () {
       // echo "dddd";
        
        Request::flash();
        $this->email=old('email');
        $this->ename=old('name');
        
    }*/
    public function postRegister()
	{
		//$validator = $this->registrar->validator($request->all());
/*
		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}*/
		$v = Validator::make(Request::all(), [
        'email' => 'required|email', 'password' => 'required',
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors('输入的格式不正确');
        }    

		Request::flash();

		$code=bcrypt(rand(1000,9999));

		//echo $code;

		Session::put('token', $code);

		$email=old('email');

        $name=old('name');

        echo $name;

        //$uid=12;
      //$code=$token;
        $data = ['email'=>$email, 'name'=>$name, 'activationcode'=>$code];
        Mail::send('activemail', $data, function($message) use($data)
        {
             $message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！') ;
  
        });

        echo 'email have send! 请前往激活';

        
		//$this->auth->login($this->registrar->create($request->all()));

		//return redirect($this->redirectPath());
	}

	public function registerEmailCheck () {

		$code=Request::input('code');

		if( $code==old('code') ) {
           //echo old('name');
           //echo old('email');
           //var_dump( Session::all() );
           if( User::create(['name' => old('name') , 'email' => old('email') , 'password' => old('password')  ]) ){
           	return view('/');
           }
		}
		else{
			echo '犯罪分子请离开！';
		}
	}

	/*public function postRegister()
	{/*
		$ff=Session( Request::all() ) ;
		$ggg=array('goods'=>array('name'=> 'jjjjj' ,'price' => 333 , 'color' => 'green' ) , 'go' =>'dddd');
		Session( $ggg );
		var_dump( Session('goods') );
		//echo Session('name');
		dd($ff);
		
		$vaule=Comment::find(100);
		$vaule['nickname']='wo ai 你';
		$vaule->save();
		Session( 'goods' , $vaule );
		//print_r( Session('goods') );
		$t=Session('goods');
		Session('goods')['nickname']='大奖东区';
		echo $t['nickname'];
		//dd(Session::all());
		//print_r(Comment::where('id','=',100)->get() );
		echo date('y-m-d-h-i-s');

	}*/



}
