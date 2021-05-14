@extends('layouts/main')

@section('title')
User Information 
@endsection

@section('head')

@endsection

@section('content')
<div id='userinfo'>
<h1>User Information</h1>

<h3>Name: {{ Auth::user()->name }}</h3>
<h3>Email: {{ Auth::user()->email }}</h3>
<h3>User ID: {{ Auth::user()->id }}</h3>
</div>

<h1>Reviews:</h1>
@if(!$dramas)
<p>You have not made any reviews yet... <a href='/dramas'>Click here to go our list of dramas!</a>
@else
<div class='reviewsList'>
    <ul>
        @foreach($sortedReviews as $review)
            @foreach($dramas as $drama)
            @if ($review->drama_id == $drama->id)
            <li><h3>{{ $drama->drama_title }}</h3>
            <br>
            <img src='{{$drama->image_url}}'>
            <p>Review:
            <br>
            {{$review->review}}
            </p>
            <p>Date: {{$review->created_at}}</p>
            <a href='/dramas/{{$drama->slug}}'>Link to Drama Page</a>
        
        </li>
        @endif
        @endforeach
        @endforeach
    </ul>
</div>
@endif


@endsection