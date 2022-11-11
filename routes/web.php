<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\CalendarController;

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
    Route::get('/client/getClientForEdit', 'getClientForEdit');
    
    Route::post('/client/saveData', 'saveClient');
    Route::post('/client/editData', 'editClient');
    Route::get('/client/removeClient', 'removeClient');
});

Route::controller(DemandController::class)->group(function () {
    Route::get('/demand', 'demand');
    Route::get('/demand/getCommercial', 'getCommercial');
    Route::get('/demand/getDemand', 'getDemand');
    Route::get('/demand/getContactClient', 'getContactClient');
    Route::get('/demand/getClientFinal', 'getClientFinal');
    Route::get('/demand/getListByFilter', 'getListByFilter');
    Route::get('/demand/getByContactClient', 'getByContactClient');
    Route::post('/demand/saveData', 'saveData');
    Route::post('/demand/editData', 'editData');
    Route::get('/demand/removeDemand', 'removeDemand');
    Route::get('/demand/getDataForEdit', 'getDataForEdit');
});

Route::controller(MissionController::class)->group(function () {
    Route::get('/mission', 'mission');
    Route::get('/mission/getMission', 'getMission');
    Route::get('/mission/getMissionByFilter', 'getMissionByFilter');
    Route::get('/mission/getByClientSoft', 'getByClientSoft');
    Route::post('/mission/saveData', 'saveData');
    Route::get('/mission/removeMission', 'removeData');
    Route::get('/mission/getDataForEdit', 'getDataForEdit');
    Route::post('/mission/editData', 'editData');
    Route::get('/mission/getMissionByMID', 'getMissionByMID');

    
});
Route::controller(InterventionController::class)->group(function () {
    Route::get('/intervention', 'intervention');
    Route::get('/intervention/getIntervention', 'getIntervention');
    Route::get('/intervention/getCommercialDetail', 'getCommercialDetail');
    Route::get('/intervention/getFournisseur', 'getFournisseur');
    Route::get('/intervention/remove', 'remove');
    Route::get('/intervention/getDataForEdit', 'getDataForEdit');
    Route::post('/intervention/saveData', 'saveData');
    Route::post('/intervention/editData', 'editData');
});
Route::controller(CalendarController::class)->group(function () {
    Route::get('/calendar', 'calendar');
    Route::get('/calendar/getType', 'getType');
    Route::get('/calendar/save', 'save');
    Route::get('/calendar/getData', 'getData');
    
});