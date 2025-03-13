<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">

    <div class="card shadow-lg p-4" style="width: 350px;">
        <div class="w-100 d-flex justify-content-center">
            <img src="./img/logoi.png" class=" w-50" alt="">
        </div>
        <h3 class="text-center mb-3">Iniciar Sesión</h3>
        <form id="loginForm">
            <div class="mb-3">
                <label for="nombre" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="nombre" name="correo" placeholder="drax0617" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
        </form>
        <div class="text-center mt-3">
            <a href="#" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
        </div>
        <p id="responseMessage" class="mt-3 text-center text-danger"></p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/login.js"></script>
</body>

</html>