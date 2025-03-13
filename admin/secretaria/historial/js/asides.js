let d = document;

window.onload = (e) => {


  function select() {
    let select = d.querySelectorAll("#select");
    let histo = d.getElementById("histo");
    select.forEach((el) => {
      
      el.addEventListener("click", (e) => {
        let xhr = new XMLHttpRequest();
        console.log(el.value);
        xhr.open("post", "./datos.php");

        xhr.addEventListener("readystatechange", (e) => {
          if (xhr.readyState == 4) {
            if (xhr.status >= 200 && xhr.status < 300) {
              let json = JSON.parse(xhr.responseText);
              let body = d.getElementById("body");
              let cart = d.querySelector(".cart");
              body.innerHTML = " ";
              json.forEach((element) => {
                
                  if (element.nombre == el.value) {
                    histo.innerHTML = `HISTORIAL ACADEMICO DE LA ${el.value}`;
                    console.log(element);

                    body.innerHTML += ` 

                    <tr>
                        <td id="img">
                            <img src="" alt="">
                        </td>
                        <td>${element.Alumno}</td>
                        <td>${element.apellidos}</td>
                        <td>${element.contacto_emergencia}</td>
                        <td>${element.denominacion}</td>
                        <td>Fermin Pocoburu</td>
                        <td>${element.año_inicio} / ${element.año_fin}</td>
                        <td>${element.DIP}</td>
                        <td>${element.edad}</td>
                         <td class="text-center">
                                <a href="./especifico/crear-cookie.php?pagina_a=${element.id_alumno}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        
      
                    </tr>
      
       `;

    //                 cart.innerHTML += `
    //      <img src="${datos.perfil}" class="card-img-top" alt="..." id="img-cart">
    
    //                                         <div class="card-body">
    //                                             <h5 class="card-title text-center datosE">Datos De ${datos.nombre}</h5>
    
    //                                         </div>
    
    //                                         <div id="cart">
    
                                           
                                            
    
    //      <ul class="list-group list-group-flush mt-3">
    //                                    <li class="list-group-item">Nombre:  ${datos.nombre}</li>
    //                                    <li class="list-group-item">Apellidos: ${datos.Apellidos}</li>
    //                                    <li class="list-group-item">Contacto: ${datos.contacto}</li>
    //                                    <li class="list-group-item">Epecialidad: ${datos.especialidad}</li>
    //                                    <li class="list-group-item">Tutor: ${datos.tutor}</li>
    //                                    <li class="list-group-item">Año Académico: ${datos.añoA}</li>
    //                                    <li class="list-group-item">DIP: ${datos.dip}</li>
    //                                    <li class="list-group-item">Edad: ${datos.anios}</li>
    //                                </ul>
    
    //                                <div class="card-body">
    
    
    //                                     <a href="./especifico/"><i class="fa-regular fa-eye"></i></a>
                                       
    //                                </div>
    //                                </div>
    // `;
                  }
                  if (el.value === "todos") {
                    histo.innerHTML = "TODAS LAS GENERACIONES";
         console.log(element)
                    body.innerHTML += ` 

                    <tr>
                        <td id="img">
                            <img src="" alt="">
                        </td>
                        <td>${element.Alumno}</td>
                        <td>${element.apellidos}</td>
                        <td>${element.contacto_emergencia}</td>
                        <td>${element.denominacion}</td>
                        <td>Fermin Pocoburu</td>
                        <td>${element.año_inicio} / ${element.año_fin}</td>
                        <td>${element.DIP}</td>
                        <td>${element.edad}</td>
                         <td class="text-center">
                                <a href="./especifico/crear-cookie.php?pagina_a=${element.id_alumno}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        
      
                    </tr>
      
       `;
         
    //                 cart.innerHTML += `
    //      <div id="respon">
    //      <img src="${datos.perfil}" class="card-img-top" alt="..." id="img-cart">
    
    //                                         <div class="card-body">
    //                                             <h5 class="card-title text-center datosE">Datos De ${datos.nombre}</h5>
    
    //                                         </div>
    
    //                                         <div id="cart">
    
                                           
                                            
    
    //      <ul class="list-group list-group-flush mt-3">
    //                                    <li class="list-group-item">Nombre:  ${datos.nombre}</li>
    //                                    <li class="list-group-item">Apellidos: ${datos.Apellidos}</li>
    //                                    <li class="list-group-item">Contacto: ${datos.contacto}</li>
    //                                    <li class="list-group-item">Epecialidad: ${datos.especialidad}</li>
    //                                    <li class="list-group-item">Tutor: ${datos.tutor}</li>
    //                                    <li class="list-group-item">Año Académico: ${datos.añoA}</li>
    //                                    <li class="list-group-item">DIP: ${datos.dip}</li>
    //                                    <li class="list-group-item">Edad: ${datos.anios}</li>
    //                                </ul>
    
    //                                <div class="card-body">
    
    
    //                                     <a href="./especifico/"><i class="fa-regular fa-eye"></i></a>
                                     
    //                                </div>
    //                                </div>
    //                                 </div>
    // `;
                  }
              
              });
            }
          }
        });
        xhr.send();
      }); ///
    });
  }

  function mostrarDatos(e) {
    let xhr = new XMLHttpRequest();

    xhr.open("GET", "./datos.php");
    let select = d.querySelectorAll("#select");
    let histo = d.getElementById("histo");
    
    select.forEach((element) => {
      // console.log(element)
      xhr.addEventListener("readystatechange", (e) => {
        
        if (xhr.readyState == 4) {
          if (xhr.status >= 200 && xhr.status < 300) {
            let json = JSON.parse(xhr.responseText);
            
            let body = d.getElementById("body");
            let cart = d.querySelector(".cart");
            
           
      
json.forEach(element => {
  console.log(element)

  if (element.nombre === "Generación 2024-2025") {
    // console.log(element.value);
    histo.innerHTML = `HISTORIAL ACADEMICO DE LA ${element.nombre}`;

    body.innerHTML += ` 

              <tr>
                  <td id="img">
                      <img src="" alt="">
                  </td>
                  <td>${element.Alumno}</td>
                  <td>${element.apellidos}</td>
                  <td>${element.contacto_emergencia}</td>
                  <td>${element.denominacion}</td>
                  <td>Fermin Pocoburu</td>
                  <td>${element.año_inicio} / ${element.año_fin}</td>
                  <td>${element.DIP}</td>
                  <td>${element.edad}</td>
                   <td class="text-center">
                          <a href="./especifico/crear-cookie.php?pagina_a=${element.id_alumno}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                      </td>
                  

              </tr>

 `;
//                   cart.innerHTML += `
//                    <div id="respon">
//      <img src="${datos.perfil}" class="card-img-top" alt="..." id="img-cart">

//                                         <div class="card-body">
//                                             <h5 class="card-title text-center datosE">Datos De ${datos.nombre}</h5>

//                                         </div>

//                                         <div id="cart">

                         
                          

//      <ul class="list-group list-group-flush mt-3">
//                                    <li class="list-group-item">Nombre:  ${datos.nombre}</li>
//                                    <li class="list-group-item">Apellidos: ${datos.Apellidos}</li>
//                                    <li class="list-group-item">Contacto: ${datos.contacto}</li>
//                                    <li class="list-group-item">Epecialidad: ${datos.especialidad}</li>
//                                    <li class="list-group-item">Tutor: ${datos.tutor}</li>
//                                    <li class="list-group-item">Año Académico: ${datos.añoA}</li>
//                                    <li class="list-group-item">DIP: ${datos.dip}</li>
//                                    <li class="list-group-item">Edad: ${datos.anios}</li>
//                                </ul>

//                                <div class="card-body">


//                                     <a href="./especifico/"><i class="fa-regular fa-eye"></i></a>
                     
//                                </div>
//                                </div>
//                                 </div>
// `;
  }

});

          
            // body.innerHTML = " ";
//             json.forEach((el) => {
//             console.log(el);
//               el.historial.forEach((datos) => {
//                 if (datos.añoA === "2024/2025") {
//                   // console.log(element.value);
//                   histo.innerHTML = `HISTORIAL ACADEMICO DEL AÑO ${element.value}`;

//                   body.innerHTML += ` 
     
//                             <tr>
//                                 <td id="img">
//                                     <img src="${datos.perfil}" alt="">
//                                 </td>
//                                 <td>${datos.nombre}</td>
//                                 <td>${datos.Apellidos}</td>
//                                 <td>${datos.contacto}</td>
//                                 <td>${datos.especialidad}</td>
//                                 <td>${datos.tutor}</td>
//                                 <td>${datos.añoA}</td>
//                                 <td>${datos.dip}</td>
//                                 <td>${datos.anios}</td>
//                                  <td class="text-center">
//                                         <a href="./especifico/" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
//                                     </td>
                                

//                             </tr>
     
//      `;
// //                   cart.innerHTML += `
// //                    <div id="respon">
// //      <img src="${datos.perfil}" class="card-img-top" alt="..." id="img-cart">

// //                                         <div class="card-body">
// //                                             <h5 class="card-title text-center datosE">Datos De ${datos.nombre}</h5>

// //                                         </div>

// //                                         <div id="cart">

                                       
                                        

// //      <ul class="list-group list-group-flush mt-3">
// //                                    <li class="list-group-item">Nombre:  ${datos.nombre}</li>
// //                                    <li class="list-group-item">Apellidos: ${datos.Apellidos}</li>
// //                                    <li class="list-group-item">Contacto: ${datos.contacto}</li>
// //                                    <li class="list-group-item">Epecialidad: ${datos.especialidad}</li>
// //                                    <li class="list-group-item">Tutor: ${datos.tutor}</li>
// //                                    <li class="list-group-item">Año Académico: ${datos.añoA}</li>
// //                                    <li class="list-group-item">DIP: ${datos.dip}</li>
// //                                    <li class="list-group-item">Edad: ${datos.anios}</li>
// //                                </ul>

// //                                <div class="card-body">


// //                                     <a href="./especifico/"><i class="fa-regular fa-eye"></i></a>
                                   
// //                                </div>
// //                                </div>
// //                                 </div>
// // `;
//                 }
//               });
//             });
          }
        }
      });

      xhr.send();
    });
  }


  function buscar() {
    let buscar = d.getElementById("buscar");

    let xhr = new XMLHttpRequest();

    xhr.open("GET", "./datos.json");

    xhr.addEventListener("readystatechange", (e) => {
      if (xhr.readyState == 4) {
        if (xhr.status >= 200 && xhr.status < 300) {
          buscar.addEventListener("keyup", (e) => {
            console.log(buscar.value);

            let json = JSON.parse(xhr.responseText);
            let body = d.getElementById("body");
            let cart = d.querySelector(".cart");
            json.forEach((el) => {
              body.innerHTML = "";
              el.historial.forEach((ele) => {
                if (buscar.value === ele.nombre) {
                  body.innerHTML += ` 
           
                <tr>
                    <td id="img">
                        <img src="${ele.perfil}" alt="">
                    </td>
                    <td>${ele.nombre}</td>
                    <td>${ele.Apellidos}</td>
                    <td>${ele.contacto}</td>
                    <td>${ele.especialidad}</td>
                    <td>${ele.tutor}</td>
                    <td>${ele.añoA}</td>
                    <td>${ele.dip}</td>
                    <td>${ele.anios}</td>
                     <td class="text-center">
                                        <a href="./especifico/" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                   
  
                </tr>
  
  `;
  cart.innerHTML += `
   <div id="respon">
  <img src="${ele.perfil}" class="card-img-top" alt="..." id="img-cart">

                                     <div class="card-body">
                                         <h5 class="card-title text-center datosE">Datos De ${ele.nombre}</h5>

                                     </div>

                                     <div id="cart">

                                    
                                     

  <ul class="list-group list-group-flush mt-3">
                                <li class="list-group-item">Nombre:  ${ele.nombre}</li>
                                <li class="list-group-item">Apellidos: ${ele.Apellidos}</li>
                                <li class="list-group-item">Contacto: ${ele.contacto}</li>
                                <li class="list-group-item">Epecialidad: ${ele.especialidad}</li>
                                <li class="list-group-item">Tutor: ${ele.tutor}</li>
                                <li class="list-group-item">Año Académico: ${ele.añoA}</li>
                                <li class="list-group-item">DIP: ${ele.dip}</li>
                                <li class="list-group-item">Edad: ${ele.anios}</li>
                            </ul>

                            <div class="card-body">


                                 <a href="./especifico/"><i class="fa-regular fa-eye"></i></a>
                               
                            </div>
                            </div>
                             </div>
`;
                }
                if (buscar.value === null) {
                  body.innerHTML += ` 
           
                <tr>
                    <td id="img">
                        <img src="${ele.perfil}" alt="">
                    </td>
                    <td>${ele.nombre}</td>
                    <td>${ele.Apellidos}</td>
                    <td>${ele.contacto}</td>
                    <td>${ele.especialidad}</td>
                    <td>${ele.tutor}</td>
                    <td>${ele.añoA}</td>
                    <td>${ele.dip}</td>
                    <td>${ele.anios}</td>
                     <td class="text-center">
                                        <a href="./especifico/" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                   
                </tr>
  
  `;
  cart.innerHTML += `
  <div id="respon">
  <img src="${ele.perfil}" class="card-img-top" alt="..." id="img-cart">

                                     <div class="card-body">
                                         <h5 class="card-title text-center datosE">Datos De ${ele.nombre}</h5>

                                     </div>

                                     <div id="cart">

                                    
                                     

  <ul class="list-group list-group-flush mt-3">
                                <li class="list-group-item">Nombre:  ${ele.nombre}</li>
                                <li class="list-group-item">Apellidos: ${ele.Apellidos}</li>
                                <li class="list-group-item">Contacto: ${ele.contacto}</li>
                                <li class="list-group-item">Epecialidad: ${ele.especialidad}</li>
                                <li class="list-group-item">Tutor: ${ele.tutor}</li>
                                <li class="list-group-item">Año Académico: ${ele.añoA}</li>
                                <li class="list-group-item">DIP: ${ele.dip}</li>
                                <li class="list-group-item">Edad: ${ele.anios}</li>
                            </ul>

                            <div class="card-body">


                                 <a href="./especifico/" class="text-center"><i class="fa-regular fa-eye"></i></a>
                               
                            </div>
                            </div>
                             </div>
`;
                }
              });
            });
          });
        }
      }
    });
    xhr.send();
  }

  mostrarDatos(e);
  buscar();
  select();
};
