<?php

use App\Http\Livewire\Video\AllVideos;
use App\Http\Livewire\Video\CreateVideo;
use App\Http\Livewire\Video\EditVideo;
use App\Http\Livewire\Video\ShowVideo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('channels', \App\Http\Controllers\ChannelController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => [
    'auth:sanctum',
    'verified',
]], function(){


 //videos section
    Route::get('/videos/create', CreateVideo::class)->name('video.create');
    Route::get('/videos/{channel}/edit', EditVideo::class)->name('video.edit');
    Route::get('/videos/{channel}/show', ShowVideo::class)->name('video.show');
    Route::get('/videos/{channel}', AllVideos::class)->name('video.index');

   });
