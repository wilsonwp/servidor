<?php

namespace futboleros\Http\Controllers;
use Illuminate\Http\Request;
use futboleros\Http\Requests;
use futboleros\Http\Controllers\Controller;
use futboleros\Profile;
use Auth;
use Session;
use Redirect;
use futboleros\User;
use futboleros\Http\Requests\UserUpdateRequest;
use futboleros\CategoriaUser;
use futboleros\Log;
class PerfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token = Auth::user()->remember_token;
        return view('perfiles.index',['token'=>$token]);
    }
    // Esta Funcion se usa para consulta Ajax
     public function listing(){
        $perfil = Auth::user();
        $categoria = CategoriaUser::find($perfil->categoria_user_id);   
        return response()->json(
                $perfil->toArray()
                );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
            if($request->password == $request->password_confirmation ){
                $user = User::find(Auth::user()->id);
                $user->password = bcrypt($request->password);
                $user->estatus = 1; 
                $user->save(); 
                Session::flash('message','Password Actualizado con Exito');
                return Redirect::to('admin');
            }else{
                
                Session::flash('message','Los campos no Coinciden');
                return Redirect::to('perfiles');
            }
            
         //
    }

    /**     
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       $perfil = User::find(Auth::user()->id);
       $categoria = $perfil->categoria_user->nombre_categoria;
      // $user->categoria_user->nombre_categoria;
       //dd($categoria);
       return view('perfiles.show',['categoria'=>$categoria]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        $perfil =  User::find($id);
           return response()->json(
                $perfil->toArray()
                );
  
        
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 
        $user = User::find(Auth::user()->id);
        $user->fill($request->all());
        $user->save();
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
