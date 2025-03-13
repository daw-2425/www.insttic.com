function moduloteleco() {
    let xhr = new XMLHttpRequest();

    xhr.open("GET","./json/moduloteleco.json",true);
    xhr.addEventListener('load',function(){
        let respu = JSON.parse(xhr.response);
        // console.log(respu);

        let ver = document.getElementById('telecos');
        ver.innerHTML='';
        ver.innerHTML=`
            <div class="container d-flex justify-content-start mt-5">
                <h3 class="mx-3 tele">SISTEMAS DE TELECOMUNICACIONES E INFORMACIÓN.</h3>
            </div>

            <div class="container">
                <div class="d-flex flex-wrap justify-content-between">
                    <div class=" text-teleco">
                        <p>La especialidad de telecomunicaciones se enfoca en el estudio de sistemas de comunicación, redes, tecnologías de transmisión de datos, y servivios de telecomunicaciones.</p>
                    </div>
                    <div class="col-3 d-flex justify-content-center">
                        <img class="imagen d-lg-block d-none" src="./img/3.jpg" alt="">
                    </div>
                </div>
            </div>

            <div class="container mt-4">
                <h4 class="mx-1 modulo">MÓDULOS DEL CICLO.</h4>
            </div>

            <div class="container">
                <p class="modulo-txt mt-2">Los módulos que componen este Ciclo son los siguientes y podrás matricularte individualmente de cada uno de ellos:</p>
            </div>
        `;

        respu.forEach((e) => {
           document.getElementById('telecos').innerHTML+=`
            <div class="container">
                <ul class="container list-group list-group-flush" id="tele">
                    <li class="list-group-item">${e.tele}</li> 
                </ul>
            </div>
           ` 
        });
        
    });
    xhr.send();
}

moduloteleco();

function salidasteleco(){
    let on = new XMLHttpRequest();

    on.open("GET","./json/telecosalida.json",true);
    on.addEventListener('load',function(){
        let sali = JSON.parse(on.response);

        let sal = document.getElementById('telecos');
        sal.innerHTML = '';
        sal.innerHTML=`
            <div class="container d-flex justify-content-start mt-4">
                <h3 class="mx-3 DAW">SALIDAS PROFESIONALES.</h3>
            </div>

             <div class="container-fluid text-salida d-flex justify-content-start">
                <div class="container">
                    <p class="mt-2 modulo-txt">Las personas con este perfil profesional podrán trabajar en Áreas de informática de entidades que dispongan de sistemas para la gestión de datos e infraestructura de redes (intranet,internet y/o extranet).</p>
                </div>
            </div>

            <div class="container d-flex justify-content-start mt-4">
                <p class="mb-2 text-salida">Las ocupaciones y puestos de trabajo más relevantes son los siguientes:</p>
            </div>
        `;

        sali.forEach((e)=>{
            document.getElementById('telecos').innerHTML+=`
                <div class="container d-flex justify-content-center flex-column  mt-2">
                    <ul class="container list-group list-group-flush" id="salidateleco">
                         <li class="list-group-item">${e.salidateleco}</li>
                    </ul>
                </div>
            `
        });
    });
    on.send()
}

function profesoresteleco(){
    let profe = new XMLHttpRequest();

    profe.open("GET","./json/profesorteleco.json",true);
    profe.addEventListener('load',function(){
        let respue = JSON.parse(profe.response);
        let ver = document.getElementById('telecos');
        ver.innerHTML='';
        ver.innerHTML=`
            <div class="container d-flex justify-content-center justify-content-lg-start  mt-4">
                <h3 class="mx-3 DAW">PROFESORES DE LA ESPECIALIDAD.</h3>
            </div>
            
            <div class="container d-flex justify-content-around flex-wrap " id="caja_tele">
            
            </div>
        `;

        respue.forEach((e)=>{
            document.getElementById('caja_tele').innerHTML+=`
                

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
    profe.send();
}

function objetivosteleco(){
    let objet = new XMLHttpRequest();

    objet.open("GET","./json/objeteleco.json",true);
    objet.addEventListener('load',function(){
        let res = JSON.parse(objet.response);

        let mostrar = document.getElementById('telecos');
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
            document.getElementById('telecos').innerHTML+=`
                <div class="container d-flex justify-content-center flex-column  mt-2">
                    <ul class="container list-group list-group-flush">
                        <li class="list-group-item">${o.objetivo}</li>
                </div>
            `
        });
        
    });

    objet.send();
}
