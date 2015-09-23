
@extends('_layouts.default')


@section('link')
<meta name="csrf-token" content="{{ csrf_token() }}" />



<style type="text/css">
    .drop{
        
        min-height: 400px;
        border: 3px dashed #eeeeee;
        border-radius: 11px 20px;
      /*  box-shadow: 5px 10px 10px black;
        visibility:hidden;//如果为hidden则不起监听作用了*/
      }
    imghs{
      width: 50px ;
      height: 50px;
    }

    
</style>


@endsection


@section('content')


  
  <input id="hide" type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" id="token" name='token' value="{{ $token }}" >
   
  <div class="panel panel-default">
  <div class="panel-heading">
    <input type='file' name='file' id='file_1'  class="hidden" multiple />
    <input type="button"  id='ff' class="btn btn-default" value="点击以获取本地图片" />
  </div>
  <div class="panel-body" id='DropZone'>
   <div  class="row drop">
   </div>
  </div>
</div>




@endsection

@section('script')

<script src="/js/flieupload.js"></script>

@endsection

