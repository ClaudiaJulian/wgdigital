@extends('template.basic')

@section('content')

<ul class="errors">
@foreach ($errors->all() as $error)
    <li>{{$error}}</li>    
@endforeach
</ul>

<section class="white">
        <ul class="nav-menu">          
            <li><a href="/item/create"> Item </a></li>    
            <li><a href="/categoria">Categorías</a></li>
            <li><a href="/formula">Formulas</a></li>
            <li><a href="/abono">Abonos</a></li>
            <li><a href="/adm/user">Roles</a></li>
            <li><a href="/categoria">Mensajes</a></li>
            <li><a href="/categoria">Gestion</a></li>      
        </ul>
</section>

<section class="principal">
<form method="POST" id="nuevo" action="" name="nuevo" style="text-align: center;" enctype="multipart/form-data"> 
    @csrf  
    <ul>      
    <label for="cuerpo"></label>
        <select name="cuerpo" type="number">
            <option>cuerpo</option>
            @foreach($cuerpo as $c)       
            <option value={{ $c['nombre'] }}>{{ $c['nombre'] }}</option>
            @endforeach
        </select>
    </ul>

    <ul>    
    <label for="categoria_1"></label>
        <select name="categoria_1" type="number">
            <option >categoria_1</option>
            @foreach($categoria as $cat)       
            <option value={{ $cat['name'] }}>{{ $cat['name'] }}</option>
            @endforeach
        </select>

    <label for="form_1"></label>
        <select name="form_1" type="number">
            <option value>form_1</option>
            @foreach($forma as $f)       
            <option value={{ $f['id'] }}>{{ $f['nombre'] }}</option>
            @endforeach
        </select>

    <label for="printed_1"></label>
        <select name="printed_1" type="number">
            <option >printed_1</option>
            @foreach($estampado as $e)       
            <option value={{ $e['id'] }}>{{ $e['nombre'] }}</option>
            @endforeach
        </select>

    <label for="colored_1"></label>
        <select name="colored_1" type="number">
            <option >colored_1</option>
            @foreach($color as $col)       
            <option value={{ $col['id'] }}>{{ $col['nombre'] }}</option>
            @endforeach
        </select>     
    
    <label for="length_1"></label>
        <select name="length_1" type="number">
            <option >length_1</option>
            @foreach($largo as $l)       
            <option value={{ $l['id'] }}>{{ $l['nombre'] }}</option>
            @endforeach
        </select> 

    </ul>

    <ul>    
    <label for="categoria_2"></label>
        <select name="categoria_2" type="number">
            <option >categoria_2</option>
            @foreach($categoria as $cat)       
            <option value={{ $cat['name'] }}>{{ $cat['name'] }}</option>
            @endforeach
        </select>
        
    <label for="form_2"></label>
        <select name="form_2" type="number">
            <option value>form_2</option>
            @foreach($forma as $f)       
            <option value={{ $f['id'] }}>{{ $f['nombre'] }}</option>
            @endforeach
        </select>
        
    <label for="printed_2"></label>
        <select name="printed_2" type="number">
            <option >printed_2</option>
            @foreach($estampado as $e)       
            <option value={{ $e['id'] }}>{{ $e['nombre'] }}</option>
            @endforeach
        </select>
        
    <label for="colored_2"></label>
        <select name="colored_2" type="number">
            <option >colored_2</option>
            @foreach($color as $col)       
            <option value={{ $col['id'] }}>{{ $col['nombre'] }}</option>
            @endforeach
        </select>     
            
    <label for="length_2"></label>
        <select name="length_2" type="number">
            <option >length_2</option>
            @foreach($largo as $l)       
            <option value={{ $l['id'] }}>{{ $l['nombre'] }}</option>
            @endforeach
        </select> 
        
    </ul>

    <ul>
    <label for="categoria_3"></label>
        <select name="categoria_3" type="number">
            <option >categoria_3</option>
            @foreach($categoria as $cat)       
            <option value={{ $cat['name'] }}>{{ $cat['name'] }}</option>
            @endforeach
        </select>
                
    <label for="form_3"></label>
        <select name="form_3" type="number">
            <option value>form_3</option>
            @foreach($forma as $f)       
            <option value={{ $f['id'] }}>{{ $f['nombre'] }}</option>
            @endforeach
        </select>
                
    <label for="printed_3"></label>
        <select name="printed_3" type="number">
            <option >printed_3</option>
            @foreach($estampado as $e)       
            <option value={{ $e['id'] }}>{{ $e['nombre'] }}</option>
            @endforeach
        </select>
                
    <label for="colored_3"></label>
        <select name="colored_3" type="number">
            <option >colored_3</option>
            @foreach($color as $col)       
            <option value={{ $col['id'] }}>{{ $col['nombre'] }}</option>
            @endforeach
        </select>     
                    
    <label for="length_3"></label>
        <select name="length_3" type="number">
            <option >length_3</option>
            @foreach($largo as $l)       
            <option value={{ $l['id'] }}>{{ $l['nombre'] }}</option>
            @endforeach
        </select> 
                
    </ul>
        
    <button type="submit" name="button">Guardar</button>
   
</form>


</section>

@endsection



