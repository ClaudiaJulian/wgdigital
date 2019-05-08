@extends('template.basic')
@section('content')


{{-- NAVEGADOR     --}}
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

{{-- BANNER     --}}
    <div class="BannerPerfil">
        <li class="shopTx">Que matchee con vos y tu guardarropa</li>
    </div>
</section>

<ul class="errors">
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>    
    @endforeach
</ul>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<section class="principal">    
        <section class="" style="padding-top:20px;padding-bottom:20px;">
        <div class="index">
            <li class="">
                <form>
                    <label></label>
                        <select name="tipo_w" id="tipo_w" class="tipo_w filtro" type="number">
                            <option selected disabled>Guardarropa</option>
                            @foreach($wardrobe as $w)       
                            <option value={{ $w['id'] }}>{{ $w['nombre'] }}</option>                            
                            @endforeach
                        </select>                    
                </form>
            </li>
            <li class="">
                <form>
                    <label></label>
                        <select name="categoria" id="mySelect" class="categoria filtro" type="number">
                            <option selected disabled>categoria</option>
                                @foreach($categorias as $cat)       
                                    <option value={{ $cat['id'] }}>{{ $cat['name'] }}</option>
                                @endforeach
                        </select>                    
                </form>
            </li>
            <li class="">
                <form>
                    <label></label>
                        <select name="corte" id="mySelect" class="corte filtro" type="number">
                            <option selected disabled>corte</option>
                                @foreach($forma as $f)       
                                    <option value={{ $f['id'] }}>{{ $f['nombre'] }}</option>
                                @endforeach
                        </select>                    
                </form>
            </li>
        </div>
{{-- <div class="prueba">
<p>prueba</p>
</div> --}}
        <div class="">   
                <ul class="index">
                    @foreach($productos as $pro)                        
                            @if(in_array($pro->user_id,$arrayOff))
                            @else
                            <li >
                            
                            <div class="cajaIndex">
                                
                                @if($pro->categoria_id < 11)
                                    @if(isset($love))
                                        <a ><i class="far fa-heart"></i> <i class="fas fa-heart"></i></a> 
                                    @else
                                    <div class="love index" id={{$pro->id}}>
                                        <p class="texto" style="color:white;font-size:0.8em;margin:0px;padding-right:5px;" id={{$pro->id}}>subilo a tu guardarropa</p>       
                                        <a href="/producto/subir_produc/{{$pro->id}}"><i class="far fa-heart"></i></a> 
                                    </div>
                                    @endif
                                @endif
                            
                                <a class="cajaImgIndex"  href="/producto/shop/{{ $pro->id }}">
                                    <img class="imgIndex" src="{{ asset($pro->photo) }}" alt="Icono de {{ $pro->name }} ">                                        
                                </a>
                            
                                <div class="index optIndex" >
                                    <a class="links" > {{$pro->brand}} </a>
                                    <a class="links" > $ {{$pro->precio}} </a>
                                    <a class="links"  href="/producto/shop/{{$pro->id}}"> <i class="fas fa-shopping-bag"></i> </a>
                                </div>
                            </div>
                            </li>
                            @endif                    
                    @endforeach
                </ul>          
        </div>         
        </section>    
        
    </section>
    <script rel="javascript" type="text/javascript" src="../js/wglam.js"></script> 
@endsection