@extends('layouts.app')

@section('content')

<h1>Home</h1>

@endsection

@section('sidebar')
@parent
<p>this will append after side bar</p>

@endsection