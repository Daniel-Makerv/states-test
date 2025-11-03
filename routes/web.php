<?php

use App\Http\Controllers\State;
use Illuminate\Support\Facades\Route;

Route::get('/', [State\StateController::class, 'index']);
