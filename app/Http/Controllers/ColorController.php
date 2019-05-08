<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;

class ColorController extends Controller
{
    public function create(){        
        return view('color.create');        
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

       $color = Color::create([
           'nombre' => $request->input('nombre'),
           'descrip' => $request->input('descrip')
       ]);    

       return redirect('/color/create');
    }
}
