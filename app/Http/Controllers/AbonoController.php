<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abono;

class AbonoController extends Controller
{
    public function index(){
        $abonos=Abono::All();
        return view('abono.index')->with('abonos',$abonos);
    }

    public function create(Request $request){
        // dd($request);

        $mensajes = [
            'required' => "El :attribute es obligatorio."
        ];
        
         $validaciones = [      
            'nombre' => 'required',
            'estrellas' => 'required',
            'p_mes' => 'required',
            'p_sem' => 'required',
            'p_anual'   => 'required',
            'guardarropa'   => 'required',
            'capacidad' => 'required',
            'outfit'    => 'required',
            // 'itemOutfit'    => 'required',
            'consultas' => 'required'     
        ];
        
        $this->validate($request,$validaciones,$mensajes); 
         
        $abono = Abono::create([
            'nombre' => $request->input('nombre'),
            'estrellas' => $request->input('estrellas'),
            'p_mes' => $request->input('p_mes'),
            'p_sem' => $request->input('p_sem'),
            'p_anual'  => $request->input('p_anual'),
            'guardarropa' => $request->input('guardarropa'),
            'capacidad' => $request->input('capacidad'),
            'outfit' => $request->input('outfit'),
            // 'itemOutfit' => $request->input('itemOutfit'),
            'consultas' => $request->input('consultas')          
        ]);
        return redirect('/abono');
    }

    public function edit(Request $request,$id){
        // dd($request->input('nombre'));
        $abono=Abono::find($id);

        $abono->nombre = $request->input('nombre');
        $abono->estrellas= $request->input('estrellas');
        $abono->p_mes= $request->input('p_mes');
        $abono->p_sem= $request->input('p_sem');
        $abono->p_anual= $request->input('p_anual');
        $abono->guardarropa= $request->input('guardarropa');
        $abono->capacidad= $request->input('capacidad');
        $abono->outfit= $request->input('outfit');
        // $abono->itemOutfit= $request->input('itemOutfit');
        $abono->consultas= $request->input('consultas');

        $abono->save();
        return redirect('/abono');
    }

    public function delete($id){
        $ab=Abono::find($id);
        if($ab){
            $ab->delete();
            return redirect('/abono');
        }
        return redirect('/abono');
    }

}
