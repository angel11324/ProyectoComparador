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
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
    <script src="calendario.js?v=<?php echo time()?>" defer></script>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <img src="../img/logoComparador.png" alt="logo empresa">
            </div>
            <nav>
                <ul>
                    <a href="../dashboard.php"><li>Dashboard</li></a>
                    <a href="./calendario.php"><li>Calendario</li></a>
                    <a href="../usuarios/usuariosIndex.php"><li>Usuarios</li></a>
                </ul>
            </nav>
            <div class="profile">
                <img src="../img/user.png" alt="profile">
                <p><?php echo htmlspecialchars($nombreUsuario); ?></p>
                <a href="../../../logout.php">Cerrar sesión</a>

            </div>
        </aside>
        <main class="main-content">
        <div id='calendar'></div>
        </main>
    </div>
    <script src="script.js"></script>
</body>
</html>
