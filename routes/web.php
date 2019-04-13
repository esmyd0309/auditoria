<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//Route::resource('/plantillas', 'PlantillaController');

//Route::resource('preguntas','PreguntaController');
Route::get('preguntas/create/{id}','PreguntaController@create')->name('preguntas.create');
Route::post('preguntas/store/{id}','PreguntaController@store')->name('preguntas.store');
Route::get('preguntas/show/{preguntas}','PreguntaController@show')->name('preguntas.show');
Route::delete('preguntas/destroy/{preguntas}/{plantilla}','PreguntaController@destroy')->name('preguntas.destroy');
Route::get('preguntas/{preguntas}/edit','PreguntaController@destroy')->name('preguntas.edit');
Route::put('preguntas/{preguntas}','PreguntaController@update')->name('preguntas.update');


Route::get('respuestas/create/{id}','RespuestaController@create')->name('respuestas.create');
Route::post('respuestas/store/{id}','RespuestaController@store')->name('respuestas.store');
Route::get('respuestas/show/{respuesta}','RespuestaController@show')->name('respuestas.show');
Route::delete('/respuestas/destroy/{respuestas}/{pregunta}','RespuestaController@destroy')->name('respuestas.destroy');



Route::get('/gestion/show/{gestion}', 'GestionController@show')->name('gestion.show');
Route::get('/gestion/create/{gestion}', 'GestionController@show')->name('gestion.show');


Route::get('/evaluacion/{id}','EvaluacionController@create')->name('evaluacion');

Route::get('/evaluacion/{id}/show','EvaluacionController@show')->name('evaluacion.show');
Route::get('/evaluacion','EvaluacionController@index')->name('evaluacion.index');

/**detalle de las gestiones */
Route::get('/evaluacion/{id}/detalle','EvaluacionController@detalle')->name('actualicions.detalle');

/**descargar destalle individual */
Route::get('/evaluacion/{id}/descargar','EvaluacionController@descargar')->name('actualicions.descargar');


//Route::resource('evaluacion','EvaluacionController');
Route::post('/evaluacion/store','EvaluacionController@store')->name('evaluacion.store');
Route::get('/menu','HomeController@menu')->name('menu');

Route::resource('tarea', 'TareaController')->except([
        'index'
    ]);
Route::get('tarea', 'TareaController@index')->name('tarea');

Route::resource('temp', 'TempgestioneController')->except([
        'index'
    ]);

Route::get('/temp/vista/{id}', 'TempgestioneController@index')->name('temp.index');
Route::get('/temp/procesar/{id}/{tarea}/{seg}/{path}','EvaluacionController@proce')->name('evaluacion.proce');
/**descartar del temporal los registros para que se puedan trabajar  */
Route::get('/temp/temporal/{id}/{tarea}','EvaluacionController@temporal')->name('evaluacion.temporal');

//Routes
//restrincion de inico de sesion 
Route::middleware(['auth'])->group(function(){
        
        Route::get('/gestion', 'GestionController@index')->name('gestion')->middleware('permission:gestion');
    //Roles
    Route::post('roles/store','RoleController@store')->name('roles.store')
            ->middleware('permission:roles.create');

            
    Route::get('roles','RoleController@index')->name('roles.index')
    ->middleware('permission:roles.index');

     Route::get('roles/create','RoleController@create')->name('roles.create')
            ->middleware('permission:roles.create');

     Route::put('roles/{role}','RoleController@update')->name('roles.update')
            ->middleware('permission:roles.edit');

     Route::get('roles/{role}','RoleController@show')->name('roles.show')
            ->middleware('permission:roles.show');

     Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy')
            ->middleware('permission:roles.destroy');

     Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit')
            ->middleware('permission:roles.edit');


    //Plantillas

    Route::post('plantillas/store','PlantillaController@store')->name('plantillas.store')
            ->middleware('permission:plantillas.create');

    Route::get('plantillas','PlantillaController@index')->name('plantillas.index')
            ->middleware('permission:plantillas.index');

    Route::get('plantillas/create','PlantillaController@create')->name('plantillas.create')
            ->middleware('permission:plantillas.create');

    Route::put('plantillas/{plantilla}','PlantillaController@update')->name('plantillas.update')
            ->middleware('permission:plantillas.edit');



        Route::put('plantillass/{plantilla}','PlantillaController@updateplantilla')->name('plantillass.update')
        ->middleware('permission:plantillas.edit');

        Route::get('plantillass/{plantilla}/edit','PlantillaController@editplantilla')->name('plantillass.edit')
        ->middleware('permission:plantillas.edit');




    Route::get('plantillas/{plantilla}','PlantillaController@show')->name('plantillas.show')
            ->middleware('permission:plantillas.show');

    Route::delete('plantillas/{plantilla}','PlantillaController@destroy')->name('plantillas.destroy')
            ->middleware('permission:plantillas.destroy');

    Route::get('plantillas/{plantilla}/edit','PlantillaController@edit')->name('plantillas.edit')
            ->middleware('permission:plantillas.edit');

      //Users 
    

        Route::get('users','UserController@index')->name('users.index')
            ->middleware('permission:users.index');

      Route::put('users/{user}','UserController@update')->name('users.update')
            ->middleware('permission:users.edit');
  
      Route::get('users/{user}','UserController@show')->name('users.show')
            ->middleware('permission:users.show');
  
      Route::delete('users/{user}','UserController@destroy')->name('users.destroy')
            ->middleware('permission:users.destroy');
  
      Route::get('users/{user}/edit','UserController@edit')->name('users.edit')
            ->middleware('permission:users.edit');
});
 

Route::get('media','PlantillaController@subir')->name('media.subir');

Route::post('media/store','PlantillaController@ingresa')->name('media.ingresa');
Route::get('media/{id}','PlantillaController@ver')->name('media.ver');

/*
Route::post('media', function () {
    //request()->validate(['file' => 'image']);
    return request()->file->storeAs('uploads', request()->file->getClientOriginalName());
});
*/
