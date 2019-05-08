@extends('template.basic')

@section('content')

    <!-- BANNER -->
    <section class="banner">
        <div class="BannerInfo">
            <h1> Guardarropa Digital </h1>
            <a class="botonIng" href="/item">Ingresar</a>
            @if(isset($msgOff)) <p style="background-color:red;color:white;">{{ $msgOff}}</p> @endif
        </div>
    </section>
    <!-- FIN BANNER -->

    <section class="IntroText">
        <article>
            <h2>Qué Tengo? Qué me Pongo? Qué Compro?</h2>        
            <p >Tus mejores conjuntos con tu propia ropa. Armalos según tu estilo ó te sugerimos tus mejores combinaciones.</p>
            <p class="lineatxt"></p>
        </article>
    </section>
    
    <!-- SECCION QUE TENGO -->
    <section class="secWel">        
        <div class="ContenidoWel">
            <article class="ImgWel">
                <img src="/image/bannerseisuno.jpg" alt="">
            </article>
        </div>
        <article class="SeccionIntroWel">            
            <h2>Qué Tengo</h2>
            <p style="margin-bottom:20px;">Tus prendas y accesorios en tus manos las 24hs. Tus items digitalizados para usar el 100% de tu guardarropa.</p>
            <div class="botonIng">
                <a href="/item">Ingresar</a>
            </div>
        </article>
    </section>

    <!-- SECCION QUE ME PONGO -->
    <section class="secWel">
        <div class="ContenidoWel qPongoImg">
            <article class="ImgWel">
                <img src="/image/bannerseisuno.jpg" alt="">
            </article>
        </div>
        <article class="SeccionIntroWel qPongoTex">            
            <h2>Qué me Pongo</h2>
            <p style="margin-bottom:20px;">Los mejores conjuntos para el día, trabajo y la noche. Armalos según tu estilo ó te sugerimos combinaciones que le sientan mejor a tu cuerpo.</p>
            <div class="botonIng">
                <a href="/item">Ingresar</a>
            </div>
        </article>
    </section>
    
    <!-- SECCION QUE COMPRO -->
    <section class="secWel">        
        <div class="ContenidoWel">
            <article class="ImgWel">
                <img src="/image/bannerseisuno.jpg" alt="">
            </article>        
        </div>
        <article class="SeccionIntroWel">            
            <h2>Qué Compro</h2>
            <p style="margin-bottom:20px;">Prendas y Accesorios que matchean con vos y tu guardarropa. Subilos a tu guardarropa, probá nuevos conjuntos y si te gusta... lo reservás!</p>
            <div class="botonIng">
                <a href="/producto/shop">Ingresar</a>
            </div>
        </article>
    </section>

    <!-- BANNER PRODUCTS -->    
    <section class="BannerProduct">
        <article class="TextBP">
            <h2>wGlam | Image & Style</h2>
            <p></p>
            <a href="/item">Ingresar</a>
        </article>

        <div class="bannerOpacity"></div>
    </section>

    <!--  MARCAS  -->
    <section class="Marcas">
        <div class="LogosMarcas">
            <article><img src="image/marcas/brand.png" alt=""></article>
            <article><img src="image/marcas/brand2.png" alt=""></article>
            <article><img src="image/marcas/brand3.png" alt=""></article>
            <article><img src="image/marcas/brand4.png" alt=""></article>
            <article><img src="image/marcas/brand5.png" alt=""></article>
        </div>   
    </section>

     <!-- MODO COMPRA -->
    <section class="ModoPago">
        <div class="ContCompra">
            <article class="IconCompra">
                <div><i class="fas fa-shipping-fast fa-3x"></i></div>
                <article class="InfoPago">
                    <h3>Envío Customizado</h3>
                    <p>Retiro por Sucursal ó envío a domicilio</p>
                </article>
            </article>
            <article class="IconCompra">
                <div><i class="far fa-credit-card fa-3x"></i></div>
                <article class="InfoPago">
                    <h3>Efectivo & Tarjeta de Crédito</h3>
                    <p>Todas las tarjetas</p>
                </article>
            </article>
            <article class="IconCompra">
                <div><i class="fas fa-sync-alt fa-3x"></i></div>
                <article class="InfoPago">
                    <h3>Cambios y Devolución</h3>
                    <p>Dentro de los 15 días</p>
                </article>
            </article>
        </div>
    </section>


@endsection