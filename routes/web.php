<?php

use App\Events\AddedNewCustomer;
use App\Events\Example;
use App\Events\PackageSent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/broadcast', function () {
    broadcast(new PackageSent('Peter', 'Test', '00.00.00'));
});
