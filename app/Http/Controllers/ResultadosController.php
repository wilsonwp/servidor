<?php

namespace futboleros\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use futboleros\Http\Requests;
use futboleros\Http\Controllers\Controller;
use futboleros\Resultado;
class ResultadosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }
   public function find(Route $route){
       $this->resultado = Resultado::find($route->getParameter('resultados'));
   }
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Resultado::create($request->all());
        
        return response()->json(['mensaje'=>'Marcador Actualizado']);
    }
    public function muestraLocal($partido_id){
        $resultado = Resultado::where('resultados.partido_id',$partido_id)
        ->get();
        return response()->json($resultado->toArray());


    }
    public function muestraVisitante($partido_id){
        $resultado = Resultado::where('resultados.partido_id',$partido_id)
        ->get();
        return response()->json($resultado->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        $this->resultado->fill($request->all());
        $this->resultado->save();
         pusher()->trigger('resultados_canal', 'ResultadoActualizado', ['data' => true]);
        return response()->json([
            
            'mensaje'=>'Actualizado con Exito'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
