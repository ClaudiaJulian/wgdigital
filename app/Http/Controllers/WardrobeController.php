<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wardrobe;

class WardrobeController extends Controller
{
    public function create(){
        return view ('wardrobe.create');
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

       $wardrobe = Wardrobe::create([
           'nombre' => $request->input('nombre')
        //    'descrip' => $request->input('descrip')
       ]);    

       return redirect('/wardrobe/create');
    }

}
