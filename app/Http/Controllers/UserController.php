<?php

namespace futboleros\Http\Controllers;

use Illuminate\Http\Request;
use futboleros\Http\Requests;
use futboleros\Http\Requests\UserCreateRequest;
use futboleros\Http\Requests\UserUpdateRequest;
use futboleros\Http\Controllers\Controller;
use futboleros\User;
use futboleros\CategoriaUser;
use Session;
use Redirect;
use Mail;
use Illuminate\Routing\Route;
use futboleros\Log;

class UserController extends Controller
{
    
    public function __construct(){
        $this->middleware('cors');
        $this->beforeFilter('@find',['only' => ['emailSender']]);
    }
  
    public function find(Route $route){
        $this->user = User::find($route->getParameter('users'));
   
    }
    public function index()
    {
      $users = User::paginate(5);
      return view('usuarios.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //aqui consulto los tipo de usuarios de la tabla categoria_user_id
      $tipo_usuarios = CategoriaUser::lists('nombre_categoria','id');
      return view('usuarios.create',compact('tipo_usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
       
       User::create([
            'nombre' =>$request['nombre'],
            'apellido' =>$request['apellido'],
            'email'=>$request['email'],
            'categoria_user_id' =>$request['categoria_user_id'],
           'estatus' =>0,
            'password'=> bcrypt($request['password'])
        ]);
       $this->emailSender($request['email'],$request['password']);
        Session::flash('message','Usuario Creado con Exito');
        return Redirect::to('/users');
    }
    function emailSender($email,$password){
         Mail::send('emails.registro', ['email' => $email,'password' => $password], function ($m) use ($email) {
            $m->from('garcia.solutions@gmail.com', 'Futboleros');

            $m->to($email, 'suscriptor')->subject('Datos de Ingreso a Backend del Sistema');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        return User::find($id);
     
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::find($id);
       $tipo_usuarios = CategoriaUser::lists('nombre_categoria','id');
       return view('usuarios.edit',['user'=>$user,'tipo_usuarios'=>$tipo_usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
         $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        Session::flash('message','Usuario Actualizado con Exito');
        return Redirect::to('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('message','Usuario Eliminado');
        return Redirect::to('/users');
        
    }
}
