@extends('template.basic')

@section('content')

<ul class="errors">
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>    
    @endforeach
</ul>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<section class="content"> 
    <div class="white">
        <ul class="nav-menu">                                   
            <li><a href="/item">Home</a></li>         
            <li><a href="/guardarropa">Mi Guardarropa</a></li>                
            <li><a href="/outfit">Mis Looks</a></li>            
            <li><a href="/producto/shop">Shop</a></li>
            <li><a href="/guardarropa">Ayuda</a></li>                    
        </ul>  
    </div>

    <div class="BannerWardrobe">
        <p>Completá el look que más te guste</p>
    </div>
</section>

<section class="principal">
@if($find !== 0)
    @foreach($qtotal as $key => $value)
        @foreach($value as $q)    
            @if($q !== 0)
                @for($i=0 ; $i<$q ; $i++ )
                <form method= "POST" id="outfit" action="" name="outfit" style="text-align:center;margin-bottom:50px;" enctype="multipart/form-data">
                @csrf 
                 
                @if(isset($mensaje))
                     <p> {{$mensaje}} </p>
                @endif
            
                <div class="index margin10">         
                <ul class="cajaOutfit2">               
                    <li class="column3">                                
                        <div class="boxtop">
                            @foreach($qb[$key] as $qBot) @endforeach
                            @foreach($qo[$key] as $qOut) @endforeach
                    
                            @foreach($qt[$key] as $qTop)                    
                                @if(($qTop !== $qBot && $qTop !== $qOut && $qBot !== $qOut ) || $qTop === 1)                             
                                    @if($i<$qTop)
                                        <img class="topFor" name="top" id="{{$conjunto[$key][0][$i][1]}}" src="{{asset($conjunto[$key][0][$i][0]) }}" alt="TOP">
                                        <input type="hidden" name="top" value="{{$conjunto[$key][0][$i][1]}}">
                                    @else
                                        <img class="topFor" name="top" id="{{$conjunto[$key][0][$i-floor($i/$qTop) * $qTop][1]}}" src="{{asset($conjunto[$key][0][$i-floor($i/$qTop) * $qTop][0]) }}" alt="TOP">
                                        <input type="hidden" name="top" value="{{$conjunto[$key][0][$i-floor($i/$qTop) * $qTop][1]}}">
                                    @endif
                                @elseif($qBot === 1 && $qOut === 1)
                                    @if($i<$qTop)                                   
                                        <img class="topFor" name="top" id="{{$conjunto[$key][0][$i][1]}}" src="{{asset($conjunto[$key][0][$i][0]) }}" alt="TOP">
                                        <input type="hidden" name="top" value="{{$conjunto[$key][0][$i][1]}}">
                                    @else                                   
                                        <img class="topFor" name="top" id="{{$conjunto[$key][0][$i-floor($i/$qTop)*$qTop][1]}}" src="{{asset($conjunto[$key][0][$i-floor($i/$qTop)*$qTop][0]) }}" alt="TOP">
                                        <input type="hidden" name="top" value="{{$conjunto[$key][0][$i-floor($i/$qTop)*$qTop][1]}}">
                                    @endif 
                                @else
                                        <img class="topFor" name="top" id="{{$conjunto[$key][0][floor($i/$qTop)][1]}}" src="{{asset($conjunto[$key][0][floor($i/$qTop)][0]) }}" alt="TOP">                              
                                        <input type="hidden" name="top" value="{{$conjunto[$key][0][floor($i/$qTop)][1]}}">
                                @endif                                                                            
                            @endforeach
                        </div>
                        <div class="boxacc">
                            <img class="bag alt" id="" alt="Click to Choose BAG">
                            <input type="hidden" class="subirBag">
                        </div>
                    </li>
                    <li class="column4">    
                        <div class="boxbottom">
                            @foreach($qb[$key] as $qBot)                    
                                @if(($qTop !== $qBot && $qTop !== $qOut && $qBot !== $qOut ) || ($qBot === 1))                      
                                    @if($i<$qBot)      
                                        <img class="bottomFor" name="bottom" id="{{$conjunto[$key][1][$i][1]}}" value="{{$conjunto[$key][1][$i][1]}}" src="{{asset($conjunto[$key][1][$i][0]) }}" alt="BOTTOM">
                                        <input type="hidden" name="bottom" value="{{$conjunto[$key][1][$i][1]}}">
                                    @else
                                        <img class="bottomFor" name="bottom" id="{{$conjunto[$key][1][$i-floor($i/$qBot) * $qBot][1]}}" value="{{$conjunto[$key][1][$i-floor($i/$qBot) * $qBot][1]}}" src="{{asset($conjunto[$key][1][$i-floor($i/$qBot) * $qBot][0]) }}" alt="BOTTOM">
                                        <input type="hidden" name="bottom" value="{{$conjunto[$key][1][$i-floor($i/$qBot) * $qBot][1]}}">
                                    @endif
                                @elseif(($qTop === 1 && $qOut === 1) || ($qBot === 1 && $qOut === 1) || ($qBot === $qTop) )                                                    
                                    @if($i<$qBot)      
                                        <img class="bottomFor" name="bottom" id="{{$conjunto[$key][1][$i][1]}}" value="{{$conjunto[$key][1][$i][1]}}" src="{{asset($conjunto[$key][1][$i][0]) }}" alt="BOTTOM">
                                        <input type="hidden" name="bottom" value="{{$conjunto[$key][1][$i][1]}}">
                                    @else
                                        <img class="bottomFor" name="bottom" id="{{$conjunto[$key][1][$i-floor($i/$qBot) * $qBot][1]}}" value="{{$conjunto[$key][1][$i-floor($i/$qBot) * $qBot][1]}}" src="{{asset($conjunto[$key][1][$i-floor($i/$qBot) * $qBot ][0]) }}" alt="BOTTOM">
                                        <input type="hidden" name="bottom" value="{{$conjunto[$key][1][$i-floor($i/$qBot) * $qBot][1]}}">
                                    @endif
                                @else
                                    <img class="bottomFor" name="botton" id="{{$conjunto[$key][1][floor($i/$qBot)][1]}}" value="{{$conjunto[$key][1][floor($i/$qBot)][1]}}" src="{{asset($conjunto[$key][1][floor($i/$qBot)][0]) }}" alt="BOTTOM"> 
                                    <input type="hidden" name="bottom" value="{{$conjunto[$key][1][floor($i/$qBot)][1]}}">
                                @endif
                            @endforeach
                        </div>
                    </li>
                    <li class="column5">
                        <div class="boxoutwear">                 
                            @foreach($qo[$key] as $qOut) 
                                @if($i<$qOut)                    
                                    <img class="outFor" name="outwear" id="{{ $conjunto[$key][2][$i][1] }}" src="{{asset($conjunto[$key][2][$i][0]) }}" alt="OUTWEAR">
                                    <input type="hidden" name="outwear" value="{{$conjunto[$key][2][$i][1]}}">
                                @else                            
                                    <img class="outFor" name="outwear" id="{{ $conjunto[$key][2][$i-floor($i/$qOut) * $qOut][1] }}" src="{{asset($conjunto[$key][2][$i-floor($i/$qOut) * $qOut][0]) }}" alt="OUTWEAR">                           
                                    <input type="hidden" name="outwear" value="{{$conjunto[$key][2][$i-floor($i/$qOut) * $qOut][1]}}">
                                @endif
                            @endforeach
                        </div>                                                                                                                               
                        <div class="boxshoes">
                            <img class="shoes alt" id="" alt="Click to Choose SHOES">
                            <input type="hidden" class="subirShoes">
                        </div>                                           
        <!-- <img class="other" src="" alt="Choose OTHER">  -->
                    </li>                      
                </ul> 
            </div>   
            <article class="index">
                <div class="navUso">
                    <div class="cajaUso">                       
                        <label for=""></label>
                        <input type="checkbox" name="work" value="1" class="work" selected>Work
                        <input type="checkbox" name="day" value="1" class="day" selected>Day
                        <input type="checkbox" name="night" value="1" class="night" selected>Night                       
                    </div>    
                    <button class="myPreferido botonGuardarOut">Guardar</button>        
                </div>
            </article>
            </form>

                @endfor
            @endif          
        @endforeach
    @endforeach
@else
    <ul class="container">
        <p>No se han encontrado conjuntos completos para esta prenda</p>
    </ul>    
@endif
    <script src="../js/wglam.js"></script>
</section>

@endsection