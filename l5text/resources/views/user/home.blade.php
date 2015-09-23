@extends('layaout')


@section('content')

@if($results[0]) 
    <h1>{{$results[1]->email}}欢迎您首次登陆</h1>
@endif


@endsection