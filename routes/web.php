<?php

use App\Http\Controllers\HomeController;
use App\Models\Course;
use App\Models\School;
use App\Models\Oefentoets;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OefentoetsController;

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

// -------------
// Home
// -------------

Route::get('/', [HomeController::class, 'index'])->name('home');


// -------------
// AUTH
// -------------
Auth::routes();

Route::get('/login', function () {
    return view('auth.login', [
        'titel' => 'Inloggen | STUSA',
    ]);
});

Route::post('/uitloggen', [UserController::class, 'logout']);

// Registreren 
Route::get('/registreren/leerling', [UserController::class, 'create_student'])->name('registreren');
Route::get('/registreren/docent', [UserController::class, 'create_teacher']);
Route::post('/registreren', [UserController::class, 'store']);

Route::get('/welkom', function () {
    return view('welkom', [
        'titel' => 'Welkom | STUSA',
    ]);
})->name('welkom');


// -------------
// Oefentoetsen
// -------------
Route::get('/oefentoetsen', [OefentoetsController::class, 'index'])->name('oefentoets.index');
Route::get('/oefentoets/{id}', [OefentoetsController::class, 'show'])->name('oefentoets.show');

// Oefentoets uploaden
Route::post('/oefentoets', [OefentoetsController::class, 'store']);
Route::get('/uploaden', [OefentoetsController::class, 'create'])->name('oefentoets.create');

// Oefentoets zoeken
Route::get('/zoeken', [OefentoetsController::class, 'search'])->name('oefentoets.search');

// Oefentoets editen
Route::get('/oefentoets/{id}/bewerken', [OefentoetsController::class, 'edit'])->name('oefentoets.edit');

// Oefentoets updaten
Route::put('/oefentoets/{id}', [OefentoetsController::class, 'update'])->name('oefentoets.update');

// Oefentoets verwijderen
Route::delete('/oefentoets/{id}', [OefentoetsController::class, 'destroy'])->name('oefentoets.destroy');



// -------------
// USERS
// -------------

Route::get('/settings', [UserController::class, 'edit'])->name('user.edit');
Route::get('/{username}', [UserController::class, 'show_profile'])->name('user.show_profile');
Route::put('/{username}', [UserController::class, 'update'])->name('user.update');
Route::delete('/{username}', [UserController::class, 'destroy'])->name('user.destroy');
