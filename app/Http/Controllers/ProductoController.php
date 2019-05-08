<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Forma;
use App\Color;
use App\Estampado;
use App\Largo;
use App\Outfit;
use App\Categoria;
use App\Producto;
use App\Cuerpo;
use App\Wardrobe;
use App\User;
use App\Item;
use App\Guardarropa;
use App\Abono;
use Auth;

class ProductoController extends Controller
{
    public function create(){

        if(Auth::user() !== null){
            $user=Auth::user()->id;
            $productos=Producto::where('user_id','=',$user)->where('on_off','=','on')->get();
            $cantidad=count($productos);
            // INCORPORAR EL PACK REAL        
            if(count($productos) < 10) {   

            $categoria=Categoria::All();
            $cuerpo=Cuerpo::All();
            $forma=Forma::All();
            $color=Color::All();
            $estampado=Estampado::All();
            $largo=Largo::All();
            $wardrobe=Wardrobe::All();

            return view('producto.create')->with('categoria',$categoria)->with('cuerpo',$cuerpo)->with('forma',$forma)->with('color',$color)->with('estampado',$estampado)->with('largo',$largo)->with('wardrobe',$wardrobe);
            } else {
            // dd($cantidad);
            $limite="Llegaste al límite de tu Pack.";
            return view('user.seller')->with('productos',$productos)->with('limite',$limite);
            }
        }
        return view('auth.login');
    }

    public function guardar(Request $request)
    {
        $mensajes = [
           'required' => "El :attribute es obligatorio."
       ];
       if($request['categoria'] > "10"){
        $validaciones = [
            'name' => 'required',
            'categoria' => 'required',
            'img' => 'required',
            'precio' => 'required',
            'descuento' => 'required',
            'on_off' => 'required',
            'descrip' => 'required'      
           ];
       }else{
       if($request['categoria'] > "5" && $request['categoria'] < "10"){
        $validaciones = [
        'name' => 'required',
        'categoria' => 'required',
        'printed' => 'required',
        'colored' => 'required',
        'img' => 'required',
        'precio' => 'required',
        'descuento' => 'required',
        'tipo_w' => 'required',
        'on_off' => 'required',
        'descrip' => 'required'      
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
        'precio' => 'required',
        'descuento' => 'required',
        'tipo_w' => 'required',
        'on_off' => 'required',
        'descrip' => 'required'              
       ];
    }
}

       $this->validate($request,$validaciones,$mensajes); 

       $name = time().$request->file('img')->getClientOriginalName();
       $request->file('img')->move(public_path('/img_producto'),$name);
       $path = '/img_producto/'.$name;

    //    FUNCIONA _ Cambio de código debido a que en el servidor WebMin no funciona el storage:link
    //    $path = $request->file('img')->storePublicly('public/img_producto');
    //    $path = str_replace('public','/storage',$path);
       
       $user = Auth::user()->id;
       $producto = Producto::create([        
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
           'photo' => $path,
           'precio' => $request->input('precio'),
           'descuento' => $request->input('descuento'),
           'qReservas' => $request->input('qReservas'),
           'on_off' => $request->input('on_off'),
           'descrip' => $request->input('descrip')

       ]);

       return redirect('/perfil/$user/edit');
    }

// ALIMENTA AL SHOP DE LOS PRODUCTOS ONLINE - LO PUEDEN VER TODOS
    public function index(){
    $userOff=User::where('role','=','off')->get(); 
    $arrayOff=[];
    foreach($userOff as $us){
        $arrayOff[]=$us->id;
    }
    // $productos=Producto::where('user_id','!=',)->where('on_off','=','on')->get();    
    $productos=Producto::where('on_off','=','on')->get();
        $categorias=Categoria::all();
        $categ=count($categorias);
        $forma=Forma::All();
        $wardrobe=Wardrobe::All();
        return view('producto.shop')->with('productos',$productos)->with('categ',$categ)->with('categorias',$categorias)->with('forma',$forma)->with('wardrobe',$wardrobe)->with('arrayOff',$arrayOff);
}

// MUESTRA EL PRODUCTO A USUARIOS, SELLERS Y VISITANTES
public function show($id) 
{            
    $produc=Producto::find($id);
    // dd($produc);
    if($produc){
        return view('producto.show')->with('produc',$produc);
        }                
    return redirect('/item');             
}

public function upload($id){
// FALTA CHEQUEAR SI TIENE GUARDA Y SI NO HAY QUE CREARLO!!
    if(Auth::user() !== null){
        $user = Auth::user()->id;
        $guarda=Guardarropa::where('user_id','=',$user)->first();
        if($guarda === null){
            $guarda=Guardarropa::create([
                'user_id' => $user,
                ]);
        }

        $g=count($guarda->item);
        $abono = Abono::where('id','=', Auth::user()->abono)->first();
        $a = $abono->capacidad;        
        if($g < $a){
            $produc=Producto::find($id);
            $user = Auth::user()->id;
            $item = Item::create([        
                'user_id' => $user,
                'name' => $produc['name'],
                'brand' => $produc['brand'],
                'categoria_id' => $produc['categoria_id'],
                'printed' => $produc['printed'],
                'colored' => $produc['colored'],           
                'photo' => $produc['photo'],
                'form' => $produc['form'],
                'length' => $produc['length'],
                'bodyshape' => $produc['bodyshape'],
                'tipo_w' => $produc['tipo_w']
       ]);
     // SINCRONIZAR CON EL GUARDARROPA;
       $guardarropas = Guardarropa::all();
        $encontrado = false;
        foreach($guardarropas as $guarda){       
            if($guarda['user_id'] === $user){
                $encontrado = true;
                $guarda->item()->attach($item['id']);
            }    
        }    
       return redirect('/guardarropa');
        } // CIERRE IF < A    
    } 
    else{
    return view('auth.login');}
} // CIERRE DE UPLOAD

public function guardarOnoff($id){
    $user=Auth::user()->id;
    $producto=Producto::find($id);
    $estado=$producto->on_off;
    if($estado === "on"){
        $producto->on_off = "off";
        $producto->save();
    }else{
        $producto->on_off = "on";
        $producto->save();
    }
    return redirect('/perfil/'.$user.'/edit');
}

} // CIERRE DE CLASS
