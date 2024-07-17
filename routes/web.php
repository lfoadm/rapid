<?php

use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("home");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //PROFILE 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //ADMINISTRATION
    Route::resource('users', UserController::class)->middleware('is_admin:ADMIN');
    Route::resource('cities', CityController::class)->middleware('is_admin:ADMIN');
    Route::resource('candidates', CandidateController::class)->middleware('is_admin:ADMIN');
    Route::resource('products', ProductController::class)->middleware('is_admin:ADMIN');
    
    //TICKETS
    // Route::get('tickets/{city}', [TicketController::class, 'create_ticket'])->name('ticket.create');
    // Route::post('tickets', [TicketController::class, 'store'])->name('ticket.store');
    
    // Route::get('/cities/{city}/candidates', [CityController::class, 'candidates'])->name('cities.candidates');
    // Route::get('/iturama/{city}/candidates', [TicketController::class, 'iturama'])->name('ticket.iturama');

});

require __DIR__.'/auth.php';
