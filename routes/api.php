<?php

use App\Http\Controllers\API\EmployeeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth'])->group(function () {

});
Route::apiResource('employees', EmployeeController::class);
Route::get('/countries', [EmployeeController::class, 'getCountries'])->name('get.countries');
Route::get('/cities', [EmployeeController::class, 'getCities'])->name('get.cities');
Route::get('/states', [EmployeeController::class, 'getStates'])->name('get.states');
Route::get('/departments', [EmployeeController::class, 'getDepartments'])->name('get.departments');
