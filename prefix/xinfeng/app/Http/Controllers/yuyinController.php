<?php namespace App\Http\Controllers;

class yuyinController extends Controller {

protected $cuid=6285307;
protected $apikey='Ojz3WeOCMYRxGDf7O5oIhOvy';
protected $secretkey='3SwAGyKKFjY6kl4q8SCVWOxS5MjChHfd';

public function get (){
	$auth_url = "https://openapi.baidu.com/oauth/2.0/token?grant_type=client_credentials&client_id=".$this->apikey."&client_secret=".$this->secretkey;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER ,false);
curl_setopt($ch,  CURLOPT_SSL_VERIFYHOST,false);
$response = curl_exec($ch);
if(curl_errno($ch))
{
    print curl_error($ch);
}
curl_close($ch);
$response = json_decode($response, true);
$token = $response['access_token'];
echo $token;

$audio = file_get_contents('record/recordings/1.mp3');
//echo $audio;
$base_data = base64_encode($audio);

$array = array(
        "format" => "pcm",
        "rate" => 8000,
        "channel" => 1,
        //"lan" => "zh",
        "token" => $token,
        "cuid"=> $this->cuid,
        //"url" => "http://www.xxx.com/sample.pcm",
        //"callback" => "http://www.xxx.com/audio/callback",
        "len" => filesize('record/recordings/1.mp3'),
        "speech" => $base_data,
        );
$json_array = json_encode($array);
$content_len = "Content-Length: ".strlen($json_array);
$header = array ($content_len, 'Content-Type: application/json; charset=utf-8');
$url='http://vop.baidu.com/server_api';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_array);
$response = curl_exec($ch);

if(curl_errno($ch))
{
    print curl_error($ch);
}
curl_close($ch);
echo $response;
$response = json_decode($response, true);
var_dump($response);

} 







}