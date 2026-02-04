<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SpreedSheetController;
use App\Http\Controllers\InputController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', [LoginController::class, 'getLoginPage'])->name('getLoginPage');
Route::post('/doLogin', [LoginController::class, 'doLogin'])->name('doLogin');
Route::group([
    'prefix' => '/',
    'as' => 'route.',
    'middleware' => ['role:admin']
], function () {
    Route::get('/index', [IndexController::class, 'getPage'])->name('index');
    Route::get('/spreedsheet', [SpreedSheetController::class, 'getPage']);
    Route::post('/spreedsheet/formulaCalculator', [SpreedSheetController::class, 'formulaCalculator']);
    Route::get('/form_input', [InputController::class, 'getFormInputPage']);
    Route::get('/form_capaian', [InputController::class, 'getFormCapaianPage']);
    Route::get('/form_nko', [InputController::class, 'getFormNkoPage']);
    Route::get('/form_input_management', [InputController::class, 'getFormInputManagementPage']);
});
