<!DOCTYPE html>  
<html lang="zh-CN">  
<head>  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>管理员登陆</title>
  <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

  <style type='text/css'>
  .yinying{

    
    background-color:rgba(255,255,255,0.27); 
    border-radius:10px;
    border:1px solid #aaa;  

    box-shadow:inset 0px 0px 10px rgba(255,255,255,0.5),0px 0px 15px rgba(75,75,75,0.3); 
  }
  .checkbox{
    height: 30px;
    border: 1px solid blue;
    width: 30px;
    font-size: 28px;
    display: inline-block;
  }
  .lrg{
    font-size: 36px;
    height: auto;
    font-weight: bold;
  }
  .hidden-input {
    opacity: 0;
    position: absolute;
    z-index: -1;
}

input[type=checkbox]+span {
    /* your style goes here */
    display: inline-block;
    height: 50px;
    width: 1em;
    border-radius: 4px;
    background-color: gray;        
}

/* active style goes here */
input[type=checkbox]:checked+span {
    background-color: red;
}
  </style>


</head>

<body>

<div class="container">
<div class="row">
<div class="col-xs-12 col-md-6 ">
<img src="sy_img/login.png">
</div>
<div class="col-xs-12 col-md-6 yinying">
<div class="page-header">
  <h2>管理员登陆</h2>
</div>
<div >
<form method="POST"  action="{{url('/auth/login') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="exampleInputEmail1"> 输入您的邮箱<?php echo 'fffffffffff' ; ?></label>
    <input type="email" class="form-control" aria-label="Left Align" name="email" value='hhhhhh' id="exampleInputEmail1" placeholder="邮箱">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">输入您的密码</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="passeord" placeholder="密码">
  </div>
  <div class="form-group">
    <label for="exampleInputPhone">输入您的电话号码</label>
    <input type="text" class="form-control" id="exampleInputPhone" placeholder="号码">
  </div>
 <!-- <div class="checkbox">
  </div><label><input type="checkbox" name="remember"> Remember Me</label>
  同意协议<br />-->
  <button id="login" class="btn btn-default">登录</button>
  <label>
    <input type="checkbox" class="hiddn-input" />
    <span class="your style about checkbox"></span>
    记住我
</label>


  
</form>
<br />
</div>
</div>
</div>



</div>

<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

       $('.checkbox').click(function(){
       // alert('jjjj');
        if( $(this).find('span').length>0 ){
          $(this).empty();
        }
        else{
          $(this).append('<span class="glyphicon glyphicon-ok " aria-hidden="true"></span> ');
        }
       });

        var valid=true;
       $('#login').click(function(){

        var email=$('#exampleInputEmail1');
        var val=email.val();
        
       });
       $('#exampleInputEmail1').on('focus blur keyup' , function(){
        var email=$(this);
        isemail(email);
       });
       $('#exampleInputPhone').on('focus blur keyup' , function(){
        var phone=$(this);
        isphone(phone);
       });






       function isemail(email){
        var val=email.val();
        email.next().remove();
        if(!(/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/).test(val)){
          //console.log('hh');
          // email.val('');
           //console.log($(email).position());
           email.parent('.form-group').append('<span class="glyphicon glyphicon-remove " aria-hidden="true"></span>')
           .children('.glyphicon').css({'top':($(email).position().top+10)+'px','right':'18px','position':'absolute'});
           
        }else{
          email.parent('.form-group').append('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>')
          .children('.glyphicon').css({'top':($(email).position().top+10)+'px','right':'18px','position':'absolute'});
        }

       }
       function isphone(phone){
        var val=phone.val();
        phone.next().remove();
        if(!(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/ ).test(val) ){
          phone.parent('.form-group').append('<span class="glyphicon glyphicon-remove " aria-hidden="true"></span>')
           .children('.glyphicon').css({'top':($(phone).position().top+10)+'px','right':'18px','position':'absolute'});
        }else{
          phone.parent('.form-group').append('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>')
          .children('.glyphicon').css({'top':($(phone).position().top+10)+'px','right':'18px','position':'absolute'});
        }
        }

       
       
    });
</script>