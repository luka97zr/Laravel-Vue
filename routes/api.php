<?php

use App\Http\Controllers\BookableAvailabilityController;
use App\Http\Controllers\BookableController;
use App\Models\Bookable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('bookables', [ControllersBookable::class,'index']);

// Route::get('bookables/{id}', [ControllersBookable::class,'show']);

Route::resource('bookables',BookableController::class);
Route::get('bookables/{bookable}/availability',BookableAvailabilityController::class)->name('bookables.availability.show');

