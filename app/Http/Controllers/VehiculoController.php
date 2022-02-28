<?php

namespace App\Http\Controllers;
use App\Models\Vehiculo;
use App\Models\DetVehiParq;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class VehiculoController extends Controller
{
    //
    
    public function indexData(){
        $vehiculo=Vehiculo::join('tipo_vehiculos','vehiculos.id_tpVehi','=','tipo_vehiculos.id')
        ->join('personas','vehiculos.id_persona','=','personas.id')
        ->join('det_vehi_parqs','vehiculos.id','=','det_vehi_parqs.id_vehi')
        ->select('vehiculos.placa','vehiculos.marca','vehiculos.color','vehiculos.id as idVehi',
        'vehiculos.edo','tipo_vehiculos.descripcion as tipo','tipo_vehiculos.id as idtpv',
        'personas.nombre as nombre','personas.id as idper','personas.apellido as apellido',
        'det_vehi_parqs.id_parq','det_vehi_parqs.id as idDet' )
        ->get();
        return['vehiculo'=>$vehiculo];
    }
    public function index(){
        $vehiculo=Vehiculo::all();
        return Inertia::render('Vehiculos',['vehiculo'=>$vehiculo]);
        // return['vehiculo'=>$vehiculo];
    }
    public function indexMain(){
        $vehiculo=Vehiculo::all();
        return['vehiculo'=>$vehiculo];
    }

    public function store(request $request){
        try {
            DB::beginTransaction();

            $vehiculo = new Vehiculo();
            $vehiculo->placa=$request->placa;
            $vehiculo->marca=$request->marca;
            $vehiculo->color=$request->color;
            $vehiculo->edo=$request->edo;

            $vehiculo->id_tpVehi=$request->idTpVehi;
            $vehiculo->id_persona=$request->idPers;

            $vehiculo->save();

            $detparq = $request -> data;
            foreach($detparq as $ep => $det){

                $detparq = new DetVehiParq();
                $detparq -> id_vehi = $vehiculo->id;
                $detparq -> id_parq = $det['id_parq'];

                $detparq->save();
            }
            
            DB::commit();            
        }catch (Excepcion $e){
            BD::rollback();
            console.log($e);
        };        

        $vehiculo->save();

    }
    public function update(Request $request){
        try {
            DB::beginTransaction();

            $vehiculo= Vehiculo::FindOrFail($request->id);
            $vehiculo->placa=$request->placa;
            $vehiculo->marca=$request->marca;
            $vehiculo->color=$request->color;
            $vehiculo->edo=$request->edo;
            
            $vehiculo->id_tpVehi=$request->idTpVehi;
            $vehiculo->id_persona=$request->idPers;
            
            $vehiculo->save();
            
            $detparq = $request -> data;
            foreach($detparq as $ep => $det){

                $detparq = DetVehiParq::FindOrFail($request->idDet);
                // $detparq -> id_vehi = $vehiculo->id;
                $detparq -> id_parq = $det['id_parq'];

                $detparq->save();
            }
            
            DB::commit();            
        }catch (Excepcion $e){
            BD::rollback();
            console.log($e);
        };        

        $vehiculo->save();
    }
    public function destroy(Request $request){
        
        $vehiculo=Vehiculo::FIndOrFail($request->id);
        $vehiculo->delete();
    }
    public function getFiltro(Request $request,){
        $placa=$request->placa;
        $vehiculo= Vehiculo::join(
        'tipo_vehiculos','vehiculos.id_tpVehi',
        '=','tipo_vehiculos.id')
        ->join('personas','vehiculos.id_persona','=','personas.id')
        ->select(
        'vehiculos.id','placa','tipo_vehiculos.descripcion as Tipo','vehiculos.marca',
        'personas.nombre as Titular','vehiculos.estado')
        ->where('vehiculos.placa',$placa)
        ->get();
        return[
            'vehiculo'=>$vehiculo
        ];
    }
}
