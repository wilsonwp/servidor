<?php

namespace futboleros\Http\Controllers;
use Illuminate\Http\Request;
use futboleros\Http\Requests;
use futboleros\Http\Controllers\Controller;
use \futboleros\Jornada;
use \futboleros\Campeonato;
use Redirect;
use Session;
use Illuminate\Routing\Route;
use futboleros\Log;
class JornadasController extends Controller
{
    public function __construct(){
         $this->middleware('auth');
        $this->beforeFilter('@find_jornada',['only' => ['edit','update','destroy','show']]);
    }
    public function find_jornada(Route $route){
        $this->jornada = Jornada::find($route->getParameter('jornadas'));
    }
    public function index()
    {
      
      $jornadas = Jornada::paginate(10) ;
      $campeonatos = Campeonato::lists('nombre_campeonato','id');
      return view('jornadas.index', ['jornadas' => $jornadas,'campeonatos',$campeonatos]);
    }

    public function create()
    {
      $campeonatos = Campeonato::lists('nombre_campeonato','id');
      return view('jornadas.create',compact('campeonatos'));
    }

    public function store(Request $request)
    {       
          $validacion = Jornada::where(['numero'=>$request['numero'],'campeonato_id'=>$request['campeonato_id']])->count();
          if($validacion > 0){
            Session::flash('message','Esa Jornada ya Fue Creada');
            return Redirect::to('/jornadas/create');
          }else{
          Jornada::create([
            'numero' =>$request['numero'],
            'show'=> 'Fecha No.'.$request['numero'],
            'fecha' =>$request['fecha'],
            'campeonato_id' =>$request['campeonato_id']
                            ]);  
        Session::flash('message','Jornada Creada con Exito');
        return Redirect::to('/jornadas');
          }
          
        
        //
    }
     // Devolver lista de Jornadas Json
    public function listing(){
        $jornadas = Jornada::all();
        return response()->json(
                $jornadas->toArray()
                );
    }

    public function show(Request $request,$id)
    {
        return Jornada::find($id);
     
    }

    public function edit($id)
    {
       
       $campeonatos = Campeonato::lists('nombre_campeonato','id');
       return view('jornadas.edit',['jornada'=>$this->jornada,'campeonatos'=>$campeonatos]);
        //
    }

    public function update(Request $request, $id)
    {
        $this->jornada->fill($request->all());
        $this->jornada->save();
        Session::flash('message','Jornada actualizada con Exito');
        return Redirect::to('/jornadas');
    }

     public function destroy($id)
    {
       $this->jornada->delete();
       return response()->json([
           'mensaje'=>'Borrado'
       ]);
    }
}
