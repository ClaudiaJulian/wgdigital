@extends('template.basic')

@section('content')

<ul class="errors">
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>    
    @endforeach
</ul>

<section>
<form method="POST" id="nuevo" action="" name="nuevo" style="text-align: center;" enctype="multipart/form-data"> 
    @csrf  
    @method('put')
    <ul>      
    <label for="cuerpo"></label>
        <select name="cuerpo" type="number">
            <option disabled>Select</option>
            {{-- <option>{{$formula['cuerpo']}}</option> --}}
            @foreach($cuerpo as $c)       
            <option value={{ $c['nombre'] }} {{ $formula['cuerpo']=== $c['nombre']? 'Selected' :''}}>{{ $c['nombre'] }}</option>
            @endforeach
        </select>
    </ul>

    <ul>    
    <label for="categoria_1"></label>
        <select name="categoria_1" type="number">
            <option disabled>Select</option>
            {{-- <option >categoria_1</option> --}} 
            @foreach($categoria as $cat)       
            <option value={{ $cat['name'] }} {{ $formula['categoria_1']=== $cat['name']? 'Selected' :''}}>{{ $cat['name'] }}</option>
            @endforeach
        </select>

    <label for="form_1"></label>
        <select name="form_1" type="number">
            <option disabled>Select</option>
            {{-- <option value>form_1</option> --}}
            @foreach($forma as $f)       
            <option value={{ $f['id'] }} {{ $formula['form_1']=== $f['id']? 'Selected' :''}}>{{ $f['nombre'] }}</option>
            @endforeach
        </select>

    <label for="printed_1"></label>
        <select name="printed_1" type="number">
            <option disabled>Select</option>
            {{-- <option >printed_1</option> --}}
            @foreach($estampado as $e)       
            <option value={{ $e['id'] }} {{ $formula['printed_1']=== $e['id']? 'Selected' :''}}>{{ $e['nombre'] }}</option>
            @endforeach
        </select>

    <label for="colored_1"></label>
        <select name="colored_1" type="number">
            <option disabled>Select</option>
            {{-- <option >colored_1</option> --}}
            @foreach($color as $col)       
            <option value={{ $col['id'] }} {{ $formula['colored_1']=== $col['id']? 'Selected' :''}}>{{ $col['nombre'] }}</option>
            @endforeach
        </select>     
    
    <label for="length_1"></label>
        <select name="length_1" type="number">
            <option disabled>Select</option>
            {{-- <option >length_1</option> --}}
            @foreach($largo as $l)       
            <option value={{ $l['id'] }} {{ $formula['length_1']=== $l['id']? 'Selected' :''}}>{{ $l['nombre'] }}</option>
            @endforeach
        </select> 

    </ul>

    <ul>    
    <label for="categoria_2"></label>
        <select name="categoria_2" type="number">
            <option disabled>Select</option>
            @foreach($categoria as $cat)       
            <option value={{ $cat['name'] }} {{ $formula['categoria_2']=== $cat['name']? 'Selected' :''}}>{{ $cat['name'] }}</option>
            @endforeach
        </select>
        
    <label for="form_2"></label>
        <select name="form_2" type="number">
            <option disabled>Select</option>
            @foreach($forma as $f)       
            <option value={{ $f['id'] }} {{ $formula['form_2']=== $f['id']? 'Selected' :''}}>{{ $f['nombre'] }}</option>
            @endforeach
        </select>
        
    <label for="printed_2"></label>
        <select name="printed_2" type="number">
            <option disabled>Select</option>
            @foreach($estampado as $e)       
            <option value={{ $e['id'] }} {{ $formula['printed_2']=== $e['id']? 'Selected' :''}}>{{ $e['nombre'] }}</option>
            @endforeach
        </select>
        
    <label for="colored_2"></label>
        <select name="colored_2" type="number">
            <option disabled>Select</option>
            @foreach($color as $col)       
            <option value={{ $col['id'] }} {{ $formula['colored_2']=== $col['id']? 'Selected' :''}}>{{ $col['nombre'] }}</option>
            @endforeach
        </select>     
            
    <label for="length_2"></label>
        <select name="length_2" type="number">
            <option disabled>Select</option>
            @foreach($largo as $l)       
            <option value={{ $l['id'] }} {{ $formula['length_2']=== $l['id']? 'Selected' :''}}>{{ $l['nombre'] }}</option>
            @endforeach
        </select> 
        
    </ul>

    <ul>
    <label for="categoria_3"></label>
        <select name="categoria_3" type="number">
            <option disabled>Select</option>
            @foreach($categoria as $cat)       
            <option value={{ $cat['name'] }} {{ $formula['categoria_3']=== $cat['name']? 'Selected' :''}}>{{ $cat['name'] }}</option>
            @endforeach
        </select>
                
    <label for="form_3"></label>
        <select name="form_3" type="number">
            <option disabled>Select</option>
            @foreach($forma as $f)       
            <option value={{ $f['id'] }} {{ $formula['form_3']=== $f['id']? 'Selected' :''}}>{{ $f['nombre'] }}</option>
            @endforeach
        </select>
                
    <label for="printed_3"></label>
        <select name="printed_3" type="number">
            <option disabled>Select</option>
            @foreach($estampado as $e)       
            <option value={{ $e['id'] }} {{ $formula['printed_3']=== $e['id']? 'Selected' :''}}>{{ $e['nombre'] }}</option>
            @endforeach
        </select>
                
    <label for="colored_3"></label>
        <select name="colored_3" type="number">
            <option disabled>Select</option>
            @foreach($color as $col)       
            <option value={{ $col['id'] }} {{ $formula['colored_3']=== $col['id']? 'Selected' :''}}>{{ $col['nombre'] }}</option>
            @endforeach
        </select>     
                    
    <label for="length_3"></label>
        <select name="length_3" type="number">
            <option disabled>Select</option>
            @foreach($largo as $l)       
            <option value={{ $l['id'] }} {{ $formula['length_3']=== $l['id']? 'Selected' :''}}>{{ $l['nombre'] }}</option>
            @endforeach
        </select> 
                
    </ul>
        
    <button type="submit" name="button">Guardar</button>
   
</form>

<div class="index">          
          <p ><a class="links" href="/item">Items</a></p>    
          <p ><a class="links" href="/formula">Formulas</a></p>
</div>

</section>

@endsection