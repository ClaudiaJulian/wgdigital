<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guardarropa;
use App\Item;
use App\Categoria;
use App\Abono;
use Auth;

class GuardarropaController extends Controller
{
    public function index(Request $request){
        if(Auth::user() !== null){
        if(Auth::user()->role !== "off"){        
            $user=Auth::user()->id;
            if( Auth::user()->role !== 'seller'){    

            if($request['categoria']){
                $selectCat=(int)$request['categoria'];
                $guardarropa = Guardarropa::where('user_id','=',$user)->first();
                $categorias=Categoria::where('id','<',10)->get();
                $categ=count($categorias);

                $it=count($guardarropa->item);
                $abono = Abono::where('id','=', Auth::user()->abono)->first();
                $a = $abono->capacidad;

                if($guardarropa !== null){
                    return view('guardarropa.index')->with('guardarropa',$guardarropa)->with('categ',$categ)->with('categorias',$categorias)->with('selectCat',$selectCat)->with('it',$it)->with('a',$a);
                }
                return \Redirect::to('/item');
            } 
            else {  
                $guardarropa = Guardarropa::where('user_id','=',$user)->first();
                if($guardarropa !== null) {
                    $categorias=Categoria::where('id','<',11)->get();
                    $categ=count($categorias);
        
                    $it=count($guardarropa->item);
                    $abono = Abono::where('id','=', Auth::user()->abono)->first();
                    $a = $abono->capacidad;            
                    
                        return view('guardarropa.index')->with('guardarropa',$guardarropa)->with('categ',$categ)->with('categorias',$categorias)->with('it',$it)->with('a',$a);
                    }else{
                        $categorias=Categoria::where('id','<',10)->get();
                        $categ=count($categorias);
                        $abono = Abono::where('id','=', Auth::user()->abono)->first();
                        $a = $abono->capacidad;          
                        return view('guardarropa.index')->with('categ',$categ)->with('categorias',$categorias)->with('a',$a);                        
                    }
            }}
            else{
                // SELLER
                $categorias=Categoria::where('id','<',10)->get();
                $categ=count($categorias);
                $seller="Espacio exclusivo para Usuarios";
                return view('guardarropa.index')->with('categ',$categ)->with('categorias',$categorias)->with('seller',$seller);
            }     
        } // CIERRE IF Auth !== off
        
        $msgOff="Tu cuenta está inactiva, envianos un mail al info@wglam.com";
        return view ('welcome')->with('msgOff',$msgOff);  
    }
    return view('auth.login');
}
         
    public function add(int $id){
        if(Auth::user() !== null){
            $user_id = Auth::user()->id;
            $item = Item::find($id);
            $guardarropas = Guardarropa::all();
            // var_dump($item['nombre']);

            $encontrado = false;
            foreach($guardarropas as $guarda){
                
                if($guarda['user_id'] === $user_id){
                    
                    $encontrado = true;
                    // pregunta cuántos items tiene y el límite permitido
                    // si tiene permitido más items  sincroniza sino alert
                    
                    // sincronizar _ armar las relaciones;
                    $guarda->item()->attach($item['id']);

                    return \Redirect::to('/item');                    
                }
            }  
            if($encontrado === false){
                $agregar = Guardarropa::create([
                'user_id' => $user_id,
                ]);
                //y sincronizar _ armar las relaciones; 
                $agregar->item()->sync($item['id']);

                return \Redirect::to('/item');
            }
        }
        return view('auth.login');
    }

// BAJAR UN ITEM CREADO POR EL ADMIN    
// public function delete(int $id){
//     dd($id);
// }


}
