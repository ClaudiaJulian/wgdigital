@extends('template.basic')
<head>
    <meta property="og:image" content="{{ asset('/wGlam.png') }}" />
</head>      
@section('content')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}

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

    <div class="BannerLooks">
        @if($fit == $a)
            <p style="background-color:red;"> Llegaste a tus {{$a}} Looks! </p>
        @else
            <p> @if($fit > 0) {{ $fit }} @endif Looks de día, noche y trabajo</p>
        @endif
    </div>
</section>

<section class="principal"> 
{{--      FILTRO      --}}
<form method="POST" id="filtro" action="/outfit" name="filtro" class="index" style="text-align: center;" enctype="multipart/form-data">
    @csrf 
    @method("GET") 
    <li>
    <label for="usos"></label>
        <select name="usos" id="usos" class="usos filtro" type="number">
            <option name="all" value="1">todos los momentos</option>         
            <option name="night" value="2" {{ isset($selectUso) && $selectUso === 2 ? 'selected' : ''}}>night</option>  
            <option name="work" value="3" {{ isset($selectUso) && $selectUso === 3 ? 'selected' : ''}}>work</option>  
            <option name="day" value="4" {{ isset($selectUso) && $selectUso === 4 ? 'selected' : ''}}>day</option>                                  
        </select> 
    </li>
    <li>
        <button class="botonFilter" type="submit" name="filtro">Filtrar</button>
    </li>
    <li><a href="/outfit/create" class="botonCrear">Crear Look!</a></li>
</form>     

{{-- Para hacer el SimplePaginate --}}
{{-- @if($x === "on")
    {{ $out->links() }} 
@endif --}}

    <article class="index">        
    @foreach($out as $o)
        <article class="cajaLookCompleto">
        <div class="index">       
            <ul class="cajaOutfit2">    
                <li class="column3"> 
                    <div class="boxtop">
                        @foreach($item as $i)
                            @if($i->id === $o->t_id)                               
                                 <img class="masterTop topFor" src="{{ asset($i->photo) }}" id="" alt="{{$o->t_id}}" >
                            @endif
                        @endforeach
                    </div>
                    <div class="boxacc">
                        @foreach($item as $i)
                            @if($i->id === $o->ba_id) 
                                <img class="masterBag bag" src="{{ asset($i->photo) }}" id="" alt="{{$o->ba_id}}">
                            @endif
                        @endforeach            
                    </div>
                </li>
                <li class="column4">
                    <div class="boxbottom">
                        @foreach($item as $i)
                            @if($i->id === $o->b_id) 
                                <img class="masterBottom bottomFor" src="{{ asset($i->photo) }}" id="" alt="{{$o->b_id}}" >
                            @endif
                        @endforeach            
                    </div>                 
                </li>
                <li class="column5">
                    <div class="boxoutwear">
                        @foreach($item as $i)
                            @if($i->id === $o->o_id) 
                                <img class="masterOutwear outFor" src="{{ asset($i->photo) }}" id="" alt="{{$o->o_id}}">
                            @endif
                        @endforeach
                    </div>
                    <div class="boxshoes">
                        @foreach($item as $i)
                            @if($i->id === $o->s_id)
                                <img class="masterShoes bag" src="{{ asset($i->photo) }}" id="" alt="{{$o->s_id}}">
                            @endif
                        @endforeach               
                    </div>                   
                <!-- <img class="other" src="" alt="Choose OTHER">  -->
                </li>
        
                <div class="nav-foot">
                    @if($o->work === 1) <p> Office Day </p> @endif
                    @if($o->day === 1) <p> WeekEnd </p> @endif
                    @if($o->night === 1) <p> Night Out </p> @endif
                </div>    
            </ul>

            <article class="index">
                <div class="cajaUso cajaOption">
                    <a class="notas" id="{{ $o->id }}">notas</a></button> 
                    {{-- <a target="_blank" href="/outfit/wg/{{$o->id}}">Compartir</a> --}}
                    <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://127.0.0.1:8000/item/58">facebook</a>
                    <a href="outfit/{{$o->id}}/delete">eliminar</a>
                </div>
            </article>
            </div> 
            

            <div class="index space" id="{{ $o->user_id}}" >
                <form method="post" class="cajaUso cajaNota mostrar" id="{{ $o->id }}" style="background-color:white;border-bottom:solid lightgrey 2px;" action="/outfit/nota/{{$o->id}}">                
                    @csrf  
                    <ul class="navUso">
                        <li>Notas de {{Auth::user()->name}}</li>
                        <li>
                            <label for="nota"></label>
                            <textarea type="text" name="nota" class="nota">{{ $o->nota }}</textarea> 
                        </li>
                        <li><button type="submit" class="botonNota"  href="/outfit/nota/{{$o->id}}">guardar</button></li>
                    </ul>
                </form>
            </div>    
        </article>                    
    @endforeach
    </article> 
</section>


<script rel="javascript" type="text/javascript">
window.onload=function(){    
    let myNotes=document.querySelectorAll(".notas");
    if(myNotes){
        myNotes.forEach(el => {
        el.addEventListener('click', mostrarNotas);
        let aux=0;  
        function mostrarNotas(){
            let notaId= el.getAttribute('id');     
            let nota = document.querySelectorAll(".cajaNota");
            if(nota){ 
                nota.forEach(e => {
                    var id=e.getAttribute('id');
                    if(id === notaId){
                        if(aux===0){
                            e.classList.remove('mostrar');
                            aux=1;
                        }else{
                            e.classList.add('mostrar');
                            aux=0;
                        }                        
                    }
                }); // cierre del forEach      
            }                               
        } // cierre funtion mostrarNotas
    }); // cierre del forEach
    } // if
}
</script>  
@endsection