<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/hr/{text}', function ($text, Request $request) {
    return (new App\Modules\Keymaps($text))->getHorizontal();
});
Route::get('/v/{text}', function ($text, Request $request) {
    return (new App\Modules\Keymaps($text))->getVertical();
});
Route::get('/shift/{text}', function ($text, Request $request) {
    return (new App\Modules\Keymaps($text))->getHorizontal();
});
