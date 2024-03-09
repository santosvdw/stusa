<?php

use App\Models\School;
use App\Models\Scholen;
use App\Models\Oefentoets;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocentController;
use App\Http\Controllers\LeerlingController;
use App\Http\Controllers\OefentoetsController;
use App\Models\Course;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index', [
        'title' => 'Home',
        'vakken' => Course::all()
    ]);
});


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/zoeken', function () {
    return view('zoeken');
});

Route::get('/register/leerling', [LeerlingController::class, 'create']);
Route::post('/register/leerling', [LeerlingController::class, 'store']);

// Registreren docenten
Route::get('/register/docent', [DocentController::class, 'create']);
Route::post('/register/docent', [DocentController::class, 'store']);
// Oefentoetsen
Route::get('/oefentoetsen', [OefentoetsController::class, 'index']);

Route::post('/oefentoets', [OefentoetsController::class, 'store']);
Route::get('/oefentoets/uploaden', [OefentoetsController::class, 'create']);

Route::get('/oefentoets/{id}', [OefentoetsController::class, 'show'])->name('oefentoets.show');
Route::get('/zoeken', [OefentoetsController::class, 'search'])->name('oefentoets.search');

// Route::get('/oefentoets/{id}', Oefentoets::class(), 'show');

// Auth::routes();

// Route::get('/template', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
