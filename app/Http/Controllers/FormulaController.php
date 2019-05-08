<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Formula;
use App\Categoria;
use App\Cuerpo;
use App\Forma;
use App\Color;
use App\Estampado;
use App\Largo;
use Auth;



class FormulaController extends Controller
{
    public function index(){
        $formulas=Formula::All();
        $forma=Forma::All();
        $color=Color::All();
        $estampado=Estampado::All();
        $largo=Largo::All();

        $body1 = Formula::where('cuerpo','=','Reloj')->get();
        $qBody1 = count($body1);

        $body2 = Formula::where('cuerpo','=','Columnar')->get();
        $qBody2 = count($body2);

        $body3 = Formula::where('cuerpo','=','Rectangular')->get();
        $qBody3 = count($body3);

        $body4 = Formula::where('cuerpo','=','Triangular')->get();
        $qBody4 = count($body4);

        $body5 = Formula::where('cuerpo','=','Cono')->get();
        $qBody5 = count($body5);

        $body6 = Formula::where('cuerpo','=','Oval')->get();
        $qBody6 = count($body6);
// dd($qBody1);
        return view('formula.index')->with('formulas',$formulas)->with('forma',$forma)->with('color',$color)->with('estampado',$estampado)->with('largo',$largo)->with('qBody1',$qBody1)->with('qBody2',$qBody2)->with('qBody3',$qBody3)->with('qBody4',$qBody4)->with('qBody5',$qBody5)->with('qBody6',$qBody6);        
    }


    public function create(){
        $categoria=Categoria::All();
        $cuerpo=Cuerpo::All();
        $forma=Forma::All();
        $color=Color::All();
        $estampado=Estampado::All();
        $largo=Largo::All();
        return view('formula.create')->with('categoria',$categoria)->with('cuerpo',$cuerpo)->with('forma',$forma)->with('color',$color)->with('estampado',$estampado)->with('largo',$largo);        
    }

    public function guardar(Request $request){
        // dd($request);
        $mensajes = [
            'required' => "El :attribute es obligatorio."
        ];
 
         $validaciones = [
         'cuerpo' => 'required',

         'categoria_1' => 'required',
         'form_1' => 'required',
         'colored_1' => 'required',
         'printed_1' => 'required',
         'length_1' => 'required',
         
         'categoria_2' => 'required',
         'form_2' => 'required',
         'colored_2' => 'required',
         'printed_2' => 'required',
         'length_2' => 'required',

         'categoria_3' => 'required',
         'form_3' => 'required',
         'colored_3' => 'required',
         'printed_3' => 'required',
         'length_3' => 'required'
        ];
 
        $this->validate($request,$validaciones,$mensajes); 
 
        $formula = Formula::create([
         
         'cuerpo' => $request->input('cuerpo'),
         'categoria_1' => $request->input('categoria_1'),
         'form_1' => $request->input('form_1'),
         'colored_1' => $request->input('colored_1'),
         'printed_1' => $request->input('printed_1'),
         'length_1' => $request->input('length_1'),        
         'categoria_2' => $request->input('categoria_2'),
         'form_2' => $request->input('form_2'),
         'colored_2' => $request->input('colored_2'),
         'printed_2' => $request->input('printed_2'),
         'length_2' => $request->input('length_2'),
         'categoria_3' => $request->input('categoria_3'),
         'form_3' => $request->input('form_3'),
         'colored_3' => $request->input('colored_3'),
         'printed_3' => $request->input('printed_3'),
         'length_3' => $request->input('length_3'),
        ]);
    
        return redirect('/formula/create');
    }

    public function delete($id){
        $formula=Formula::find($id);
        $formula->delete();

        return redirect('/formula');
    }

    public function edit($id)
    {
    $formula=Formula::find($id);
    $categoria=Categoria::All();
    $cuerpo=Cuerpo::All();
    $forma=Forma::All();
    $color=Color::All();
    $estampado=Estampado::All();
    $largo=Largo::All();
    // dd($formula);        
    $mensaje='No estas autorizado a editar este item';

    if(Auth::user()->id === 1){
    return view('formula.edit')->with('formula',$formula)->with('categoria',$categoria)->with('cuerpo',$cuerpo)->with('forma',$forma)->with('color',$color)->with('estampado',$estampado)->with('largo',$largo);
    } else {dd($mensaje);}
    }

    public function guardarCambios(Request $request,$id)
    {
    // dd($request);
    $formula=Formula::find($id);

    if($formula !== null){
       
        if($request->input('cuerpo') !== '') {$formula->cuerpo = $request->input('cuerpo');}
        if($request->input('categoria_1') !== '') {$formula->categoria_1 = $request->input('categoria_1');}
        if($request->input('form_1') !== '') {$formula->form_1 = $request->input('form_1');}
        if($request->input('colored_1') !== '') {$formula->colored_1 = $request->input('colored_1');}
        if($request->input('printed_1') !== '') {$formula->printed_1 = $request->input('printed_1');}
        if($request->input('length_1') !== '') {$formula->length_1 = $request->input('length_1');}

        if($request->input('categoria_2') !== '') {$formula->categoria_2 = $request->input('categoria_2');}
        if($request->input('form_2') !== '') {$formula->form_2 = $request->input('form_2');}
        if($request->input('colored_2') !== '') {$formula->colored_2 = $request->input('colored_2');}
        if($request->input('printed_2') !== '') {$formula->printed_2 = $request->input('printed_2');}
        if($request->input('length_2') !== '') {$formula->length_2 = $request->input('length_2');}
        
        if($request->input('categoria_3') !== '') {$formula->categoria_3 = $request->input('categoria_3');}
        if($request->input('form_3') !== '') {$formula->form_3 = $request->input('form_3');}
        if($request->input('colored_3') !== '') {$formula->colored_3 = $request->input('colored_3');}
        if($request->input('printed_3') !== '') {$formula->printed_3 = $request->input('printed_3');}
        if($request->input('length_3') !== '') {$formula->length_3 = $request->input('length_3');}

      
         $formula->save();
    }
               
   return redirect('/formula');
}



}
