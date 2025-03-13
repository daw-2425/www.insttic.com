let d = document;

window.onload = (e) => {

  // let sel = d.querySelectorAll("#sele");

  // sel.forEach((element) => {
  //   element.addEventListener("click", (e) => {
  //     e.preventDefault();
  //    if (element.value === "2023") {
  //    console.log("2023")
  //     let xhr = new XMLHttpRequest();
  //     window.open('./anio1/anio1.php',null);
  //     xhr.open("GET", "./indei/in.php");
  //     console.log(xhr.responseText)
  //     xhr.send();
      
  //    } if (element.value === "2024") {
      
  //     console.log("2024")
  //     open("./anio2/anio2.php");
  //    }
     
  //   });
  // });


  function sele() {
    let xhr = new XMLHttpRequest();

    xhr.open("GET", "./anios.php");

    xhr.addEventListener("readystatechange", (e) => {
      if (xhr.readyState == 4) {
        if (xhr.status >= 200 && xhr.status < 300) {
          let json = JSON.parse(xhr.responseText);
          let cart = d.getElementById("cart");
          let body = d.getElementById("bodyM");
          let h5 = d.getElementById("estudiante");
          json.forEach((element) => {
           h5.innerHTML = "ESTUDIANTE: "+element.nombre +" "+ element.apellidos;
            
              if (element.media > 5) {
                console.log(element.media)
                body.innerHTML += `
                <tr>
                                    <td>
                                    ${element.materia}
                                    </td>
                                    <td class="text-center">
                                    
                                    <label class="text-success fw-bold">${Math.round(element.media)}</label>
                                    </td>
                                    
                                    <td  class="text-center" id="apto">
                                    <label for="" class="text-success col-12 fst-italic">apto </label>
                                    </td>
                                    <td  class="text-center" id="apto">
                                    <label for="" class="text-success col-12 fst-italic">Vista</label></td>
                                    
                                    

                                </tr>
                `;

      //           cart.innerHTML += `
      //           <ul class="list-group list-group-flush mt-3">
      //                                         <li class="list-group-item">Materia:  ${materias.nombre}</li>
      //                                         <li class="list-group-item">Nota: ${materias.nota}</li>
      //                                         <li class="list-group-item">
      //                                             <label class="text-success">APTO</label>/<label class="text-danger">NO
      //                                                 APTO: ${materias.apto}</label>
      //                                         </li>
      //                                         <li class="list-group-item">ESTADO ACADÉMICO: ${materias.estado}</li>
                                            
  
      //                                     </ul>
  
      //                                     <div class="card-body">
  
  
      //                                         <select name="" id="sele" class="form-select col-2">
      //                                             <option value="${materias.acade}">
      //                                                 ${materias.acade}
      //                                             </option>
      //                                             <option value=" ${materias.actual}">
      //                                                 ${materias.actual} 
      //                                             </option>
      //                                             <option value="2024">2024</option>
      //                                         </select>
                                             
      //                                     </div>
      //  `;
              }

              // if (
              //   element.media < 5
              // ) 
              
              // {
                // console.log(element.media)
                // body.innerHTML += `
                // <tr>
                //                     <td>
                //                     ${element.materia}
                //                     </td>
                //                     <td class="text-center">
                                    
                //                     <label class="text-danger fw-bold">${element.media}</label>
                //                     </td>
                                    
                //                     <td  class="text-center" id="apto">
                //                     <label for="" class="text-danger col-12 fst-italic">No apto</label></td>
                //                     </td>
                //                    <td  class="text-center" id="apto">
                //                     <label for="" class="text-danger col-12 fst-italic"> Vista </label></td>
                            

                //                 </tr>
                // `;
      //           cart.innerHTML += `
      //           <ul class="list-group list-group-flush mt-3">
      //                                         <li class="list-group-item">Materia:  ${materias.nombre}</li>
      //                                         <li class="list-group-item">Nota: ${materias.nota}</li>
      //                                         <li class="list-group-item">
      //                                             <label class="text-success">APTO</label>/<label class="text-danger">NO
      //                                                 APTO: ${materias.apto}</label>
      //                                         </li>
      //                                         <li class="list-group-item">ESTADO ACADÉMICO: ${materias.estado}</li>
                                           
      //                                     </ul>
  
      //                                     <div class="card-body">
  
  
      //                                         <select name="" id="sele" class="form-select col-2">
      //                                             <option value="${materias.acade}">
      //                                                 ${materias.acade}
      //                                             </option>
      //                                             <option value=" ${materias.actual}">
      //                                                 ${materias.actual}
      //                                             </option>
      //                                             <option value="2024">2024</option>
      //                                         </select>
                                            
      //                                     </div>
      //  `;
              // }




              // const chart1 = echarts.init(document.getElementById("porc"));
              // chart1.setOption(
              //   (Option = {
              //     tooltip: {
              //       show: true,
              //       trigger: "axis",
              //       triggerOn: "mousemove|click",
              //     },
              //     dataZoom: {
              //       show: true,
              //     },
              //     xAxis: {
              //       type: "category",
              //       data: [materias.acade],
              //     },
              //     yAxis: {
              //       type: "value",
              //     },
              //     series: [
              //       {
              //         data: [10],
              //         type: "bar",
              //       },
              //     ],
              //   })
              // );
           
          });

          
        }
      }
    });

    xhr.send();
  }

  sele();
  // mostrarDatos(e);

};
