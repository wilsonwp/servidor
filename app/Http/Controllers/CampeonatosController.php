<?php

namespace futboleros\Http\Controllers;

use Redirect;
use Session;
use Illuminate\Http\Request;
use futboleros\Http\Requests;
use futboleros\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use \futboleros\Campeonato;
use Log;

class CampeonatosController extends Controller
{   
    
    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }
    //este metodo busca los parametros que usan los metodos edit, update y destroy
    public function find(Route $route){
        $this->campeonato = Campeonato::find($route->getParameter('campeonatos'));
   
    }
     public function index()
    {
         $campeonatos = Campeonato::paginate(2);
         return view('campeonatos.index',  compact('campeonatos'));
    }

    public function create()
    {
      
      return view('campeonatos.create');
    }
    public function store(Request $request)
    {
         Campeonato::create($request->all());
        Session::flash('message','Campeonato Creado con Exito');
        return Redirect::to('/ver');
        
        //
    }

    public function show(Request $request,$id)
    {
        return Campeonato::find($id);
     
    }
    public function ver(){
         $campeonatos = Campeonato::paginate(2);
         return view('campeonatos.index',  compact('campeonatos'));
    }

    public function edit($id)
    {
       return view('campeonatos.edit',['campeonato'=>$this->campeonato]);
        //
    }
    public function update($id, Request $request)
    {
        $this->campeonato->fill($request->all());
        //dd($campeonato);
        $this->campeonato->save();
        Session::flash('message','Campeonato Actualizado con Exito');
        return Redirect::to('/ver');
    }
     public function destroy($id)
    {
       $this->campeonato->delete();
       \Storage::delete($this->campeonato->path);
       return response()->json([
           'mensaje'=>'Borrado'
       ]);
    }
}
