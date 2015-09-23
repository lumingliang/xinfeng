<?php namespace App\Http\Middleware;

use Closure;
use Session;

class PreventBrake {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//session_start();
		//$allow_sep = "3";
		
		
		if( session('brakeTime') ) {
            
			//echo time().'<br>';
			//echo session('brakeTime');
			//echo (time()-session('brakeTime') );
		    if( (time()-session('brakeTime') )<5 ) {
		    	exit('请5 秒后刷新');
		    	//echo 'shuaxin';
		    } 
            session::flash('brakeTime' , time() );
			
		} else {
			session::flash('brakeTime' , time() );
		}
		/*
		if (isset($_session["post_sep"]))
{
if (time() - $_session["post_sep"] < $allow_sep)
{
        exit("请不要反复刷新");
}
else
{
     $_session["post_sep"] = time();
}
}
else
{
$_SESSION["post_sep"] = time();
}*/
		return $next($request);
	}

}
