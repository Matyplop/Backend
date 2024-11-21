<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;

Route::get('/songs', [SongController::class, 'getSong']);
Route::post('/songs', [SongController::class, 'createSong']);
Route::delete('/songs/{id}', [SongController::class, 'deleteSong']);
Route::put('/songs/{id}', [SongController::class, 'updateSong']);
