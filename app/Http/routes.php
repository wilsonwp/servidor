<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/','BackendController@index');
Route::get('admin','BackendController@admin');
Route::resource('users','UserController');
Route::resource('hinchas','HinchasController');
Route::resource('campeonatos','CampeonatosController');
Route::resource('ligas','LigasController');
Route::get('ver','CampeonatosController@ver');
Route::post('guardarCampeonato','CampeonatosController@store');
Route::put('editarCampeonato/{campeonato}','CampeonatosController@update');
Route::delete('eliminarCampeonato/{campeonato}','CampeonatosController@destroy');
Route::resource('equipos','EquiposController');
Route::resource('jornadas','JornadasController');
Route::resource('partidos','PartidosController');
Route::resource('jugadores','JugadoresController');
Route::resource('resultados','ResultadosController');
Route::get('jugadoresList','JugadoresController@listing');
Route::get('noticiasList','NoticiasController@listing');
Route::get('jornadasList','JornadasController@listing');
Route::get('jornadas/show/{id}','JornadasController@show');
Route::get('users/show/{id}','UserController@show');
Route::get('equipos/show/{id}','EquiposController@show');
Route::get('tecnicos/show/{id}','TecnicosController@show');
Route::get('getGoles/{partido}/{equipo}','PartidosController@getMarcador');
Route::get('campeonatos/show/{id}','CampeonatosController@show');
Route::get('arbitros/show/{id}','ArbitrosController@show');
Route::resource('login','LoginController');
Route::get('logout','LoginController@logout');
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
Route::resource('perfiles', 'PerfilesController');
Route::get('verPerfil','PerfilesController@listing');
Route::get('select_jornadas/{id}','PartidosController@get_jornada');
Route::get('select_equipos/{id}','PartidosController@get_equipo');
Route::get('select_estadio/{id}','PartidosController@get_estadio');
Route::get('select_estatus/{id}','PartidosController@get_estatus');
Route::get('partidos_live','PartidosController@partidos_live');
Route::get('partidos_live_visitante','PartidosController@partidos_live_visitante');
Route::get('equipos_list','HinchasController@equipos_list');
Route::get('search_jugadores/{nombre}','JugadoresController@search_jugador');
Route::get('partidos/setMarcador/{id}','PartidosController@setMarcador');
Route::get('muestraLocal/{partido}','ResultadosController@muestraLocal');
Route::get('muestraVisitante/{partido}','ResultadosController@muestraVisitante');
Route::get('muestraEquipoHincha/{equipoId}','HinchasController@showEquipo');
Route::resource('noticias','NoticiasController');
Route::resource('arbitros','ArbitrosController');
Route::resource('tecnicos','TecnicosController');
Route::resource('comentarios','ComentariosController');
Route::get('comentariosPartido/{partido}','ComentariosController@comentariosPartido');
Route::post('comentarios/store','ComentariosController@store');
Route::get('calendarios','HinchasController@calendarios');
Route::get('getNoticias','HinchasController@noticias');
Route::get('getCategoriaNoticias','HinchasController@categoriaNoticias');
Route::put('finalizarPartido','PartidosController@finalizar');
Route::get('tablas','HinchasController@posiciones');

Route::get('/bridge', function() {

    pusher()->trigger('comentarios_canal', 'evento', ['data' => true,'text' => 'aqui estoy probando']);

    return view('welcome');
});

Route::get('comentarios/show/{id}','ComentariosController@show');
Route::get('hinchas/show/{correo}','HinchasController@show');

Route::get('pruebaSocket/','PartidosController@pruebaSocket');


Route::group(array('middleware' => ''), function(){
    Route::controller('filemanager', 'FilemanagerLaravelController');
});
Route::group(['prefix' => 'api'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');

});
Route::get('authenticate/show/{id}', 'AuthenticateController@show');
Route::delete('/tecnicos/borrar/{id}','TecnicosController@borrar');
