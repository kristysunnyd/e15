<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Drama;

class DramaController extends Controller
{
    public function index()
    {
        $dramas = Drama::orderBy('drama_title', 'ASC')->get();

        $newDramas = $dramas->sortByDesc('id')->take(4);

        return view(
            'dramas/index',
            ['dramas' => $dramas,
        'newDramas' => $newDramas]
        );
    }

    public function add(Request $request)
    {
        return view('dramas/create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
            'drama_title' => 'required|max:255|unique:dramas,drama_title',
            'director' => 'required',
            'genre' => 'required',
            'main_cast' => 'required|min:5',
            'air_date' => 'required|date',
            'episode_duration' => 'required|numeric',
            'num_episodes' => 'required|numeric|min:1',
            'image_url' => 'required|url',
            'description' => 'required|min:10'
        ]
        );
        
        // creating a slug from the drama title
        $dramaTitle = explode(' ', strtolower($request->drama_title));
        $removeSymbols = preg_replace('/[^a-z0-9]/i', '', $dramaTitle);
        $slug = join('-', $removeSymbols);


        $drama = new Drama();
        $drama->drama_title = $request->drama_title;
        $drama->slug = $slug;
        $drama->main_cast = $request->main_cast;
        $drama->director = $request->director;
        $drama->genre = $request->genre;
        $drama->image_url = $request->image_url;
        $drama->num_episodes = $request->num_episodes;
        $drama->external_url = $request->external_url;
        $drama->air_date = $request->air_date;
        $drama->episode_duration = $request->episode_duration;
        $drama->description = $request->description;
        $drama->save();

        
        return redirect('/dramas/add')->with(['flash-alert' => 'Thanks to you, another drama has been added to our growing collection! Thank you!!']);
    }

    public function show($slug)
    {
        $drama = Drama::where('slug', '=', $slug)->first();

        return view('dramas/view', [
            'drama' => $drama,
        ]);
    }

    public function search($category, $subcategory)
    {
        return 'Search in: '.$category.', '.$subcategory;
    }
}
