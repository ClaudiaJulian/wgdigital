<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Cuerpo;
use App\Guardarropa;
use App\Outfit;
use App\Item;
use App\Categoria;
use App\Producto;
use Auth;
use App\Abono;
use App\Pack;

class UserController extends Controller
{
    function edit(){
        if(Auth::user()->role !== "off"){
            if(Auth::user()->role === null){
                if(Auth::user()->b_shape === null){
                    $msgFaltaCuerpo="Para recibir sugerencias completá tu Forma de Cuerpo";
                    }else{
                    $msgFaltaCuerpo="OK";}
                
                $user=Auth::user()->id;
                $cuerpo=Cuerpo::All();
                $guarda=Guardarropa::where('user_id','=',$user)->first();
                if($guarda === null){
                    $g=0;
                    }else{
                    $g=count($guarda->item);}

                $outfits=Outfit::where('user_id','=',$user)->get();
                $out=count($outfits);
                $ab=Abono::All();

                return view('user.perfil')->with('cuerpo',$cuerpo)->with('g', $g)->with('out',$out)->with('ab',$ab)->with('msgFaltaCuerpo',$msgFaltaCuerpo);            
                }         
                else {
                if(Auth::user()->role === 'seller'){
                $user=Auth::user()->id;
                $productos=Producto::where('user_id','=',$user)->where('on_off','=','on')->get();
                $categorias=Categoria::all();
                $categ=count($categorias);
                $pk=Pack::All();            

                return view('user.seller')->with('productos',$productos)->with('categ',$categ)->with('categorias',$categorias)->with('pk',$pk);            
                }
                if(Auth::user()->role === 'adm'){
                    if(Auth::user()->b_shape === null){
                        $msgFaltaCuerpo="Para recibir sugerencias completá tu Forma de Cuerpo";
                    }else{
                    $msgFaltaCuerpo="OK";}
                    $user=Auth::user()->id;
                    $cuerpo=Cuerpo::All();
                    $guarda=Guardarropa::where('user_id','=',$user)->first();
                    $g=count($guarda->item);
                    $outfits=Outfit::where('user_id','=',$user)->get();
                    $out=count($outfits);
                    $ab=Abono::All();
    
                    return view('user.perfil')->with('cuerpo',$cuerpo)->with('g', $g)->with('out',$out)->with('ab',$ab)->with('msgFaltaCuerpo',$msgFaltaCuerpo);
                }
                }
        }
            $msgOff="Tu cuenta está inactiva, envianos un mail al info@wglam.com";
            return view ('welcome')->with('msgOff',$msgOff);                           
    }

    public function guardarCambios(Request $request, $id){
       
        $user=User::find($id);

        if ($user !== null){

        if($request->input('name')){$user->name = $request->input('name');}
        if($request->input('email')){ $user->email = $request->input('email');}
            if($request->input('password')){$user->password = Hash::make($request->input('password'));}
                if($request->input('body')){$user->b_shape = $request->input('body');}
        $user->save();
        
        return redirect('/guardarropa');
                
        } else {
            return "no se ha encontrado el usuario solicitado";
        }
    }

    public function index(){
        $users=User::All();
        return view('roles.index')->with('users',$users);
    }

    public function guardarRoles(Request $request){  
        // dd($request); 
        $mensajes = [
            'required' => "El :attribute es obligatorio."
        ];
        $validaciones = [
            'seller' => 'required_without_all:adm,off',
            'adm' => 'required_without_all:seller,off',
            'off' => 'required_without_all:seller,adm'     
           ];

        $this->validate($request,$validaciones,$mensajes);    

        if($request->seller){ 
        $user=User::find((int)$request->seller);
        $user->role = 'seller';
        }
        if($request->adm){
        $user=User::find((int)$request->adm);
        $user->role = 'adm';
        }
        if($request->off){
            $user=User::find((int)$request->off);
            $user->role = 'off';
            }
        $user->save();
        return redirect('/adm/user');
    }

    public function cambioRoles(Request $request, $id){  
        $user=User::find((int)$id);
        if($user){            
            $user->role = $request->role;
            $user->save();
            return redirect('/adm/user');             
        }
        return redirect('/adm/user');        
    }

}
