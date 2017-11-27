@extends('app')
@section('title','page title')
@section('sidebar')
    @parent
    <p>this is appended to the master sidebar</p>
@endsection
    @section('content')
        <p>this is my body content.</p>
@endsection