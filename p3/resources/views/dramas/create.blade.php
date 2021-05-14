@extends('layouts/main')

@section('title')
Add a Drama/TV Show
@endsection

@section('content')

<h1>Add a Drama/TV Show into our Database!</h1>

<form method='POST' action='/dramas'>
    {{ csrf_field() }}
    
    <label for='drama-title'>TV Show Name</label>
    <input type='text' name='drama_title' id='drama_title' value='{{ old("drama_title")}}'>
    @include('includes/error-field', ['fieldName' => 'drama_title'])
    <br>

     <label for='genre'>Genre</label>
    <input type='text' name='genre' id='genre' value='{{ old("genre")}}'>
    @include('includes/error-field', ['fieldName' => 'genre'])
    <br>
    <label for='director'>Director</label>
    <input type='text' name='director' id='director' value='{{ old("director")}}'>
    @include('includes/error-field', ['fieldName' => 'director'])
    <br>
    <label for='main_cast'>Main Cast</label>
    <p>Please separate the actors with a comma.</p>
    <textarea name='main_cast' id='main_cast'>{{ old("main_cast")}}</textarea>
    @include('includes/error-field', ['fieldName' => 'main_cast'])
    <br>
    <label for='air_date'>Airing Date</label>
    <input type='date' name='air_date' id='air_date' value='{{ old("air_date")}}'>
    @include('includes/error-field', ['fieldName' => 'air_date'])
    <br>
    <label for='episode_duration'>Episode Duration</label>
    <input type='text' name='episode_duration' id='episode_duration' value='{{ old("episode_duration")}}'>
    @include('includes/error-field', ['fieldName' => 'episode_duration'])
    <br>
    <label for='num_episodes'>Number of Episodes</label>
    <input type='text' name='num_episodes' id='num_episodes' value='{{ old("num_episodes")}}'>
    @include('includes/error-field', ['fieldName' => 'num_episodes'])
    <br>
    <label for='production_company'>Production Company</label>
    <input type='text' name='production_company' id='production_company' value='{{ old("production_company")}}'>
    @include('includes/error-field', ['fieldName' => 'production_company'])
    <br>
    <label for='description'>Short Description</label>
    <textarea name='description' id='description'>{{ old("description")}}</textarea>
    @include('includes/error-field', ['fieldName' => 'description'])
    <br>
    <label for='image_url'>Image URL</label>
    <input type='text' name='image_url' id='image_url' value='{{ old("image_url", "http://")}}'>
    @include('includes/error-field', ['fieldName' => 'image_url'])
    <br>
    <label for='external_url'>External URLs? (e.g. IMDB, Wikipedia, MyDramaList, etc...)</label>
    <input type='text' name='external_url' id='external_url' value='{{ old("external_url", "http://")}}'>
    @include('includes/error-field', ['fieldName' => 'external_url'])
    <br>

    <button type='submit' class='btn btn-primary'>Add Drama/TV Show</button>

    @if(count($errors) > 0)
    <div class='alert alert-danger'>
        Please correct the errors above.
    </div>
    @endif

@endsection