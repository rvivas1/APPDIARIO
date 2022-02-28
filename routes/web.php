<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

//::::::::: ROUTES OFICINASLOCALES >>>>>>>
Route::middleware(['auth:sanctum'])->get('/api/ofiLoc',[OficinaLocalController::class,'index'])->name('ofiLoc');
Route::middleware(['auth:sanctum'])->get('/api/ofiLoc/data',[OficinaLocalController::class,'indexData']);

Route::middleware(['auth:sanctum'])->get('/api/ofiLoc/main',[OficinaLocalController::class,'indexMain']);

Route::middleware(['auth:sanctum'])->post('/api/ofiLoc/registrar',[OficinaLocalController::class,'store']);
Route::middleware(['auth:sanctum'])->put('/api/ofiLoc/actualizar', [OficinaLocalController::class, 'update']);

Route::middleware(['auth:sanctum'])->get('/api/ofiLoc/getOfiLoc',[OficinaLocalController::class,'getOfiLoc']);

//::::::::: ROUTES OFICINASLOCALES FILTRO >>>>>>>
Route::middleware(['auth:sanctum'])->get('/api/ofiLoc/getfiltro',[OficinaLocalController::class,'getFiltro']);
// Route::middleware(['auth:sanctum'])->get('/api/ofiLoc/getNumOf',[OficinaLocalController::class,'getNumOf']);
// Route::middleware(['auth:sanctum'])->get('/api/ofiLoc/getProp',[OficinaLocalController::class,'getProp']);

Route::middleware(['auth:sanctum'])->get('/api/ofiLoc/getdisp',[OficinaLocalController::class,'getAlqVent']);

//::::::::: ROUTES PERSONAS >>>>>>>
Route::middleware(['auth:sanctum'])->get('/api/persona',[PersonaController::class,'index'])->name('persona');

Route::middleware(['auth:sanctum'])->get('/api/persona/main',[PersonaController::class,'indexMain']);

Route::middleware(['auth:sanctum'])->get('/api/persona/data',[PersonaController::class,'indexData']);
Route::middleware(['auth:sanctum'])->post('/api/persona/registrar',[PersonaController::class,'store']);
Route::middleware(['auth:sanctum'])->put('/api/persona/actualizar', [PersonaController::class, 'update']);

//::::::::: ROUTES PERSONA FILTROS >>>>>>>
Route::middleware(['auth:sanctum'])->get('/api/persona/getfiltro',[PersonaController::class,'getFiltro']);

Route::middleware(['auth:sanctum'])->get('/api/persona/getpersona',[PersonaController::class,'getPersonas']);



//::::::::: ROUTES PARQUEADEROS >>>>>>>
Route::middleware(['auth:sanctum'])->get('/api/parqueadero',[ParqueaderoController::class,'index'])->name('parqueadero');

Route::middleware(['auth:sanctum'])->get('/api/parqueadero/main',[ParqueaderoController::class,'indexMain']);
Route::middleware(['auth:sanctum'])->get('/api/parqueadero/data',[ParqueaderoController::class,'indexData']);

Route::middleware(['auth:sanctum'])->post('/api/parqueadero/registrar',[ParqueaderoController::class,'store']);
Route::middleware(['auth:sanctum'])->put('/api/parqueadero/actualizar', [ParqueaderoController::class, 'update']);

//::::::::: ROUTE PARQUEADEROS ALL >>>>>>>
Route::middleware(['auth:sanctum'])->get('/api/parqueadero/getParq',[ParqueaderoController::class,'getParq']);

//::::::::: ROUTE PARQUEADEROS DISPONIBLES >>>>>>>
Route::middleware(['auth:sanctum'])->get('/api/parqueadero/getdisp',[ParqueaderoController::class,'getAlqVent']);

//::::::::: ROUTES PARQUEADEROS FILTROS >>>>>>>
Route::middleware(['auth:sanctum'])->get('/api/parqueadero/getfiltro',[ParqueaderoController::class,'getFiltro']);
// Route::middleware(['auth:sanctum'])->get('/api/parqueadero/getRaSo',[ParqueaderoController::class,'getRaSoc']);
// Route::middleware(['auth:sanctum'])->get('/api/parqueadero/getOfLoc',[ParqueaderoController::class,'getNumOf']);


//::::::::: ROUTES DEPOSITOS >>>>>>>
Route::middleware(['auth:sanctum'])->get('/api/deposito',[DepositoController::class,'index'])->name('deposito');
Route::middleware(['auth:sanctum'])->get('/api/deposito/main',[DepositoController::class,'indexMain']);

// Route::middleware(['auth:sanctum'])->get('/api/deposito/data',[DepositoController::class,'indexData']);
Route::middleware(['auth:sanctum'])->post('/api/deposito/registrar',[DepositoController::class,'store']);
Route::middleware(['auth:sanctum'])->put('/api/deposito/actualizar', [DepositoController::class, 'update']);

//::::::::: ROUTES DEPOSITOS DISPONIBLES>>>>>>>
Route::middleware(['auth:sanctum'])->get('/api/deposito/getdisp',[DepositoController::class,'getAlqVent']);

//::::::::: ROUTES DEPOSITOS FILTRO >>>>>>>
Route::middleware(['auth:sanctum'])->get('/api/deposito/getfiltro',[DepositoController::class,'getFiltro']);


//::::::::: ROUTES AUTORIZACIONES >>>>>>>
Route::middleware(['auth:sanctum'])->get('/api/autorizacion',[AutorizacionController::class,'index'])->name('autorizacion');

Route::middleware(['auth:sanctum'])->get('/api/autorizacion/data',[AutorizacionController::class,'indexData']);
Route::middleware(['auth:sanctum'])->post('/api/autorizacion/registrar',[AutorizacionController::class,'store']);
Route::middleware(['auth:sanctum'])->put('/api/autorizacion/actualizar', [AutorizacionController::class, 'update']);
Route::middleware(['auth:sanctum'])->post('/api/autorizacion/eliminar',[AutorizacionController::class,'destroy']);

Route::middleware(['auth:sanctum'])->get('/api/autorizacion/getfiltro',[AutorizacionController::class,'getFiltro']);

//::::::::: ROUTES VEHICULOS >>>>>>>
Route::middleware(['auth:sanctum'])->get('/api/vehiculo',[VehiculoController::class,'index'])->name('vehiculo');

Route::middleware(['auth:sanctum'])->get('/api/vehiculo/data',[VehiculoController::class,'indexData']);
Route::middleware(['auth:sanctum'])->get('/api/vehiculo/main',[VehiculoController::class,'indexMain']);

Route::middleware(['auth:sanctum'])->post('/api/vehiculo/registrar',[VehiculoController::class,'store']);
Route::middleware(['auth:sanctum'])->put('/api/vehiculo/actualizar', [VehiculoController::class, 'update']);
Route::middleware(['auth:sanctum'])->post('/api/vehiculo/eliminar', [VehiculoController::class, 'destroy']);

Route::middleware(['auth:sanctum'])->get('/api/vehiculo/getfiltro',[VehiculoController::class,'getFiltro']);

//::::::::: ROUTES DETALLEVP >>>>>>>
Route::middleware(['auth:sanctum'])->get('/api/detalleVp',[DetVehiParqController::class,'index']);
Route::middleware(['auth:sanctum'])->post('/api/detalleVp/registrar',[DetVehiParqController::class, 'store']);
Route::middleware(['auth:sanctum'])->put('/api/detalleVp/actualizar', [DetVehiParqController::class, 'update']);


//:::::::::ACTIVIDAD ECONOMICA >>>>>>
Route::middleware(['auth:sanctum'])->get('/api/actEco/getActv',[ActividadEconomicaController::class,'getActiv']);

//:::::::::AREA DE TRABAJO >>>>>>
Route::middleware(['auth:sanctum'])->get('/api/areaTrab/getArea',[AreaTrabajoController::class,'getAreaTrab']);

//:::::::::TIPO AUTORIZACION >>>>>>
Route::middleware(['auth:sanctum'])->get('/api/tipoAut/getTpAuto',[TipoAutorizacionController::class,'getTipoAut']);

//:::::::::TIPO DOCUMENTO >>>>>>
Route::middleware(['auth:sanctum'])->get('/api/tpDoc/getTpDoc',[TipoDocumentoController::class,'getTpDoc']);

//:::::::::TIPO VEHICULO >>>>>>
Route::middleware(['auth:sanctum'])->get('/api/tpVehi/getTpVehi',[TipoVehiculoController::class,'getTpVehi']);

if (App::environment('production')) {
    URL::forceScheme('https');
}