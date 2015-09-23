<?php

// 空间名
$bucket = 'b156448398';

// 表单 API 验证密匙：需要访问UPYUN管理后台的空间管理页面获取
$form_api_secret = 'y2IKPArRPMXLvu4AKHlIR+Cxs7w=';


$options = array();
$options['bucket'] = $bucket;

// 授权过期时间：以页面加载完毕开始计时，10分钟内有效
$options['expiration'] = time()+600;

// 保存路径：最终将以"/年/月/日/upload_待上传文件名"的形式进行保存
$options['save-key'] = '/{year}/{mon}/{day}/{hour}{min}{sec}/upload_{filename}{random32}{.suffix}';

// 文件类型限制：仅允许上传扩展名为 jpg,gif,png 三种类型的文件
$options['allow-file-type'] = 'jpg,gif,png';

// 图片宽度限制：仅允许上传宽度在 0～1024px 范围的图片文件
$options['image-width-range'] = '0,1024';

// 图片高度限制：仅允许上传高度在 0～1024px 范围的图片文件
$options['image-height-range'] = '0,1024';
//设置原图访问
$options['content-secret'] ='123456';
//文件校验码


// 同步跳转 url：表单上传完成后，使用 http 302 的方式跳转到该 URL
// $options['return-url'] = 'http://localhost/return.php';

// 异步回调 url：表单上传完成后，云存储服务端主动把上传结果 POST 到该 URL
// 请注意该地址必须公网可以正常访问
// $options['notify-url'] = 'http://www.demobucket.com/notify.php';

// 缩略类型：固定宽度和高度，若宽高不足时进行拉伸
$options['x-gmkerl-type'] = 'fix_both';

// 保证最终的图片宽高为 200*160
$options['x-gmkerl-value'] = '1024x768';
//图片旋转
$options['x-gmkerl-rotate'] = '90';

// 计算 policy 内容，具体说明请参阅"Policy 内容详解"
 $policy = base64_encode(json_encode($options));

// 计算签名值，具体说明请参阅"Signature 签名"
$signature = md5($policy.'&'.$form_api_secret);

?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>

    <form action="http://v0.api.upyun.com/<?php echo $bucket?>"
	method="post" enctype="multipart/form-data">

      <!-- 需要传递以下三个表单内容 -->
      <input type="hidden" name="policy" value="<?php echo $policy?>">
      <input type="hidden" name="signature" value="<?php echo $signature?>">
      <input type="file" name="file" multiple >
      <input type="submit" value="上传">

    </form>
    <img src="http://a88888888.oss-cn-shenzhen.aliyuncs.com/mi4-detail-3.png?Expires=1434592745&OSSAccessKeyId=XiqD34E5WdQ2c4h1&Signature=qD0GyBSVg1P9Sz6Btj/fydWyof8%3D" />

  </body>
</html>


