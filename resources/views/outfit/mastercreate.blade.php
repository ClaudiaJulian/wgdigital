@extends('template.basic')

@section('content')


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
        <p>Con un click armá tu outfit preferido</p>
    </div>

</section>
<section class="principal">    

    <form method= "POST" id="masteroutfit" action="" name="masteroutfit" style="text-align: center;" enctype="multipart/form-data">
       <div class="index margin10"> 
        <ul class="cajaOutfit2">
            <li class="column3"> 
                <div class="boxtop">                               
                    <img class="masterTop topFor alt" id="" alt="Click to Choose TOP">
                    <input type="hidden" class="subirTop" >
                </div>
                <div class="boxacc">
                    <img class="masterBag alt" id="" alt="Click to Choose BAG">
                </div>
            </li>
            <li class="column4">     
                <div class="boxbottom">
                    <img class="masterBottom bottomFor alt" id="" alt="Click to Choose BOTTOM">
                </div>                 
            </li>
            <li class="column5">
                <div class="boxoutwear">
                    <img class="masterOutwear outFor alt" id="" alt="Click to Choose OUTWEAR">
                </div>
                <div class="boxshoes">
                    <img class="masterShoes alt" id="" alt="Click to Choose SHOES">
                </div>                   
        <!-- <img class="other" src="" alt="Choose OTHER">  -->
            </li>               
        </ul>
        </div>
        {{-- <div class="index" >                        
            <label for=""></label>
            <input type="checkbox" name="work" value="1" selected>Work
            <input type="checkbox" name="day" value="1" selected>Day
            <input type="checkbox" name="night" value="1" selected>Night            

            <button><a href="../../item" style="text-decoration: none;color:black;">Guardar</a></button>        
        </div> --}}
    </form>
    <div class="index">                        
        <button class="botonGral"><a href="/item">Compartir</a></button> 
    </div>

    <script src="../js/wglam.js"></script>
</section>

@endsection