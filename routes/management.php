<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'manage'], function() {

   Route::get('/countries', function() {
       return view('countries.index');
   })->name('countries.index');

   Route::get('/statuses', function() {
       return view('status.index');
   })->name('status.index');

   Route::get('/services', function() {
       return view('categories.index');
   })->name('categories.index');

   Route::get('/staff', function() {
       return view('staff.index');
   })->name('staff.index');

   Route::get('/users', function() {
       return view('users.index');
   })->name('users.index');

   Route::get('/models', function() {
       return view('device-models.index');
   })->name('device-models.index');

   Route::get('/devices', function() {
       return view('devices.index');
   })->name('devices.index');

   Route::get('/departments', function() {
    return view('departments.index');
    })->name('departments.index');

    Route::get('/blocks', function() {
        return view('blocks.index');
        })->name('blocks.index');

    Route::get('/fields', function() {
    return view('fields.index');
    })->name('fields.index');

    Route::get('/origins', function() {
    return view('origins.index');
    })->name('origins.index');

    Route::get('/crops', function() {
    return view('crops.index');
    })->name('crops.index');

});

?>
