


@extends('_layouts.default')

@section('content')

    <form action="form" method="post" id="form_uploadimg" enctype="multipart/form-data">
      <input name="token" type="hidden" value="{{ $token }}">


        <br>
        <input type="file" id="file_1" name="file" accept="image/*" multiple  />

        <input type="submit" value="uploads">
        <br>
        <input id="hide" type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>

@endsection


@section('script')

<script src="/js/formupload.js"></script>

@endsection

