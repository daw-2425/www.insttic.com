<?php

require_once('gestion/conexion.php');



try {

  $conectar->getConexion();

  $MAterias = "SELECT * FROM materia";
  $stmt = $conectar->getConexion()->prepare($MAterias);
  $stmt->execute();

  $materias = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo json_encode($materias);

} catch (PDOException $e) {

  echo json_encode(array('Se ha producido un Error' => $e->getMessage()));
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="./css/all.css">
  <link rel="stylesheet" href="./css/bootstrap.css">
  <link rel="stylesheet" href="./css/estilos.css">
  <link rel="stylesheet" href="./css/all.min.css">
  <link rel="stylesheet" href="./css/fontawesome.min.css">
  <link rel="stylesheet" href="./css/estilosNotas.css">
  <link rel="stylesheet" href="./css/sweetalert2.css">
</head>

<body>

  <div class="general conteiner-fluid d-flex">



    <?php include('./components/aside.php') ?>


    <?php include('./components/asideResponsive.php') ?>

    <div class="main">
      <div class="container-fluid encabezado d-flex d-lg-none ">
        <header class="encabezado  col-12 d-flex justify-content-between">
          <a class="btn logo">
            <img src="./img/logoi.png" alt="">
          </a>
          <a class="btn d-flex d-lg-none text-white" data-bs-toggle="offcanvas" data-bs-target="#menuBar"
            aria-controls="offcanvasScrolling">
            <i class="fa-solid fa-bars"></i>
          </a>
        </header>
      </div>

      <div class="main-header conteiner  p-2 d-flex">
        <!-- <header class="header">
                <a class="btn logo">
                    <img src="./img/logoi.png" alt="">
                </a>
                
            </header> -->
        <div class="buscardor  col-5 p-2 col-lg-9 d-none d-lg-block">
          <div class="lupa">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Buscar...">
            <i class="fa-solid fa-microphone micreo"></i>
          </div>

        </div>
        <div class="perfil col-2 d-none d-lg-flex">
          <div class="imagen">
            <img src="./img/perfil/perfil.jpg" alt="">
          </div>
          <div class="nombre d-none d-lg-block">
            <span>Admin</span>
          </div>
          <i class="fa-regular fa-bell d-none d-lg-block"></i>
        </div>



      </div>
      <!---BOTONES DEL MENU DE ESPECIALIDADES--->
      <div class="dap">
        <div class="btn-nav mt-1">
          <div>
            <div class="btn" id="btn-daw">TS-DAW</div>
          </div>
          <div>
            <div class="btn" id="btn-asir">TS-ASIR</div>
          </div>
          <div>
            <div class="btn" id="btn-tlc">TS-TLC</div>
          </div>
          <div>
            <div class="btn" id="btn-mic">TM-MIC</div>
          </div>
        </div>

        <div class="tablas">
          <div class="table daw mt-3" id="daw">
            <div class="title">
              <h3 class="title">Alumnos de DAW</h3>
            </div>
            <div class="centrar">
              <div class="thead">
                <div class="tr">
                  <div class="th">Nombre</div>
                  <div class="th">Apellido</div>
                  <div class="th">Codigo</div>
                  <div class="th">Gestion de Notas</div>
                </div>
              </div>
              <div class="scrollTbody">
                <div class="tbody" id="tbodydaw">
                  <!-- <div class="tr">
                    <div class="th">Antonio Ruben</div>
                    <div class="th">Ndong Nchama</div>
                    <div class="th">04</div>
                    <div class="th">
                      <div class="btn nota" style="background-color: #0A2A66;" id="nota-insertarDaw"><i
                          style="color: white;" class="fa-solid fa-plus"></i></div>
                      <div class="btn ver-nota" style="background-color: green;" id="ver-notaDaw"><i
                          style="color: white;" class="fa-regular fa-eye"></i></div>
                      <div class="btn ver-nota" style="background-color: #3C91E6;" id="actualizar-notaDaw"><i
                          style="color: white;" class="fa-solid fa-square-pen"></i></div>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>

          <div class="table asir mt-3" id="asir">
            <div class="title">
              <h3>Alumnos de ASIR</h3>
            </div>
            <div class="centrar">

              <div class="thead">
                <div class="tr">
                  <div class="th">Nombre</div>
                  <div class="th">Apellido</div>
                  <div class="th">Numlist</div>
                  <div class="th">Gestion de Notas</div>
                </div>
              </div>
              <div class="scrollTbody">
                <!-- <div class="tbody">
                  <div class="tr">
                    <div class="th">Antonio Ruben</div>
                    <div class="th">Ndong Nchama</div>
                    <div class="th">04</div>
                    <div class="th">
                      <div class="btn nota" style="background-color: #0A2A66;" id="nota-insertarAsir"><i
                          style="color: white;" class="fa-solid fa-plus"></i></div>
                      <div class="btn ver-nota" style="background-color: green;" id="ver-notaAsir"><i
                          style="color: white;" class="fa-regular fa-eye"></i></div>
                      <div class="btn ver-nota" style="background-color: #3C91E6;" id="actualizar-notaAsir"><i
                          style="color: white;" class="fa-solid fa-square-pen"></i></div>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>

          <div class="table tlc mt-3" id="tlc">
            <div class="title">
              <h3>Alumnos de TLC</h3>
            </div>
            <div class="centrar">

              <div class="thead">
                <div class="tr">
                  <div class="th">Nombre</div>
                  <div class="th">Apellido</div>
                  <div class="th">Numlist</div>
                  <div class="th">Gestion de Notas</div>
                </div>
              </div>
              <div class="scrollTbody">
                <!-- <div class="tbody">
                  <div class="tr">
                    <div class="th">Antonio Ruben</div>
                    <div class="th">Ndong Nchama</div>
                    <div class="th">04</div>
                    <div class="th">
                      <div class="btn nota" style="background-color: #0A2A66;" id="nota-insertarTlc"><i
                          style="color: white;" class="fa-solid fa-plus"></i></div>
                      <div class="btn ver-nota" style="background-color: green;" id="ver-notaTlc"><i
                          style="color: white;" class="fa-regular fa-eye"></i></div>
                      <div class="btn ver-nota" style="background-color: #3C91E6;" id="actualizar-notaTlc"><i
                          style="color: white;" class="fa-solid fa-square-pen"></i></div>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>

          <div class="table mic mt-3" id="mic">
            <div class="title">
              <h3>Alumnos de MIC</h3>
            </div>
            <div class="centrar">

              <div class="thead">
                <div class="tr">
                  <div class="th">Nombre</div>
                  <div class="th">Apellido</div>
                  <div class="th">Codigo</div>
                  <div class="th">Gestion de Notas</div>
                </div>
              </div>
              <div class="scrollTbody">
                <div class="tbody" id="tbodymic">
                  <!-- <div class="tr">
                    <div class="th">Antonio Ruben</div>
                    <div class="th">Ndong Nchama</div>
                    <div class="th">04</div>
                    <div class="th">
                      <div class="btn nota" style="background-color: #0A2A66;" id="nota-insertarMic"><i
                          style="color: white;" class="fa-solid fa-plus"></i></div>
                      <div class="btn ver-nota" style="background-color: green;" id="ver-notaMic"><i
                          style="color: white;" class="fa-regular fa-eye"></i></div>
                      <div class="btn ver-nota" style="background-color: #3C91E6;" id="actualizar-notaMic"><i
                          style="color: white;" class="fa-solid fa-square-pen"></i></div>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!---MODALES DE INGRESION DE NOTAS--->
  <div class="modal fade" id="modalNotasDaw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><label for="" id="labelNom">Ingresion de Notas Daw</label>
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="imgmodal2">
          <form action="" id="formularioDaw" method="post">
            <div class="form-label" id="ingresion__nota1">
              <div class="form-label">
                <label for="" class="labelValid1" id="labelValid1">Asignatura</label>
                <select name="Materiadaw" id="seleccionDaw" class="form-control">
                  <option id="materiadaw" value="">Click para seleccionar asignatura</option>
                  <?php foreach ($materias as $materia) { ?>
                    <option id="materiadaw" value="<?php echo $materia['id_materia'] ?>"><?php echo $materia['nombre'] ?></option>
                  <?php } ?>
                </select>
              </div>
              
              <input type="text" class="form-control impN1" id="notaDaw" name="notaDaw"
                placeholder="Click para ingresar nota">
                
              <div class="alert alert-warning mt-2 errN__Daw1" id="errN__Daw1"></div>
            </div>
            <div class="form-button" style="display: flex;">
              <button type="submit" class="btn btn-success">LISTO !</button>
              <input type="text" class="form-control" style="display: none;" name="id_alumno" id="id_alumno">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          INSTTIC: TS-DAW
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalNotasAsir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><label for="" id="labelNom">Ingresion de Notas
              Asir</label></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="imgmodal2">
          <form action="" method="post">
            <div class="form-label">
              <label for="">Asignatura</label>
              <select name="seleccion" id="seleccion" class="form-control">
                <option value="">Click para seleccionar asignatura</option>
                <option value="1asig">1 asig</option>
                <option value="2asig">2 asig</option>
                <option value="3asig">3 asig</option>
                <option value="4asig">4 asig</option>
              </select>
            </div>
            <div class="form-label">
              <label for="">Nota</label>
              <input type="text" class="form-control" id="notaDaw" placeholder="Click para ingresar nota">
              <div class="alert alert-warning mt-2" id="errNDaw"></div>
            </div>
            <div class="form-button">
              <button type="submit" class="btn btn-success">LISTO !</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          INSTTIC: TS-ASIR
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalNotasTlc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><label for="" id="labelNom">Ingresion de Notas Tlc</label>
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="imgmodal2">
          <form action="" method="post">
            <div class="form-label">
              <label for="">Asignatura</label>
              <select name="seleccion" id="seleccion" class="form-control">
                <option value="">Click para seleccionar asignatura</option>
                <option value="1asig">1 asig</option>
                <option value="2asig">2 asig</option>
                <option value="3asig">3 asig</option>
                <option value="4asig">4 asig</option>
              </select>
            </div>
            <div class="form-label">
              <label for="">Nota</label>
              <input type="text" class="form-control" id="notaDaw" placeholder="Click para ingresar nota">
              <div class="alert alert-warning mt-2" id="errNDaw"></div>
            </div>
            <div class="form-button">
              <button type="submit" class="btn btn-success">LISTO !</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          INSTTIC: TS-TLC
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalNotasMic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><label for="" id="labelNom">Ingresion de Notas Mic</label>
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="imgmodal2">
          <form action="" method="post">
            <div class="form-label">
              <label for="">Asignatura</label>
              <select name="seleccion" id="seleccion" class="form-control">
                <option value="">Click para seleccionar asignatura</option>
                <option value="1asig">1 asig</option>
                <option value="2asig">2 asig</option>
                <option value="3asig">3 asig</option>
                <option value="4asig">4 asig</option>
              </select>
            </div>
            <div class="form-label">
              <label for="">Nota</label>
              <input type="text" class="form-control" id="notaDaw" placeholder="Click para ingresar nota">
              <div class="alert alert-warning mt-2" id="errNDaw"></div>
            </div>
            <div class="form-button">
              <button type="submit" class="btn btn-success">LISTO !</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          INSTTIC: TM-MIC
        </div>
      </div>
    </div>
  </div>

  <!---MODALES PARA VER NOTAS DEL ESTUDIANTE--->
  <div class="modal fade" id="modalVerNDaw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><label for="" id="labelNomDaw">Nombre Estudiante ?</label>
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal-body">
          <!-- <div class="form-label">
            <label for="" style="font-size: 12.5px;">Desarrollo web entorno Servidor</label>
            <div class="form-control nt-2" id="dwes"><strong>PTS</strong></div>
          </div> -->
        </div>
        <div class="modal-footer">
          INSTTIC: TS-DAW
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalVerNAsir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><label for="" id="labelNom">Nombre Estudiante</label></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="imgmodal2">
          <div class="form-label">
            <label for="">asig 1</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 1</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 2</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 3</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 4</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 5</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 6</label>
            <div class="form-control nt-2">- pts</div>
          </div>
        </div>
        <div class="modal-footer">
          INSTTIC: TS-ASIR
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalVerNTlc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><label for="" id="labelNom">Nombre Estudiante</label></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="imgmodal2">
          <div class="form-label">
            <label for="">asig 1</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 1</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 2</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 3</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 4</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 5</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 6</label>
            <div class="form-control nt-2">- pts</div>
          </div>
        </div>
        <div class="modal-footer">
          INSTTIC: TS-TLC
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalVerNMic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><label for="" id="labelNom">Nombre Estudiante</label></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="imgmodal2">
          <div class="form-label">
            <label for="">asig 1</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 1</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 2</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 3</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 4</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 5</label>
            <div class="form-control nt-2">- pts</div>
          </div>
          <div class="form-label">
            <label for="">asig 6</label>
            <div class="form-control nt-2">- pts</div>
          </div>
        </div>
        <div class="modal-footer">
          INSTTIC: TM-MIC
        </div>
      </div>
    </div>
  </div>

  <!---MODALES DE INGRESION PARA ACTUALIZAR--->
  <div class="modal fade" id="modalNotasActualizarDaw" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><label for="" id="labelNom">Actualizar nota de
              alumno?</label></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="imgmodal2">
          <form action="" method="post" id="formularioDawActualizar">
            <div class="form-label">
              <label for="">Asignatura</label>
              <select name="seleccion" id="seleccion" class="form-control">
                <option value="">Click para seleccionar asignatura</option>
                <?php foreach ($materias as $materia) { ?>
                    <option id="materiadaw" value="<?php echo $materia['id_materia'] ?>"><?php echo $materia['nombre'] ?></option>
                  <?php } ?>
              </select>
            </div>
            <div class="form-label">
              <label for="">Nota</label>
              <input type="text" class="form-control" id="notaDawActualizar" placeholder="Click para ingresar nota">
              <div class="alert alert-warning mt-2" id="errNDaw"></div>
            </div>
            <div class="form-button">
              <button type="submit" class="btn btn-success">CAMBIAR !</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          INSTTIC: TS-DAW
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalNotasActualizarAsir" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><label for="" id="labelNom">Actualizar nota de
              alumno?</label></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="imgmodal2">
          <form action="" method="post">
            <div class="form-label">
              <label for="">Asignatura</label>
              <select name="seleccion" id="seleccion" class="form-control">
                <option value="">Click para seleccionar asignatura</option>
                <option value="1asig">1 asig</option>
                <option value="2asig">2 asig</option>
                <option value="3asig">3 asig</option>
                <option value="4asig">4 asig</option>
              </select>
            </div>
            <div class="form-label">
              <label for="">Nota</label>
              <input type="text" class="form-control" id="notaDaw" placeholder="Click para ingresar nota">
              <div class="alert alert-warning mt-2" id="errNDaw"></div>
            </div>
            <div class="form-button">
              <button type="submit" class="btn btn-success">CAMBIAR !</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          INSTTIC: TS-DAW
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalNotasActualizarTlc" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><label for="" id="labelNom">Actualizar nota de
              alumno?</label></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="imgmodal2">
          <form action="" method="post">
            <div class="form-label">
              <label for="">Asignatura</label>
              <select name="seleccion" id="seleccion" class="form-control">
                <option value="">Click para seleccionar asignatura</option>
                <option value="1asig">1 asig</option>
                <option value="2asig">2 asig</option>
                <option value="3asig">3 asig</option>
                <option value="4asig">4 asig</option>
              </select>
            </div>
            <div class="form-label">
              <label for="">Nota</label>
              <input type="text" class="form-control" id="notaDaw" placeholder="Click para ingresar nota">
              <div class="alert alert-warning mt-2" id="errNDaw"></div>
            </div>
            <div class="form-button">
              <button type="submit" class="btn btn-success">CAMBIAR !</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          INSTTIC: TS-DAW
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalNotasActualizarMic" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><label for="" id="labelNom">Actualizar nota de
              alumno?</label></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="imgmodal2">
          <form action="" method="post">
            <div class="form-label">
              <label for="">Asignatura</label>
              <select name="seleccion" id="seleccion" class="form-control">
                <option value="">Click para seleccionar asignatura</option>
                <option value="1asig">1 asig</option>
                <option value="2asig">2 asig</option>
                <option value="3asig">3 asig</option>
                <option value="4asig">4 asig</option>
              </select>
            </div>
            <div class="form-label">
              <label for="">Nota</label>
              <input type="text" class="form-control" id="notaDaw" placeholder="Click para ingresar nota">
              <div class="alert alert-warning mt-2" id="errNDaw"></div>
            </div>
            <div class="form-button">
              <button type="submit" class="btn btn-success">CAMBIAR !</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          INSTTIC: TS-DAW
        </div>
      </div>
    </div>
  </div>

  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="./js/aside.js"></script>
  <script src="./js/all.js"></script>
  <script src="./js/bootstrap.js"></script>
  <script src="./js/gestionNotas.js"></script>
  <script src="./js/sweetalert2.js"></script>
</body>
</html>