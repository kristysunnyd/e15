<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class PageController extends Controller
{
    public function index()
    {
        return view('app/app', [
            'totalTime' => session('totalTime', null),
            'hours' => session('hours', null),
            'minutes' => session('minutes', null),
            'currentTimeShow' => session('currentTimeShow', null),
            'dateTime' => session('dateTime', null),
            'videoLength' => session('videoLength', null),
            'numberEpisodes' => session('numberEpisodes', null),
            'skipEnding' => session('skipEnding', null),
            'skipOpening' => session('skipOpening', null),
            'break' => session('break', null),
            'currentTime' => session('currentTime', null),
        ]);
    }

    public function calculator(Request $request)
    {
        $request->validate([
            'videoLength' => 'required|digits_between:1,9999',
            'numberEpisodes' => 'required|digits_between:1,9999',
            'skipOpening' => 'required',
            'skipEnding' => 'required',
            'dateTime' => 'required',
            'break' => 'required'
        ]);

        #form input values
        $videoLength = (int)$request->input('videoLength', null);
        $numberEpisodes = (int)$request->input('numberEpisodes', null);
        $skipOpening = $request->input('skipOpening', null);
        $skipEnding = $request->input('skipEnding', null);
        $currentTime = $request->input('dateTime', null);
        $break = $request->input('break', null);


        if ($skipOpening == "opYes") {
            $skipOpening = 2;
        } else {
            $skipOpening = 0;
        }

        if ($skipEnding == "edYes") {
            $skipEnding = 2;
        } else {
            $skipEnding = 0;
        }

        #calculate the video length
        $totalTime = (($videoLength * $numberEpisodes) - ($skipOpening + $skipEnding)) + ($break * $numberEpisodes);

        $hours = floor($totalTime/60); //used floor() to round down
        $hoursMinutes = $hours * 60;
        $minutes = $totalTime - $hoursMinutes;


        #calculate time
        $addHour = '+' . $hours . ' hour ';
        $addMinutes = '+' . $minutes . ' minutes';

        $convertTime = strtotime($currentTime);


        $currentTimeShow = date('l F j Y\, g:i A', $convertTime);
        $dateTime = date('l F j Y\, g:i A', strtotime($addHour.$addMinutes, $convertTime));

    

        return redirect('/')-> with([
            'totalTime' => $totalTime,
            'hours' => $hours,
            'minutes' => $minutes,
            'currentTimeShow' => $currentTimeShow,
            'dateTime' => $dateTime,
            'videoLength' => $videoLength,
            'numberEpisodes' => $numberEpisodes,
            'skipEnding' => $skipOpening,
            'skipOpening' => $skipOpening,
            'break' => $break,
            'currentTime' => $currentTime

        ]);
    }
}
