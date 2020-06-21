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
    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');
    Route::post('refreshtoken', 'UserController@refreshToken');

    Route::get('/unauthorized', 'UserController@unauthorized');
    Route::group(['middleware' => ['CheckClientCredentials', 'auth:api']], function () {
        Route::post('logout', 'UserController@logout');
        Route::post('details', 'UserController@details');

        /** Ticket Note */
        Route::get('/ticket-notes', '\App\Http\Controllers\Api\V1\TicketNoteController@all');
        Route::post('/ticket-notes', '\App\Http\Controllers\Api\V1\TicketNoteController@takeNote');
    
        /** Ticket */
        Route::get('/tickets', '\App\Http\Controllers\Api\V1\TicketsController@all');
        Route::get('/tickets/create', '\App\Http\Controllers\Api\V1\TicketsController@createOne');
        Route::post('/ticket/{id}', '\App\Http\Controllers\Api\V1\TicketsController@update');
        Route::post('/ticket', '\App\Http\Controllers\Api\V1\TicketsController@create');
    
        /** Lead */
	    Route::get('/leads/available-count', '\App\Http\Controllers\Api\V1\LeadController@getAvailableCount');
	    Route::get('/leads/export', '\App\Http\Controllers\Api\V1\LeadController@export');
        Route::get('/leads', '\App\Http\Controllers\Api\V1\LeadController@getAll');
        Route::post('/leads/assign', '\App\Http\Controllers\Api\V1\LeadController@assign');
        Route::get('/my-leads', '\App\Http\Controllers\Api\V1\LeadController@getMine');
	    Route::post('/leads/import/batch/{batch}/cancel', '\App\Http\Controllers\Api\V1\LeadController@cancelBatch');
	    Route::post('/leads/import/batch/{batch}/approve', '\App\Http\Controllers\Api\V1\LeadController@approveBatch');
	    Route::get('/leads/import/batch/{batch}', '\App\Http\Controllers\Api\V1\LeadController@pendingDetails');
        Route::post('/leads/import', '\App\Http\Controllers\Api\V1\LeadController@importLeads');
	    Route::get('/leads/pending-import', '\App\Http\Controllers\Api\V1\LeadController@pendingImport');
        Route::post('/lead/{id}/create-ticket', '\App\Http\Controllers\Api\V1\LeadController@createTicket');
        Route::get('/lead/{id}/tickets', '\App\Http\Controllers\Api\V1\LeadController@getTickets');
        Route::get('/lead/{id}/current-ticket', '\App\Http\Controllers\Api\V1\LeadController@getCurrentTicket');
        Route::get('/lead/{id}', '\App\Http\Controllers\Api\V1\LeadController@getOne');
        Route::post('/leads/mass-assign', '\App\Http\Controllers\Api\V1\LeadController@massAssign');

        /** User */
	    Route::get('/user/{id}', '\App\Http\Controllers\UserController@getOne');
	    Route::put('/user/{id}/add-groups', '\App\Http\Controllers\UserController@addGroups');
        Route::get('/users/agents', '\App\Http\Controllers\UserController@getAllAgent');
	    Route::get('/users', '\App\Http\Controllers\UserController@getAll');
	    Route::put('/user/{id}', '\App\Http\Controllers\UserController@update');

        /** Agent Group */
	    Route::put('/agent-group/{id}/add-agents', '\App\Http\Controllers\Api\V1\AgentGroupController@addAgents');
	    Route::put('/agent-group/{id}', '\App\Http\Controllers\Api\V1\AgentGroupController@update');
	    Route::get('/agent-group/{id}', '\App\Http\Controllers\Api\V1\AgentGroupController@getOne');
	    Route::get('/agent-groups', '\App\Http\Controllers\Api\V1\AgentGroupController@getAll');
	    Route::post('/agent-groups', '\App\Http\Controllers\Api\V1\AgentGroupController@create');
	    Route::delete('/agent-group/{id}', '\App\Http\Controllers\Api\V1\AgentGroupController@delete');

	    /** User Roles */
	    Route::get('/user-roles', 'Api\V1\RoleController@getAll');
    });
});
