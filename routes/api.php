<?php

use App\Http\Controllers\EmailController;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/posts', function (Request $request) {
    return [
        'posts' => [
            [
                'id' => 1,
                'title' => 'title 1',
                'body' => 'body 1',
            ],
            [
                'id' => 2,
                'title' => 'title 2',
                'body' => 'body 2',
            ],
        ]
    ];
});

Route::post('/send-email', [EmailController::class, 'sendEmail']);
