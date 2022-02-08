<?php

namespace App\Http\Controllers;
use App\Models\Persona;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    //
    public function index(){
        $persona=Persona::join(
        'tipo_documentos','personas.id_tpDoc','=','tipo_documentos.id')
        ->join('oficina_locals','personas.id_ofLoc','=','oficina_locals.id')
        ->select(
        'personas.nombre','personas.apellido','tipo_documentos.codigo as Tipo_documento',
        'personas.num_doc as Identificacion','personas.tel','personas.correo',
        'oficina_locals.numero as Oficina','personas.estado')
        ->get();
        return['persona'=>$persona];
    }
    public function store(request $request){
        $persona= new Persona();
        $persona->num_doc=$request->numDoc;
        $persona->nombre=$request->nombre;
        $persona->apellido=$request->apellido;
        $persona->tel=$request->tel;
        $persona->tel_alter=$request->telAlter;
        $persona->correo=$request->correo;
        $persona->estado=$request->edo;


        $persona->id_tpDoc=$request->idTpDoc;
        $persona->id_ofLoc=$request->idOfLoc;

        $persona->save();
    }
    public function update(request $request){
        $persona=Persona::findOrFail($request->id);
        $persona->num_doc=$request->numDoc;
        $persona->nombre=$request->nombre;
        $persona->apellido=$request->apellido;
        $persona->tel=$request->tel;
        $persona->tel_alter=$request->telAlter;
        $persona->correo=$request->correo;
        $persona->estado=$request->edo;

        $persona->id_tpDoc=$request->idTpDoc;
        $persona->id_ofLoc=$request->idOfLoc;

        $persona->save();
    }
    public function getFiltro(Request $request){
        $nom=$request->nom;
        $ofi=$request->ofi;
        $raSo=$request->raSo;
        $persona=Persona::join(
        'tipo_documentos','personas.id_tpDoc','=','tipo_documentos.id')
        ->join('oficina_locals','personas.id_ofLoc','=','oficina_locals.id')
        ->select('personas.id','tipo_documentos.codigo as Tipo',
        'personas.num_doc as Identificacion','personas.nombre',
        'personas.apellido','personas.tel',
        'oficina_locals.numero as Oficina',)
        ->where('personas.nombre',$nom)
        ->orwhere('oficina_locals.numero',$ofi)
        ->orwhere('oficina_locals.razon_social',$raSo)
        ->get();
        return['persona'=>$persona];
    }
}
