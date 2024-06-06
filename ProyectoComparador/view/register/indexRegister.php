<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js?v=<?php echo time()?>"></script>
    <link rel="stylesheet" href="../login/styles.css?v=<?php echo time()?>">
</head>
<body>
    <div class="login-container">
        <form action="register.php" method="post" class="login-form">
            <h2>Registro</h2>
            <div class="inputgroup">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="inputgroup">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="inputgroup">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit" class="register-button">Registrar</button>
            <p class="register-link">¿Ya tienes cuenta? <a href="../login/indexLogin.php">Inicia sesión aquí</a></p>
        </form>
    </div>
</body>
</html>
