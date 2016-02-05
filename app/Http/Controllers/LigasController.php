<?php

namespace futboleros\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use futboleros\Http\Requests;
use Illuminate\Routing\Route;
use \futboleros\Campeonato;
use futboleros\Http\Controllers\Controller;
use futboleros\Http\Requests\CampeonatosRequest;
use Redirect;
use Session;

class LigasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CampeonatosRequest $request)
    {
        Campeonato::create($request->all());
        Session::flash('message','Campeonato Creado con Exito');
        return Redirect::to('/ligas');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
