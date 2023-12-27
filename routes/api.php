<?php

use App\Http\Controllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/notes/list', [NoteController::class, 'index']);
Route::post('/notes/create', [NoteController::class, 'store']);
Route::get('/notes/{note}', [NoteController::class, 'show']);
Route::put('/notes/{note}/update', [NoteController::class, 'update']);
Route::delete('/notes/{note}/delete', [NoteController::class, 'destroy']);
