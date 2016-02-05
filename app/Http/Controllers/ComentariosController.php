<?php

namespace futboleros\Http\Controllers;

use Illuminate\Http\Request;
use futboleros\Comentario;
use futboleros\Http\Requests;
use futboleros\Http\Controllers\Controller;
use futboleros\Log;
use futboleros\Partido;
use futboleros\EquipoPartido;
use futboleros\Gol;
use futboleros\Events\ComentarioCreado;

class ComentariosController extends Controller
{
    function __construct(){
        $this->middleware('cors');
    } 
    public function index($id)
    {
     $comentarios = Comentario::where('partido_id',$id)
             ->get()
             ;
     return response()->json($comentarios->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function store(Request $request)
    { 
            switch ($request['tipo_comentario_id']) {
                  case 4:
                      Gol::create([
                        'equipo_id'=>$request['equipo_id'],
                        'minuto'=>$request['minuto'],
                        'partido_id'=>$request['partido_id'],
                        ]);
                      break;
              }  
           Comentario::create($request->all());
            $last = Comentario::all()->last();
           pusher()->trigger('comentarios_canal', 'ComentarioCreado', ['data' => true,'comentario'=>$last]);

           return response()->json([
               
               "mensaje"=>"Comentario Creado con Exito"
           ]);
    }
    public function show($id)
    {
         $comentarios = Partido::where('partidos.id',$id)
             ->with('equipos','comentarios')
             ->get()
             ;
     return response()->json($comentarios->toArray());
        //
    }
    public function comentariosPartido($id)
    {
         $comentarios = Comentario::where('comentarios.partido_id',$id)
             ->get()
             ;
     return response()->json($comentarios->toArray());
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
