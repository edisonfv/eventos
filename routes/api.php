<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\UserPaymentsController;
use App\Http\Controllers\Api\UserCompaniesController;

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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('/register', [UserController::class, 'store'])->name('api.register');


Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('users', UserController::class);

        // User Payments
        Route::get('/users/{user}/payments', [
            UserPaymentsController::class,
            'index',
        ])->name('users.payments.index');
        Route::post('/users/{user}/payments', [
            UserPaymentsController::class,
            'store',
        ])->name('users.payments.store');

        // User Companies
        Route::get('/users/{user}/companies', [
            UserCompaniesController::class,
            'index',
        ])->name('users.companies.index');
        Route::post('/users/{user}/companies/{company}', [
            UserCompaniesController::class,
            'store',
        ])->name('users.companies.store');
        Route::delete('/users/{user}/companies/{company}', [
            UserCompaniesController::class,
            'destroy',
        ])->name('users.companies.destroy');
    });
