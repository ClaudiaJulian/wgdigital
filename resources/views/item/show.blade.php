@extends('template.basic')

@section('content')
     
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
                <li>
                    <a>                            
                    <img class="itemShow" src="{{ asset($item->photo) }}">
                    </a>
                </li>   
                <div class="index">
                    <p class="itemCat">{{ $item->categoria->name }}</p>  
                    <p class="itemName">{{ $item['name'] }}</p>
                </div>                
            </ul>     
            <article class="detalle">
                <ul class="indColumn">
                    <div class="detalleInfo">    
                        <li class="detName">Marca:</li>
                        <li class="detValue">{{ $item->brand }}</li>
                    </div>
                    <div class="detalleInfo">
                        <li class="detName">Estampado:</li>
                        <li class="detValue">{{$item->estampado->nombre }}</li>
                    </div>
                    <div class="detalleInfo">
                        <li class="detName">Color:</li>
                        <li class="detValue">{{$item->color->nombre }}</li>
                    </div>    
                    @if($item->categoria_id < 6)
                    <div class="detalleInfo">
                        <li class="detName">Forma:</li>
                        <li class="detValue">{{$item->forma->nombre }}</li>
                    </div>
                    <div class="detalleInfo">
                        <li class="detName">Largo:</li>    
                        <li class="detValue">{{$item->largo->nombre }}</li>
                    </div>
                    @endif
                    <div class="detalleInfo">
                        <li class="detName">Estación:</li>
                        <li class="detValue">{{$item->wardrobe->nombre }}</li>
                    </div>    

                    @if(Auth::user())
                    @if($item['user_id']!== 1 || Auth::user()-> id === 1)
                        <button class="botonGral"><a href="/item/{{$item->id}}/edit">Editar</a></button>
                    @endif
                    @endif 
                </ul>
            </article>           
            
        </div>
    </section>


          
@endsection