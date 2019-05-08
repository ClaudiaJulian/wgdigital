@extends('template.basic')
@section('content')

<ul class="errors">
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>    
    @endforeach
</ul>

{{-- NAVEGADOR     --}}
<section class="white">
    <div class="">
        <ul class="nav-menu">                                   
            <li><a href="/item">Home</a></li>         
            <li><a href="/guardarropa">Mi Guardarropa</a></li>                
            <li><a href="/outfit">Mis Looks</a></li>            
            <li><a href="/producto/shop">Shop</a></li>
            {{-- <li><a href="/guardarropa">Ayuda</a></li>                     --}}
        </ul>  
    </div>

{{-- BANNER     --}}
    <div class="BannerPerfil">
        <h1></h1>
    </div>
</section>
{{--------  PLANES   -------}}
<section>    
    <div class="secAb">
            @foreach($pk as $k)
            <ul>
                <li class="detailAbName"> {{$k->nombre}} |  {{$k->items}} productos</li>
                <article class="detailAb" style="display:none;">
                    <li> {{$k->apariciones}} apariciones </li>
                    <li class="botonAbPr"><a href="">{{$k->v_mes === 0? 'free':$k->v_mes}}{{$k->v_mes === 0? '':' $/mes'}} </a></li>
                </article>
            </ul>
            @endforeach
    </div>

        {{-- DATOS DEL PERFIL DE USUARIO     --}}
<section class="secPerfil">
                <article class="SecDetailPerfil">            
                    <h2>{{ Auth::user()->name }} Pack {{ Auth::user()->pack }}</h2>
                    <p>5 Productos On Line</p>
                    <p>Presencia en Shop</p>           
                </article>
                <article>
                    <div class="index">
                        <button type="submit" class="botonGral">UpGrade</button> 
                    </div>    
                </article>
            </section>        
        
            <section class="secForma">
                <article class="producOn">
                    <h2 >PRODUCTOS ONLINE <strong class="cantProd"> {{count($productos)}} </strong></h2>
                    <a class="botonGral"  href="../../producto/create"> + Nuevo Item </a>    
                </article>
                <article>    
                <article class="margin10">   
                    <div class="">
                        @if(isset($limite))
                            <p style="color:red;">{{ $limite }}</p>
                        @endif
                    </div>    
                    <ul class="index">
                        @foreach($productos as $pro)
                            <li >  
                                <div class="cajaIndex">
                                    <a class="cajaImgIndex" href="/.../../producto/shop/{{ $pro->id }}">
                                        <img class="imgIndex"" src="{{ asset($pro->photo) }}" alt="Icono de {{ $pro->name }} ">         
                                    </a>
                
                                    <div class="index" style="padding: 5px;">
                                        <a class="links"> $ {{$pro->precio}} </a>
                                        @if($pro->on_off === 'on')
                                            <a class="links" href="/producto/add/{{$pro->id}}"> {{$pro->on_off}} </a>
                                        @endif
                                        <a class="links" href="../../producto/shop/{{ $pro->id }}"> Info </a>
                                    </div>
                                </div>
                             </li>
                        @endforeach
                    </ul>          
                </article> 
                </article>
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
                            <label for="password-confirm" class="">{{ __('Confirme Password') }}</label>
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
        
@endsection