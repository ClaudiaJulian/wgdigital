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

<div class="index"> 
    <ul class="index">
        <li> Columnar : {{$qBody2}} </li>
        <li> Rectangular :{{$qBody3}} </li>
        <li> Triangular : {{$qBody4}}</li>
        <li> Cono : {{$qBody5}} </li>
        <li> Oval : {{$qBody6}} </li>
        <li> Reloj de Arena : {{$qBody1}} </li>
    </ul>    
</div>

<table class="index">
        <tr>                
            <th>Cuerpo</th>
            <th>Categ.</th>
            <th>Forma</th>
            <th>Est.</th>
            <th>Color</th>
            <th>Largo</th>
            <th>Categ.</th>
            <th>Forma</th>
            <th>Est.</th>
            <th>Color</th>
            <th>Largo</th>
            <th>Categ.</th>
            <th>Forma</th>
            <th>Est.</th>
            <th>Color</th>
            <th>Largo</th>
            <th>Modificar</th>
        </tr>

    @foreach($formulas as $formula)

        <tr class="FondoTablaProducto" style="text-align:center;font-size:0.8em;"> 
        
        <td><p style="margin:5px;color:blue;">{{$formula->cuerpo}}</p> </td>         
        <td><p style="margin:5px;color:red;">{{$formula->categoria_1}}</p>  </td>
        <td>
            @foreach($forma as $f)   
                @if($formula->form_1 === $f->id)  
                    <p style="margin:5px">{{$f->nombre}}</p>  
                @endif
            @endforeach
        </td>
        <td>
            @foreach($estampado as $e)   
                @if($formula->printed_1 === $e->id)  
                    <p style="margin:5px">{{$e->nombre}}</p>  
                @endif
            @endforeach
        </td>
        <td>
            @foreach($color as $col)   
                @if($formula->colored_1 === $col->id)  
                    <p style="margin:5px">{{$col->nombre}}</p>  
                @endif
            @endforeach
        </td>
        <td>   
            @foreach($largo as $l)   
                @if($formula->length_1 === $l->id)  
                    <p style="margin:5px">{{$l->nombre}}</p>  
                @endif
            @endforeach
        </td>
        <td>
            <p style="margin:5px;color:red;">{{$formula->categoria_2}}</p> 
        </td>
        <td>
        @foreach($forma as $f)   
            @if($formula->form_2 === $f->id)  
                <p style="margin:5px">{{$f->nombre}}</p>  
            @endif
        @endforeach
        </td>       
        <td>
        @foreach($estampado as $e)   
            @if($formula->printed_2 === $e->id)  
                <p style="margin:5px">{{$e->nombre}}</p>  
            @endif
        @endforeach
        </td>
        <td>       
        @foreach($color as $col)   
            @if($formula->colored_2 === $col->id)  
                <p style="margin:5px">{{$col->nombre}}</p>  
            @endif
        @endforeach   
        </td>
        <td>           
        @foreach($largo as $l)   
            @if($formula->length_2 === $l->id)  
                <p style="margin:5px">{{$l->nombre}}</p>  
            @endif
        @endforeach
        </td>
        <td>
            <p style="margin:5px;color:red;">{{$formula->categoria_3}}</p> 
        </td>
        <td>
        @foreach($forma as $f)   
            @if($formula->form_3 === $f->id)  
                <p style="margin:5px">{{$f->nombre}}</p>  
            @endif
        @endforeach
        </td>
        <td>               
        @foreach($estampado as $e)   
            @if($formula->printed_3 === $e->id)  
                <p style="margin:5px">{{$e->nombre}}</p>  
            @endif
        @endforeach
        </td>
        <td>               
        @foreach($color as $col)   
            @if($formula->colored_3 === $col->id)  
                <p style="margin:5px">{{$col->nombre}}</p>  
            @endif
        @endforeach
        </td>
        <td>                   
        @foreach($largo as $l)   
            @if($formula->length_3 === $l->id)  
                <p style="margin:5px">{{$l->nombre}}</p>  
            @endif
        @endforeach
        </td>               
        <td>
            <p><a class="links"  href="/formula/{{ $formula->id }}/edit"  style="color:green;margin:5px;font-size:0.8em;">Editar</a></p>
            <p><a class="links" href="/formula/{{ $formula->id }}/delete"  style="color:green;margin:5px;font-size:0.8em;">Eliminar</a></p>        
        </td>
</tr>
@endforeach
</table>
<div class="index">
    <p class="white"><a class="links" href="/formula/create">Nueva Formula</a></p>
</div>
</section>

@endsection



