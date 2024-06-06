<?php
require_once __DIR__ . '/../../../session.php';
checkSession();

$nombreUsuario = getNombreUsuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="style.css">
    <script src="usuarios.js?v=<?php echo time()?>" defer></script>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <img src="../img/logoComparador.png" alt="logo empresa">
            </div>
            <nav>
                <ul>
                    <li><a href="../dashboard.php">Dashboard</a></li>
                    <li><a href="../calendario/calendario.php">Calendario</a></li>
                    <li><a href="./usuariosIndex.php">Usuarios</a></li>
                </ul>
            </nav>
            <div class="profile">
                <img src="../img/user.png" alt="profile">
                <p><?php echo htmlspecialchars($nombreUsuario); ?></p>
                <a href="../../../logout.php">Cerrar sesión</a>
                
            </div>
        </aside>
        <main class="main-content">
            <div class="header">
                <h2>Gestión de Usuarios</h2>
                <button id="btnCrearUsuario" onclick="mostrarFormularioCreacion()" class="btn">Agregar Usuario</button>
            </div>
            <div id='cajaUsuarios'></div>
            
            <div id="formularioEdicion" class="form-container">
                <h3>Editar Usuario</h3>
                <form id="formEdicion">
                    <input type="hidden" id="usuarioId">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre"><br>
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos"><br>
                    <label for="email">Email:</label>
                    <input type="text" id="email"><br>
                    <label for="contrasena">Contraseña:</label>
                    <input type="text" id="contrasena"><br>
                    <label for="permisos">Administrador:</label>
                    <input type="checkbox" id="permisos"><br>
                    <button type="button" onclick="guardarUsuario()" class="btn">Guardar</button>
                </form>
            </div>

            <div id="formularioCreacion" class="form-container">
                <h3>Crear Nuevo Usuario</h3>
                <form id="formCreacion">
                    <label for="nombreNuevo">Nombre:</label>
                    <input type="text" id="nombreNuevo" name="nombreNuevo"><br>
                    <label for="apellidosNuevo">Apellidos:</label>
                    <input type="text" id="apellidosNuevo" name="apellidosNuevo"><br>
                    <label for="emailNuevo">Email:</label>
                    <input type="text" id="emailNuevo" name="emailNuevo"><br>
                    <label for="contrasenaNuevo">Contraseña:</label>
                    <input type="password" id="contrasenaNuevo" name="contrasenaNuevo"><br>
                    <label for="permisosNuevo">Administrador:</label>
                    <input type="checkbox" id="permisosNuevo" name="permisosNuevo"><br>
                    <button type="button" onclick="crearUsuario()" class="btn">Crear Usuario</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
