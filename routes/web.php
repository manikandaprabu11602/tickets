<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;

dddd 
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::redirect('/home', '/home');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
});



Route::middleware(['auth', 'user'])->group(function () {

    Route::post('/tickets/index', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/index', [TicketController::class, 'index'])->name('tickets.index');


    // Show the ticket creation form
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');

    // Store the submitted ticket data
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');


    //ticket crus
    Route::post('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets/store', [TicketController::class, 'store'])->name('tickets.store');



    //update
    Route::get('/tickets/edit/{id}', [TicketController::class, 'edit'])->name('tickets.edit');
    Route::put('/tickets/edit/{id}', [TicketController::class, 'update'])->name('tickets.update');
    Route::get('/tickets/show/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::get('/tickets/delete/{ticket}', [TicketController::class, 'delete'])->name('tickets.delete');


    //email route 
    Route::get('tickets/show/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
});
Route::get('/tickets/show/{ticket}', [TicketController::class, 'show'])->name('tickets.show');






//admin

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::redirect('/admin/home', '/admin');
});


hhhhhhhh