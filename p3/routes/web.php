<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DramaController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CalculatorController;

Route::get('/', function () {
    return view('welcome');
});

// Home Page Route
Route::get('/', [PageController::class, 'index']);
Route::get('/userdash', [PageController::class, 'userDashboard']);
// Drama Collection
Route::get('/dramas', [DramaController::class, 'index']);




// Using middleware to prevent unauthorized access
Route::group(['middleware' => 'auth'], function () {
    // Add Dramas
    Route::get('/dramas/add', [DramaController::class, 'add']);
    Route::post('/dramas', [DramaController::class, 'store']);

    // Route::get('/dramas/{slug}/reviews', [ReviewController::class, 'create']);

    //Drama Page with Review
    Route::get('/dramas/{slug}/reviews', [ReviewController::class, 'reviewList']);

    Route::post('/review', [ReviewController::class, 'store']);
    Route::get('/latest-reviews', [ReviewController::class, 'latestReviews']);
});

// Drama Page
Route::get('/dramas/{slug}', [DramaController::class, 'show']);









// Database
Route::get('/debug', function () {
    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});
