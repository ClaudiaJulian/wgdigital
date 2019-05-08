@extends('template.basic')

@section('content')


<section class="white">
        <ul class="nav-menu">          
            <li><a href="/item/create"> Item </a></li>    
            <li><a href="/categoria">Categorías</a></li>
            <li><a href="/formula">Formulas</a></li>
            <li><a href="/abono">Abonos</a></li>
            <li><a href="/adm/user">Roles</a></li>
            <li><a href="/categoria">Mensajes</a></li>
            <li><a href="/categoria">Gestion</a></li>      
        </ul>
    </section> 

<section class="principal">        

    <ul class="errors">
        @if($errors->all())<li> Te falta elegir un mail.</li> @endif        
    </ul> 

    <article class="index">
        <p class="" style="margin:0px 20px;"> 1. Crear Usuario</p><p class="" style="margin:0px 20px;">2. Cambiar Rol</p>
    </article>   

    <article style="margin-top:20px;">
        <h1>Administradores</h1>
        @foreach($users as $adm)       
            @if($adm->role === "adm") 
            <ul class="index" style="border-bottom:solid white 2px;margin:5px;"> 
                <li class="">  <h3> {{$adm['id']}} </h3>  </li>   
                <li class="">  <h4> {{$adm['name']}} </h4> </li> 
                <li class="">  <h4> {{$adm['email']}} </h4> </li> 
                <li><form method="POST" id="cambioRol" action="/adm/user/change/{{$adm['id']}}" name="cambioRol" style="text-align: center;" enctype="multipart/form-data"> 
                    @csrf
                    @method('put') 
                        <label for="role"></label>
                        <select name="role" id="role" class="role" type="text">
                            <option value="adm" {{ $adm['role'] === 'adm'?'selected':''}}> Administrador</option>
                            <option value="seller" {{ $adm['role'] === 'seller'?'selected':''}}> Seller </option>
                            <option value="null" {{ $adm['role'] === 'null'?'selected':''}}> Usuario </option>
                            <option value="off" {{ $adm['role'] === 'off'?'selected':''}}> Inactivo </option>
                        </select>                        
                        <button type="submit" class="">Cambiar</button>
                    </form>                             
                </li>
            </ul>
            @endif         
        @endforeach
    
        <div style="width:200px;margin:5px;background-color:white;">
                    <form method="POST" id="rolUser" action="" name="rolUser" style="text-align: center;" enctype="multipart/form-data"> 
                        @csrf
                        @method('put') 
                            <label for="adm"></label>
                            <select name="adm" id="adm" class="adm" type="number">
                                <option selected disabled> Seleccionar Mail</option>
                                @foreach($users as $us)
                                    <option value={{ $us['id'] }} {{ $us['role'] === 'adm' || $us['role'] === 'seller' || $us['role'] === 'off' ?'disabled':''}}>{{$us->email}}</option>
                                @endforeach
                            </select>                            
                            <button type="submit" class="botonGral">Grabar Administrador</button>
                    </form>    
        </div>                  
    </article> 

    <article style="margin-top:20px;">
            <h1>Sellers</h1>
            @foreach($users as $seller)       
                @if($seller->role === "seller") 
                <ul class="index" style="border-bottom:solid white 2px;margin:5px;"> 
                    <li class="">  <h3> {{$seller['id']}} </h3>  </li>   
                    <li class="">  <h4> {{$seller['name']}} </h4> </li> 
                    <li class="">  <h4> {{$seller['email']}} </h4> </li> 
                    <li><form method="POST" id="cambioRol" action="/adm/user/change/{{$seller['id']}}" name="cambioRol" style="text-align: center;" enctype="multipart/form-data"> 
                        @csrf
                        @method('put') 
                            <label for="role"></label>
                            <select name="role" id="role" class="role" type="text">
                                <option value="adm" {{ $seller['role'] === 'adm'?'selected':''}}> Administrador</option>
                                <option value="seller" {{ $seller['role'] === 'seller'?'selected':''}}> Seller </option>
                                <option value="null" {{ $seller['role'] === 'null'?'selected':''}}> Usuario </option>
                                <option value="off" {{ $seller['role'] === 'off'?'selected':''}}> Inactivo </option>
                            </select>                        
                            <button type="submit" class="">Cambiar</button>
                        </form>                             
                    </li> 
                </ul>
                @endif         
            @endforeach
        
            <div style="width:200px;margin:5px;background-color:white;">
                    <form method="POST" id="rolUser" action="" name="rolUser" style="text-align: center;" enctype="multipart/form-data"> 
                    @csrf
                    @method('put') 
                        <label for="seller"></label>
                        <select name="seller" id="seller" class="seller" type="number">
                            <option selected disabled> Seleccionar Mail</option>
                            @foreach($users as $us)
                                <option value={{ $us['id'] }} {{ $us['role'] === 'seller' || $us['role'] === 'adm' || $us['role'] === 'off'?'disabled':''}}>{{$us->email}}</option>
                            @endforeach
                        </select>                        
                        <button type="submit" class="botonGral">Grabar Seller</button>
                    </form>     
            </div>                  
        </article> 
        <article style="margin-top:20px;">
                <h1>Inactivos</h1>
                @foreach($users as $us)       
                    @if($us->role === "off") 
                    <ul class="index" style="border-bottom:solid white 2px;margin:5px;"> 
                        <li class="">  <h3> {{$us['id']}} </h3>  </li>   
                        <li class="">  <h4> {{$us['name']}} </h4> </li> 
                        <li class="">  <h4> {{$us['email']}} </h4> </li> 
                        <li><form method="POST" id="cambioRol" action="/adm/user/change/{{$us['id']}}" name="cambioRol" style="text-align: center;" enctype="multipart/form-data"> 
                            @csrf
                            @method('put') 
                                <label for="role"></label>
                                <select name="role" id="role" class="role" type="text">
                                    <option value="adm" {{ $us['role'] === 'adm'?'selected':''}}> Administrador</option>
                                    <option value="seller" {{ $us['role'] === 'seller'?'selected':''}}> Seller </option>
                                    <option value="null" {{ $us['role'] === 'null'?'selected':''}}> Usuario </option>
                                    <option value="off" {{ $us['role'] === 'off'?'selected':''}}> Inactivo </option>
                                </select>                        
                                <button type="submit" class="">Cambiar</button>
                            </form>                             
                        </li>
                    </ul>
                    @endif         
                @endforeach
            
                <div style="width:200px;margin:5px;background-color:white;">
                            <form method="POST" id="rolUser" action="" name="rolUser" style="text-align: center;" enctype="multipart/form-data"> 
                                @csrf
                                @method('put') 
                                    <label for="off"></label>
                                    <select name="off" id="off" class="off" type="number">
                                        <option selected disabled> Seleccionar Mail</option>
                                        @foreach($users as $us)
                                            <option value={{ $us['id'] }} {{ $us['role'] === 'off'?'disabled':''}}>{{$us->email}}</option>
                                        @endforeach
                                    </select>                            
                                    <button type="submit" class="botonGral">Grabar Inactivo</button>
                            </form>    
                </div>                  
            </article>    

    </section>



@endsection