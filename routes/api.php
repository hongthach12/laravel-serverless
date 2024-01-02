<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', function () {
    return response()->json([
        'message' => 'HI there, welcome to my first API',
        'all env' => config('app'),
        'AWS_BUCKET' => env('AWS_BUCKET'),
        'db' => config('database.connections.pgsql'),
        'cache' => \Illuminate\Support\Facades\Cache::getDefaultDriver(),
    ]);
});

Route::get('/cache', function () {
    \Illuminate\Support\Facades\Cache::put('cache_key', \Illuminate\Support\Str::uuid()->toString(), 1000);
    return response()->json([
        'cache' => \Illuminate\Support\Facades\Cache::get('cache_key'),
    ]);
});

Route::get('/queue', function () {
    \App\Jobs\TestQueue::dispatch("test queue");
    return response()->json([
        'queue' => 'ok'
    ]);
});


Route::get('/s3', function () {
    $s3 = \Illuminate\Support\Facades\Storage::disk('s3');
    return response()->json([
        's3' => $s3->get('test.txt')
    ]);
});


Route::get('/users', function () {
    \App\Models\User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]);
    return response()->json([
        'data' => \App\Models\User::all()
    ]);
});
