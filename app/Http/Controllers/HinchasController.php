<?php

namespace futboleros\Http\Controllers;

use Illuminate\Http\Request;
use futboleros\Http\Requests;
use futboleros\Http\Controllers\Controller;
use futboleros\Hincha;
use Session;
use Redirect;
use Mail;
use Illuminate\Routing\Route;
use futboleros\Log;
use futboleros\User;
use futboleros\Equipo;
use futboleros\Tabla;
use DB;
use futboleros\Campeonato;
use futboleros\Noticia;
use futboleros\CategoriaNoticia;


class HinchasController extends Controller
{
    public function __construct(){
        $this->middleware('cors');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    public function equipos_list()
    {
      $equipos = DB::table('equipos')->get();
        return response()->json(
                $equipos
                );
      
      
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
        $newUsuario = new User();
        $newHincha = new Hincha();
        $newUsuario->create([
            'nombre' =>$request['nombre'],
            'email'=>$request['email'],
             'estatus' =>1,
            'password'=> bcrypt($request['password']),
            'categoria_user_id' =>6
            ]);
        $usuarioId = $newUsuario->all()->last();
        $newHincha->create([ 
            'user_id'=>$usuarioId->id,
            'num_celular'=>$request['telefono'],
            'nombre'=>$request['nombre'],
            'fecha_nacimiento'=>$request['fecha_nacimiento'],
            'path' =>$request['path'],
            'sexo'=>$request['sexo'],
            'equipo_id'=>$request['equipo_id']
            
            ]);

       return response()->json(['mensaje'=>'Hincha creado con Exito']);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($correo)
    {
        $hincha= User::with('hincha')
              ->where('users.email',$correo)
              ->get();
        return  response()->json($hincha->toArray()) ;
    }
    public function showEquipo($idEquipo){
       $hincha= Hincha::with('equipo')
              ->where('hinchas.equipo_id',$idEquipo)
              ->first();
        return  response()->json($hincha->toArray()) ;
    }
    public function calendarios(){
        $campeonatos = Campeonato::with(array('jornadas','jornadas.partidos','jornadas.partidos.equipos','jornadas.partidos.resultados'))->get();  

        return response()->json($campeonatos);
    }
     public function posiciones(){
        $posiciones = Campeonato::with('equipos')->get();  

        return response()->json($posiciones);
    }
    public function noticias(){
        $noticias = Noticia::with(['categoria','user'])->get();  

        return response()->json($noticias);
    }
    public function categoriaNoticias(){
        $categorias = CategoriaNoticia::with('noticia')->get();  

        return response()->json($categorias);
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
        $usuario = User::find($id);
        $hincha = Hincha::where('hinchas.user_id',$id)->first();
       
        $usuario->fill([
            'nombre' =>$request['nombre'],
            'email'=>$request['email'],
            'password'=> bcrypt($request['password'])
            ]);

        $hincha->fill([
            'num_celular'=>$request['telefono'],
            'nombre'=>$request['nombre'],
            'fecha_nacimiento'=>$request['fecha_nacimiento'],
            'path' =>$request['path'],
            'equipo_id'=>$request['equipo_id']
            ]);

          $usuario->save();
          $hincha->save();


        return response()->json([
            
            'mensaje'=>$usuario
        ]);
        //
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
