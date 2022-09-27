<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('data.index');
});

Route::controller(SearchController::class)->group(function(){

    Route::get('search', 'search')->name('search');

    Route::get('generate-pdf', 'exportDataToPdf')->name('exportDataToPdf');


});

Route::resources([

    'data' => DataController::class, 

]);

