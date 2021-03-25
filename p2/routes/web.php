<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Config\Repository;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'index']);
Route::get('/calculator', [PageController::class, 'calculator']);
