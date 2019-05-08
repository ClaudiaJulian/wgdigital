<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guardarropa;
use App\Item;
use App\Categoria;
use App\Cuerpo;
use App\Forma;
use App\Color;
use App\Estampado;
use App\Largo;
use App\Outfit;
use App\Wardrobe;
use App\Abono;
use Auth;

class ItemController extends Controller
{
    public function create(){
        if(Auth::user() !== null){
            $user = Auth::user()->id;

            $guarda=Guardarropa::where('user_id','=',$user)->first();
            // dd($guarda);
            if($guarda !== null) {
                $g=count($guarda->item);
            
                $abono = Abono::where('id','=', Auth::user()->abono)->first();
                $a = $abono->capacidad;
            
                if($g < $a){
                    $categoria=Categoria::where('id','<',10)->get();
                    $cuerpo=Cuerpo::All();
                    $forma=Forma::All();
                    $color=Color::All();
                    $estampado=Estampado::All();
                    $largo=Largo::All();
                    $wardrobe=Wardrobe::All();

                    return view('item.create')->with('categoria',$categoria)->with('cuerpo',$cuerpo)->with('forma',$forma)->with('color',$color)->with('estampado',$estampado)->with('largo',$largo)->with('wardrobe',$wardrobe);
                } else {                
                    return redirect('/guardarropa');
                }
             } else {
                $user = Auth::user()->id;
                Guardarropa::create([
                    'user_id' => $user,
                ]);
                    
                $categoria=Categoria::where('id','<',10)->get();
                $cuerpo=Cuerpo::All();
                $forma=Forma::All();
                $color=Color::All();
                $estampado=Estampado::All();
                $largo=Largo::All();
                $wardrobe=Wardrobe::All();

                return view('item.create')->with('categoria',$categoria)->with('cuerpo',$cuerpo)->with('forma',$forma)->with('color',$color)->with('estampado',$estampado)->with('largo',$largo)->with('wardrobe',$wardrobe);
            }
            
        }
        return view('auth.login');
    }

    public function guardar(Request $request)
    {
        // dd($request);
        $mensajes = [
           'required' => "El :attribute es obligatorio."
       ];
       if($request['categoria'] > "5" && $request['categoria'] < "10"){
        $validaciones = [
        'name' => 'required',
        'categoria' => 'required',
        'printed' => 'required',
        'colored' => 'required',
        'img' => 'required',
        'tipo_w' => 'required'      
       ];
        }
       else{
        $validaciones = [
        'name' => 'required',
        'categoria' => 'required',
        'printed' => 'required',
        'colored' => 'required',
        'img' => 'required',
        'form' => 'required',
        'length' =>'required',
        'tipo_w' => 'required'         
       ];}

       $this->validate($request,$validaciones,$mensajes); 

       $name = time().$request->file('img')->getClientOriginalName();
       $request->file('img')->move(public_path('/img_item'),$name);
       $path = '/img_item/'.$name;

    // ____ CODIGO QUE FUNCIONA _ CAMBIO PARA ADAPTARLO AL SERVER    
    //    $path = $request->file('img')->storePublicly('public/img_item');
    //    $path = str_replace('public','/storage',$path);
       
       $user = Auth::user()->id;
       $item = Item::create([        
           'user_id' => $user,
           'name' => $request->input('name'),
           'brand' => $request->input('brand'),
           'categoria_id' => $request->input('categoria'),
           'printed' => $request->input('printed'),
           'colored' => $request->input('colored'),
           'form' => $request->input('form'),
           'length' => $request->input('length'),
           'bodyshape' => $request->input('body'),
           'tipo_w' => $request->input('tipo_w'),
           'photo' => $path  
       ]);
     // SINCRONIZAR CON EL GUARDARROPA;
       $guardarropas = Guardarropa::all();

        $encontrado = false;
        foreach($guardarropas as $guarda){       
            if($guarda['user_id'] === $user){
                $encontrado = true;
           
                // sincronizar _ armar las relaciones;
                $guarda->item()->attach($item['id']);
            }    
        }    
       return redirect('/guardarropa');
    }

// INDEX GENERICO DE LOS ITEMS DEL ADMINISTRADOR
    public function index(Request $request) 
    { 
    
    if($request['tipo_w'] || $request['categoria']){
        if($request['tipo_w'] === null){
            $selectCat=(int)$request['categoria'];
            // dd($selectCat);
            $items=Item::where('user_id','=',1)->where('id','>',10)->where('categoria_id','=',$selectCat)->orderBy('id','desc')->get();
            $categorias=Categoria::where('id','<',11)->get();
            $categ=count($categorias);
            $wardrobe=Wardrobe::All();
            return view('item.index')->with('items',$items)->with('categ',$categ)->with('categorias',$categorias)->with('wardrobe',$wardrobe)->with('selectCat', $selectCat);            
        }
        if($request['categoria'] === null || $request['categoria'] === "0" ){
            $selectWar=(int)$request['tipo_w'];
            $items=Item::where('user_id','=',1)->where('id','>',10)->where('tipo_w','=',$request['tipo_w'])->orderBy('id','desc')->get();
            $categorias=Categoria::where('id','<',11)->get();
            $categ=count($categorias);
            $wardrobe=Wardrobe::All();
            return view('item.index')->with('items',$items)->with('categ',$categ)->with('categorias',$categorias)->with('wardrobe',$wardrobe)->with('selectWar',$selectWar);                  
        }
        if($request['categoria'] !== null && $request['tipo_w'] !== null){    
            $selectCat=(int)$request['categoria'];
            $selectWar=(int)$request['tipo_w'];
            $items=Item::where('user_id','=',1)->where('id','>',10)->where('tipo_w','=',$request['tipo_w'])->where('categoria_id','=',$request['categoria'])->orderBy('id','desc')->get();
            $categorias=Categoria::where('id','<',11)->get();
            $categ=count($categorias);
            $wardrobe=Wardrobe::All();
            return view('item.index')->with('items',$items)->with('categ',$categ)->with('categorias',$categorias)->with('wardrobe',$wardrobe)->with('selectCat', $selectCat)->with('selectWar',$selectWar);                  
        }    
    }else {    
        // TRAE SOLO LOS ITEMS DEL ADMINISTRADOR - INCORPOARAR FORMULA PARA ASIGNAR UN ADMIN POR 
        $items=Item::where('user_id','=',1)->where('id','>',10)->orderBy('id','desc')->get();
        $categorias=Categoria::where('id','<',11)->get();
        $categ=count($categorias);
        $wardrobe=Wardrobe::All();
        return view('item.index')->with('items',$items)->with('categ',$categ)->with('categorias',$categorias)->with('wardrobe',$wardrobe);
    
    }
    }

    public function show($id) 
    {        
        $item=Item::find($id);
        if($item){
            if($item->user_id === 1){  
                    return view('item.show')->with('item',$item);
                }else
                {
                if(Auth::user()){
                    if(Auth::user()->id === $item->user_id){
                        return view('item.show')->with('item',$item);
                    }
                    return redirect('/item');
                }    
                // return redirect('/item');
            }            
        }
        return redirect('/item');             
    }

// BORRAR ITEM ~ SOLO PUEDE BORRAR EL ITEM QUIEN LO CREO
    public function delete($id)
    {    
    $item = Item::find($id);
    if(Auth::user()->id === $item->user_id){
        $item->delete();

    // CHEQUEARRRRRR

        $outfit=Outfit::All();
        $myOutfit=[];
        foreach($outfit as $out){
            if($out['user_id']=== Auth::user()->id){
                $myOutfit[]=$out;
            }
        }          
        foreach($myOutfit as $key=>$mo){   
           if($mo['t_id'] === (int)$id || $mo['b_id'] === (int)$id || $mo['o_id'] === (int)$id || $mo['ba_id'] === (int)$id || $mo['s_id'] === (int)$id){
    // CHEQUEARRRRRR         
            $mo->delete();              
           }
        }       
    return redirect('/guardarropa'); 
    }else{
    $guardarropas = Guardarropa::all();
        // $encontrado = false;
    foreach($guardarropas as $guarda){          
        if($guarda['user_id'] === Auth::user()->id){              
            $guarda->item()->detach($item['id']);
                // return redirect('/guardarropa');                   
        }
    }
    $outfit=Outfit::All();
        $myOutfit=[];
        foreach($outfit as $out){
            if($out['user_id']=== Auth::user()->id){
                $myOutfit[]=$out;
            }
        }     
        foreach($myOutfit as $key=>$mo){   
           if($mo['t_id'] === (int)$id || $mo['b_id'] === (int)$id || $mo['o_id'] === (int)$id || $mo['ba_id'] === (int)$id || $mo['s_id'] === (int)$id){
            $mo->delete();              
           }
        }        
    return redirect('/guardarropa');     
    }     
    }

// EDITAR ITEM POR EL USUARIO CREADOR DEL ITEM

    public function edit($id)
    {
    $item=Item::find($id);
        $categoria=Categoria::All();
        $cuerpo=Cuerpo::All();
        $forma=Forma::All();
        $color=Color::All();
        $estampado=Estampado::All();
        $largo=Largo::All();
        $wardrobe=Wardrobe::All();
    $mensaje='No estas autorizado a editar este item';

    if($item->user_id === Auth::user()->id){
    return view('item.edit')->with('item',$item)->with('categoria',$categoria)->with('cuerpo',$cuerpo)->with('forma',$forma)->with('color',$color)->with('estampado',$estampado)->with('largo',$largo)->with('wardrobe',$wardrobe);
    } else {dd($mensaje);}
}

public function guardarCambios(Request $request,$id)
{
    // dd($request);
    $item=Item::find($id);

    if($item !== null){
       
        if($request->input('name') !== '') {$item->name = $request->input('name');}
        if($request->input('brand') !== '') {$item->brand = $request->input('brand');}
        if($request->input('categoria') !== 'Select' && $request->input('categoria') !== '') {$item->categoria_id = $request->input('categoria');}
        if($request->input('printed') !== 'Select' && $request->input('printed') !== '') {$item->printed = $request->input('printed');}
        if($request->input('colored') !== 'Select' && $request->input('colored') !== '') {$item->colored = $request->input('colored');}
        if($request->input('form') !== 'Select' && $request->input('form') !== ' ') {$item->form = $request->input('form');}
        if($request->input('length') !== 'Select' && $request->input('length') !== '') {$item->length = $request->input('length');}

        if($request->input('body')) {
            if($request->input('body') !== 'Select' && $request->input('body') !== '')
            {$item->bodyshape = $request->input('body');}
        }
        if($request->input('tipo_w')) {
            if($request->input('tipo_w') !== 'Select' && $request->input('tipo_w') !== '')
            {$item->tipo_w = $request->input('tipo_w');}
        }
        
        if ($request->has('img')) {
            $name = time().$request->file('img')->getClientOriginalName();
            $request->file('img')->move(public_path('/img_item'),$name);
            $path = '/img_item/'.$name;
     
         // ____ CODIGO QUE FUNCIONA _ CAMBIO PARA ADAPTARLO AL SERVER  
            // $path = $request->file('img')->storePublicly('public/img_item');
            // $path = str_replace('public','/storage',$path);
            
            $item->photo = $path;
            }

            $item->save();
            // $item->categoria()->sync($request->input('categoria_id'));        
    }               
   return redirect('/guardarropa');
}


// Usuario: Para armar conjuntos manualmente de cada usuario
    public function seleccionarBag() 
    {   
        $user=Auth::user()->id;
        $guardarropa = Guardarropa::where('user_id','=',$user)->first();
        $miguardarropa = $guardarropa->item;
        $item = [];
        foreach($miguardarropa as $mi){
            if($mi['categoria_id'] === 6){
                $item[]=$mi;
            }
        }              
        $itemJson = json_encode($item);
        return $itemJson;
    }
    
    public function seleccionarOutwear() 
    {   
        $user=Auth::user()->id;
        $guardarropa = Guardarropa::where('user_id','=',$user)->first();
        $miguardarropa = $guardarropa->item;
        $gral=Item::where('id','<',11)->get();
        $item = $gral;
        foreach($miguardarropa as $mi){
            if($mi['categoria_id'] === 4){
                $item[]=$mi;
            }
        }   
        $itemJson = json_encode($item);
        return $itemJson;
    }

    public function seleccionarShoes() 
    {   
        $user=Auth::user()->id;
        $guardarropa = Guardarropa::where('user_id','=',$user)->first();
        $miguardarropa = $guardarropa->item;
        $item = [];
        foreach($miguardarropa as $mi){
            if($mi['categoria_id'] === 7){
                $item[]=$mi;
            }
        }          
        $itemJson = json_encode($item);
        return $itemJson;
    }

    public function seleccionarTop() 
    {   
        $user=Auth::user()->id;
        $guardarropa = Guardarropa::where('user_id','=',$user)->first();
        $miguardarropa = $guardarropa->item;
        $gral=Item::where('id','<',11)->get();
        $item = $gral;
        foreach($miguardarropa as $mi){
            if($mi['categoria_id'] === 1){
                $item[]=$mi;
            }
        }   
        $itemJson = json_encode($item);
        return $itemJson;
    }

    public function seleccionarBottom() 
    {   
        $user=Auth::user()->id;
        $guardarropa = Guardarropa::where('user_id','=',$user)->first();
        $miguardarropa = $guardarropa->item;
        $item = [];
        foreach($miguardarropa as $mi){
            if($mi['categoria_id'] === 2 || $mi['categoria_id'] === 3 || $mi['categoria_id'] === 5){
                $item[]=$mi;
            }
        }   

        $itemJson = json_encode($item);
        return $itemJson;
    }

 // Visitante: Para armar conjuntos manualmente con items wGlam
public function generalBag() 
{   
    $user=1;
    $guardarropa = Guardarropa::where('user_id','=',$user)->first();
    $miguardarropa = $guardarropa->item;
    $item = [];
    foreach($miguardarropa as $mi){
        if($mi['categoria_id'] === 6){
            $item[]=$mi;
        }
    }              
    $itemJson = json_encode($item);
    return $itemJson;
}

public function generalOutwear() 
{   
    $user=1;
    $guardarropa = Guardarropa::where('user_id','=',$user)->first();
    $miguardarropa = $guardarropa->item;
    $item = [];
    foreach($miguardarropa as $mi){
        if($mi['categoria_id'] === 4){
            $item[]=$mi;
        }
    }   
    $itemJson = json_encode($item);
    return $itemJson;
}

public function generalShoes() 
{   
    $user=1;
    $guardarropa = Guardarropa::where('user_id','=',$user)->first();
    $miguardarropa = $guardarropa->item;
    $item = [];
    foreach($miguardarropa as $mi){
        if($mi['categoria_id'] === 7){
            $item[]=$mi;
        }
    }          
    $itemJson = json_encode($item);
    return $itemJson;
}

public function generalTop() 
{   
    $user=1;
    $guardarropa = Guardarropa::where('user_id','=',$user)->first();
    $miguardarropa = $guardarropa->item;
    $item = [];
    foreach($miguardarropa as $mi){
        if($mi['categoria_id'] === 1){
            $item[]=$mi;
        }
    }   
    $itemJson = json_encode($item);
    return $itemJson;
}

public function generalBottom() 
{   
    $user=1;
    $guardarropa = Guardarropa::where('user_id','=',$user)->first();
    $miguardarropa = $guardarropa->item;
    $item = [];
    foreach($miguardarropa as $mi){
        if($mi['categoria_id'] === 2){
            $item[]=$mi;
        }
    }   
    $itemJson = json_encode($item);
    return $itemJson;
}

// PREVIEW - GUARDAR UNA IMG - JS - chequear si funcioona

public function preview(Reques $request){
    dd($request);
    $path = $request->file('img')->storePublicly('public/img_item');
    $path = str_replace('public','/storage',$path);
}

// FILTRAR DATOS NO FUNCIONA
public function filtrar(Request $request){
    // return redirect('/item');
    // $prueba='Hola';
    // dd($prueba);
    dd($request);
}

}
