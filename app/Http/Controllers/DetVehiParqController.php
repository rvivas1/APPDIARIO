<?php

namespace App\Http\Controllers;
use App\Models\DetVehiParq;

use Illuminate\Http\Request;
// use Inertia\Inertia;

class DetVehiParqController extends Controller
{
    //
    public function index(){
        $detalleVp=DetVehiParq::all();
        return['detalleVp'=>$detalleVp];
    }
    public function store(Request $request){
        $detalleVp= new DetVehiParq();

        $detalleVp->id_parq=$request->idParq;
        $detalleVp->id_vehi=$request->idVehi;
        
        $detalleVp->save();
    }
    public function update(Request $request){
        $detalleVp= DetVehiParq::FindOrFail($request->id);

        $detalleVp->id_parq=$request->idParq;
        $detalleVp->id_vehi=$request->idVehi;
        
        $detalleVp->save();
    }
    public function destroy(Request $request){
        $detalleVp=DetVehiParq::FindOrFail($request->id);
        $detalleVp->delete();
    }
}
