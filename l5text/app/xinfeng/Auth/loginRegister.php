<?php namespace xinfeng\Auth;

use Session;
use Mail;
use Request;
use Validator;
use Auth;
use xinfeng\User; // 模型
//use Illuminate\Http\RedirectResponse;
use Hash;
use DB;
use Redirect;
use Response;

class loginRegister {

	protected $user;//object 

	public $results = array();

	protected $remember;

	protected $code;

	public function validate () {
		//print_r(Request::all());
		//return 0;

		$v = Validator::make(Request::all(), ['email' => 'required|email', ]);

        if ($v->fails() )
        {
            //return redirect('503');
            //return 0;
            abort(404);
            exit;
        }  
	}

	public function checkIsExist() {
		//abort(404);
        $this->validate();
        //如果是判断型的最好用DB,如果是查询型等就用ORM
        $hasEmail = DB::table('users')->where('email', Request::input('email') )->first();
       // print_r($som);
       // var_dump(User::all() );
        if( $hasEmail ){
        	echo 1;
        	//return response()->json(['data' => 1]);
        } else {
        	echo 0;
        	//return 0;
        	//return redirect('503');
        	//return response()->json(['data' => 0]);

        }

	}

	public function registerEmailCheck () {
        
		$code=Request::input('code');
		$this->email = old('email');
	    //echo session('code');
	  
		//echo old('name').old('code');
		//var_dump( session()->regenerate() );
		//var_dump(session::all() );
		//echo old('token');
        
		if( $code==Session::pull('code') ) {
        
           if( User::create(['name' => old('name') , 'email' => old('email') , 'password' => bcrypt( old('password') )  ]) ){

           	//return view('home');
           	  //echo 'i am old ';
           	  //var_dump(Session::all() );
           	  $this->setAuth();
           	  $this->results[0]=true;
           	  $this->results[1]=$this->user;
           
           	  //var_dump($this->results);
           	// 

           	 // return true;
           	  
           }
		}

		else{
			//abort(404);
			echo $code;
		}
	}

	public function check () {
		//echo 'i am here!';


		//return redirect('hoe');
		//echo 'i am here!';
		//return Redirect::

		//User::validate();
		$this->validate();

		/*$password= Request::input('password');
		$r_p=User::where('email'  , Request::input('email') )->first()->password ;
		//$re=User::find(Request::input('email'));

		//echo $password;

		//echo  ( $r_p ); 
		//echo $r_p->password;
		//echo $re;


		
		if ( Hash::check( $password , $r_p ) )
        {
        	//echo 'jjj';
            //return redirect()->intended('home');
            return true;

        }

        return false;

        /*echo '[[[[';


        return redirect( 'auth/login' )
					->withInput(Request::only('email', 'remember'))
					->withErrors('认证失败');  */

	}

	public function register () {

		//$user->validate();
		//echo 'jj';
		//$this->validate();
		//return 1;

		
		//var_dump(Request::all());

		$code=bcrypt(rand(1000,9999));

		Session::put('code', $code);

		$email=Request::input('email');

        $name=Request::input('name');
        Request::flash();
        /*
        Session::put('name',$name);
        Session::put('email',$email);
        Session::put('password',Request::input('password') );
        Session::put('code',$code);
        Session::put('som','jjjj');*/
        //$hh=old('name');
       // $all = Session::all();

       // echo $name;

		//var_dump($hh);

        //$uid=12;
      //$code=$token;
        $data = ['email'=>$email, 'name'=>$name, 'activeationcode'=>$code];
        Mail::send('activemail', $data, function($message) use($data)
        {
             $message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！') ;
  
        });

        //echo 'email have send! 请前往激活';
        //Session::reflash();
        echo json_encode(['flag' => 1]);

	}
/*
	public function login() {
		$this->validate();
		/*
		$flag=false; 
		//echo 0;
		//User::create(['email' => Request::input('email') , 'password' => bcrypt( Request::input('password') ) ]);
		$obj = DB::table('users')->where('email', Request::input('email') )->first();
		//echo $obj->password.'<br>';
		
		if($flag) {
			$this->setRemember;
			return true;
		} else return false;8

	

	public function logout () {

		Auth::logout();

		return redirect('/');
	}*/

	public function setAuth() {
		$this->email = Request::input('email');
        $this->user = User::where('email' , '=' , $this->email )->first();
        session::put('userId' , $this->user->id);

	}

	public function logout() {
		session::pull('userId');
	}

	public function setRemember() {
		if(Request::input('remember') ) {
            $date = date('ymdhis');
            $this->remeber=bcrypt($date);
            $user=User::find(session('userId') );
            $user->remember_token=$this->remeber;
            $user->save();
            return true;           
	    }
    }

    public function checkUser() {
    	$obj = DB::table('users')->where('email', Request::input('email') )->first();
		
		if( Hash::check( Request::input('password') , $obj->password ) ){
			$this->setAuth();
			$this->results[0]=0;
           	$this->results[1]=$this->user;
           	Session::put('results' , $this->results);
            return true;
		} else {
			return false;
		}
    }

	public function checkCookie() {
		if(Request::cookie('remember_token') ) {
			$this->user = User::where('remember_token' , '=' , Request::cookie('remember_token') )->first();
			session::put('userId' , $this->user->id);
			return true;
		} else {
			//echo 'hhh';
			return false;
			/*
			$url=url('user/login');
            header("Location: $url");
            exit;*/
		}
	}

	public function resetEmailSend() {
		$this->validate();
		$resetCode=bcrypt(rand(1000,9999));
		Session::put('code', $resetCode);
		$data=['email' => Request::input('email') ,'code' => $resetCode ];
		if(Request::input('email') ) {
			Mail::send('emails.resetpsw', $data, function($message) use($data)
            {
                 $message->to($data['email'], '重置密码')->subject('重置您的密码！') ;
  
            });
		}
		session::put('resetEmail' , Request::input('email') );
		echo 1;//邮箱已经成功发送
	}

	public function resetCheck() {
		//echo session('code');
		$code=Request::input('code');
		if($code===session('code') ) {
			return true;
			//return view('resetPsw')->withResetCode(session('resetCode') );
		}
		else {
			abort(404);
			//echo 'asf';
		}
		

		//exit;
	}

	public function resetPsw() {
		$code=Request::input('code');
		if($code===session('code') ) {
			//var_dump(session::all());
            $password=bcrypt(Request::input('password') );
            $user=User::where('email' , '=' , session::pull('resetEmail') )->first();
            $user->password=$password;
            $user->save();

            session::put('userId' , $user->id);//重置后session以便后续使用
            $this->results[0]=0;
           	$this->results[1]=$user;
            Session::put('results' , $this->results);
           // return response()->json(['status' => 302, 'location' => url('home')]);
            $url = url('home');
            echo json_encode(['status' => 302, 'location' => $url]);
            /*
            echo 'jj';
            abort(3);
            $url=url('home');
            header("Location: $url");
            exit;*/
        } else {
        	//echo 'jjj';
        	
         //echo 
         //return response()->json(['status' => 302, 'location' => $url]);//json_decode(json);json_encode(value);
          
        	echo 0;
     }
	}

    public function setCode() {
        
    }
    /*重定向三法
    方法一：header("Location: viewNote.php");
方法二：echo "<scrīpt>window.location ="$PHP_SELF";</scrīpt>";     
方法三：echo "<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">";
*/
}
