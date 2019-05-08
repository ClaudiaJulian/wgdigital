<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estampado;

class EstampadoController extends Controller
{
    public function create(){        
        return view('estampado.create');        
    }

    public function guardar(Request $request)
    {
        $mensajes = [
         'required' => "El :attribute es obligatorio."
       ];

        $validaciones = [
        'nombre' => 'required',
       ];

       $this->validate($request,$validaciones,$mensajes); 

       $estampado = Estampado::create([
           'nombre' => $request->input('nombre'),
           'descrip' => $request->input('descrip')
       ]);    

       return redirect('/estampado/create');
    }
}
