@extends('template.basic')



@section('content')
<ul class="errors">
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>    
    @endforeach
</ul>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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
        @if($msgFaltaCuerpo !== "OK")
        <p style="background-color:red;color:white"> {{ $msgFaltaCuerpo }} </p>
        @endif
    </div>
</section>
{{-- PLANES     --}}
<section>    
    <div class="secAb"> 
        @foreach($ab as $a)
        <ul> 
            @if($a->nombre !== "adm")
            <li class="detailAbName"> {{$a->nombre}}  |  {{$a->consultas===1?$a->consultas.' consulta':$a->consultas.' consultas' }}</li> {{-- nuevo --}}
            <article class="detailAb" style="display:none;">
                <li > {{$a->capacidad}} Items</li>
                <li > {{$a->outfit}} Looks</li>
                <li > {{$a->itemOutfit}} Item/Look</li>
                <li > {{$a->consultas}} Consultas</li>
                <li class="botonAbPr"><a href="">{{$a->precio === 0? 'free':$a->precio}}{{$a->precio === 0? '':' $/mes'}} </a></li>
            </article>
            @endif       
        </ul> {{-- nuevo --}}
        @endforeach 
    </div>    
{{-- DATOS DEL PERFIL DE USUARIO     --}}
<section class="secPerfil" >
        <article class="SecDetailPerfil">            
            <h2>{{ Auth::user()->name }} Plan {{ Auth::user()->abono }}</h2>
            @foreach($ab as $a)                
                @if($a->id === Auth::user()->abono)
                    <p>{{ $g }} de {{ $a->capacidad }} Items  restan {{ ( $a->capacidad - $g)  }} Items </p>
                    <p>{{ $out }} de {{ $a->outfit }} Oufits restan {{ ($a->outfit - $out)  }} Outfits </p> 
                    <p>{{ $a->consultas }} consulta personalizada</p>
                    <p>{{ $a->itemOutfit }} Items/Outfit</p> 
                @endif               
            @endforeach          
        </article>
        <article>
            <div class="index">
                <a class="botonGral" href="/producto/shop">UpGrade</a> 
            </div>    
        </article>
</section>

{{-- SELECCION DE FORMA DE CUERPO --}}
<section class="secForma" >
        <article class="secFormaOption">
            <h2>Forma de Cuerpo</h2>
            <form method="POST" class="formaSelect" id="cuerpo" action="" name="cuerpo" style="text-align: center;" enctype="multipart/form-data"> 
                @csrf 
                @method('put') 
                <article class="" >
                    <label for="body"></label>
                        <select  name="body" id="formaCuerpo" class="formaCuerpo" type="number">
                            <option selected disabled>Seleccionar Tipo de Cuerpo</option>
                            @foreach($cuerpo as $c)       
                                <option value={{ $c['id'] }} {{ (Auth::user()->b_shape === $c['id'])?'selected':''}}>{{ $c['nombre'] }}</option>
                            @endforeach
                        </select>
                </article>
                <article>
                        <button type="submit" class="botonGral">Guardar</button> 
                </article>              
            </form>
        </article>

        <div class="cajaForma">
            <div class="infoForma">
                    <ul style="height:100%;">
                        <li class="textCuerpo">La forma de tu cuerpo está determinada por los Hombros, Busto, Cintura y Caderas</li>
                        <li class="textCuerpo1">La forma de las prendas se asientan en la estructura corporal dibujando la silueta.</li>
                    </ul>
            </div>
            <article class="cajaImgCuerpo">
                <img class="imgCuerpo" src="/image/cuerpo/img_generico.jpg" alt="imagen-shape">
            </article>
        </div>
</section>    

{{-- EDITAR PERFIL - OCULTAR?   --}}
<section class="space secPerfil">
        <article class="SeccionIntroWel">
            <h2>Editar Perfil</h2>
            <form method="POST" action="">
                @csrf 
                @method('put')                   
    
                <article class="form-group form-group2">
                    <label for="name" class="">{{ __('Nombre ') }}</label>
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::User()->name }}">
                </article>
    
                <article class="form-group form-group2">
                    <label for="email" class="">{{ __('E-Mail ') }}</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::User()->email }}" required>
                                    
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </article>
    
                <article class="form-group form-group2">
                    <label for="password" class="">{{ __('Password ') }}</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </article>
    
                <article class="form-group form-group2">
                    <label for="password-confirm" class="">{{ __('Confirme Password ') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </article>
        
                <article class="form-group">
                    <button type="submit" class="botonGral">
                        {{ __('Editar') }}
                    </button><br>
                </article>
    
            </form>
        </article>
    </section>    
</section>

<script rel="javascript" type="text/javascript" src="../../js/wglam.js"></script> 

@endsection
