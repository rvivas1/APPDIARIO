<?php

namespace App\Http\Controllers;
use App\Models\Parqueadero;

use Illuminate\Http\Request;
// use Inertia\Inertia;

class ParqueaderoController extends Controller
{
    //
    public function index(){
        $parqueadero=Parqueadero::join(
        'oficina_locals',
        'parqueaderos.id_ofLoc',
        '=','oficina_locals.id')
        ->select(
        'parqueaderos.numero','parqueaderos.tipo','parqueaderos.ubicacion',
        'parqueaderos.repre_propie as Representante','parqueaderos.propio_arrendado',
        'parqueaderos.permite_carro as Carro','parqueaderos.permite_moto as Moto',
        'parqueaderos.disp_venta as Venta','parqueaderos.disp_alquiler as Alquiler',
        'oficina_locals.numero as Oficina','parqueaderos.estado')
        ->get();
        return['parqueadero'=>$parqueadero]; 
    }

    public function store(Request $request){
        $parqueadero= new Parqueadero();
        $parqueadero->numero=$request->num;
        $parqueadero->tipo=$request->tipo;
        $parqueadero->ubicacion=$request->ubic;
        $parqueadero->repre_propie=$request->repProp;
        $parqueadero->propio_arrendado=$request->propArren;
        $parqueadero->estado=$request->edo;
        $parqueadero->permite_moto=$request->moto;
        $parqueadero->permite_carro=$request->carro;
        $parqueadero->disp_venta=$request->dispVen;
        $parqueadero->disp_alquiler=$request->dispAlq;

        $parqueadero->id_ofLoc=$request->idOfLoc;

        $parqueadero->save();
    }
    public function update(Request $request){
        $parqueadero=Parqueadero::FindOrFail($request->id);
        $parqueadero->repre_propie=$request->repProp;
        $parqueadero->propio_arrendado=$request->propArren;
        $parqueadero->estado=$request->edo;
        $parqueadero->permite_moto=$request->moto;
        $parqueadero->permite_carro=$request->carro;
        $parqueadero->disp_venta=$request->dispVen;
        $parqueadero->disp_alquiler=$request->dispAlq;

        $parqueadero->id_ofLoc=$request->idOfLoc;

        $parqueadero->save();
    }
    public function getParq(){
        $parqueadero= Parqueadero::select('numero','id')->get();
        return[
            'parqueadero'=>$parqueadero
        ];
    }
    public function getFiltro(Request $request){
        $num=$request->num;
        $raSocial=$request->raSocial;
        $ofi=$request->ofi;
        $parq= Parqueadero::join(
        'oficina_locals',
        'parqueaderos.id_ofLoc',
        '=','oficina_locals.id')
        ->select(
        'parqueaderos.numero','oficina_locals.nit',
        'oficina_locals.razon_social',
        'oficina_locals.repre_propie as Titular',
        'parqueaderos.ubicacion','parqueaderos.estado')
        ->where('parqueaderos.numero',$num)
        ->orwhere('oficina_locals.razon_social',$raSocial)
        ->orwhere('oficina_locals.numero',$ofi)
        ->get();
        return[
            'parq'=>$parq
        ];
    }
    public function getAlqVent(){
        $parq= Parqueadero::select('id','numero','disp_venta','disp_alquiler')
        ->where('disp_alquiler',1)
        ->orwhere('disp_venta',1)
        ->get();
        return[
            'parq'=>$parq
        ];
    }
    // public function getRaSoc(Request $request){
    //     $titular=$request->titular;
    //     $parq= Parqueadero::join('oficina_locals','parqueaderos.id_ofLoc','=','oficina_locals.id')
    //     ->select('parqueaderos.numero','oficina_locals.nit',
    //     'oficina_locals.razon_social',
    //     'oficina_locals.repre_propie as Titular',
    //     'parqueaderos.ubicacion','parqueaderos.estado')
    //     ->where('oficina_locals.razon_social',$titular)
    //     ->get();
    //     return[
    //         'parq'=>$parq
    //     ];
    // }
    // public function getNumOf(Request $request){
    //     $ofi=$request->ofi;
    //     $parq= Parqueadero::join('oficina_locals','parqueaderos.id_ofLoc','=','oficina_locals.id')
    //     ->select('parqueaderos.numero','oficina_locals.nit',
    //     'oficina_locals.razon_social',
    //     'oficina_locals.repre_propie as Titular',
    //     'parqueaderos.ubicacion','parqueaderos.estado')
    //     ->where('oficina_locals.numero',$ofi)
    //     ->get();
    //     return[
    //         'parq'=>$parq
    //     ];
    // }
}
