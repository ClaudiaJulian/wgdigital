window.onload=function(){

// ** ELEGIR PRENDAS POR CLICK PARA CREAR CONJUNTOS MANUALMENTE USUARIO LOGUEADO ** //

// BUSCAR BAG con querySelectorAll
var seleccionarBag=document.querySelectorAll(".bag");
if(seleccionarBag){
    for(let i=0; i< seleccionarBag.length ; i++){
        //console.log(seleccionarBag.length);      
        seleccionarBag[i].addEventListener('click', mostrarBag);
        let arrayBag = [];    
        var b = 0;
        
        function mostrarBag(){        
            var ajaxCall=new XMLHttpRequest();                
            ajaxCall.onreadystatechange = function(){  
                if(ajaxCall.readyState === 4 && ajaxCall.status === 200){      
                    var respuesta = JSON.parse(ajaxCall.response);
                    arrayBag = respuesta;
            // console.log(arrayBag);
                    seleccionarBag[i].setAttribute('id', arrayBag[b]['id']);     
                    seleccionarBag[i].setAttribute('src', arrayBag[b]['photo']); 
                    seleccionarBag[i].classList.add('myBag');  
            // console.log(arrayBag[b]['photo']);
                    b = b + 1;
                    if(b === arrayBag.length){
                     b=0;
                    }
            // console.log(b);                
                }
            }

            ajaxCall.open(
                'GET',
                '/seleccionar/bag',
                true
            );
            ajaxCall.send();
        }
    } // cierre del For
} // cierre del if


// BUSCAR SHOES
let seleccionarShoes=document.querySelectorAll(".shoes");
if(seleccionarShoes){
    for(let i=0; i< seleccionarBag.length ; i++){
        seleccionarShoes[i].addEventListener('click', mostrarShoes);

        let arrayShoes = [];
        var s = 0;

        function mostrarShoes(){        
            var ajaxCall=new XMLHttpRequest();        
            ajaxCall.onreadystatechange = function(){  
                if(ajaxCall.readyState === 4 && ajaxCall.status === 200){      
                    var respuesta = JSON.parse(ajaxCall.response);
                    arrayShoes = respuesta;
                    seleccionarShoes[i].setAttribute('id', arrayShoes[s]['id']);     
                    seleccionarShoes[i].setAttribute('src', arrayShoes[s]['photo']);
                    seleccionarShoes[i].classList.add('myShoes'); 
                // console.log(arrayShoes[s]['photo']);
                    s = s + 1;
                    if(s === arrayShoes.length){
                    s=0;
                    }
                // console.log(s);                
                }
            }
        
            ajaxCall.open(
            'GET',
            '/seleccionar/shoes',
            true
            );
            ajaxCall.send();
        }       
    }
}

// BUSCAR TOP
let seleccionarTop=document.querySelector(".top");
if(seleccionarTop){
seleccionarTop.addEventListener('click', mostrarTop);

let arrayTop = [];
var t = 0;

function mostrarTop(){
        
    var ajaxCall=new XMLHttpRequest();        
        
        ajaxCall.onreadystatechange = function(){  
        if(ajaxCall.readyState === 4 && ajaxCall.status === 200){      
        var respuesta = JSON.parse(ajaxCall.response);
        arrayTop = respuesta;
        seleccionarTop.setAttribute('id', arrayTop[t]['id']);     
        seleccionarTop.setAttribute('src', arrayTop[t]['photo']);
        seleccionarTop.classList.add('myTop'); 
        // console.log(arrayTop[t]['photo']);
        t = t + 1;
            if(t === arrayTop.length){
            t=0;
            }
        // console.log(t);
                
        }
        }
        
        ajaxCall.open(
            'GET',
            '/seleccionar/top',
            true
           );
        ajaxCall.send();
}
}

// BUSCAR BOTTOM
let seleccionarBottom=document.querySelector(".bottom");
if(seleccionarBottom){
seleccionarBottom.addEventListener('click', mostrarBottom);

let arrayBottom = [];
var m = 0;

function mostrarBottom(){
        
    var ajaxCall=new XMLHttpRequest();        
        
        ajaxCall.onreadystatechange = function(){  
        if(ajaxCall.readyState === 4 && ajaxCall.status === 200){      
        var respuesta = JSON.parse(ajaxCall.response);
        arrayBottom = respuesta;
        
            seleccionarBottom.setAttribute('id', arrayBottom[m]['id']);     
            seleccionarBottom.setAttribute('src', arrayBottom[m]['photo']);
            seleccionarBottom.classList.add('myBottom'); 
                
            m = m + 1;
            if(m === arrayBottom.length){
            m=0;
            }
                
        }
        }
        
        ajaxCall.open(
            'GET',
            '/seleccionar/bottom',
            true
           );
        ajaxCall.send();
}
}

// BUSCAR OUTWEAR
let seleccionarOutwear=document.querySelector(".outwear");
if(seleccionarOutwear){
seleccionarOutwear.addEventListener('click', mostrarOutwear);

let arrayOutwear = [];
var o = 0;

function mostrarOutwear(){
        
    var ajaxCall=new XMLHttpRequest();        
        
        ajaxCall.onreadystatechange = function(){  
        if(ajaxCall.readyState === 4 && ajaxCall.status === 200){      
        var respuesta = JSON.parse(ajaxCall.response);
        arrayOutwear = respuesta;
        //console.log(arrayOutwear);
        seleccionarOutwear.setAttribute('id', arrayOutwear[o]['id']);   
        seleccionarOutwear.setAttribute('src', arrayOutwear[o]['photo']); 
        seleccionarOutwear.classList.add('myOutwear');
        // console.log(arrayOutwear[o]['photo']);
        o = o + 1;
            if(o === arrayOutwear.length){
            o=0;
            }
        // console.log(o);
                
        }
        }
        
        ajaxCall.open(
            'GET',
            '/seleccionar/outwear',
            true
           );
        ajaxCall.send();
}
}

// BUSCAR BAG GUARDARROPA GENERICO
let generalBag=document.querySelector(".masterBag");
if(generalBag){
    generalBag.addEventListener('click', masterBag);

    let arrayBag = [];
    var b = 0;

    function masterBag(){        
        var ajaxCall=new XMLHttpRequest();                
        ajaxCall.onreadystatechange = function(){  
            if(ajaxCall.readyState === 4 && ajaxCall.status === 200){      
            var respuesta = JSON.parse(ajaxCall.response);
            arrayBag = respuesta;
            console.log(arrayBag);    
            generalBag.setAttribute('src', arrayBag[b]['photo']); 
            // console.log(arrayBag[b]['photo']);
            b = b + 1;
            if(b === arrayBag.length){
                b=0;
            }
            // console.log(b);                
            }
        }        
        ajaxCall.open(
            'GET',
            '/seleccionar/masterBag',
            true
           );
        ajaxCall.send();
    }
}

// BUSCAR SHOES GUARDARROPA GENERICO
let generalShoes=document.querySelector(".masterShoes");
if(generalShoes){
generalShoes.addEventListener('click', masterShoes);

let arrayShoes = [];
var s = 0;

function masterShoes(){
        var ajaxCall=new XMLHttpRequest();        
        
        ajaxCall.onreadystatechange = function(){  
        if(ajaxCall.readyState === 4 && ajaxCall.status === 200){      
        var respuesta = JSON.parse(ajaxCall.response);
        arrayShoes = respuesta;
            
        generalShoes.setAttribute('src', arrayShoes[s]['photo']); 
        // console.log(arrayShoes[s]['photo']);
        s = s + 1;
            if(s === arrayShoes.length){
            s=0;
            }
        // console.log(s);
                
        }
        }
        
        ajaxCall.open(
            'GET',
            '/seleccionar/masterShoes',
            true
           );
        ajaxCall.send();
}
}

// BUSCAR TOP GUARDARROPA GENERICO
let generalTop=document.querySelector(".masterTop");
if(generalTop){
generalTop.addEventListener('click', masterTop);

let arrayTop = [];
var t = 0;

function masterTop(){
        var ajaxCall=new XMLHttpRequest();        
        
        ajaxCall.onreadystatechange = function(){  
        if(ajaxCall.readyState === 4 && ajaxCall.status === 200){      
        var respuesta = JSON.parse(ajaxCall.response);
        arrayTop = respuesta;
            
        generalTop.setAttribute('src', arrayTop[t]['photo']); 
        // console.log(arrayTop[t]['photo']);
        t = t + 1;
            if(t === arrayTop.length){
            t=0;
            }
        // console.log(t);
                
        }
        }
        
        ajaxCall.open(
            'GET',
            '/seleccionar/masterTop',
            true
           );
        ajaxCall.send();
}
}

// BUSCAR BOTTOM GUARDARROPA GENERICO
let generalBottom=document.querySelector(".masterBottom");
if(generalBottom){
generalBottom.addEventListener('click', masterBottom);

let arrayBottom = [];
var m = 0;

function masterBottom(){
        var ajaxCall=new XMLHttpRequest();        
        
        ajaxCall.onreadystatechange = function(){  
        if(ajaxCall.readyState === 4 && ajaxCall.status === 200){      
        var respuesta = JSON.parse(ajaxCall.response);
        arrayBottom = respuesta;
            
        generalBottom.setAttribute('src', arrayBottom[m]['photo']); 
        // console.log(arrayBottom[m]['photo']);
        m = m + 1;
            if(m === arrayBottom.length){
            m=0;
            }
        // console.log(m);
                
        }
        }
        
        ajaxCall.open(
            'GET',
            '/seleccionar/masterBottom',
            true
           );
        ajaxCall.send();
}
}

// BUSCAR OUTWEAR GUARDARROPA GENERICO
let generalOutwear=document.querySelector(".masterOutwear");
if(generalOutwear){
generalOutwear.addEventListener('click', masterOutwear);

let arrayOutwear = [];
var o = 0;

function masterOutwear(){
        var ajaxCall=new XMLHttpRequest();        
        
        ajaxCall.onreadystatechange = function(){  
        if(ajaxCall.readyState === 4 && ajaxCall.status === 200){      
        var respuesta = JSON.parse(ajaxCall.response);
        arrayOutwear = respuesta;
        console.log(arrayOutwear);  
        generalOutwear.setAttribute('src', arrayOutwear[o]['photo']); 
        // console.log(arrayOutwear[o]['photo']);
        o = o + 1;
            if(o === arrayOutwear.length){
            o=0;
            }
        // console.log(o);
                
        }
        }
        
        ajaxCall.open(
            'GET',
            '/seleccionar/masterOutwear',
            true
           );
        ajaxCall.send();
}
}


// ** OBJETIVO -> GUARDAR UN OUTFIT CREADO MANUALMENTE  POR USUARIO LOGUEADO** //
// CHEQUEAR SI ES NECESARIO INCLUIR EL USER ID DESDE EL JS

let myCreate=document.querySelector(".myCreate");
if(myCreate){
    myCreate.addEventListener('click', guardarMyCreate);
    
    function guardarMyCreate(){            
            let myTop=document.querySelector(".myTop");
                if(myTop){
                    var t_id = myTop.getAttribute('id');
                    var top=document.querySelector(".subirTop");
                    top.setAttribute('value',t_id);
                    top.setAttribute('name','top');
                } else { console.log('Falta el Top');}
                

            let myBottom=document.querySelector(".myBottom");
                if(myBottom){
                    var b_id = myBottom.getAttribute('id');
                    var bottom=document.querySelector(".subirBottom");
                    bottom.setAttribute('value',b_id);
                    bottom.setAttribute('name','bottom');
                } else { console.log('Falta el Bottom');}
                
            
            let myOutwear=document.querySelector(".myOutwear");
                if(myOutwear){
                    var o_id = myOutwear.getAttribute('id');
                    var outwear=document.querySelector(".subirOutwear");
                    outwear.setAttribute('value',o_id);
                    outwear.setAttribute('name','outwear');        
                } else { console.log('Falta el Outwear');}
                

            let myBag=document.querySelector(".myBag");
                if(myBag){
                    var ba_id = myBag.getAttribute('id');
                    var bag=document.querySelector(".subirBag");
                    bag.setAttribute('value',ba_id);
                    bag.setAttribute('name','bag');
                } else { console.log('Falta el Bag');}
                
                
            let myShoes=document.querySelector(".myShoes");
                if(myShoes){
                    var s_id = myShoes.getAttribute('id');
                    var shoes=document.querySelector(".subirShoes");
                    shoes.setAttribute('value',s_id);      
                    shoes.setAttribute('name','shoes');      
                } else { console.log('Falta el Shoes');}
                

            var fd=new FormData();
            // fd.set('_token',t_id);
            // fd.set('myTop',t_id);
            console.log(fd);
                      
            var ajax= new XMLHttpRequest();

            ajax.onreadystatechange = function(){  
                if(ajax.readyState === 4 && ajax.status === 200){ 
                    console.log(ajax.response);}
                };

            ajax.open('POST','/outfit/create',true); 

            var csrfToken= $('meta[name="csrf-token"]').attr('content');
            ajax.setRequestHeader("X-CSRFToken",csrfToken);
            ajax.setRequestHeader("content-type","application/x-www-form-urlencoded");        
            
            ajax.send(JSON.stringify(fd));                       
        
            
    } // cierre funtion guardarMyCreate
} // cierre if myCreate

    
// GUARDAR UN OUTFIT QUE VIENE DE SUGERIDOS - FORMULA  
// CHEQUEAR SI HAY QUE INCLUIR EL USER EN JS

let myPref=document.querySelectorAll(".myPreferido");
if(myPref){
    myPref.forEach(el => {
    el.addEventListener('click', guardarMyPref);    
    function guardarMyPref(){     
            let myTop=document.querySelector(".topFor");
            var dato=myTop.getAttribute('id');

            let myBag=document.querySelector(".myBag");                
                if(myBag){                  
                    var ba_id = myBag.getAttribute('id');
                    let bag=document.querySelectorAll(".subirBag");
                    bag.forEach(el=>{
                        el.setAttribute('value',ba_id);
                        el.setAttribute('name','bag');
                    });                   
                } else { console.log('Falta el Bag');}
                                
            let myShoes=document.querySelector(".myShoes");
                if(myShoes){
                    var s_id = myShoes.getAttribute('id');
                    let shoes=document.querySelectorAll(".subirShoes");
                    shoes.forEach(el=>{
                        el.setAttribute('value',s_id);      
                        el.setAttribute('name','shoes');  
                    });    
                } else { console.log('Falta el Shoes');}


            var fd=new FormData();
                    console.log(fd);
                      
            let ajax= new XMLHttpRequest();

            ajax.onreadystatechange = function(){  
                if(ajax.readyState === 4 && ajax.status === 200){ 
                    console.log(ajax.response);}
                };
            var url = '/outfit/'+ dato;    

            ajax.open('post',url,true); 

            var csrfToken= $('meta[name="csrf-token"]').attr('content');
            ajax.setRequestHeader("X-CSRFToken",csrfToken);
            ajax.setRequestHeader("content-type","application/x-www-form-urlencoded");        
            
            ajax.send(JSON.stringify(fd));                       
                    
    } // cierre funtion guardarMyPref
}); // cierre del forEach
} // cierre if myPref

// OCULTAR CARACTERISTICAS SEGUN CATEGORIA

var categoria= document.querySelector(".categoria");
if(categoria){
categoria.addEventListener("change",ocultar);

function ocultar(){ 
    console.log('funciona');
    var x= document.getElementById("mySelect").selectedIndex;
    
    if(x){
        if(x > 5 && x < 11){
            var form = document.querySelector(".form");
            var length = document.querySelector(".length");
            form.style.display="none";
            length.style.display="none";
            }
        if(x < 6){
            var form = document.querySelector(".form");
            var length = document.querySelector(".length");
            var colored = document.querySelector(".colored");
            var printed = document.querySelector(".printed");
            var tipo_w = document.querySelector(".tipo_w");   
            form.style.display="unset";
            length.style.display="unset";
            colored.style.display="unset";
            printed.style.display="unset";
            tipo_w.style.display="unset";
                }       
        if(x > 10){
            var form = document.querySelector(".form");
            var length = document.querySelector(".length");
            form.style.display="none";
            length.style.display="none";           
            var colored = document.querySelector(".colored");
            var printed = document.querySelector(".printed");
            var tipo_w = document.querySelector(".tipo_w");   
            colored.style.display="none";
            printed.style.display="none";
            tipo_w.style.display="none";
        
            }      
    }
}
}

// PREVIEW IMAGE

var file= document.querySelector(".imgup"); //  input
if(file){
    file.addEventListener("change",mostrarPreview);

    function mostrarPreview(){
        var preview = document.querySelector(".preview"); 
        var info = document.querySelector(".imgInfo"); 
        preview.style.display="unset";
        info.style.display="none";

        var dato = file.files[0];
        var reader = new FileReader();

      reader.addEventListener("load",function(){
          preview.src=reader.result;
      },false);

      if(dato){
          reader.readAsDataURL(dato);
      }

    } // cierre de mostrarPreview
} // cierre del if

// INFO POR TIPO DE CUERPO - VISTA PERFIL

let cuerpo= document.querySelector(".formaCuerpo");
if(cuerpo){
cuerpo.addEventListener("change",buscar);

function buscar(){    
    var x= document.getElementById("formaCuerpo").selectedIndex;
    if(x){
    console.log(x);
    var imagen=document.querySelector(".imgCuerpo");
    var nota=document.querySelector(".textCuerpo");
    var nota1=document.querySelector(".textCuerpo1");

            if(x=== 1){
                console.log('reloj de arena');
                var img="/image/cuerpo/img_reloj.jpg";
                imagen.setAttribute('src', img);
                nota.innerHTML="Figura Curvilínea. La cintura es marcada. Los hombros y caderas están en la misma altura y el tamaño del busto es mediano ó grande.";
                nota1.innerHTML="Los Mejores Cortes: Tops & Pantalones: Adherentes ó Entallados.  Abrigos: Adherentes ó Entallados.";
            }
            if(x=== 2){
                console.log('columnar');
                var img="/image/cuerpo/img_columnar.jpg";
                imagen.setAttribute('src', img);
                nota.innerHTML="Figura muy delgada. La cintura no es marcada. Los hombros y caderas están en la misma altura y el tamaño del busto es pequeño ó mediano.";
                nota1.innerHTML="Los Mejores Cortes:  Tops: Rectos ó Amplios. Pantalones: Adherentes, Entallados, Rectos ó Amplios. Abrigos: Todos.";
            }
            if(x=== 3){
                console.log('rectangular');
                var img="/image/cuerpo/img_rectangular.jpg";
                imagen.setAttribute('src', img);
                nota.innerHTML="Figura con pocas Curvas. La cintura no es marcada. Los hombros y caderas están en la misma altura y el tamaño del busto es mediano.";
                nota1.innerHTML="Los Mejores Cortes: Tops: Adherentes, Entallados, Rectos & Amplios.  Pantalones: Entallados & Amplios. Abrigos: Adherentes ó Entallados.";
            }
            if(x=== 4){
                console.log('triangular');
                var img="/image/cuerpo/img_triangular.jpg";
                imagen.setAttribute('src', img);
                nota.innerHTML="Figura curvilínea. Tu cintura es marcada. Tus caderas son más anchas que los hombros y el tamaño de tu busto es pequeño ó mediano.";
                nota1.innerHTML="Los Mejores Cortes: Tops: Entallados ó Rectos.  Pantalones: Entallados. Abrigos: Adherentes ó Entallados.";
            }
            if(x=== 5){
                console.log('cono');
                var img="/image/cuerpo/img_cono.jpg";
                imagen.setAttribute('src', img);
                nota.innerHTML="Los hombros son más anchos que las caderas. La cintura es pequeña ó mediana. La cadera es pequeña y el tamaño del busto es pequeño ó mediano.";
                nota1.innerHTML="Los Mejores Cortes:  Tops: Entallados ó Rectos.  Pantalones: Entallados, Rectos ó Amplios. Abrigos: Adherentes ó Entallados.";
            }
            if(x=== 6){
                console.log('oval');
                var img="/image/cuerpo/img_oval.jpg";
                imagen.setAttribute('src', img);
                nota.innerHTML="Figura redondeada. Muy poca cintura. El ancho de las caderas y los hombros son similares y el tamaño del busto puede ser pequeño, mediano ó grande.";
                nota1.innerHTML="Los Mejores Cortes: Tops: Rectos.  Pantalones: Entallados ó Rectos. Abrigos: Entallados ó Rectos.";
            }
}
}
}

//LOVE

let love=document.querySelectorAll(".love");
let texto=document.querySelectorAll(".texto");

love.forEach(element => {

    element.addEventListener('mouseover', cambio);
    element.addEventListener('mouseout', leave);
    let loveId = element.getAttribute('id');
    function cambio(){  
       texto.forEach(e =>{
           var textoId= e.getAttribute('id');
           if(textoId === loveId){
           e.style.color="grey";
           e.style.fontStyle="italic";
        //    e.style.background="yellow";
           }
       })                                                                                        
    }  
    function leave(){  
        texto.forEach(e=>{
            var textoId= e.getAttribute('id');
            if(textoId === loveId){
            e.style.color="white";
            // e.style.background="none";
            }                                   
        element.removeEventListener('mouseover',leave); 
    })                                              
    }  
});

// prueba

let prueba=document.querySelector(".prueba");
if(prueba){
    function cambio(){
        prueba.style.color="red";
    }  
    function vuelta(){
     prueba.style.color="black";
    }    
    prueba.addEventListener('mouseover',cambio);
    prueba.addEventListener('mouseout',vuelta);

}

// INCORPORA AYUDA PARA CREATE ITEM PRODUCTO
// class="info" sirve para recibir todas las distintas características de items ó productos.

let colored = document.querySelector(".colored");
if(colored){       
    function informar(){
        var el=document.querySelector(".info");
        el.style.background="red";
        el.innerHTML="Los colores neutros son aquellos que combinan con todos los colores. Blanco, Negro, Grises, Marrón, Beige, Manteca y Jeans. Si el item tiene colores neutros y otros colores se considera del grupo Otros Colores. ";           
    }
    // function remove(){
    //     var el=document.querySelector(".info");
    //     el.style.background="none";
    //     el.innerHTML="";           
    // }
    colored.addEventListener('click',informar);
    // colored.addEventListener('focusout',remove);
}

let printed = document.querySelector(".printed");
if(printed){       
    function informar(){
        var el=document.querySelector(".info");
        el.style.background="red";
        el.innerHTML="Los estampados son los diseños ó dibujos que tiene el item. Los slogans ó grafities no se consideran estampados. ";           
    }
    // function remove(){
    //     var el=document.querySelector(".info");
    //     el.style.background="none";
    //     el.innerHTML="";           
    // }
    printed.addEventListener('click',informar);
    // printed.addEventListener('focusout',remove);
}

let form = document.querySelector(".form");
if(form){       
    function informar(){
        var el=document.querySelector(".info");
        el.style.background="red";
        el.innerHTML="ADHERENTES: Remeras de licra, corset, leggings; ENTALLADOS: Camisa ó Blazer con Pinzas, blusas con elástico debajo el busto, Jeans semi chupín, Oxford, Cigarette. RECTOS: Tops y Outwear con igual ancho de axilas y borde inferior. AMPLIOS: Blusas con mayor ancho de borde inferior que de axilas. Babuchas, Pantalón piernas anchas.";
        // el.innerHTML="Adherentes: Pegados a la piel. Ej. Calzas; Entallados: Dibujan la forma del cuerpo. Ej. Camisa con Pinzas. Rectos: Tienen forma cuadrada ó rectangular. Tops con igual ancho de axilas y borde inferior. Amplios: Tienen exceso de tela. Tops con mayor ancho de borde inferior que de axilas.";                      
    }
    // function remove(){
    //     var el=document.querySelector(".info");
    //     el.style.background="none";
    //     el.innerHTML="";           
    // }
    form.addEventListener('click',informar);
    // form.addEventListener('focusout',remove);
}

let length = document.querySelector(".length");
if(length){       
    function informar(){
        var el=document.querySelector(".info");
        el.style.background="red";
        el.innerHTML="Tops ó Outwears Cortos: Arriba del ombligo; Pantalones Cortos: Arriba de tobillos; Vestidos Cortos: Arriba de rodilla. Tops ó Outwears Standard: A la cintura; Pantalones Standard: A los tobillos; Vestidos Standard: A la rodilla. Tops ó Outwears Largos: Debajo de Cadera; Pantalones Largos: Al piso; Vestidos Largos: Debajo de rodilla.";           
    }
    // function remove(){
    //     var el=document.querySelector(".info");
    //     el.style.background="none";
    //     el.innerHTML="";           
    // }
    length.addEventListener('click',informar);
    // length.addEventListener('focusout',remove);
}

var tipo = document.querySelector(".tipo_w");
if(tipo){       
    function remove(){
        var el=document.querySelector(".info");
        el.style.background="none";
        el.innerHTML="";           
    }
    tipo.addEventListener('click',remove);
   
}

// MENSAJE EN PROCESO

let enProceso=document.querySelector(".enProceso");
if(enProceso){
    enProceso.addEventListener('click',mostrar);
    function mostrar(){        
        var mensaje=document.getElementById("mensaje");
        if(mensaje){
            mensaje.classList.remove("mostrar");
        }
    }
}

// NO FUNCIONA !!! FILTRO POR GUARDARROPA

var tipo= document.querySelector(".tipo_w");
if(tipo){
tipo.addEventListener("change",filtrar);

function filtrar(){ 
    // console.log('funciona');
    var x= document.getElementById("tipo_w").selectedIndex;
    if(x){
        var fd=new FormData(document.getElementById("filtro")); // NO FUNCIONA
        fd.append('tipo_w',x); // NO FUNCIONA
              
        let ajax= new XMLHttpRequest();

        ajax.onreadystatechange = function(){  
            if(ajax.readyState === 4 && ajax.status === 200){ 
                console.log(ajax.response);}
            };

        var url = '/wardrobe/filtro';    
        ajax.open('post',url,true); 

        var csrfToken= $('meta[name="csrf-token"]').attr('content');
        ajax.setRequestHeader("X-CSRFToken",csrfToken);
        ajax.setRequestHeader("content-type","application/x-www-form-urlencoded");        
        // ajax.setRequestHeader("content-type","false");
        // ajax.setRequestHeader("process-data","false");

        // ajax.send(JSON.stringify(fd));
        ajax.send(JSON.stringify("tipo_w="+x)); 
        // ajax.send("tipo_w="+x);                          
    }  
}
}


} // cierre onload




 

