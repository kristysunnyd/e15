<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Review;
use App\Models\Drama;
use App\Models\User;

class PageController extends Controller
{
    public function index()
    {
        $dramas = Drama::orderBy('drama_title', 'ASC')->get();

        $newDramas = $dramas->sortByDesc('id')->take(8);


        return view('pages/welcome', ['dramas' => $dramas,
        'newDramas' => $newDramas]);
    }

    public function support()
    {
        return view('pages/support');
    }


    public function userDashboard()
    {
        $reviews = Review::where('user_id', '=', Auth::user()->id)->get();

        $sortedReviews = $reviews->sortByDesc('created_at');

        $dramas = Drama::orderby('id', 'DESC')->get();

        return view('pages/userdash', [
            'reviews' => $reviews,
            'sortedReviews' => $sortedReviews,
            'dramas' => $dramas
        ]);
    }
}
