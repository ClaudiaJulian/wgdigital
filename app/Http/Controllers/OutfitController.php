<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\Shareable;
use App\Traits\Sample;
use Redirect;

use App\Outfit;
use App\Item;
use App\Categoria;
use App\Formula;
use App\Guardarropa;
use App\Cuerpo;
use App\Abono;
use App\User;
use Auth;

class OutfitController extends Controller
{
    use Shareable;
    use Sample;

    public function prueba(){    
        $this->testMethod('I wGlam');
    }

// SHARE -> AGREGA CONDICION DE SHAREABLE UTILIZA EL TRAIT PARA ENVIAR EL LINK 
    public function share($id){              
        $outfit = Outfit::find($id);
            $outfit->share = 'share';
            $outfit->save();    
        $outfit->getShareUrl('facebook',$id);       
    }

//  CHEQUEA SI EL CONJUNTO ES SHAREABLE Y LO MUESTRA SIN BARRA DE NAVEGACION    
    public function shareable($id){
        $outfit=Outfit::find($id);
        $item=Item::All();
        
        if($outfit){
             if(Auth::user()){    
                if($outfit->share === 'share' || Auth::user()->id === $outfit->user_id){
                    return view('outfit.shareable')->with('outfit',$outfit)->with('item',$item);
                }else{
                    return redirect('/');
                }
                } else{
                if($outfit->share === 'share'){
                    return view('outfit.shareable')->with('outfit',$outfit)->with('item',$item);
                }else{
                    return redirect('/');}      
                }
        }
        return redirect('/');
    }

// CREA Y GRABA OUTFITS MANUALMENTE PARA USUARIO LOGUEADO
    public function create(){        
        if(Auth::user() !== null){
            if( Auth::user()->role !== 'seller'){
                // Pregunta si tiene guardarropa & items
                $user = Auth::user()->id;
                $guardarropa = Guardarropa::where('user_id','=',$user)->first();
                if($guardarropa === null){                
                    return redirect('/guardarropa'); 
                    }else{
                        $it=count($guardarropa->item);
                        if($it===0){
                            return redirect('/guardarropa'); 
                        }else{
                        return view('outfit.create');}
                    }
            }else{
                $seller="Espacio exclusivo para Usuarios";
            return view('outfit.create')->with('seller',$seller);
            }
        }
        return view('auth.login');
    }

    public function guardar(Request $request){
        $user=Auth::user()->id;

        // CHEQUEAR CANTIDAD DE OUTS
        $outfits=Outfit::where('user_id','=',$user)->get();
        $fit=count($outfits);
        $abono = Abono::where('id','=', Auth::user()->abono)->first();
        $a = $abono->outfit;
  
        if ($fit < $a){
        // VALIDACION DE ELECCION DE ESTILO
            if(!$request['work']){$work=0;} else {$work=(int)$request['work'];}
            if(!$request['day']){$day=0;} else {$day=(int)$request['day'];}
            if(!$request['night']){$night=0;} else {$night=(int)$request['night'];}
            $chequeo=$work + $day + $night;
            $mensaje="Falta completar datos.";
        
            if($chequeo<1){
                return view('outfit.create')->with('mensaje',$mensaje);
            }   
            // FIN DE VALIDACION DE ELECCION DE ESTILO
            $mensajes = [
                'required' => "El :attribute es obligatorio."
            ];
         
            $validaciones = [
            'top' => 'required',
            'bottom' => 'required',
            'outwear' => 'required',
            'shoes' => 'required',
            'bag' => 'required'
            ];

            $this->validate($request,$validaciones,$mensajes);
        // CHEQUEO QUE EL CONJUNTO YA EXISTA
            $out=Outfit::where('user_id','=',$user)->get();
            $aux=0;
        
            foreach($out as $o){
                if($o['t_id'] === (int)$request['top'] && $o['b_id'] === (int)$request['bottom'] && $o['o_id'] === (int)$request['outwear']  && $o['s_id'] === (int)$request['shoes'] && $o['ba_id'] === (int)$request['bag'] && $o['work'] === $work && $o['day'] === $day && $o['night'] === $night){
                    $aux=1;                   
                }
            }   
            if($aux===0){    
                $outfit = Outfit::create([        
                    'user_id' => $user,
                    't_id' => (int)$request['top'],
                    'b_id' => (int)$request['bottom'],
                    'o_id' => (int)$request['outwear'],
                    's_id' => (int)$request['shoes'],
                    'ba_id' => (int)$request['bag'],
                    'work' => $work,
                    'day' => $day,
                    'night' => $night 
                ]);            
                return redirect('/guardarropa');   
            }
            if($aux===1){
                $mensaje="Este Look ya lo tenés grabado.";
                return view('outfit.create')->with('mensaje',$mensaje);
            }
        } else { 
            $mensaje="Llegaste al máximo de Looks!";
            return redirect('/outfit');
            // return view('outfit.create')->with('mensaje',$mensaje);
            // return redirect('/outfit');
        }
    }
    
    
    public function guardarpref(Request $request, $id){
        $user=Auth::user()->id;
        // CHEQUEAR CANTIDAD DE OUTS
        $outfits=Outfit::where('user_id','=',$user)->get();
        $fit=count($outfits);
        $abono = Abono::where('id','=', Auth::user()->abono)->first();
        $a = $abono->outfit;
  
        if ($fit < $a){

        $mensajes = [
            'required' => "El :attribute es obligatorio."
        ];
 
         $validaciones = [
         'top' => 'required',
         'bottom' => 'required',
         'outwear' => 'required',
         'shoes' => 'required',
         'bag' => 'required',
         'work' => 'required_without_all:day,night',
         'day' => 'required_without_all:work,night',
         'night' => 'required_without_all:day,work'
        ];

        $this->validate($request,$validaciones,$mensajes);
        // ARREGLAR $day $night $work
        if(!$request['work']){$work=0;} else {$work=(int)$request['work'];}
        if(!$request['day']){$day=0;} else {$day=(int)$request['day'];}
        if(!$request['night']){$night=0;} else {$night=(int)$request['night'];} 

        $out=Outfit::where('user_id','=',$user)->get();
        $aux=0;
        foreach($out as $o){
            if($o['t_id'] === (int)$request['top'] && $o['b_id'] === (int)$request['bottom'] && $o['o_id'] === (int)$request['outwear']  && $o['s_id'] === (int)$request['shoes'] && $o['ba_id'] === (int)$request['bag'] && $o['work'] === $work && $o['day'] === $day && $o['night'] === $night){
                $aux=1;                   
            }
        }
        if($aux===0){    
        $outfit = Outfit::create([        
            'user_id' => $user,
            't_id' => (int)$request['top'],
            'b_id' => (int)$request['bottom'],
            'o_id' => (int)$request['outwear'],
            's_id' => (int)$request['shoes'],
            'ba_id' => (int)$request['bag'],
            'work' => (int)$request['work'],
            'day' => (int)$request['day'],
            'night' => (int)$request['night']
        ]);            
        return redirect('/guardarropa');           
        }
        if($aux===1){
            $mensaje="Ya tenías grabado este Look.";
            // --- NO ME LLEGA EL MENSAJE --- 
            // return redirect()->route('/outfit/'.$id)->with($mensaje);
            // return redirect(('/outfit/'.$id));
            // return redirect('/outfit/'.$id)->with('mensaje', [$mensaje]);
            return redirect('/outfit/'.$id);
        }
    } else{
        $mensaje="Llegaste al máximo de Looks!";
        // NO DEBERIA IR AL CREATE DEBERIA VOLVER AL MISMO LUGAR CON MENSAJE;
        // return redirect()->route('prueba')->with('mensaje',$mensaje);
        // return redirect('/outfit/create')->with('mensaje',$mensaje);
        // return view('outfit.create')->with('mensaje',$mensaje);
        return redirect('/outfit');
    }
    }

    // GRABA NOTAS EN LOS OUTFITS

    public function grabarNota(Request $request, $id){
        $user=Auth::user()->id;
        $outfit=Outfit::find($id);
        if($user === $outfit['user_id']){
            $outfit->nota = $request['nota'];
            $outfit->save();
            return redirect('/outfit');
        }
    }


// CREA OUTFITS SUGERIDOS PARA USUARIOS LOGUEADOS
    public function show($id){
        if(Auth::user()->b_shape === null){
            $user=Auth::user()->id;
            return redirect('/perfil/'.$user.'/edit');
        }else{
            $item=Item::find($id);
            $categoria=Categoria::All();        
        
            $lookCuerpo=Cuerpo::find(Auth::user()->b_shape); 
            $cuerpo=$lookCuerpo['nombre'];

            $formulas=Formula::where('cuerpo','=',$cuerpo)->get();
            $qform=count($formulas);
            $user=Auth::user()->id;
            $guardarropa = Guardarropa::where('user_id','=',$user)->first();
            $miguardarropa = $guardarropa->item;                
            $categoria=$item->categoria_id;
            $find=0; 

            foreach($formulas as $key => $for){            
                $conjunto[$key]=[];
                $qt[$key]=[];
                $qb[$key]=[];
                $qo[$key]=[];
                $qtotal[$key]=[];
                    $primero[$key]=[];
                if($categoria === 1){ 
                        if($item->form === $for->form_1 && $item->printed === $for->printed_1 && $item->colored === $for->colored_1 && $item->length === $for->length_1){
                        array_push($primero[$key],[$item->photo,$item->id]);                        
                        }
                } else {
                    foreach($miguardarropa as $prenda){    
                        if($prenda->categoria_id === 1){ 
                            if($prenda->form === $for->form_1 && $prenda->printed === $for->printed_1 && $prenda->colored === $for->colored_1 && $prenda->length === $for->length_1){
                            array_push($primero[$key],[$prenda->photo,$prenda->id]);
                            }
                        }
                    }       
                }                     
                    $segundo[$key]=[];
                if($categoria === 2){
                        if($item->form === $for->form_2 && $item->printed === $for->printed_2 && $item->colored === $for->colored_2 && $item->length === $for->length_2){
                        array_push($segundo[$key],[$item->photo, $item->id]);
                        }  
                } else {                     
                    foreach($miguardarropa as $prenda){                    
                        if($prenda->categoria_id === 2 || $prenda->categoria_id === 3 || $prenda->categoria_id === 7){    
                            if($prenda->form === $for->form_2 && $prenda->printed === $for->printed_2 && $prenda->colored === $for->colored_2 && $prenda->length === $for->length_2){
                            array_push($segundo[$key],[$prenda->photo,$prenda->id]);
                            }                        
                        }
                    }
                }
                    $tercero[$key]=[];
                if($categoria === 4){
                        if($item->form === $for->form_3 && $item->printed === $for->printed_3 && $item->colored === $for->colored_3 && $item->length === $for->length_3){
                         array_push($tercero[$key],[$item->photo, $item->id]);
                        } 
                } else {
                    foreach($miguardarropa as $prenda){                    
                        if($prenda->categoria_id === 4){    
                            if($prenda->form === $for->form_3 && $prenda->printed === $for->printed_3 && $prenda->colored === $for->colored_3 && $prenda->length === $for->length_3){
                            array_push($tercero[$key],[$prenda->photo,$prenda->id]);
                            }                        
                        }
                    }     
                }              
                array_push($qt[$key],count($primero[$key]));
                array_push($qb[$key],count($segundo[$key]));
                array_push($qo[$key],count($tercero[$key]));
                $qPorForm=count($primero[$key]) * count($segundo[$key]) * count($tercero[$key]);
                $find=$find+$qPorForm;
                array_push($qtotal[$key],$qPorForm);
                array_push($conjunto[$key],$primero[$key]);
                array_push($conjunto[$key],$segundo[$key]);
                array_push($conjunto[$key],$tercero[$key]);
            } // cierre del foreach                                   
        return view('outfit.showbis')->with('conjunto',$conjunto)->with('qtotal',$qtotal)->with('qt',$qt)->with('qb',$qb)->with('qo',$qo)->with('find',$find);    
        } // CIERRE IF AUTH SHAPE NULL    
    } // cierre del public function show

// TRAE OUTFITS GRABADOS

    public function index(Request $request){
        if(Auth::user()){
        if(Auth::user()->role !== "off"){
        
            $user=Auth::user()->id;
            $item=Item::All(); 

            if($request['usos']){                  
                $selectUso=(int)$request['usos'];
                $outfits=Outfit::where('user_id','=',$user)->get();
                $fit=count($outfits);
                $abono = Abono::where('id','=', Auth::user()->abono)->first();
                $a = $abono->outfit;
                if($selectUso === 1){
                    $out=Outfit::where('user_id','=',$user)->orderBy('id','desc')->get(); 
                    return view ('outfit.index')->with('item',$item)->with('out',$out)->with('selectUso',$selectUso)->with('fit',$fit)->with('a',$a); 
                    // --- Para hacer el simplePaginate en el caso de todos los outfits. --- 
                    // $x = "on";
                    // $out=Outfit::where('user_id','=',$user)->orderBy('id','desc')->simplePaginate(1);           
                    // return view ('outfit.index')->with('item',$item)->with('out',$out)->with('selectUso',$selectUso)->with('x',$x)->with('fit',$fit)->with('a',$a); 
                }
                if($selectUso === 2){
                    $out=Outfit::where('user_id','=',$user)->where('night','=',1)->orderBy('id','desc')->get();
                    return view ('outfit.index')->with('item',$item)->with('out',$out)->with('selectUso',$selectUso)->with('fit',$fit)->with('a',$a); 
                    // --- Para hacer el simplePaginate en el caso de todos los outfits. --- 
                    // $x = "off";
                    // $out=Outfit::where('user_id','=',$user)->where('night','=',1)->orderBy('id','desc')->get();
                    // return view ('outfit.index')->with('item',$item)->with('out',$out)->with('selectUso',$selectUso)->with('x',$x)->with('fit',$fit)->with('a',$a); 
                }
                if($selectUso === 3){
                    $out=Outfit::where('user_id','=',$user)->where('work','=',1)->orderBy('id','desc')->get();
                    return view ('outfit.index')->with('item',$item)->with('out',$out)->with('selectUso',$selectUso)->with('fit',$fit)->with('a',$a); 
                    // --- Para hacer el simplePaginate en el caso de todos los outfits. --- 
                    // $x = "off";
                    // $out=Outfit::where('user_id','=',$user)->where('work','=',1)->orderBy('id','desc')->get();
                    // return view ('outfit.index')->with('item',$item)->with('out',$out)->with('selectUso',$selectUso)->with('x',$x)->with('fit',$fit)->with('a',$a); 
                }
                if($selectUso === 4){
                    $out=Outfit::where('user_id','=',$user)->where('day','=',1)->orderBy('id','desc')->get();
                    return view ('outfit.index')->with('item',$item)->with('out',$out)->with('selectUso',$selectUso)->with('fit',$fit)->with('a',$a); 
                    // --- Para hacer el simplePaginate en el caso de todos los outfits. --- 
                    // $x = "off";
                    // $out=Outfit::where('user_id','=',$user)->where('day','=',1)->orderBy('id','desc')->get();
                    // return view ('outfit.index')->with('item',$item)->with('out',$out)->with('selectUso',$selectUso)->with('x',$x)->with('fit',$fit)->with('a',$a); 
                }                
            }else{ 
                $outfits=Outfit::where('user_id','=',$user)->get();
                $fit=count($outfits);
                $abono = Abono::where('id','=', Auth::user()->abono)->first();
                $a = $abono->outfit;
       
                $out=Outfit::where('user_id','=',$user)->orderBy('id','desc')->get(); 
                return view ('outfit.index')->with('item',$item)->with('out',$out)->with('fit',$fit)->with('a',$a);  
                // --- Para hacer el simplePaginate en el caso de todos los outfits. ---
                // $x = "on";       
                // $out=Outfit::where('user_id','=',$user)->orderBy('id','desc')->simplePaginate(1); 
                // return view ('outfit.index')->with('item',$item)->with('out',$out)->with('x',$x)->with('fit',$fit)->with('a',$a);  
                }                                
    }
    $msgOff="Tu cuenta está inactiva, envianos un mail al info@wglam.com";
    return view ('welcome')->with('msgOff',$msgOff); 
    }
    return view('auth.login');
           
}


// FUNCIONA - simplePaginate() para todos - Cuando se usa filtros no funciona...
//  public function index(){
//     if(Auth::user()){
//         $user=Auth::user()->id;
//         $item=Item::All();       
//         $out=Outfit::where('user_id','=',$user)->simplePaginate(1);                             
//          return view ('outfit.index')->with('item',$item)->with('out',$out);                          
//     }else{
//         return view('Auth.login');
//         }
//     }


// BORRAR OUTFITS

    public function delete($id){
        $user=Auth::user()->id;
        $outfit=Outfit::find($id);

        if($outfit->user_id === $user){
            $outfit->delete();
            return redirect(('/outfit'));
        }

    }





// --------------------------------- GUARDARROPA GENERICO --------------------------------------
// CREA OUTFITS MANUALMENTE GENERALES - ITEMS WGLAM
    public function masterCreate(){    
        return view('outfit.mastercreate');    
    }

    public function masterSave(Request $request){        
        return redirect('/item');  
    }


} // cierre de la class
