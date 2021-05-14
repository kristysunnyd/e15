@extends('layouts/main')

@section('title')
Latest Reviews
@endsection

@section('head')
<link href='/css/books/show.css' rel='stylesheet'>
@endsection

@section('content')

<div class='newReviews'>
    <h2>Latest Reviews</h2>
    <ul >
        @foreach($newReviews as $review)
            @foreach($drama as $id)
                @if($id->id == $review->drama_id)
                    <li> 
                    <h3>{{$id->drama_title}} - a Review by {{$review->name}}</h3>
                    <p>{{$review->review}}</p>
                     <p class='review-rating'>Rating: {{$review->rating}}/10 | Recommendation? {{$review->recommendation ? 'Yes!' : 'No..'}}</p>
                     <a href='/dramas/{{$id->slug}}/reviews'>See more reviews for {{$id->drama_title}} here!</a>
                    </li>
                @endif
            @endforeach
        @endforeach
    </ul>
</div>

@endsection