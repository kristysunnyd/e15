@extends('layouts/main')

@section('title')
{{ $drama ? $drama->drama_title : 'Drama not found' }}
@endsection

@section('head')

@endsection

@section('content')

@if(!$drama)
No record of the Drama available... <a href='/dramas'>Click here to look our current list!</a> Or create a record <a href='/dramas/add'>here!</a>

@else
<div class='drama-box'>
<h1>{{ $drama->drama_title }}</h1>
<img class='cover' src='{{ $drama->image_url }}' alt='Drama poster of {{ $drama->drama_title }}' width="300px">
<h3>Directed by: {{$drama->director}}</h3> 
<h3>Main Cast:</h3>
<p>{{$drama->main_cast}}</p>
<h3>Genre:</h3>
<p>{{$drama->genre}}</p>
<h3>Episode Duration:</h3>
<p>{{$drama->episode_duration}}</p>
<h3>Number of Episodes:</h3>
<p>{{$drama->num_episodes}}</p>
<h3>Short Description</h3>
<p>{{$drama->description}}</p>


@if(Auth::user())
<h2 id='review-button'><a href='/dramas/{{$drama->slug}}/reviews'>See Reviews</a></h2>

@endif

@endif

</div>
@endsection