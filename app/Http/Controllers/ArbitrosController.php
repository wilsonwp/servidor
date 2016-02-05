<?php

namespace futboleros\Http\Controllers;

use Illuminate\Http\Request;
use futboleros\Http\Requests;
use futboleros\Http\Controllers\Controller;
use futboleros\Log;
use Illuminate\Routing\Route;
use futboleros\Arbitro;
use Session;
use Redirect;
class ArbitrosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }
     //este metodo busca los parametros que usan los metodos edit, update y destroy
    public function find(Route $route){
        $this->arbitro = Arbitro::find($route->getParameter('arbitros'));
   
    }
    
    public function index()
    {
        $arbitros = Arbitro::paginate(10);
        return view('arbitros.index',['arbitros'=>$arbitros]);
        
    }
    public function create()
    {
        return view('arbitros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Arbitro::create($request->all());
        Session::flash('message','Arbitro Creado con Exito');
        return Redirect::to('arbitros');
    }

    public function show($id)
    {
        return Arbitro::find($id);
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return view('arbitros.edit',['arbitro'=>$this->arbitro]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->arbitro->fill($request->all());
        //dd($campeonato);
        $this->arbitro->save();
        Session::flash('message','Datos de Tecnico Actualizado con Exito');
        return Redirect::to('/arbitros');
    }
     public function destroy($id)
    {
       $this->arbitro->delete();
       return response()->json([
           'mensaje'=>'Borrado'
       ]);
    }
}
