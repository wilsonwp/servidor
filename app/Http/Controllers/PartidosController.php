<?php

namespace futboleros\Http\Controllers;

use Illuminate\Http\Request;

use futboleros\Http\Requests;
use futboleros\Http\PartidoRequests;
use futboleros\Http\Controllers\Controller;
use futboleros\Campeonato;
use futboleros\Jornada;
use futboleros\EquipoPartido;
use futboleros\Partido;
use futboleros\Equipo;
use Illuminate\Routing\Route;
use Auth;
use Session;
use Redirect;
use DB;
use futboleros\Log;
use futboleros\Gol;
use futboleros\Resultado;
use TipoComentario;
use Vinkla\Pusher\Facades\Pusher;
use futboleros\Events\ComentarioCreado;

class PartidosController extends Controller
{
    
    
    public function __construct(){
        $this->middleware('cors');
        //$this->middleware('auth');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }
   public function find(Route $route){
       $this->partido = Partido::find($route->getParameter('partidos'));
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
      $partidos = DB::table('equipo_partido')
            ->join('equipos', 'equipos.id', '=','equipo_partido.equipo_id' )
            ->join('partidos', 'partidos.id', '=','equipo_partido.partido_id' )
            ->join('campeonatos', 'equipos.campeonato_id', '=','campeonatos.id' )
            ->groupBy('equipo_partido.id')
            ->get()
              ;
         * 
         */
       $partidos = Partido::all();

      return view('partidos.index', ['partidos' => $partidos]);
      
      
    }
    public function finalizar(){
       
    }
    public function partidos_live()
    {
      $partidos= Partido::with('equipos','comentarios','goles','resultados')
              ->where('partidos.estatus_partido',1)
              ->get();
        return  response()->json($partidos->toArray()) ;
      
      
    }
    public function getMarcador($partido,$equipo){
         $goles= Gol::where('partido_id',$partido)
                ->where('equipo_id',$equipo)
              ->count();
        return  response()->json($goles) ;

      
    }
    public function setMarcador($idPartido){
            $partidos= Partido::where('partidos.id',$idPartido)
            ->with('equipos','goles','resultados')
              ->get();
        return  response()->json($partidos) ;

    }
    public function actualizarMarcador($partido,$equipo){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $campeonatos = Campeonato::lists('nombre_campeonato','id');
      $jornadas = Jornada::lists('numero','id');
      return view('partidos.create',['campeonatos'=>$campeonatos,'jornadas'=>$jornadas]);
    }
    public function get_jornada(Request $request,$id){
        $jornadas = Jornada::get_jornadas($id);
            return response()->json($jornadas);
        if($request->ajax()){
            $jornadas = Jornada::get_jornadas($id);
            return response()->json($jornadas);
        }
    }
    public function get_equipo(Request $request,$id){
        $equipos = Equipo::get_equipos($id);
            return response()->json($equipos);
        if($request->ajax()){
            $equipos = Equipo::get_equipos($id);
            return response()->json($equipos);
        }
    }
     public function get_estadio(Request $request,$id){
      
        if($request->ajax()){
            $equipos = Equipo::get_estadio($id);
            return response()->json($equipos);
        }
    }
     public function get_estatus(Request $request,$id){
            if($request->ajax()){
                $partidos = Partido::get_estatus($id);
                return response()->json($partidos);
            }
            
       
    }
    public function get_comentarios($partido){
        $partido = Partido::find($partido);
        //dd($partido->comentarios);
        return response()->json(
                $partido->comentarios->toArray()
                );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      public function store(Request $request)
    {
          $partido = new Partido;
          $partido->create($request->all());
          $id_partido = $partido->all()->last();
         $detalle_partido1 = new EquipoPartido;
         $detalle_partido1->create([
            'calidad'=>0,
        'partido_id'=>$id_partido->id,
         'equipo_id' => $request['equipo_local'],
         
            ]);
         $detalle_partido2 = new EquipoPartido;
         $detalle_partido2->create([
            'calidad'=>1,
        'partido_id'=>$id_partido->id,
         'equipo_id' => $request['equipo_visitante']
            ]);
         $marcador = new Resultado();
         $marcador->create([
            'partido_id'=>$id_partido->id,
             'goles_local'=>0,
             'goles_visitante'=>0

            ]);
       
        Session::flash('message','Partido Creado con Exito');
        return Redirect::to('/partidos');
        
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
                $this->partido->toArray()
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
        $partido = Partido::find($id);
        $partido->fill($request->all());
        $partido->save();
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
        Partido::destroy($id);
        Session::flash('message','Partido Eliminado');
        return Redirect::to('/partidos');
        
    }


     public function pruebaSocket(){

       return view('partidos.prueba_socket');
    }

}
