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
    <ul>
    
    <label for="nombre">nombre</label>
    <input type="text" name="nombre" id="nombre" value="" >
    
    <label for="descrip">descripcion</label>
    <textarea>
    </textarea>

    </ul> 
        
    <button type="submit" name="button">Guardar</button>
   
</form>

<div class="index">          
          <p ><a class="links" href="">Opcion</a></p>    
          <p ><a class="links" href="">Opcion</a></p>
</div>

</section>

@endsection
