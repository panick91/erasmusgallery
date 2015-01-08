@extends('layout')

@section('content')
    <h1>Upload</h1>
    {{Form::open(array('url' => 'upload', 'files' => true));}}
    {{Form::file('image');}}
    {{Form::submit('Upload!');}}
    {{Form::close();}}

    @if(isset($success) && $success)
    <h2>it worked!</h2>
    @endif
@stop