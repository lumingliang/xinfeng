<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" /> 
<title>CSS自适应宽度按钮</title> 
<style> 
*{margin:0; padding:0;} 
body{padding:10px; font-size:24px;} 
h1{
	margin:0; 
    padding:10px 0; 
    font-size:14px; 
    font-weight:bold;
} 
a{
	background:url(/upload/20071122231110605.gif) left 0;  
	background-color: red;
	color:#fff; text-decoration:none; height:30px; float:left; 
	cursor:hand; margin:0 5px 0 0;
} 
a:hover{
	background:url(/upload/20071122231110605.gif) left -30px;height:30px;
	background-color: blue;
	color: red;
	min-height: 30px;


} 
a span{
	background:url(/upload/20071122231110605.gif) right 0;  
	padding:7px 8px; 
	display: inline-block;
	height: 29px;
} 
a:hover span{
	background:url(/upload/20071122231110605.gif) right -30px; color:#000;  
	padding:7px 8px 7px 0; 
	margin:0 0 0 8px; 
	height:100px;  
	color: red;

} 
</style> 
</head> 

<body> 
<h1><strong>CSS自适应宽度圆角按钮</strong></h1> 
<a href="http://www.jb51.net" target="_blank"><span>首页</span></a> 
<a href="http://www.jb51.net" target="_blank"><span>不是首页</span></a> 
<a href="http://www.jb51.net" target="_blank"><span>他也许是首页</span></a> 
<a href="http://www.jb51.net" target="_blank"><span>但他一定不是首页</span></a> 
<a href="http://www.jb51.net" target="_blank"><span>好了，就这样把。别扯了~</span></a> 
</body> 
</html> 