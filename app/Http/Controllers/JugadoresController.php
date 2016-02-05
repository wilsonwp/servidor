<?php

namespace futboleros\Http\Controllers;
use Illuminate\Http\Request;
use futboleros\Http\Requests;
use futboleros\Http\Requests\JugadoresRequest;
use futboleros\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use futboleros\Jugador;
use futboleros\Equipo;
use DB;
use futboleros\Log;
class JugadoresController extends Controller
{
   public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }
   public function find(Route $route){
       $this->jugador = Jugador::find($route->getParameter('jugadores'));
   }
    public function index()
    {
       $equipos = Equipo::lists('nombre_equipo','id');
       return view('jugadores.index',['equipos'=>$equipos]);
    }
    // Devolver lista de Jugadores Json
    public function listing(){
        $jugadores = Jugador::all();
        return response()->json(
                $jugadores->toArray()
                );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $equipos = Equipo::lists('nombre_equipo','id');
     return view('jugadores.create',['equipos'=>$equipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JugadoresRequest $request)
    {
       
       if($request->ajax()){
           Jugador::create($request->all());
           return response()->json([
               
               "mensaje"=>"Jugador Creado con Exito"
           ]);
       }
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
           return response()->json(
                $this->jugador->toArray()
                );
  
        
      
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
        $this->jugador->fill($request->all());
        $this->jugador->save();
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
       $this->jugador->delete();
       return response()->json([
           'mensaje'=>'Borrado'
       ]);
    }
    public function search_jugador($nombre =''){
        $jugador = DB::table('jugadors')->where('nombre', 'LIKE', '%' . $nombre . '%')->get();
        $this->jugador = $jugador;
        return response()->json(
                $this->jugador
                );
    }
}
