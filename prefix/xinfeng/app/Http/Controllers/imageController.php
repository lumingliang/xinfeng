<?php namespace App\Http\Controllers;

use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Request;

class imageController extends Controller {
  public $accessKey = 'JWLoV0AAqb-Z46M2tZjfSAu6LNxQ0jfaXsa1eziH';
  public $secretKey = 'DavNyp2_oYJNkOTJ0AId319rEUY9g5Xl_gIOukix';
  public $bucket = 'a88888888';

  public function getToken () {
  	//$accessKey = 'JWLoV0AAqb-Z46M2tZjfSAu6LNxQ0jfaXsa1eziH';
   // $secretKey = 'DavNyp2_oYJNkOTJ0AId319rEUY9g5Xl_gIOukix';
    $auth = new Auth($this->accessKey, $this->secretKey);

   // $bucket = 'a88888888';
    $policy= array('callbackUrl' =>''  );
    $token = $auth->uploadToken($this->bucket,null,3600,null);   
    //return view('qiniu')->withToken($token); 
    return view('FileJQ')->withToken($token);
  }


  public function delete () {



    $auth = new Auth($this->accessKey, $this->secretKey);

    $bucketMgr = new BucketManager($auth);

    $keys = Request::input('key');
    echo $keys;
//$keys=array('FlkAPBwh2qSctCVgqi8X2XAkErD8','Flpgh_IIsijbyiKKs2zagSG-dkdE','FslDxZp3TKe7AkDMg1R_yaMtcAW9');

//$err = $bucketMgr->delete($this->bucket, $key);

    $i=$bucketMgr->buildBatchDelete($this->bucket,$keys);

    $err=$bucketMgr->batch($i);

    echo "\n====> delete result: \n";
    if ($err !== null) {
      var_dump($err);
      echo "Success!";
    }

  }

  public function callback () {


  }


}