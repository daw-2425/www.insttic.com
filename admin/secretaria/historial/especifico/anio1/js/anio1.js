

let d = document;
window.onload = (e) => {


  let sel = d.querySelectorAll("#sele");

  sel.forEach((element) => {
    element.addEventListener("click", (e) => {
     if (element.value === "2024/2025") {
      open("../main.php");
     } if (element.value === "2024") {
      open("../anio2/anio2.php");
     }
     
    });
  });


  function sele() {
    
    let xhr = new XMLHttpRequest();

    xhr.open("GET", "./anio1.json");

      xhr.addEventListener("readystatechange", (e) => {
        if (xhr.readyState == 4) {
          if (xhr.status >= 200 && xhr.status < 300) {
            let json = JSON.parse(xhr.responseText);
            let cart = d.getElementById("cart");
            let body = d.getElementById("bodyM");
           json.forEach(element => {
          
            element.anio1.forEach(materias => {
              if (materias.nota >= 5 && materias.apto === "apto" && materias.estado === "Vista") {
                body.innerHTML += `
                <tr>
                                    <td>
                                    ${materias.nombre}
                                    </td>
                                    <td class="text-center">
                                    
                                    <label class="text-success fw-bold">${materias.nota}</label>
                                    </td>
                                    
                                    <td  class="text-center" id="apto">
                                    <label for="" class="text-success col-7 fst-italic"> ${materias.apto}</label>
                                    </td>
                                    <td  class="text-center" id="apto">
                                    <label for="" class="text-success col-7 fst-italic"> ${materias.estado}</label></td>
                                    
                                    
                                    
                                </tr>
                ` 
                cart.innerHTML += `
                <ul class="list-group list-group-flush mt-3">
                                              <li class="list-group-item">Materia:  ${materias.nombre}</li>
                                              <li class="list-group-item">Nota: ${materias.nota}</li>
                                              <li class="list-group-item">
                                                  <label class="text-success">APTO</label>/<label class="text-danger">NO
                                                      APTO: ${materias.apto}</label>
                                              </li>
                                              <li class="list-group-item">ESTADO ACADÉMICO: ${materias.estado}</li>
  
                                          </ul>
  
                                          <div class="card-body">
  
  
                                              <select name="" id="sele" class="form-select col-2">
                                                  <option value="${materias.actual}">
                                                      ${materias.actual}
                                                  </option>
                                                  <option value=" ${materias.acade}">
                                                      ${materias.acade}
                                                  </option>
                                                  <option value="2024">2024</option>
                                              </select>
                                              <a href="" class="text-success"><i class="fa-solid fa-print"></i></a>
                                          </div>
       `;
              };

              if (materias.nota < 5 && materias.apto === "no apto" && materias.estado === "Pendiente") {
                body.innerHTML += `
                <tr>
                                    <td>
                                    ${materias.nombre}
                                    </td>
                                    <td class="text-center">
                                    
                                    <label class="text-danger fw-bold">${materias.nota}</label>
                                    </td>
                                    
                                    <td  class="text-center" id="apto">
                                    <label for="" class="text-danger col-7 fst-italic"> ${materias.apto}</label></td>
                                    </td>
                                   <td  class="text-center" id="apto">
                                    <label for="" class="text-danger col-7 fst-italic"> ${materias.estado}</label></td>
                                    
                                </tr>
                `;
                cart.innerHTML += `
                <ul class="list-group list-group-flush mt-3">
                                              <li class="list-group-item">Materia:  ${materias.nombre}</li>
                                              <li class="list-group-item">Nota: ${materias.nota}</li>
                                              <li class="list-group-item">
                                                  <label class="text-success">APTO</label>/<label class="text-danger">NO
                                                      APTO: ${materias.apto}</label>
                                              </li>
                                              <li class="list-group-item">ESTADO ACADÉMICO: ${materias.estado}</li>
  
                                          </ul>
  
                                          <div class="card-body">
  
  
                                               <select name="" id="sele" class="form-select col-2">
                                                  <option value="${materias.actual}">
                                                      ${materias.actual}
                                                  </option>
                                                  <option value=" ${materias.acade}">
                                                      ${materias.acade}
                                                  </option>
                                                  <option value="2024">2024</option>
                                              </select>
                                              <a href="" class="text-success"><i class="fa-solid fa-print"></i></a>
                                          </div>
       `; 
              }
             
              // const chart1 = echarts.init(document.getElementById("porc"));
              // chart1.setOption( Option =
              //       {
              //         tooltip:{
              //             show: true,
              //             trigger:'axis',
              //             triggerOn: 'mousemove|click'
              //         },
              //         dataZoom:{
              //             show:true
              //         },
              //         xAxis: {
              //           type: 'category',
              //           data: [materias.actual]
              //         },
              //         yAxis: {
              //           type: 'value'
              //         },
              //         series: [
              //           {
              //             data: [9],
              //             type: 'bar'
              //           }
              //         ]
              //       }
              //     )
              

            });
           
            
           });

          }
        }
      });

      xhr.send();
   
  }


 

  sele();
};