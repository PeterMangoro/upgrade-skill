<?php

use App\Events\AddedNewCustomer;
use App\Events\Example;
use App\Events\PackageSent;
use App\Jobs\SendEmailJob;
use App\Models\User;
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

Route::get('/test', function () {
    $user= User::first();
    SendEmailJob::dispatch($user)->onQueue('emails');
});
