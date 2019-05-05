@extends('layouts.app')


@section('content')
<h1>create post</h1>
<form method="post" action="/posts">
{{-- {!! Form::open(['method'=>'POST', 'action'=>'PostController@store']) !!} --}}
<input type="text" name="title" placeholder="Enter Title">
{{ csrf_field() }}
<input type="submit" name="submit">
</form>

{{-- showing the error --}}
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




@endsection

 

