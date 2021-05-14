@extends('layouts/main')

@section('title')
Full List of Movies and TV Shows
@endsection

@section('head')
<link href='/css/books/index.css' rel='stylesheet'>
@endsection

@section('content')

<h1>Full List of Movies and TV Shows</h1>

@if(count($dramas) == 0)
<p dusk='no-dramas'>There are currently no movies or tv shows available...</p>
@else
<div class='newDramas'>
    <h2>Newly Added Dramas</h2>
    <ul>
        @foreach($newDramas as $drama)
        <li><a class='new-dramas' href='/dramas/{{ $drama->slug }}'>{{ $drama->drama_title }}</a>
        <img class='snapshots' src='{{ $drama->image_url }}'>
        </li>
        @endforeach
    </ul>
</div>

<div class='fullDramas'>
<h2>Full List of Dramas</h2>
<ul>
    @foreach($dramas as $drama)
    <li><a class='drama' href='/dramas/{{ $drama->slug }}'>
        <h3>{{ $drama->drama_title }}</h3>
        <img class='cover' src='{{ $drama->image_url }}'></a>
        <p>Release date: {{ $drama->air_date }}</p>
        <li>
        </ul>
    @endforeach
</div>
@endif

@endsection