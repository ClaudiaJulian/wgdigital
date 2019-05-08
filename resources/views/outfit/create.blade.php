@extends('template.basic')

@section('content')

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
        @if(isset($seller)) <p style="background-color:red;"> {{$seller}} </p> @else
        <p>Clickeá y grabá el conjunto que más te guste</p>
        @endif
    </div>
  
</section>

<section class="principal">
    <ul class="errors">
        @if($errors->all())<li> Faltan completar datos.</li> @endif        
        {{-- @foreach ($errors->all() as $error) <li>{{$error}}</li> @endforeach --}}
    </ul>

    @if(isset($seller)) <p>{{ 'Conectate con wGlam' }}</p> @else 
    <form method= "POST" id="outfit" action="" name="outfit" style="text-align: center;" enctype="multipart/form-data">
        @csrf 
        @if(isset($mensaje))             
            <p> {{$mensaje}} </p>
        @endif
     <div class="index margin10">    
         <ul class="cajaOutfit2">
             <li class="column3"> 
                 <div class="boxtop"> 
                     {{-- 2May borré clase "on" de top    --}}
                     <img class="top alt" alt="Click to Choose TOP">
                     <input type="hidden" class="subirTop" >
                 </div>

                 <div class="boxacc">
                    <img class="bag alt"  alt="Click to Choose BAG">
                    <input type="hidden" class="subirBag">
                </div>  
            </li>
            <li class="column4">  
                 <div class="boxbottom">
                     <img class="bottom alt" alt="Click to Choose BOTTOM">
                     <input type="hidden" class="subirBottom">
                 </div>                 
             </li>

             <li class="column5">
                 <div class="boxoutwear">
                     <img class="outwear alt" alt="Click to Choose OUTWEAR">
                     <input type="hidden" class="subirOutwear">
                 </div>
               
                 <div class="boxshoes">
                      <img class="shoes alt" alt="Click to Choose SHOES"> 
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
                 <input type="checkbox" name="work" value="1" selected>Work
                 <input type="checkbox" name="day" value="1" selected>Day
                 <input type="checkbox" name="night" value="1" selected>Night 
            </div>                   
            <button class="myCreate botonGuardarOut">Guardar</button>        
        </div>
    <article>    
    </form> 
    
     <script rel="javascript" type="text/javascript" src="../js/wglam.js"></script> 
    @endif       
 </section>





@endsection