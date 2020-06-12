<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::prefix('v1')->group(function () {
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
    
    /** Ticket Note */
    Route::get('/ticket-notes', '\App\Http\Controllers\Api\V1\TicketNoteController@all');
    Route::post('/ticket-notes', '\App\Http\Controllers\Api\V1\TicketNoteController@takeNote');

    /** Ticket */
    Route::get('/tickets', '\App\Http\Controllers\Api\V1\TicketsController@all');
    Route::get('/tickets/create', '\App\Http\Controllers\Api\V1\TicketsController@createOne');
    Route::post('/ticket/{id}', '\App\Http\Controllers\Api\V1\TicketsController@update');
    Route::post('/ticket', '\App\Http\Controllers\Api\V1\TicketsController@create');

    /** Lead */
    Route::get('/leads', '\App\Http\Controllers\Api\V1\LeadController@getAll');
    Route::post('/lead/{id}/create-temp-ticket', '\App\Http\Controllers\Api\V1\LeadController@createTempTicket');
    Route::get('/lead/{id}/tickets', '\App\Http\Controllers\Api\V1\LeadController@getTickets');
    Route::get('/lead/{id}/current-ticket', '\App\Http\Controllers\Api\V1\LeadController@getCurrentTicket');
    Route::get('/lead/{id}', '\App\Http\Controllers\Api\V1\LeadController@getOne');
});
