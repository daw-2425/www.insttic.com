function modulo(){
    let xhr = new XMLHttpRequest();

    xhr.open("GET","./json/modulosDaw.json",true);
    xhr.addEventListener('load',function(){
        let respons = JSON.parse(xhr.response);
        // console.log(respons);
        let info = document.getElementById('barullo');
        info.innerHTML = '';
        info.innerHTML=`
            <div class="container d-flex justify-content-lg-start  mt-4 ">
              <h3 class="mx-3 DAW">DESARROLLO DE APLICACIONES WEB.</h3>
            </div>

            <div class="De">
              <div class="Definition">
                <div class="Def-txt">
                    <p>Este profesional será capaz de desarrollar, implantar, y mantener aplicaciones web, con independencia del modelo empleado y utilizando tecnologías específicas, garantizando el acceso a los datos de forma segura y cumpliendo los criterios de accesibilidad, usabilidad y calidad exigidas en los estándares establecidos.</p>
                </div>
                <div class="Def-img">
                  <img src="./img/3.jpg" alt="">
                </div>
              </div>
            </div>

            <div class="container mt-3">
              <h4 class="mx-3 modulDaw" id="modulo">MÓDULOS DEL CICLO.</h4>
            </div>

            <div class="container">
              <p class="modulo-txt">Los módulos que componen este Ciclo son los siguientes y podrás matricularte individualmente de cada uno de ellos:</p>
            </div>
        `;

        respons.forEach((e)=> {
             document.getElementById('barullo').innerHTML+=`
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
modulo();


function profesores(){
    let por = new XMLHttpRequest();

    por.open("GET","./json/profesorDaw.json",true);
    por.addEventListener('load',function(){
        let respues = JSON.parse(por.response);
        let ver = document.getElementById('barullo');
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

function salidas(){
    let salida = new XMLHttpRequest();

    salida.open("GET","./json/salidasDaw.json",true);
    salida.addEventListener('load',function(){
        let respuesta = JSON.parse(salida.response);
        let viu = document.getElementById('barullo');
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
             document.getElementById('barullo').innerHTML+=`
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

function objetivos(){
    let obje = new XMLHttpRequest();

    obje.open("GET","./json/objetivo.json",true);
    obje.addEventListener('load',function(){
        let res = JSON.parse(obje.response);

        let mostrar = document.getElementById('barullo');
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
            document.getElementById('barullo').innerHTML+=`
                <div class="container d-flex justify-content-center flex-column  mt-2">
                    <ul class="container list-group list-group-flush">
                        <li class="list-group-item">${o.objetivo}</li>
                </div>
            `
        });
        
    });

    obje.send();
}

