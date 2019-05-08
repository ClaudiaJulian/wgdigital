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
            <div>    
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="" >
            </div>
        </ul>
        
        <button type="submit" name="button">Guardar</button>
   
    </form>


</section>

@endsection