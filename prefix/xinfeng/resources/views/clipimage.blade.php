
@extends('_layouts.default')


@section('link')

<link rel="stylesheet" type="text/css" href="/css/clipimage.css">

@endsection

@section('content')


<input type="file" accept="images/*">
<input class="url" type="url" placeholder="url">
<div class="container"></div>
<button class="submit">Submit</button>

@endsection


@section('script')
  <script src="/js/clipimage.js"></script>
@endsection

 