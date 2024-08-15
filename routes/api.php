<?php

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/send-email', function (Request $request) {


    $email = request()->email;

    SendEmailJob::dispatch($email)->onQueue('emails');
    return response()->json("Email queued to be sent to {$email}", 200);
});
