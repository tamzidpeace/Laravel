@extends('layouts.app')


@section('content')
    <h1>create post</h1>
    <form method="post" action="/posts">
        <input type="text" name="title" placeholder="Enter Title">
            {{ csrf_field() }}
        <input type="submit" name="submit">
    </form>
@endsection