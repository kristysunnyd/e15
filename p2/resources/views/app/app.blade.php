@extends('layouts/main')

@section('title')
E15 Project 2
@endsection

@section('head')
<link href='/css/app.css' rel='stylesheet'>
@endsection

@section('content')
<img id='logo' src='/images/littletv.png' alt='little tv character'>

<h1 id='dramatitle'>Drama/ TV Series Calculator</h1>


<form method='GET' action='/calculator'>

    <h2>Want to know how long it'll take to binge a series?</h2>
    <h2>Here's the calculator for you!</h2>

    <fieldset>
        <label for='videoLength'>On average, how long is one episode in <strong>minutes?</strong></label>
        <input type='number' name='videoLength' id='videoLength' value='{{$videoLength}}'>

    </fieldset>


    <fieldset>
        <label for='numberEpisodes'>Number of episodes?</label>
        <input type='number' name='numberEpisodes' id='numberEpisodes' value='{{$numberEpisodes}}'>

    </fieldset>

    <fieldset>
        <label for='skipOpening'>
            Would you like to skip the Openings?
        </label>
        <input type='radio' name='skipOpening' id='opYes' value='opYes' {{ ($skipOpening == '2') ? 'checked' : '' }}>
        <label for='opYes'>Yes</label>

        <input type='radio' name='skipOpening' id='opNo' value='opNo' {{ ($skipOpening == '0' or is_null($skipOpening)) ? 'checked' : '' }}>
        <label for='opNo'>No</label>

        <br>
        <label for='skipEnding'>
            Would you like to skip the Endings?
        </label>
        <input type='radio' name='skipEnding' id='edYes' value='edYes' {{ ($skipEnding == '2') ? 'checked' : '' }}>
        <label for='edYes'>Yes</label>

        <input type='radio' name='skipEnding' id='edNo' value='edNo' {{ ($skipEnding == '0' or is_null($skipEnding)) ? 'checked' : '' }}>
        <label for='edNo'>No</label>

    </fieldset>

    <fieldset>
        <label for='dateTime'>Start Time?</label>
        <input type='datetime-local' name='dateTime' id='dateTime' value='{{$currentTime}}'>
    </fieldset>

    <fieldset>
        <label for='break'>Would you like a break in between episodes?</label>
        <select id='break' name='break'>
            <option value='0' {{ ($break == '0') ? 'selected' : '' }}>No Break</option>
            <option {{ ($break == '5') ? 'selected' : '' }}>5</option>
            <option {{ ($break == '10') ? 'selected' : '' }}>10</option>
            <option {{ ($break == '15') ? 'selected' : '' }}>15</option>
            <option {{ ($break == '20') ? 'selected' : '' }}>20</option>
            <option {{ ($break == '25') ? 'selected' : '' }}>25</option>
            <option {{ ($break == '30') ? 'selected' : '' }}>30</option>
            <option {{ ($break == '35') ? 'selected' : '' }}>35</option>
            <option {{ ($break == '40') ? 'selected' : '' }}>40</option>
            <option {{ ($break == '45') ? 'selected' : '' }}>45</option>
            <option {{ ($break == '50') ? 'selected' : '' }}>50</option>
            <option {{ ($break == '55') ? 'selected' : '' }}>55</option>
            <option {{ ($break == '60') ? 'selected' : '' }}>60</option>
        </select>



    </fieldset>
    <div id='error'>
    @if(count($errors) > 0)
    <ul class='alert alert-danger'>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    
    @endif
    </div>
    <button type='submit' id='submitbutton'>Submit</button>
    {{-- <input type='submit' class='btn btn-primary' value='Submit'> --}}
    

</form>

{{-- Results --}}

@if(!is_null($totalTime))
<div class='results'>
<h3>Here are the results!</h3>

<p>Total Time:</p>
<div id='totaltime'>
    @if($hours < 1)
    {{$minutes}} {{ Str::plural('minute', $minutes) }}

    @elseif($minutes == 0)
    {{$hours}} {{ Str::plural('hour', $hours) }}

    @else
    {{$hours}} {{ Str::plural('hour', $hours) }} & {{ $minutes }} {{ Str::plural('minute', $minutes) }}
    @endif
    </div>
    <div id='currenttime'>
    <h3>Start Time:</h3>
    <p>{{$currentTimeShow}}</p>
    <h3>End Time:</h3>
    <p>{{$dateTime}}</p>
        </div>

        @endif


        @endsection
