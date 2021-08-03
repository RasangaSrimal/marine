<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('postal/code', 'App\Http\Controllers\Api\PostalCodeController');
