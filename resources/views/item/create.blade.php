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
    </section>
       
    <section class="principal">
        <form method="POST" id="nuevo" action="" name="nuevo" style="text-align: center;" enctype="multipart/form-data"> 
        @csrf  
            <div class="formCreate">
                <ul class="indexColumn cajaCreate">
                    <li class="imgInfoCont">
                        <img class="imgInfo" src={{asset('/0_Item_Create.jpg')}}  alt="wGlam">                     
                    </li>
                    </li>
                        <label for="img"></label>
                        <img type="file" class="preview itemShow" style="display:none;" id="preview"  alt="wGlam">   
                        <input type="file" class="imgup" name="img" id="img" value="">
                    </li>
                    
                </ul>
                 
                <div class="indColumn">
                    <ul class="errors">
                        @if($errors->all())<li> Faltan completar campos.</li> @endif        
                        {{-- @foreach ($errors->all() as $error) <li>{{$error}}</li>   @endforeach --}}
                    </ul>
                    <li> 
                        <p class="info"></p>  
                    </li>
                    <ul>
                        <li>
                            <label for="name"></label>
                            <input type="text" class="inputCreate" name="name" placeholder="Nombre" id="name" value={{ old('name') }} >
                        </li>
                        <li>    
                            <label for="brand"></label>
                            <input type="text" class="inputCreate" name="brand" placeholder="Marca" id="brand" value={{ old('brand') }}>
                        </li>     
                        <li>
                            <label for="categoria"></label>
                            <select name="categoria" id="mySelect" class="categoria inputCreate" type="number">
                            <option selected disabled> Categoría</option>
                            @foreach($categoria as $cat)       
                            <option value={{ $cat['id'] }} {{ ((int)old('categoria') === $cat['id'])? 'selected':''}}>{{ $cat['name'] }}</option>
                            @endforeach
                            </select>
                        </li>
                        <li class="printed">
                            <label for="printed"></label>
                            <select name="printed" type="number" class="inputCreate">
                            <option selected disabled>Estampado</option>
                            @foreach($estampado as $e)       
                            <option value={{ $e['id'] }} {{ ((int)old('printed') === $e['id'])? 'selected':''}}>{{ $e['nombre'] }}</option>
                            @endforeach
                            </select>
                        </li>
                          
                        <li class="colored">                            
                            <label for="colored"></label>
                            <select name="colored" type="number" class="inputCreate">
                            <option selected disabled>Color</option>
                            @foreach($color as $col)       
                            <option value={{ $col['id'] }} {{ ((int)old('colored') === $col['id'])? 'selected':''}}>{{ $col['nombre'] }}</option>
                            @endforeach
                            </select>
                        </li>
                        <li class="form">
                            <label  for="form"></label>
                            <select  name="form" type="number" id="form" class="inputCreate refForm">
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
                            <select name="tipo_w" type="number" class="inputCreate">
                            <option selected disabled>Tipo de Guardarropa</option>
                            @foreach($wardrobe as $w)       
                            <option value={{ $w['id'] }} {{ ((int)old('tipo_w') === $w['id'])? 'selected':''}}>{{ $w['nombre'] }}</option>                            
                            @endforeach
                            </select>
                        </li>    
                        <li>
                            @if(Auth::user()->id === 1)   
                                <label for="body"></label>
                                <select name="body" type="number" class="inputCreate">
                                <option selected disabled>Forma de Cuerpo</option>
                                @foreach($cuerpo as $c)       
                                <option value={{ $c['id'] }} {{ ((int)old('body') === $c['id'])? 'selected':''}}>{{ $c['nombre'] }}</option>
                                @endforeach
                                </select>            
                            @endif   
                        </li>
                        
                        <button type="submit" class="botonGral" name="button">Grabar</button>
                        
                    </ul>
                </div>                                        
            </div>           
        </form>
       
    </section>

<script rel="javascript" type="text/javascript" src="../js/wglam.js"></script> 


@endsection



