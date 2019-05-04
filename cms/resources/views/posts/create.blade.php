@extends('layouts.app')


@section('content')
<h1>create post</h1>

{!! Form::open(['method'=>'POST', 'action'=>'PostController@store']) !!}
<input type="text" name="title" placeholder="Enter Title">
{{ csrf_field() }}
<input type="submit" name="submit">

{!! Form:close() !!}
@endsection