<!DOCTYPE html>  
<html lang="zh-CN">  
<head>  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Learn Laravel 5</title>
  <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  


  @yield('link')

  <!-- Fonts 
  <link href='http://fonts.useso.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->
</head>  
<body>

  <div class="container" style="margin-top: 20px;">
    @yield('content')
    <div id="footer" style="text-align: center; border-top: dashed 3px #eeeeee; margin: 50px 0; padding: 20px;">
      ©2015 <a href="">lumin</a>
    </div>
  </div>

     <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=Ojz3WeOCMYRxGDf7O5oIhOvy "></script>-->

    @yield('script')


</body>
</html>


