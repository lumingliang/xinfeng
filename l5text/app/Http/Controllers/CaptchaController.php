<?php namespace App\Http\Controllers;

//use Requests;
use Request;
use App\Http\Controllers\Controller;


use Gregwar\Captcha\CaptchaBuilder;

//引用对应的命名空间
//use Vendor\gregwar\captcha\CaptchaBuilder;
//use App\vendor\gregwar\captcha\CaptchaBuilder;
use Session;


class CaptchaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    
    public function captcha($tmp)
    {
        Session::pull('captcha');
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 200, $height = 60, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //echo $phrase;

        //把内容存入session
        Session::put('captcha', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

    public function check() {
        //echo session('captcha');
        if(session('captcha')==Request::input('captcha') ) {
            session::put('captchaCheck' , true);//只要一次成功就设置session给其他控制器使用 
            echo 1;
        }
        else echo 0;
    }

}