<?php

use App\Http\Middleware\StaffOnly;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ChartJsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function() {
    if (auth()->user()->is_staff())
        return redirect()->route('tickets.index');
    return redirect()->route('requests.index');
})->middleware('auth')
  ->name('dashboard');


// Route::get('file-upload', [FileUploadController::class, 'index'])
//     ->middleware('auth');
Route::post('/store', [FileUploadController::class, 'store'])
->middleware('auth')
->name('files.store');

Route::post('/api/create-message', [MessageController::class, 'store'])
    ->middleware('auth')
    ->name('messages.store');

require __DIR__.'/auth.php';

Route::middleware([StaffOnly::class, 'auth'])->group(function() {

    require __DIR__.'/management.php';
    require __DIR__.'/ticket.php';
});

require __DIR__.'/requests.php';
require __DIR__.'/vrequests.php';

// Route::get('chartjs', [ChartJsController::class, 'index']);
Route::get('/chart-js', [ChartJSController::class, 'index'])->name('chartjs.index');
