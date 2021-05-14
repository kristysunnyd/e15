<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Review;
use App\Models\Drama;
use App\Models\User;

class ReviewController extends Controller
{
    public function reviewList($slug)
    {
        $drama = Drama::where('slug', '=', $slug)->first();
        $dramaId = $drama->id;

        $reviews = Review::where('drama_id', '=', $dramaId)->get();
        
        return view('reviews/list', [
            'drama' => $drama,
            'reviews' => $reviews
        ]);
    }
    
    public function create(Request $request)
    {
        return view('reviews/list');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
            'name' => 'required',
            'review' => 'required|min:30',
            'rating' => 'required|numeric|max:10',
            'recommendation' => 'required'
        ]
        );
        

        $review = new Review();
        $review->name = $request->name;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->recommendation = $request->recommendation;
        
        $userEmail = Auth::user()->email;
        $userId = User::where('email', '=', $userEmail)->first();
    
        $id = $request->review_slug;
        
        $dramaId = Drama::where('id', '=', $id)->first();
        $slug = $dramaId->slug;
        

        $review->user()->associate($userId);
        $review->drama()->associate($dramaId);
        $review->save();
        
        return redirect('/dramas/'.$slug.'/reviews')->with(['flash-alert' => 'Thank you for your review!']);
    }

    

    public function latestReviews()
    {
        $reviews = Review::orderBy('drama_id', 'DESC')->get();

        $newReviews = $reviews->sortByDesc('created_at')->take(5);
        
        $drama = Drama::orderby('id', 'DESC')->get();


        return view(
            'reviews/index',
            ['reviews' => $reviews,
        'newReviews' => $newReviews,
        'drama' => $drama
         ]
        );
    }



    // trials
    public function practiceAssociate()
    {
        $user = User::where('email', '=', 'krs505@g.harvard.edu')->first();

        $review = new Review;
        $review->name = 'Kristy Sun';
        $review->user()->associate($user);
        $review->review = 'Amazing stories and amazing people. Actors very good.';
        $review->rating = 7;
        $review->recommendation = 1;

        $review->save();

        dump($review->toArray());
    }
}
