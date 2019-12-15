@extends('layouts.app')
@section('content')
    <h3>Create Album</h3>
    {!! Form::open(['action'=>'AlbumsController@store','method'=>'post','enctype'=>'multipart/form-data']) !!}
        {{Form::text('name','',['placeholder'=>'Album Name'])}}
        {{Form::text('description','',['placeholder'=>'Album description'])}}
        {{Form::file('cover_image')}}
        {{Form::submit('submit')}}
    {!! Form::close() !!}
@endsection