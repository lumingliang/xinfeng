<?php namespace App\Http\Controllers;


class formuploadController extends Controller {

	public function index() {
		return view('formupload');
	} 


	public function upload() {

/*
	echo "<pre>";
    dd($_FILES);
    echo "</pre>";

		$files=$_FILES['files'];

		for($i=0;$i<count($files['name']);$i++) {

			$str=stristr($files['name'][$i],'.'); 
			$path="images/".strtotime("now").$str;
			move_uploaded_file($files['tmp_name'][$i],$path);
			echo 'sucess!'.$i ;


		}


*/
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    $count = count($_FILES['file']['name']);

    /*

    for ($i = 0; $i < $count; $i++) {
     if( ($_FILES['file']['tmp_name'][$i])!='' ){
        $tmpfile = $_FILES['file']['tmp_name'][$i];
        $filefix = array_pop(explode(".", $_FILES['file']['name'][$i]));
        $dstfile = "images/".time()."_".mt_rand().".".$filefix;

        if (move_uploaded_file($tmpfile, $dstfile)) {
            echo " 成功";
        } else {
            echo "失败";
        }
    }*/

    $files=$_FILES['file'];

    print_r($files);

		for($i=0;$i<count($files['name']);$i++) {

			$str=stristr($files['name'][$i],'.'); 
			$path="images/".strtotime("now").$str;
			move_uploaded_file($files['tmp_name'][$i],$path);
			echo 'sucess!'.$i ;











	}
}

}
