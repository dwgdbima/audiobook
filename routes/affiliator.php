<?php

use App\Http\Controllers\Affiliator\AffiliatorController;
use Illuminate\Support\Facades\Route;

Route::controller(AffiliatorController::class)->group(function(){
    Route::get('/', 'index')->name('index');
});