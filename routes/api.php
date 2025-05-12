<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Bus view api
Route::post('/utilities',  [RouteController::class, 'busUtilitiesSearch'])->name('route.utilities');
Route::get('/search/xe-khach',  [RouteController::class, 'busListRouteSearch'])->name('bus.list.search');
Route::get('/info/xe-khach/seat-map/{tripCode}/{keyId}',  [RouteController::class, 'busSeatMap']);
Route::get('/info/xe-khach/{companyId}/{type}',  [RouteController::class, 'busInfo']);
Route::get('/info/xe-khach/cancel-policy/{tripCode}/{seatTemplateMap}',  [RouteController::class, 'busCancellationPolicy']);
// Train view api
Route::post('/info/tau-hoa/seat-map',  [RouteController::class, 'getSeatMap']);
