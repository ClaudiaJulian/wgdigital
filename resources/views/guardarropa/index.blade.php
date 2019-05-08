@extends('template.basic')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<section class="white">    
    <div class="">
        <ul class="nav-menu">                                   
            <li><a href="/item">Home</a></li>         
            <li><a href="/guardarropa">Mi Guardarropa</a></li>                
            <li><a href="/outfit">Mis Looks</a></li>            
            <li><a href="/producto/shop">Shop</a></li>
            <li><a href="/guardarropa">Ayuda</a></li>                    
        </ul>  
     </div>
    {{--  Controla mensaje del Banner según cantidad de Items ($it) y capacidad s/Abono ($a) --}}
    <div class="BannerWardrobe">
        @if(isset($it) && isset($a)))
             @if($it === $a)
                <p style="background-color:red;"> Llegaste a tus {{$a}} Items! </p>
            @else
                <p> Tus @if($it > 0) {{ $it }} @endif Items para todos tus Looks.</p>
            @endif
        @endif
        @if(!isset($it) && isset($a)))        
            <p> Subí nuestros items ó tus propias fotos.</p>
        @endif
        @if(isset($seller)) <p style="background-color:red;"> {{$seller}}  </p> @endif
    </div> 
</section>

<section class="principal">        
    <article class="margin10">
        <ul class="index">
            <li class="">
                <a class="botonNuevo" href="item/create"> + Nuevo</a>
            </li>
            @if(isset($guardarropa))         
            <form method="POST" id="filtro" action="/guardarropa" name="filtro" class="index" style="text-align: center;" enctype="multipart/form-data">
                @csrf 
                @method("GET") 
                @if(isset($mensaje))             
                    <p> {{$mensaje}} </p>
                @endif
                    <li class="">
                    <label for="categoria"></label>
                    <select name="categoria" id="mySelect" class="categoria filtro" type="number">
                            <option disabled selected>items<option>
                            <option value="0" {{ isset($selectCat) && $selectCat==="0" ? 'selected' : ''}}>todos</option>
                            @foreach($categorias as $cat)       
                                <option value={{ $cat['id'] }} {{ isset($selectCat) && $selectCat===$cat['id'] ? 'selected' : ''}}>{{ $cat['name'] }}</option>
                            @endforeach
                    </select>
                    </li>                    
                    <li>
                        <button class="botonFilter" typy="submit" name="filtro">Filtrar</button>
                    </li>
            </form>
            <li><a href="/outfit/create" class="botonCrear">Crear Look!</a></li>            
        </ul>

        <div>
            @if(isset($mensaje))
                    <p> {{$mensaje}} </p>
            @endif
        </div>        
    </article>    
    <article>    
        <ul class="index">

        @if(isset($selectCat) && $selectCat !== "0")
            @foreach($guardarropa->item as $i) 
                @if($i->categoria_id === $selectCat)       
                    <li> 
                        <div class="index cajaIndex"> 
                            <a class="cajaImgIndex" href="item/{{ $i->id }}">
                            <img class="imgIndex" src="{{ asset($i->photo) }}" alt="Icono de {{ $i->name }} ">        
                            </a>

                            <div class="index optIndex">
                                <a class="links" href="/item/{{$i->id}}/delete"><i class="far fa-trash-alt"></i></a>
                                <a class="links" href="item/{{ $i->id }}"> Info </a>
                                <!-- MEJORAR QUE EL 5 ESTE MANEJADO DESDE PANTALLA DEL ADMINISTRADOR --> 
                                @if($i['categoria_id'] < 5) 
                                    <a class="links" href="outfit/{{ $i->id }}"> Looks </a>   
                                @endif
                            </div>
                        </div>
                    </li>
                @endif
            @endforeach
        @else

        @for($c=1 ; $c<($categ+1) ; $c++)                    
            @foreach($guardarropa->item as $i) 
                @if($i->categoria_id === $c)       
                    <li> 
                        <div class="cajaIndex"> 
                            <a class="cajaImgIndex" href="item/{{ $i->id }}">
                                <img class="imgIndex" src="{{ asset($i->photo) }}" alt="Icono de {{ $i->name }} ">        
                            </a>
    
                            <div class="index optIndex">
                                <a class="links" href="/item/{{$i->id}}/delete"> <i class="far fa-trash-alt"></i> </a>
                                <a class="links" href="item/{{ $i->id }}"> Info </a>
                                <!-- MEJORAR QUE EL 5 ESTE MANEJADO DESDE PANTALLA DEL ADMINISTRADOR --> 
                                @if($i['categoria_id'] < 5) 
                                    <a class="links" href="outfit/{{ $i->id }}"> Looks </a>   
                                @endif
                            </div>
                        </div>
                    </li>
                @endif
            @endforeach
        @endfor
        
        @endif
        </ul>          
    </article> 
    @endif
   
</section>

<script rel="javascript" type="text/javascript" src="../js/wglam.js"></script> 
@endsection