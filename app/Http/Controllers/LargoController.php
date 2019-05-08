<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Largo;

class LargoController extends Controller
{
    public function create(){        
        return view('largo.create');        
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

       $largo = Largo::create([
           'nombre' => $request->input('nombre'),
           'descrip' => $request->input('descrip')
       ]);    

       return redirect('/largo/create');
    }
}
