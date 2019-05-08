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
        <form method="POST" id="nuevo" action="" name="nuevo" style="text-align: center;" enctype="multipart/form-data"> 
        @csrf  
            <div class="formCreate">
            <ul class="indexColumn">
                <li class="index">
                    <div class="">                      
                        <img src={{asset('/wGlam.png')}} style="width:100%;padding:10px;max-width:400px;" alt="wGlam">                     
                    </div>
                </li>
                <li class="index">
                    <div  style="width:170px;height:30px;">
                        <label for="img"></label>
                        <img type="hidden" src="" style="width:100%;padding:10px;display:none;" alt="wGlam">   
                        <input type="file" name="img" id="img" value="">
                    </div>
                </li> 
                <li> 
                    <p class="info"></p>  
                </li>
            </ul>
    
            <div class="indColumn">
            <ul class="errors">
                @if($errors->all())<li> Faltan completar campos.</li> @endif        
                {{-- @foreach ($errors->all() as $error) <li>{{$error}}</li>   @endforeach --}}
            </ul>    
            <ul>
                <li>
                    <label for="categoria"></label>
                    <select name="categoria" id="mySelect" class="categoria inputCreate" type="number">
                        <option selected disabled> Categoría</option>
                        @foreach($categoria as $cat)       
                        <option value={{ $cat['id'] }} {{ ((int)old('categoria') === $cat['id'])? 'selected':''}}>{{ $cat['name'] }}</option>
                        @endforeach
                    </select>
                </li>
                <li>
                    <label for="name"></label>
                    <input type="text" class="inputCreate" name="name" placeholder="Nombre" id="name de producto" value={{ old('name') }} >
                </li>
                <li>    
                    <label for="brand"></label>
                    <input type="text" class="inputCreate" name="brand" placeholder="{{Auth::user()->name}}" id="brand" value="{{Auth::user()->name}}">
                </li>     

                <li>    
                    <label for="precio"></label>
                    <input type="number" class="inputCreate" name="precio" placeholder="Precio" id="precio" value={{ old('precio') }}>
                </li>     
                <li>    
                    <label for="descuento"></label>
                    <input type="number" class="inputCreate" name="descuento" placeholder="Descuento" id="descuento" value={{ old('descuento') }}>
                </li>                     

                <li class="printed">
                    <label for="printed"></label>
                        <select name="printed" class="inputCreate" type="number">
                            <option selected disabled>Estampado</option>
                            @foreach($estampado as $e)       
                            <option value={{ $e['id'] }} {{ ((int)old('printed') === $e['id'])? 'selected':''}}>{{ $e['nombre'] }}</option>
                            @endforeach
                        </select>
                </li>    
                <li class="colored">
                    <label for="colored"></label>
                        <select name="colored" class="inputCreate" type="number">
                            <option selected disabled>Color</option>
                            @foreach($color as $col)       
                            <option value={{ $col['id'] }} {{ ((int)old('colored') === $col['id'])? 'selected':''}}>{{ $col['nombre'] }}</option>
                            @endforeach
                        </select>
                </li>
                <li class="form">
                    <label for="form"></label>
                        <select name="form" type="number" class="inputCreate refForm">
                            <option selected disabled>Forma</option>
                            @foreach($forma as $f)       
                            <option value={{ $f['id'] }} {{ ((int)old('form') === $f['id'])? 'selected':''}}>{{ $f['nombre'] }}</option>
                            @endforeach
                        </select>
                </li>
                <li class="length">
                    <label for="length"></label>
                        <select name="length" type="number" class="inputCreate refLen">
                            <option selected disabled>Largo</option>
                            @foreach($largo as $l)       
                            <option value={{ $l['id'] }} {{ ((int)old('length') === $l['id'])? 'selected':''}}>{{ $l['nombre'] }}</option>
                            @endforeach
                    </select>
                </li>
                <li class="tipo_w">
                    <label for="tipo_w"></label>
                        <select name="tipo_w" class="inputCreate" type="number">
                            <option selected disabled>Tipo de Guardarropa</option>
                            @foreach($wardrobe as $w)       
                            <option value={{ $w['id'] }} {{ ((int)old('tipo_w') === $w['id'])? 'selected':''}}>{{ $w['nombre'] }}</option>                            
                            @endforeach
                        </select>
                </li>   
                <li>
                    <label for="descrip"></label>
                    <textarea type="text" class="" name="descrip" placeholder="Descripción del Producto" id="descrip" value="{{ old('descrip')}}" ></textarea>
                </li>

                <li>
                    <label for="on_off"></label>
                        <select name="on_off" class="inputCreate" type="number">
                            <option selected disabled>on_off</option>                                 
                            <option value="on">on</option>
                            <option value="off">off</option>                     
                        </select>
                </li>
                <button type="submit" class="botonGral" name="button">Grabar</button>    
            </ul>
            </div>    
                        
            
        </div>
           
        </form>
       
    </section>

<script rel="javascript" type="text/javascript" src="../js/wglam.js"></script> 


@endsection



