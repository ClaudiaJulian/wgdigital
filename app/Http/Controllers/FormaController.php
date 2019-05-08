<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forma;

class FormaController extends Controller
{
    public function create(){        
        return view('forma.create');        
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

       $forma = Forma::create([
           'nombre' => $request->input('nombre'),
           'descrip' => $request->input('descrip')
       ]);    

       return redirect('/forma/create');
    }
}
