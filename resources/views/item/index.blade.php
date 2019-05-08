@extends('template.basic')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<section class="white">
    <div class="">
        <ul class="nav-menu">                                   
            <li><a href="/outfit/mastercreate">Try!</a></li>         
            <li><a href="/guardarropa">Mi Guardarropa</a></li>                
            <li><a href="/outfit">Mis Looks</a></li>            
            <li><a href="/producto/shop">Shop</a></li>
            <li><a href="/guardarropa">Ayuda</a></li>                    
        </ul>  
    </div>
        
    <div class="BannerItem">
        <p>Subí nuestros items ó tus propias fotos</p>        
    </div>
</section>

<section class="principal">
    <div class="index">        
            <form method="POST" id="filtro" action="/item" name="filtro" class="index" style="text-align: center;" enctype="multipart/form-data">
                @csrf 
                @method("GET") 
                <li class="">
                    <label for="tipo_w"></label>
                    <select name="tipo_w" id="tipo_w" class="tipo_w filtro" type="number">
                        <option disabled selected>guardarropa<option>
                        <option value="0" {{ isset($selectWar) && $selectWar==="0" ? 'selected' : ''}}>todos</option>
                            @foreach($wardrobe as $w)       
                            <option value={{ $w['id'] }} {{ isset($selectWar) && $selectWar===$w['id'] ? 'selected' : ''}}>{{ $w['nombre'] }}</option>                            
                            @endforeach
                    </select>  
                </li>
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
                <button class="botonFilter" type="submit" name="filtro">Filtrar</button>
                </li>
            </form>
    </div>
    <div class="margin10">       
        <ul class="index">
        @for($c=1 ; $c<$categ ; $c++)              
            @foreach($items as $item)
                @if($item->categoria_id === $c)
                <li >  
                    <div class="cajaIndex">
                        <a class="cajaImgIndex" href="item/{{ $item->id }}">
                            <img class="imgIndex" src="{{ asset($item->photo) }}" alt="Icono de {{ $item->name }} "> 
                        </a>
                        <div class="index optIndex">
                            <a class="links" href="/guardarropa/add/{{$item->id}}"> Subir </a>
                            <a class="links" href="item/{{ $item->id }}"> Info </a>
                        </div>
                    </div>
                </li>
            @endif
        @endforeach
        @endfor
        </ul>          
    </div> 
   
</section>

<script rel="javascript" type="text/javascript" src="../js/wglam.js"></script> 
@endsection