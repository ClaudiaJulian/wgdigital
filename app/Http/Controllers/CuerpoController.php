<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuerpo;

class CuerpoController extends Controller
{
    public function create(){        
        return view('cuerpo.create');        
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

       $cuerpo = Cuerpo::create([
           'nombre' => $request->input('nombre'),
           'descrip' => $request->input('descrip')
       ]);    

       return redirect('/cuerpo/create');
    }






}
