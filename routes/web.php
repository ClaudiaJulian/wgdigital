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
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/perfil/{id}/edit', 'UserController@edit');
Route::put('/perfil/{id}/edit', 'UserController@guardarCambios');

Route::get('/item','ItemController@index');
Route::get('/item/create','ItemController@create');
Route::post('item/create','ItemController@guardar');
Route::get('/item/{id}','ItemController@show')->name('item');
Route::get('/item/{id}/edit','ItemController@edit');
Route::put('/item/{id}/edit','ItemController@guardarCambios');
Route::get('/item/{id}/delete','ItemController@delete');
Route::post('/item/preview','ItemController@preview');
Route::post('/wardrobe/filtro','ItemController@filtrar');

Route::get('/outfit','OutfitController@index');
Route::get('/outfit/create','OutfitController@create')->name('prueba');
Route::post('outfit/create','OutfitController@guardar');
// Route::post('outfit/preferido','OutfitController@guardarpref');
Route::get('/outfit/mastercreate','OutfitController@masterCreate');
Route::post('outfit/mastercreate','OutfitController@masterSave');
Route::get('/outfit/{id}','OutfitController@show')->name('outfit');
Route::post('/outfit/{id}','OutfitController@guardarpref');
Route::get('/outfit/wg/{id}','OutfitController@share');
Route::get('/outfit/myOutfit_wg/{id}','OutfitController@shareable');
Route::post('/outfit/nota/{id}','OutfitController@grabarNota');

Route::get('/outfit/{id}/edit','OutfitController@edit');
Route::get('/outfit/{id}/delete','OutfitController@delete');
Route::post('/outfit/filter','OutfitController@filter');

// EL USUARIO LOGUEADO ARMA SU GUARDARROPA
Route::get('/guardarropa','GuardarropaController@index');
Route::get('/guardarropa/add/{id}','GuardarropaController@add');
Route::get('/guardarropa/{id}/edit','GuardarropaController@edit');
Route::post('guardarropa/{id}/edit','GuardarropaController@edit');
// Route::get('/guardarropa/{id}/delete','GuardarropaController@delete');

// EL USUARIO LOGUEADO CREA SU PROPIO CONJUNTO - JS
Route::get('/seleccionar/bag','ItemController@seleccionarBag');
Route::get('/seleccionar/outwear','ItemController@seleccionarOutwear');
Route::get('/seleccionar/shoes','ItemController@seleccionarShoes');
Route::get('/seleccionar/top','ItemController@seleccionarTop');
Route::get('/seleccionar/bottom','ItemController@seleccionarBottom');

// EL USUARIO NO LOGUEADO CREA CONJUNTOS CON ITEMS DISPONIBLES - JS
Route::get('/seleccionar/masterBag','ItemController@generalBag');
Route::get('/seleccionar/masterOutwear','ItemController@generalOutwear');
Route::get('/seleccionar/masterShoes','ItemController@generalShoes');
Route::get('/seleccionar/masterTop','ItemController@generalTop');
Route::get('/seleccionar/masterBottom','ItemController@generalBottom');

// SHOP PRODUCTOS 
// Route::get('/producto','ProductoController@index');
Route::get('/producto/shop','ProductoController@index');
Route::get('/producto/shop/{id}','ProductoController@show')->name('producto');
Route::get('/producto/subir_produc/{id}','ProductoController@upload');

// SHOP CARRO  - no usado
Route::get('/carro','CarroController@show');
Route::get('/carro/create','CarroController@create');
Route::get('/carro/pagar','CarroController@pagar');
Route::post('/carro/actualizar/{id}','CarroController@edit');
Route::get('/carro/vaciar','CarroController@vaciar');
Route::get('/carro/add/{id}','CarroController@add');
Route::get('/carro/delete/{id}','CarroController@delete');

// ---------- SOLO VISIBLE PARA EL ADMINISTRADOR -------------
Route::group(['middleware' => 'checkRole:adm'], function () {
// SOLO VISIBLE PARA EL ADMINISTRADOR
    Route::get('/categoria','CategoriaController@index');
    Route::get('/categoria/create','CategoriaController@create');
    Route::post('categoria/create','CategoriaController@guardar');
    Route::get('/categoria/{id}','CategoriaController@show')->name('categoria');
    Route::get('/categoria/{id}/edit','CategoriaController@edit');
    Route::put('/categoria/{id}/edit','CategoriaController@guardarCambios');
    Route::get('/categoria/{id}/delete','CategoriaController@delete');

    Route::get('/formula','FormulaController@index');
    Route::get('/formula/create','FormulaController@create');
    Route::post('formula/create','FormulaController@guardar');
    Route::get('/formula/{id}','FormulaController@show')->name('formula');
    Route::get('/formula/{id}/edit','FormulaController@edit');
    Route::put('/formula/{id}/edit','FormulaController@guardarCambios');
    Route::get('/formula/{id}/delete','FormulaController@delete');

// SOLO VISIBLE PARA EL ADMINISTRADOR
    Route::get('/cuerpo','CuerpoController@index');
    Route::get('/cuerpo/create','CuerpoController@create');
    Route::post('cuerpo/create','CuerpoController@guardar');
    Route::get('/cuerpo/{id}','CuerpoController@show')->name('cuerpo');
    Route::get('/cuerpo/{id}/edit','CuerpoController@edit');
    Route::get('/cuerpo/{id}/delete','CuerpoController@delete');

// SOLO VISIBLE PARA EL ADMINISTRADOR
    Route::get('/forma','FormaController@index');
    Route::get('/forma/create','FormaController@create');
    Route::post('forma/create','FormaController@guardar');
    Route::get('/forma/{id}','FormaController@show')->name('forma');
    Route::get('/forma/{id}/edit','FormaController@edit');
    Route::get('/forma/{id}/delete','FormaController@delete');

// SOLO VISIBLE PARA EL ADMINISTRADOR
    Route::get('/color','ColorController@index');
    Route::get('/color/create','ColorController@create');
    Route::post('color/create','ColorController@guardar');
    Route::get('/color/{id}','ColorController@show')->name('color');
    Route::get('/color/{id}/edit','ColorController@edit');
    Route::get('/color/{id}/delete','ColorController@delete');

// SOLO VISIBLE PARA EL ADMINISTRADOR
    Route::get('/estampado','EstampadoController@index');
    Route::get('/estampado/create','EstampadoController@create');
    Route::post('estampado/create','EstampadoController@guardar');
    Route::get('/estampado/{id}','EstampadoController@show')->name('estampado');
    Route::get('/estampado/{id}/edit','EstampadoController@edit');
    Route::get('/estampado/{id}/delete','EstampadoController@delete');

// SOLO VISIBLE PARA EL ADMINISTRADOR
    Route::get('/largo','LargoController@index');
    Route::get('/largo/create','LargoController@create');
    Route::post('largo/create','LargoController@guardar');
    Route::get('/largo/{id}','LargoController@show')->name('largo');
    Route::get('/largo/{id}/edit','LargoController@edit');
    Route::get('/largo/{id}/delete','LargoController@delete');

// SOLO VISIBLE PARA EL ADMINISTRADOR
    Route::get('/wardrobe','WardrobeController@index');
    Route::get('/wardrobe/create','WardrobeController@create');
    Route::post('wardrobe/create','WardrobeController@guardar');
    Route::get('/wardrobe/{id}/edit','WardrobeController@edit');
    Route::get('/wardrobe/{id}/delete','WardrobeController@delete');

// SOLO VISIBLE PARA EL ADMINISTRADOR    
    Route::get('/abono','AbonoController@index');
    Route::put('/abono/create','AbonoController@create');
    // Route::post('abono/create','AbonoController@guardar');
    Route::put('/abono/{id}/edit','AbonoController@edit');
    Route::get('/abono/{id}/delete','AbonoController@delete');

// SOLO VISIBLE PARA EL ADMINISTRADOR    
    Route::get('/pack','PackController@index');
    Route::get('/pack/create','PackController@create');
    Route::post('pack/create','PackController@guardar');
    Route::get('/pack/{id}/edit','PackController@edit');
    Route::get('/pack/{id}/delete','PackController@delete');

// SOLO VISIBLE PARA EL ADMINISTRADOR    
Route::get('/adm/user','UserController@index');
Route::put('/adm/user', 'UserController@guardarRoles');
Route::put('/adm/user/change/{id}', 'UserController@cambioRoles');
});

// --------- SOLO VISIBLE PARA EL SELLER -------------
Route::group(['middleware' => 'checkRole:seller'], function () {
    Route::get('/producto/create','ProductoController@create');
    Route::post('producto/create','ProductoController@guardar');
    Route::get('/producto/add/{id}','ProductoController@guardarOnOff');
    Route::get('/producto/{id}/edit','ProductoController@edit');
    Route::put('/producto/{id}/edit','ProductoController@guardarCambios');
    Route::get('/producto/{id}/delete','ProductoController@delete');    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
