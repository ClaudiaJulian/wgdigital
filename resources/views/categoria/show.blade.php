@extends('template.basic')

@section('content')


<section class="content">
    <article> 
        <h2 class="titulo">>{{ $categoria->name }}</h2>
    </article> 
    
    <div class="index">
        <p><a class="links" href="/item">Items</a></p>
        <p><a class="links" href="/categoria">Categorias</a></p>
    </div>

    <div class="index">
        @foreach($categoria->item as $item)
        <article class="">
            <a class="links" href="../item/{{ $item->id }}">
                <ul>
                <img src="{{ asset($item->photo) }}" alt="Icono de {{ $item->name }}">
                <h3>{{ $item->name }}</h3>
                </ul>
            </a>         
        </article>
        @endforeach
    </div>   
</section>

@endsection