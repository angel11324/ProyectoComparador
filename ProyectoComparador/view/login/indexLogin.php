<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time()?>">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js?v=<?php echo time()?>"></script>
    <script src="login.js?v=<?php echo time()?>" defer></script>
</head>
<body>
    <div class="login-container">
        <form id="loginForm" action="" method="post" class="loginform">
            <h2>Iniciar Sesión</h2>
            <div class="inputgroup">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="inputgroup">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <button type="button" class="login-button">Entrar</button>
            <p class="register-link">¿No tienes cuenta? <a href="../register/indexRegister.php">Regístrate aquí</a></p>
        </form>
    </div>
</body>
</html>
