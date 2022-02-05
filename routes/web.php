<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\OficinaLocalController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ParqueaderoController;
use App\Http\Controllers\DepositoController;
use App\Http\Controllers\AutorizacionController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\DetVehiParqController;
use App\Http\Controllers\ActividadEconomicaController;
use App\Http\Controllers\AreaTrabajoController;
use App\Http\Controllers\TipoAutorizacionController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\TipoVehiculoController;


Route::get('/', function () {
    return view('welcome');
});

//::::::::: ROUTES OFICINASLOCALES >>>>>>>
Route::get('api/ofiLoc',[OficinaLocalController::class,'index']);
Route::get('api/ofiLoc/data',[OficinaLocalController::class,'indexData']);
Route::post('api/ofiLoc/registrar',[OficinaLocalController::class,'store']);
Route::put('/api/ofiLoc/actualizar', [OficinaLocalController::class, 'update']);

Route::get('api/ofiLoc/getOfiLoc',[OficinaLocalController::class,'getOfiLoc']);

//::::::::: ROUTES OFICINASLOCALES FILTROS >>>>>>>
Route::get('api/ofiLoc/getNumOf',[OficinaLocalController::class,'getNumOf']);
Route::get('api/ofiLoc/getRaSo',[OficinaLocalController::class,'getRaSo']);
Route::get('api/ofiLoc/getProp',[OficinaLocalController::class,'getProp']);

Route::get('api/ofiLoc/getdisp',[OficinaLocalController::class,'getAlqVent']);

//::::::::: ROUTES PERSONAS >>>>>>>
Route::get('api/persona',[PersonaController::class,'index']);
Route::post('api/persona/registrar',[PersonaController::class,'store']);
Route::put('/api/persona/actualizar', [PersonaController::class, 'update']);


//::::::::: ROUTES PARQUEADEROS >>>>>>>
Route::get('api/parqueadero',[ParqueaderoController::class,'index']);
Route::post('api/parqueadero/registrar',[ParqueaderoController::class,'store']);
Route::put('/api/parqueadero/actualizar', [ParqueaderoController::class, 'update']);

Route::get('api/parqueadero/getParq',[ParqueaderoController::class,'getParq']);

//::::::::: ROUTES PARQUEADEROS FILTROS >>>>>>>
Route::get('api/parqueadero/getNumPar',[ParqueaderoController::class,'getNumPar']);
Route::get('api/parqueadero/getRaSo',[ParqueaderoController::class,'getRaSoc']);
Route::get('api/parqueadero/getOfLoc',[ParqueaderoController::class,'getNumOf']);




//::::::::: ROUTES DEPOSITOS >>>>>>>
Route::get('api/deposito',[DepositoController::class,'index']);
Route::post('api/deposito/registrar',[DepositoController::class,'store']);
Route::put('/api/deposito/actualizar', [DepositoController::class, 'update']);


//::::::::: ROUTES AUTORIZACIONES >>>>>>>
Route::get('api/autorizacion',[AutorizacionController::class,'index']);
Route::post('api/autorizacion/registrar',[AutorizacionController::class,'store']);
Route::put('api/autorizacion/actualizar', [AutorizacionController::class, 'update']);


//::::::::: ROUTES VEHICULOS >>>>>>>
Route::get('api/vehiculo',[VehiculoController::class,'index']);
Route::post('api/vehiculo/registrar',[VehiculoController::class,'store']);
Route::put('api/vehiculo/actualizar', [VehiculoController::class, 'update']);
Route::post('api/vehiculo/eliminar', [VehiculoController::class, 'destroy']);


//::::::::: ROUTES DETALLEVP >>>>>>>
Route::get('api/detalleVp',[DetVehiParqController::class,'index']);
Route::post('api/detalleVp/registrar',[DetVehiParqController::class, 'store']);
Route::put('api/detalleVp/actualizar', [DetVehiParqController::class, 'update']);


//:::::::::ACTIVIDAD ECONOMICA >>>>>>
Route::get('api/actEco/getActv',[ActividadEconomicaController::class,'getActiv']);

//:::::::::AREA DE TRABAJO >>>>>>
Route::get('api/areaTrab/getArea',[AreaTrabajoController::class,'getAreaTrab']);

//:::::::::TIPO AUTORIZACION >>>>>>
Route::get('api/tipoAut/getTpAuto',[TipoAutorizacionController::class,'getTipoAut']);

//:::::::::TIPO DOCUMENTO >>>>>>
Route::get('api/tpDoc/getTpDoc',[TipoDocumentoController::class,'getTpDoc']);

//:::::::::TIPO VEHICULO >>>>>>
Route::get('api/tpVehi/getTpVehi',[TipoVehiculoController::class,'getTpVehi']);


// Route::middleware(['auth:sanctum'])->get('api/autorizacion',[AutorizacionController::class, 'store']);