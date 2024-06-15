<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

Route::apiResource('rooms', RoomController::class);
Route::post('rooms/{room}/assign-guest', [RoomController::class, 'assignGuest']);
Route::post('rooms/{room}/deassign-guest', [RoomController::class, 'emptyRoom']);
Route::post('rooms/{room}/set-ready', [RoomController::class, 'setReady']);
