@extends('layout')

@section('content')
    @foreach($images as $image)
    <img src="images/{{$image->url}}.jpg" style="height: 400px;"/>
    @endforeach
@stop