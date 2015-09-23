<?php namespace App\Http\Controllers;
use Redirect;
use Request;


class FilesController extends Controller {

public function store (){

/*
if(!is_dir("images")){     // is_dir()函数判断指定的文件夹是否存在
    mkdir("images");         // mkdir()函数创建文件夹
  }

$file=array();

//echo $file['name'];
//$this->imgmove($file);


/*
if (Request::hasFile('_0'))
{
    echo 'i am _0!';
   Request::file('_0')->move('images');

}*/

$file=$_FILES['img'];

$this->imgmove($file);

//$this->mouv();

// return Redirect::to('/');//异步请求，换向失败

/*

for($i=0; $i<3; $i++)
{
	$name='_'.$i;
	echo $name;
	$file[$i]=$_FILES[$name];
	dd($file[$i]);

   //$this->imgmove($file);
}
*/
//$this->imgmove($file[0]);
//$this->imgmove($file[1]);

/*
for($i=0; $i<10;$i++){
	echo $i;
}*/

 // $files=$_POST['files'];//注意获得的方法
   // dd(json_decode($files) );
  //$files = Request::file('files');

 // $v = array('3' => 'fff' , '7' , 'ggggggg' );
// dd($v);   为何只能使用一次
 // dd($files);

  //$file=$files[0];

 // $p=Request::input('_token');//获取输入数据
  //$p=$_POST['_token'];
 // dd($p);
//  echo $p ;

 // dd($file);
//echo $files;







//$file[0]=$_FILES['_0'];
//$file[1]=$_FILES['_1'];
//dd($file[0]);
//dd($file[1]);
//$this->imgmove($file[0]);
//$this->imgmove($file[1]);




}


	public function index (){
		return view('FileJQ');
	}

	

  public function imgmove ($file){

    	$str=stristr($file['name'],'.');         // stristr()函数获取上传文件的后缀
        $path="images/".strtotime("now").$str;  // 定义上传文件的存储位置
//echo $file['error'];
 
       if(move_uploaded_file($file['tmp_name'],$path)){   // 执行文件上传操作
      //header("Content-type: text/html; charset=utf-8"); 
        sleep(10);
      // echo csrf_token();
    }
}


public function mouv (){
	$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
	echo 'hhhhhhh';
//if ($fn) {
    file_put_contents(
        'images/1111.png ' ,
        file_get_contents('php://input')
    );
    echo "http://www.zhangxinxu.com/study/201109/uploads/$fn";

    exit();
//}
}

    





}
