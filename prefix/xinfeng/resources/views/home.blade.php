
@extends('_layouts.default')

@section('link')
<style type="text/css"> 
#ditu{
  height: 800px;
}
</style>


@section('content')
  <div id="title" style="text-align: center;">
    <h1>Learn Laravel 5</h1>
    <div style="padding: 5px; font-size: 16px;">{{ Inspiring::quote() }}</div>
  </div>
  <hr>
  <div id="content">
    <ul>
      @foreach ($pages as $page)
      <li style="margin: 50px 0;">
        <div class="title">
          <a href="{{ URL('pages/'.$page->id) }}">
            <h4>{{ $page->title }}</h4>
          </a>
        </div>
        <div class="body">
          <p>{{ $page->body }}</p>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
  <div id="ditu"></div> 
@endsection

@section('script')
<script type="text/javascript"> 
var map = new BMap.Map("ditu");          // 创建地图实例  
var point = new BMap.Point(116.404, 39.915);  // 创建点坐标  
map.centerAndZoom(point, 15);                 // 初始化地图，设置中心点坐标和地图级别 
map.enableScrollWheelZoom(true);

function hasGetUserMedia() { 
//请注意:在Opera浏览器中不使用前缀 
return !!(navigator.getUserMedia || navigator.webkitGetUserMedia || 
navigator.mozGetUserMedia || navigator.msGetUserMedia); 
} 
if (hasGetUserMedia()) { 
alert('您的浏览器支持getUserMedia方法'); 
} 
else { 
alert('您的浏览器不支持getUserMedia方法'); 
} 
hasGetUserMedia;

</script>  
@endsection