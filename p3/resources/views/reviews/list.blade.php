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
</div>
<div id='leave-review'>
<h3>Want to leave a review?</h3>
<a href='#write-review'>Review Here!</a>
</div>
<div id='reviewsList'>
    <h2>Reviews</h2>
    <ul>
        @foreach($reviews as $review)
        <li><h3>A Review by {{ $review->name }}:</h3>
        <p>{{$review->review}}</p>
        <p>Rating: {{$review->rating}}/10</p>
        <p>Do you recommend it?: {{$review->recommendation ? 'Yes!' : 'No..'}}</p>
        <p>Posted on: {{$review->created_at}}</p>
        </li>

        @endforeach
    </ul>





@if(Auth::user())
<div id='review-form'>
    <h3 id='write-review'>Write a review!</h3>
    <form method='POST' action='/review'>
        {{ csrf_field() }}
        
        <label for='name'>Name:</label>
        <input type='text' name='name' id='name' value='{{Auth::user()->name}}'>
        @include('includes/error-field', ['fieldName' => 'name'])
        <br>

        <label for='review'>Review</label>
        <textarea name='review' id='review'>{{ old("review")}}</textarea>
        @include('includes/error-field', ['fieldName' => 'review'])
        <br><br>

        <label for='rating'>Rating</label>
        <p>Rate it out of 10:</p>
        <input type='text' name='rating' id='rating' value='{{ old("rating")}}'>
        @include('includes/error-field', ['fieldName' => 'rating'])
        <br>

        <p>Would you recommended it?:</p>
        <input type="radio" id="yes_rec" name="recommendation" value="1">
        <label for="yes_rec">Yes</label>
        <input type="radio" id="no_rec" name="recommendation" value="0">
        <label for="no_rec">No</label>
        @include('includes/error-field', ['fieldName' => 'rating'])
        <br>

        <input type='hidden' id='review_slug' name='review_slug' value='{{$drama->id}}'>

        <button type='submit' class='btn btn-primary'>Share your Review!</button>

        @if(count($errors) > 0)
        <div class='alert alert-danger'>
            Please correct the errors above.
        </div>
        @endif
    @endif

</div>



@endif

@endsection