<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Auth;


class CategoriaController extends Controller
{
    public function create(){
        return view('categoria.create');
    }

    public function guardar(Request $request)
    {
        $mensajes = [
           'required' => "Te olvidaste del :attribute ."
       ];

        $validaciones = [
        'name' => 'required',
       ];

       $this->validate($request,$validaciones,$mensajes); 
      
       $categoria = Categoria::create([
           'name' => $request->input('name'),
       ]);
       
       return redirect('/categoria/create');
    }

    public function index(Request $request) 
    {
        $categorias=Categoria::All();
        return view('categoria.index')->with('categorias',$categorias);
    }

    public function show($id) 
    {
        $categoria=Categoria::find($id);
        return view('categoria.show')->with('categoria',$categoria);
    }

    public function delete($id)
    {    
        $categoria = Categoria::find($id);
        if(Auth::user()->id === 1){
            $categoria->delete();
            return redirect('/categoria');
        }else{
        return redirect('/item');}
    }

    public function edit($id)
    {
    $categoria=Categoria::find($id);
        
    $mensaje='No estas autorizado a editar este item';

    if(Auth::user()->id === 1){
    return view('categoria.edit')->with('categoria',$categoria);
    } else {dd($mensaje);}
    }

    public function guardarCambios(Request $request,$id)
    {
    // dd($request);
    $categoria=Categoria::find($id);

    if($categoria !== null){
       
        if($request->input('name') !== '') {$categoria->name = $request->input('name');}
            $categoria->save();
         
    }
               
   return redirect('/categoria');
}



}
