@extends('layouts/main')

@section('title')
@endsection

@section('head')
<style>

</style>

@endsection

@section('content')
<div class='welcome'>
<h1>Welcome!</h1>

<p>
    Welcome to DramaBlogs! Here is where you can get all your drama and TV show needs! 
</p>

@if(Auth::user())
<h2>
    Hello {{ Auth::user()->name }}!
</h2>
@endif

<div class='newDramas'>
    <h2>Newly Added Dramas</h2>
    <ul>
        @foreach($newDramas as $drama)
        <li><a class='new-dramas' href='/dramas/{{ $drama->slug }}'>{{ $drama->drama_title }}</a>
        <img class='snapshots' width='300px' src='{{ $drama->image_url }}'>
        </li>
        @endforeach
    </ul>
</div>
</div>



@endsection