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
        @if($errors->all())<li> Completá todos los datos antes de grabar.</li> @endif   
    </ul> 

<article style="margin-top:20px;">
    <h1>Abonos</h1>
    <table class="index">
        <tr style="background-color:lightblue;">                
            <th style="font-size:0.8em;">Id</th>
            <th style="font-size:0.8em;">Nombre</th>
            <th style="font-size:0.8em;">Estrellas</th>
            <th style="font-size:0.8em;">Guardarropa</th>
            <th style="font-size:0.8em;">Capacidad</th>
            <th style="font-size:0.8em;">Outfit</th>
            {{-- <th style="font-size:0.8em;">Item/Out</th> --}}
            <th style="font-size:0.8em;">p_mes</th>
            <th style="font-size:0.8em;">p_sem</th>
            <th style="font-size:0.8em;">p_anual</th>
            <th style="font-size:0.8em;">Consultas</th>
            <th style="font-size:0.8em;">Modificar</th>
        </tr>

        @foreach($abonos as $ab)       
        <form method="POST" id="cambiarAb" action="/abono/{{$ab['id']}}/edit" name="cambiarAb" style="text-align: center;" enctype="multipart/form-data"> 
            @csrf
            @method('put') 
            <tr style="background-color:azure;">            
                <td >{{$ab['id']}} </td>
                <td >
                    <label for="nombre"></label>
                    <input type="text" name="nombre" style="width:70px;" value={{$ab['nombre']}}> 
                </td> 
                <td>
                    <label for="estrellas"></label>
                    <input type="number" name="estrellas" style="width:70px;" value={{$ab['estrellas']}}> 
                </td> 
                <td>
                    <label for="guardarropa"></label>  
                    <input type="number" name="guardarropa" style="width:70px;" value={{$ab['guardarropa']}}> 
                </td>
                <td>
                    <label for="capacidad"></label>    
                    <input type="number" name="capacidad" style="width:70px;" value={{$ab['capacidad']}}> 
                </td> 
                <td>
                    <label for="outfit"></label>      
                    <input type="number" name="outfit" style="width:70px;" value={{$ab['outfit']}}> 
                </td>
                {{-- <td>
                    <label for="itemOutfit"></label>        
                    <input type="number" name="itemOutfit" style="width:70px;" value={{$ab['itemOutfit']}}> 
                </td> --}}
                <td>
                    <label for="p_mes"></label>
                    <input type="number" name="p_mes" style="width:70px;" value={{$ab['p_mes']}}> 
                </td> 
                <td>
                    <label for="p_sem"></label>
                    <input type="number" name="p_sem" style="width:70px;" value={{$ab['p_sem']}}> 
                </td> 
                <td>
                    <label for="p_anual"></label>  
                    <input type="number" name="p_anual" style="width:70px;" value={{$ab['p_anual']}}> 
                </td>                  
                <td>
                    <label for="consultas"></label>          
                    <input type="number" name="consultas" style="width:70px;" value={{$ab['consultas']}}> 
                </td> 
                <td>
                    <button type="submit" style="width:70px;">Actualizar</button>
                    <a class="links" href="/abono/{{ $ab->id }}/delete"  style="color:green;margin:5px;font-size:0.8em;width:70px;">Eliminar</a>
                </td> 
            </tr>       
        </form>    
        @endforeach

</table>        
        {{-- @foreach($abonos as $ab)       
        <form method="POST" id="cambiarAb" action="/abono/{{$ab['id']}}/edit" name="cambiarAb" style="text-align: center;" enctype="multipart/form-data"> 
            @csrf
            @method('put') 
            <ul class="index" style="border-bottom:solid white 2px;margin:5px;"> 
                <li class="">{{$ab['id']}} </li>   
                <li class="">
                    <label for="nombre"></label>
                    <input type="text" name="nombre" value={{$ab['nombre']}}> 
                </li> 
                <li class="">
                    <label for="estrellas"></label>
                    <input type="number" name="estrellas" value={{$ab['estrellas']}}> 
                </li> 
                <li class="" style="color:red;">
                    <label for="p_mes"></label>
                    <input type="number" name="p_mes" value={{$ab['p_mes']}}> 
                </li> 
                <li class="">
                    <label for="p_sem"></label>
                    <input type="number" name="p_sem" value={{$ab['p_sem']}}> 
                </li> 
                <li class="">
                    <label for="p_anual"></label>  
                    <input type="number" name="p_anual" value={{$ab['p_anual']}}> 
                </li> 
                <li class="">
                    <label for="guardarropa"></label>  
                    <input type="number" name="guardarropa" value={{$ab['guardarropa']}}> 
                </li> 
                <li class="">
                    <label for="capacidad"></label>    
                    <input type="number" name="capacidad" value={{$ab['capacidad']}}> 
                </li> 
                <li class="">
                    <label for="outfit"></label>      
                    <input type="number" name="outfit" value={{$ab['outfit']}}> 
                </li> 
                <li class="">
                    <label for="itemOutfit"></label>        
                    <input type="number" name="itemOutfit" value={{$ab['itemOutfit']}}> 
                </li> 
                <li class="">
                    <label for="consultas"></label>          
                    <input type="number" name="consultas" value={{$ab['consultas']}}> 
                </li> 
                <button type="submit" class="botonGral">Actualizar</button>
                <li><a class="links" href="/abono/{{ $ab->id }}/delete"  style="color:green;margin:5px;font-size:0.8em;">Eliminar</a></li>        
            </ul>
        </form>    
        @endforeach --}}
        
    <h1>Crear un Nuevo Abono</h1>    
        <div style="margin:5px;background-color:white;">
            <form method="POST" id="nuevoAb" action="/abono/create" name="nuevoAb" style="text-align: center;" enctype="multipart/form-data"> 
                @csrf
                @method('put') 
                    <ul class="indColumn">
                        <div>
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" value="">
                        </div>
                        <div>
                            <label for="estrellas">Estrellas</label>
                            <input type="number" name="estrellas" value="">
                        </div>
                        <div>
                            <label for="p_mes">Precio Mes</label>
                            <input type="number" name="p_mes" value="">
                        </div>
                        <div>
                            <label for="p_sem">Precio Semestre</label>
                            <input type="number" name="p_sem" value="">
                        </div>
                        <div>
                            <label for="p_anual">Precio Anual</label>
                            <input type="number" name="p_anual" value="">
                        </div>
                        <div>
                            <label for="guardarropa">Guardarropa</label>
                            <input type="number" name="guardarropa" value="">
                        </div>
                        <div>
                            <label for="capacidad">Capacidad de Items</label>
                            <input type="number" name="capacidad" value="">
                        </div>
                        <div>
                            <label for="outfit">Cantidad de Outfits</label>
                            <input type="number" name="outfit" value="">
                        </div>
                        {{-- <div>
                            <label for="itemOutfit">Items / Outfit</label>
                            <input type="number" name="itemOutfit" value="">
                        </div> --}}
                        <div>
                            <label for="consultas">Consultas</label>
                            <input type="number" name="consultas" value="">
                        </div>
                            
                            <button type="submit" class="botonGral">Grabar Nuevo Abono</button>
                    </ul>    
            </form>    
        </div>                  
    </article> 

    
    </section>


@endsection