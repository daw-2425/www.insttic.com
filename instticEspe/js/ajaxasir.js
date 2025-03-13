function moduloasir(){
    let xhr = new XMLHttpRequest();

    xhr.open("GET","./json/asirmodulo.json",true);
    xhr.addEventListener('load',function(){
        let respons = JSON.parse(xhr.response);
        // console.log(respons);
        let info = document.getElementById('asir_con');
        info.innerHTML = '';
        info.innerHTML=`
            <div class="container d-flex justify-content-lg-start  mt-4 ">
              <h3 class="mx-3 DAW">ADMINISTRACIÓN DE SISTEMAS INFORMATICOS.</h3>
            </div>

            <div class="De">
              <div class="Definition">
                <div class="asir-txt">
                    <p>Este profesional será capaz de administrar sistemas operativos de servidor,instalando y configurando el software, en condiciones de calidad para
                    asegurar el funcionamiento del sistema , tambien será capaz de administrar servicios de red(web,mensajería electrónica y transferencia de archivos,
                    entre otros) instalando y configurando el software ,en condiciones de calidad entre otras habilidades.</p>
                </div>
                <div class="Def-img">
                  <img src="./img/3.jpg" alt="">
                </div>
              </div>
            </div>

            <div class="container mt-3">
              <h4 class="mx-3 modulasir">MÓDULOS DEL CICLO.</h4>
            </div>

            <div class="container">
              <p class="modulo-txt">Los módulos que componen este Ciclo son los siguientes y podrás matricularte individualmente de cada uno de ellos:</p>
            </div>
        `;

        respons.forEach((e)=> {
             document.getElementById('asir_con').innerHTML+=`
                <div class="container">
                    <ul class="container list-group list-group-flush" id="mod">
                        <li class="list-group-item">${e.modulo}</li>
                    </ul>
                </div>
                
            `;
        });
        
    });
    xhr.send();
}
moduloasir();


function profesoresasir(){
    let por = new XMLHttpRequest();

    por.open("GET","./json/profesoreasir.json",true);
    por.addEventListener('load',function(){
        let respues = JSON.parse(por.response);
        let ver = document.getElementById('asir_con');
        ver.innerHTML="";
        ver.innerHTML=`
            <div class="container d-flex justify-content-start mt-4">
                <h3 class="mx-3 DAW">PROFESORES DE LA ESPECIALIDAD.</h3>
            </div>
            
            <div class="container d-flex justify-content-around flex-wrap " id="caja">
            
            </div>
        `;

        respues.forEach((e)=>{
            document.getElementById('caja').innerHTML+=`
                

                    <div class="card">
                    <div class="content">
                        <span></span>
                        <div class="img">
                            <img src="${e.foto}" alt="">
                        </div>
                        <h4>${e.nombre}</h4>
                        <h6>${e.apellidos}</h6>
                    </div>
                    </div>

               
            `
        });
    });
    por.send();
}

function salidasasir(){
    let salida = new XMLHttpRequest();

    salida.open("GET","./json/asirsalida.json",true);
    salida.addEventListener('load',function(){
        let respuesta = JSON.parse(salida.response);
        let viu = document.getElementById('asir_con');
        viu.innerHTML='';
        viu.innerHTML=`
            <div id="text_salida">
                <div class="container d-flex justify-content-start mt-4">
                    <h3 class="mx-3 DAW">SALIDAS PROFESIONALES.</h3>
                </div>
                <div class="container d-flex justify-content-start">
                    <div class="container titulo">
                        <p class="mt-2 ">Las personas con este perfil profesional ejercen su actividad en empresas o entidades públicas o privadas tanto por cuenta ajena como propia, desempeñando su trabajo en el área de desarrollo de aplicaciones informáticas relacionadas con entornos Web (intranet, extranet e internet).</p>
                    </div>
                </div>
                <div class="container  mt-2">
                    <p class="mb-2 mx-2 text-salida">Las ocupaciones y puestos de trabajo más relevantes son los siguientes:</p>
                </div>          
            </div>
        `;

        respuesta.forEach((a)=>{
             document.getElementById('asir_con').innerHTML+=`
                <div class="container d-flex justify-content-center flex-column  mt-2">
                    <ul class="container list-group list-group-flush" id="profe">
                         <li class="list-group-item">${a.salida}</li>
                    </ul>
                </div>
            `
        });
    });
    salida.send();
}

function objetivosasir(){
    let obje = new XMLHttpRequest();

    obje.open("GET","./json/objetivo.json",true);
    obje.addEventListener('load',function(){
        let res = JSON.parse(obje.response);

        let mostrar = document.getElementById('asir_con');
        mostrar.innerHTML='';
        mostrar.innerHTML=`
        
        <div class="container d-flex justify-content-start mt-4">
            <h3 class="mx-3 DAW">OBJETIVOS.</h3>
        </div>

        <div class="container-fluid d-flex justify-content-start">
            <div class="container">
                <p class="mt-2 mx-1">
                    Los objetivos generales de este ciclo formativo son los siguientes:
                </p>
            </div>
        </div>
        
        `;

        res.forEach((o)=>{
            document.getElementById('asir_con').innerHTML+=`
                <div class="container d-flex justify-content-center flex-column  mt-2">
                    <ul class="container list-group list-group-flush">
                        <li class="list-group-item">${o.objetivo}</li>
                </div>
            `
        });
        
    });

    obje.send();
}
