<?php

use App\Http\Controllers\VrequestController;
use App\Http\Controllers\VarietyController;

Route::get('/vrequests', [VrequestController::class, 'index'])
    ->middleware('auth')
    ->name('vrequests.index');

Route::get('/create-vrequest', [VrequestController::class, 'create'])
    ->middleware('auth')
    ->name('vrequests.create');

Route::post('/create-vrequest', [VrequestController::class, 'store'])
    ->middleware('auth')
    ->name('vrequests.store');

Route::get('/vrequests/{vrequest:id}', [VrequestController::class, 'show'])
    ->middleware('auth')
    ->name('vrequests.show');

    Route::get('/variety/{variety:id}', [VarietyController::class, 'show'])
    ->middleware('auth')
    ->name('variety.show');

?>
