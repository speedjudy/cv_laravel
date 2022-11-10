<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ClientController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::controller(MainController::class)->group(function () {
    Route::get('/', 'cv');
    Route::get('/cv', 'cv');
    
    Route::get('/cv/getList', 'getCVList');
    Route::get('/cv/getListBySearch', 'getCVListBySearch');
    Route::get('/cv/getTags', 'getTags');
    Route::get('/cv/getProfils', 'getProfils');
    Route::get('/cv/getExperience', 'getExperience');
    Route::get('/cv/getStatus', 'getStatus');
    Route::get('/cv/getClients', 'getClients');
    Route::get('/cv/getLanguages', 'getLanguages');
    Route::get('/cv/getEnvironments', 'getEnvironments');
    Route::get('/cv/getOutils', 'getOutils');
    Route::get('/cv/getLanguagePro', 'getLanguagePro');
    Route::post('/cv/saveData', 'saveCV');
    Route::post('/cv/editData', 'editCV');
    Route::get('/cv/removeCV', 'removeCV');
    Route::get('/cv/getCVForEdit', 'getCVForEdit');
    
});
Route::controller(ClientController::class)->group(function () {
    Route::get('/client', 'client');
    Route::get('/client/getList', 'getClient');
    Route::get('/client/removeClient', 'removeClient');
    
});
Route::controller(PoolController::class)->group(function () {
    
    Route::get('/register/add', 'register_add');
    
    Route::get('/setting', 'setting_view');
    Route::get('/setting/getdata', 'setting_getdata');
    Route::get('/setting/save', 'setting_save');
    Route::get('/setting/clear', 'setting_clear');
    
    Route::get('/score', 'score_view');
    Route::get('/score/getdata', 'score_getdata');


    Route::get('/run_server', 'run_server');
    Route::get('/run_server/push', 'run_server_push');
    Route::get('/run_server/active', 'check_server');
});