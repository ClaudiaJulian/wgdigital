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
        <form method="POST" id="nuevo" action="" name="nuevo" style="text-align: center;" enctype="multipart/form-data"> 
        @csrf
        @method('put') 

            <div class="formCreate">
                <ul class="indColumn"> 
                    <div class="indColumn cajaItemShow">
                        <label for="img"></label>                           
                        <img class="itemShow" src="{{ asset($item->photo) }}">
                        <input type="file" name="img" id="img" value="">
                    </div>    
                </ul>  
                <ul class="detalle">
                    <li class="editItem" >
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" value="{{ $item['name'] }}" >
                    </li>
                    <li class="editItem">
                        <label for="brand">Marca:</label>
                        <input type="text" name="brand" id="brand" value="{{ $item['brand'] }}" >
                    </li>
                    <li class="editItem">
                        <label for="categoria">Categoría:</label>
                            <select name="categoria" type="number">
                                <option disabled selected>Select</option>
                                    @foreach($categoria as $cat)       
                                        <option value={{ $cat['id'] }} {{($item['categoria_id']===$cat['id']) ? 'selected' : ''}}>{{ $cat['name'] }}</option>
                                    @endforeach
                            </select>
                    </li>                    
                    <li class="editItem">
                        <label for="printed">Estampado:</label>
                            <select name="printed" type="number">
                                <option disabled selected>Select</option>
                                    @foreach($estampado as $e)       
                                        <option value={{ $e['id'] }} {{($item['printed']===$e['id']) ? 'selected' : ''}}>{{ $e['nombre'] }}</option>
                                    @endforeach
                            </select>
                    </li>
                    <li class="editItem">
                        <label for="colored">Color:</label>
                            <select name="colored" type="number">
                                <option disabled selected>Select</option>
                                    @foreach($color as $col)       
                                        <option value={{ $col['id'] }} {{($item['colored']===$col['id']) ? 'selected' : ''}}>{{ $col['nombre'] }}</option>
                                    @endforeach
                            </select>
                    </li>
                    <li class="editItem">
                            <label for="form">Forma:</label>
                                <select name="form" type="number">
                                    <option disabled selected>Select</option>
                                        @foreach($forma as $f)       
                                            <option value={{ $f['id'] }} {{($item['form']===$f['id']) ? 'selected' : ''}}>{{ $f['nombre'] }}</option>
                                        @endforeach
                                </select>
                    </li>
                    <li class="editItem">
                        <label for="length">Largo:</label>
                            <select name="length" type="number">
                                <option disabled selected>Select</option>
                                    @foreach($largo as $l)       
                                        <option value={{ $l['id'] }} {{($item['length']===$l['id']) ? 'selected' : ''}}>{{ $l['nombre'] }}</option>
                                    @endforeach
                            </select>        
                    </li>
                    <li class="editItem">
                        <label for="tipo_w">Guardarropa:</label>
                            <select name="tipo_w" type="number">
                            <option disabled selected>Select</option>
                                    @foreach($wardrobe as $w)       
                                    <option value={{ $w['id'] }} {{($item['tipo_w']=== $w['id']) ? 'selected' : ''}}>{{ $w['nombre'] }}</option>                            
                                    @endforeach
                            </select>
                    </li>       
                    @if(Auth::user()->id === 1)
                    <li class="editItem">
                        <label for="body">Body Shape:</label>
                            <select name="body" type="number">
                                <option disabled selected>Select</option>
                                    @foreach($cuerpo as $c)       
                                        <option value={{ $c['id'] }} {{($item['body']===$c['id']) ? 'selected' : ''}}>{{ $c['nombre'] }}</option>
                                    @endforeach
                            </select>
                    </li>                                         
                    @endif
                    <li class="index">
                    <button class="botonGral" type="submit">Guardar</button>
                    </li>                                
                </ul>                
            </form>
        </div>
    </section>          


@endsection