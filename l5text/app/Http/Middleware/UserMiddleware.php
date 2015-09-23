<?php namespace App\Http\Middleware;

use Closure;
use xinfeng\Auth\loginRegister;
use Illuminate\Http\RedirectResponse;
use Request;

class UserMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	protected $user;
	protected $next;

	public function __construct(loginRegister $user) {
		$this->user = $user;

	}

	public function handle($request, Closure $next)
	{
		
		//$this->next=$next;
		//echo session('id');

		
		if( session('userid') ) {
			//echo 'hh';
			//exit();
			return $next($request);

		    if($this->nextUrl() ) {
		    	return $next($request);
		    }
	    } else {
            if($this->user->checkCookie() ) {
                if($this->nextUrl() ) {
		    	    return $next($request);
		        }

            } else {
                if( Request::path() == 'user/login' ) {
                    return $next($request);
                } else
            	return redirect('user/login');
            }
	    }
	}

	public function nextUrl( ) {
		if(Request::path() == 'user/login') {
			echo 'i ma se';
	        $url = url('home');
	        header( "location:$url ");
            exit();//重定向要注意不要定向到同一路由，不然会死循环
		} else {
			return true;
		}
	}

}
