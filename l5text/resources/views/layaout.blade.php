<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <title>{{ $title }} </title>
    
    <style>
      body,html{
        height: 100%;
      }
      .cen-load{
    position: absolute;
    top: 50%;
    transform: translateY(-20px);
    left: 50%;
   transform: translateX(-50%);

  }

.loading 
{
  z-index: 999;
width:0px;
height:0px;
border-right:20px solid #3399ff;
border-top:20px solid red;
border-left:20px solid yellow;
border-bottom:20px solid green;

border-radius: 20px;
-moz-border-radius: 20px;
-webkit-border-radius: 20px;

/* Animate and rotate the spinner using CSS3 Animations */
animation: bganim 0.6s linear 0s infinite;
/* moz: Vendor prefixe for Mozilla Firefox */
-moz-animation: bganim 0.6s linear 0s infinite;
/* webkit: Vendor prefixe for Google Chrome, Chromium, Apple Safari... */
-webkit-animation: bganim 0.6s linear 0s infinite;
}

@keyframes bganim {
/* Rotate the div 360° */
from { transform:rotate(0deg); } to { transform:rotate(360deg); }
}
@-moz-keyframes bganim {
from { -moz-transform:rotate(0deg); } to { -moz-transform:rotate(360deg); }
}
@-webkit-keyframes bganim {
from { -webkit-transform:rotate(0deg); } to { -webkit-transform:rotate(360deg); }
}

      
    </style>

    <script> 
    // alert('ia te');

   /* 
    var waiting='<div class=" cenloading" id="loadDiv">\
<div class="sm-col-12">\
<div class="progress">\
  <div class="progress-bar progress-bar-striped active" style="width: 45%">\
  </div>\
</div>\
</div>\
</div>';*/
    var waiting='<div class="loading cen-load" id="load"></div>';
    document.write(waiting);
    //alert('ia te');
   
    //var t=setTimeout("alert('5 seconds!')",5000);
    
function Loaded() 
{ 
document.getElementById("load").style.display="none" 
document.getElementById("all").style.display="" ;

}
</script> 

    <link rel="shortcut icon" href="favicon.ico"/>
    <link rel="bookmark" href="favicon.ico"/>
    
     <link rel="stylesheet" type="text/css" href="{{url("css/bootstrap.css")}}">
    
    <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
      @yield('link')

     
    <style>
    .navbar{
    	margin-bottom: 0px;
    }

    #lading{
       margin: auto 0;
       position: absolute;
       top:200px;
    }
   .center-block1{
  width:100px;
  height:30px;
  line-height:30px;
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50px,-15px);
}
.center-block {
    width: 30%;
    height: 30%;
    position: absolute;
    top: 80%;
    left: 50%;
    margin-top: calc(-30%/2);
    margin-left: calc(-30%/2);
 
  }

.center{
    text-align: center;     
  }
  .alert{ 
    margin-bottom: 0px;
  }
  .cen{
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    

  }
  .cen+p{
    margin-left: 30px;
    float: left;
  }
    </style>
    

   </head>

   <body onLoad="Loaded()" >
   

 

  <div id="all" style="display:none">
   	<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img alt="nav" style="width=auto" height="20px" src="{{url("1.png")}}"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">燕子科技</a></li>
        <li><a href="#">关于我们</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">公司详情 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button  class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


 @yield('content')


    <div id="footer" style="text-align: center; border-top: dashed 3px #eeeeee; margin: 50px 0; padding: 20px;">
      ©2015 <a href="">lumin</a>
    </div>
    <!--endall-->

   
    <script src="{{url("js/jquery.js")}}" ></script>
    <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>

    <script src="{{url("js/bootstrap.min.js")}}"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    
    $(function(){ 
      //插入其他源的页面 
    $("#iframe").load(function(){ 
         var height = $(this).height() + 90; 
         //这样给以一个最小高度 
         $(this).height( height < 900 ? 800 : height ); 
    }); 
}); 
   //防止页面被箱套
    if (top.location != window.location) {
            top.location = window.location;
        }
  
    /*
    $('.navbar li').hover(function(){
      $(this).addClass('active');
     },
        function(){
          $(this).removeClass('active');
        }
     );*/
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    </script>
     @yield('script')


 </body>
 </html>
