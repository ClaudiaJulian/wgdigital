@extends('template.basic')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     
    <section>
        <div class="white">
            <ul class="nav-menu">                                   
                <li><a href="/item">Home</a></li>         
                <li><a href="/guardarropa">Mi Guardarropa</a></li>                
                <li><a href="/outfit">Mis Looks</a></li>            
                <li><a href="/producto/shop">Shop</a></li>
                <li><a href="/guardarropa">Ayuda</a></li>                    
            </ul>  
        </div>
    </section>    
    <section class="principal">
        <div class="formCreate">
            <ul class="indColumn cajaItemShow">
                <li class="index">                            
                    <a class="links" >
                        <img class="itemShow" src="{{ asset($produc->photo) }}">
                    </a>
                </li>   
               
                <div class="index">
                    <p class="itemCat">{{ $produc->brand }}</p>                     
                    <p class="itemName">$ {{ $produc->precio }}</p>
                </div>                
            </ul>     
            <article class="detalle">
                <ul class="indColumn">                     
                    <div class="detalleInfo">                      
                        <li class="detName">Nombre:</li>
                        <li class="detValue">{{ $produc->name }}</li>
                    </div>
                    @if($produc->categoria_id < 10)
                    <div class="detalleInfo">                      
                        <li class="detName">Estampado:</li>
                        <li class="detValue">{{ $produc->estampado->nombre }}</li>
                    </div>                    
                    <div class="detalleInfo">                      
                        <li class="detName">Color:</li>
                        <li class="detValue">{{ $produc->color->nombre }}</li>
                    </div>                    
                    @endif
                    @if($produc->categoria_id !== 6 && $produc->categoria_id !== 5 && $produc->categoria_id !== 8 && $produc->categoria_id < 10)
                    <div class="detalleInfo">  
                        <li class="detName">Forma:</li>
                        <li class="detValue">{{ $produc->forma->nombre }}</li>
                    </div> 
                    <div class="detalleInfo">  
                        <li class="detName">Largo:</li>
                        <li class="detValue">{{ $produc->largo->nombre }}</li>
                    </div> 
                    @endif
                    @if($produc->categoria_id < 10)
                    <div class="detalleInfo">  
                            <li class="detName">Guardarropa:</li>
                            <li class="detValue">{{ $produc->wardrobe->nombre }}</li>
                    </div>
                    @endif
                    <div class="detalleInfo" style="padding:5px;">                      
                        <li class="descrip">{{ $produc->descrip }}</li>
                    </div> 
                    <div class="index">
                        <p class="botonGral enProceso"><a >Comprar</a></p>
                        <p class="mostrar" id="mensaje"> Próximamente podrás comprar ó reservar tus items ó servicios!</p>        
                        @if(Auth::user())
                            @if($produc['user_id'] === Auth::user()-> id)                            
                                <p class="botonGral"><a  href="">Editar</a></p>                                    
                            @endif
                        @endif  
                    </div>
                       
                </ul>
            </article>
        </div>
        
        
    </section>

    <script rel="javascript" type="text/javascript" src="/js/wglam.js"></script> 
          
@endsection