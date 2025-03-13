
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactnos</title>
    <link rel="stylesheet" href="../recursos/enlaces.css">
    <link rel="stylesheet" href="./contactanos.css">
    <link rel="stylesheet" href="../componentes/styles.css">
</head>
<body>

    <?php
        require("../componentes/header.php");
    ?>
   
        <div class="container-fliud banner">
            <p class="text-center py-5">Contáctanos</p>
        </div>
        <!-- Alerta para ver el estado del envio -->


        <!-- Formulario y contactos -->
         <div class="container d-flex mt-5 px-3 formYcont">
            <!-- Formulario -->
            <div class="formul py-3 px-3">
                <h3 class="px-5">Envianos tus mensajes</h3>
                <p class="px-5">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Ipsam excepturi earum minus ratione id rem soluta in, ab, 
                    nulla eum corrupti ex cumque vero doloribus sint vitae 
                    natus beatae nihil.
                </p>
                <form action="./contactanos.php" method="POST" class="px-5 mt-5">

                    <!-- Nombre y apellidos -->
                    <div class="d-flex">
                        <input type="text" name="nom" class="form-control me-3" placeholder="Nombre"  required>
                        <input type="text" name="apel" class="form-control" placeholder="Apellidos" required>
                    </div>
                    <!-- Asunto y correo -->
                    <div class="d-flex mt-4">
                        <input type="text" name="asunt" class="form-control me-3" placeholder="Asunto" required>
                        <input type="email" name="correo" class="form-control" placeholder="Correo electronico" required>
                    </div>
                    <!-- Mensaje -->
                    <textarea name="mensa" class="form-control mt-4" placeholder="Escriba aqui su mensaje" required></textarea>
                    <div class="text-right">
                        <button type="submit" class="mt-4 btn text-light" name="btnEnviar" style="background-color: #001830">Enviar Correo</button>
                    </div>
                    
                </form>
            </div>
            <!--Caja Contactos -->
             <div class="contactos pt-3 px-4 ">
                <h5 class="mb-5">En que podemos ayudarte</h5>
                <!-- contactos  -->
                 <div class="contaco">
                    <div class="cadaCont d-flex mb-3 ps-3 pt-2">
                        <i class="fa-solid fa-location-dot fs-4 pt-3 pe-3"></i>
                        <p>Direccion: <br> Djibloho/Oyala-G.E.</p>
                    </div>
                    <a href="" class="nav-link">
                        <div class="cadaCont d-flex mb-3 ps-3 pt-2">
                            <i class="fa-regular fa-envelope fs-4 pt-2 pe-3"></i>
                            <p>Coreo Electronico: <br>  insttic@gmail.com</p>
                        </div>
                    </a>
                   
                    <a href="" class="nav-link">
                        <div class="cadaCont d-flex mb-2 ps-3 pt-2">
                            <i class="fa-solid fa-phone fs-4 pt-3 pe-3"></i>
                            <p>Telefono: <br> +240 555 777 442</p>
                        </div>
                    </a>
                   
                 </div>
                <hr class="">
                <!--  redes sociales-->
                    <h6 class="ps-3 pb-3 pt-3">Contacta con nosotros:</h6>
                    <div class="d-flex redes">
                        
                        <a href="#" class="text-white mr-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white mr-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white mr-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-white"> <i class="fa-brands fa-whatsapp"></i> </a>
                    </div>
             </div>
            
         </div>
   
  
       <!-- FOOTER -->
 <div>
  <?php
    require("../componentes/footer.php");
  ?>
 </div>


 <script src="../recursos/sweetalert2.all.js"></script>
    
</body>
</html>