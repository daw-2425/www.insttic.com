<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <title>Document</title>
</head>
<body>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Actualizar registros
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
       <!--FORMULARIO DE REGISTRO-->
       <form>
  <div class="mb-3">
    <input type="file" class="form-control" id="imagen" aria-describedby="emailHelp" name="imagen">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="ingrese su nombre">
  </div>

  <div class="mb-3">
    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="su primer apellido">
  </div>

  <div class="mb-3">
    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="inserte su codigo">
  </div>

  <div class="mb-3">
    <input type="text" class="form-control" id="tutor" name="tutor" placeholder="tutor">
  </div>

  <div class="mb-3">
    <input type="text" class="form-control" id="media" name="media" placeholder="tutor">
  </div>

  
  <button type="submit" class="btn btn-primary w-100">Submit</button>
</form>
        <!--FIN DEL FORMULARIO-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script src="../js/bootstrap.js"></script>
</body>
</html>