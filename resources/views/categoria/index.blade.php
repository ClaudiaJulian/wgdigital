@extends('template.basic')

@section('content')


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
    <div style="margin-top:20px;">
        <ul class="index">  
        @foreach($categorias as $categoria)
        <div style="border:solid white 1px;margin:5px;">    
            <li class="">  
                <a class="links" href="categoria/{{ $categoria->id }}">
                <h3> - {{$categoria['id']}} - </h3>    
                <h4> {{$categoria['name']}} </h4>        
                </a>

            {{-- @if($item['user_id']!== 1 || Auth::user()-> id === 1) --}}
                <div class="index">
                    <p ><a class="links" href="/categoria/{{ $categoria->id }}/edit">Editar</a></p>
                    <p ><a class="links" href="/categoria/{{ $categoria->id }}/delete">Eliminar</a></p>        
                </div>
            {{-- @endif   --}}

            </li>
        </div>     
        @endforeach

        <div style="border:solid pink 1px;margin:5px;background-color:white;">
            <li class="">  
                <a class="links" href="categoria/create">
                <h4> Nueva Categoria </h4></a>
            </li>   
        </div>   
        </ul>          
    </div> 

   
</section>

@endsection