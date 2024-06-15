<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::apiResource('guests', GuestController::class);
