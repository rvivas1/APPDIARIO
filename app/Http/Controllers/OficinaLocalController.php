<?php

namespace App\Http\Controllers;
use App\Models\OficinaLocal;

use Illuminate\Http\Request;
use Inertia\Inertia;

class OficinaLocalController extends Controller
{

    //
    public function indexData(){
        $ofiLoc=OficinaLocal::join('actividad_economicas','oficina_locals.id_actEco','=','actividad_economicas.id')
        ->select('oficina_locals.numero','oficina_locals.tel','oficina_locals.razon_social as Nombre',
        'oficina_locals.horario','oficina_locals.ubicacion','oficina_locals.estado','oficina_locals.id as idOfiLoc',
        'actividad_economicas.descripcion as Actividad_económica')->get();
        return ['ofiLoc'=>$ofiLoc];
    }
    public function index(){
        $ofiLoc=OficinaLocal::all();
        return Inertia::render('OficinasLocales',['ofiLoc'=>$ofiLoc]);
        // return['ofiLoc'=>$ofiLoc];
    }
    public function indexMain(){
        $ofiLoc=OficinaLocal::all();
        return['ofiLoc'=>$ofiLoc];
    }
    
    public function store(Request $request){
        $ofiLoc= new OficinaLocal();
        $ofiLoc->tipo=$request->tipo;
        $ofiLoc->numero=$request->num;
        $ofiLoc->tel=$request->tel;
        $ofiLoc->nit=$request->nit;
        $ofiLoc->razon_social=$request->raSocial;
        $ofiLoc->horario=$request->horario;
        $ofiLoc->repre_propie=$request->repProp;
        $ofiLoc->propio_arrendado=$request->propArren;
        $ofiLoc->ubicacion=$request->ubic;
        $ofiLoc->medidas=$request->medidas;
        $ofiLoc->estado=$request->edo;
        $ofiLoc->disp_venta=$request->dispVen;
        $ofiLoc->disp_alquiler=$request->dispAlq;
        $ofiLoc->paz_y_salvo=$request->pazSalv;

        $ofiLoc->id_actEco=$request->idActEco;
        $ofiLoc->save();
    }
    public function update(Request $request){
        $ofiLoc= OficinaLocal::findOrFail($request->id);
        $ofiLoc->numero=$request->num;
        $ofiLoc->tipo=$request->tipo;
        $ofiLoc->tel=$request->tel;
        $ofiLoc->nit=$request->nit;
        $ofiLoc->razon_social=$request->raSocial;
        $ofiLoc->horario=$request->horario;
        $ofiLoc->repre_propie=$request->repProp;
        $ofiLoc->propio_arrendado=$request->propArren;
        $ofiLoc->ubicacion=$request->ubic;
        $ofiLoc->medidas=$request->medidas;
        $ofiLoc->estado=$request->edo;
        $ofiLoc->disp_venta=$request->dispVen;
        $ofiLoc->disp_alquiler=$request->dispAlq;
        $ofiLoc->paz_y_salvo=$request->pazSalv;

        $ofiLoc->id_actEco=$request->idActEco;
        $ofiLoc->save();
    }
    public function getOfiLoc(){
        $ofiLoc= OficinaLocal::select('numero','id','razon_social')->get();
        return[
            'ofiLoc'=>$ofiLoc
        ];
    }
    public function getFiltro(Request $request,){
        $nom=$request->nom;
        $prop=$request->prop;
        $num=$request->num;
        $ofiLoc= OficinaLocal::select('id','numero','nit','razon_social',
        'ubicacion','tel','estado')
        ->where('razon_social',$nom)
        ->orwhere('repre_propie',$prop)
        ->orwhere('numero',$num)
        ->get();
        return[
            'ofiLoc'=>$ofiLoc
        ];
    }
    public function getAlqVent(){
        $ofiLoc= OficinaLocal::select('id','numero','disp_venta','disp_alquiler')
        ->where('disp_alquiler',1)
        ->orwhere('disp_venta',1)
        ->get();
        return[
            'ofiLoc'=>$ofiLoc
        ];
    }
    // public function getNumOf(Request $request,){
    //     $num=$request->num;
    //     $ofiLoc= OficinaLocal::select('id','numero','nit','razon_social',
    //     'ubicacion','tel','estado')
    //     ->where('numero',$num)
    //     ->get();
    //     return[
    //         'ofiLoc'=>$ofiLoc
    //     ];
    // }
    // public function getProp(Request $request){
    //     $prop=$request->prop;
    //     $ofiLoc= OficinaLocal::select('id','numero','nit','razon_social',
    //     'ubicacion','tel','estado')
    //     ->where('repre_propie',$prop)
    //     ->get();
    //     return[
    //         'ofiLoc'=>$ofiLoc
    //     ];
    // }
    
}
