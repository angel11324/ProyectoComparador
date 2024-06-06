<?php
require_once __DIR__ . '/../../session.php';
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="dashboard.js?v=<?php echo time()?>" defer></script>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <img src="img/logoComparador.png" alt="logo empresa">
            </div>
            <nav>
                <ul>
                    <a href="./dashboard.php"><li>Dashboard</li></a>
                    <a href="./calendario/calendario.php"><li>Calendario</li></a>
                    <a href="./usuarios/usuariosIndex.php"><li>Usuarios</li></a>
                </ul>
            </nav>
            <div class="profile">
                <img src="../dashboardAdmin/img/user.png" alt="profile">
                <p><?php echo htmlspecialchars($nombreUsuario); ?></p>
                <a href="../../logout.php">Cerrar sesión</a>
            </div>
        </aside>
        <main class="main-content">
            <header>
                <h1>Dashboard</h1>
            </header>
            <div class="content">
                <div class="panel" id="panel1">
                    <div class="chart-container">
                        <h3 class="chart-titulo">Usuarios registrados</h3>
                        <canvas id="chart1"></canvas>
                    </div>
                    <div class="chart-container">
                        <h3 class="chart-titulo">Interacciones</h3>
                        <canvas id="chart2"></canvas>
                    </div>
                    <div class="chart-container">
                        <h3 class="chart-titulo">Distribucion Geografica</h3>
                        <canvas id="chart3"></canvas>
                    </div>
                    <div class="chart-container">
                        <h3 class="chart-titulo">Usuarios Activos vs. Inactivos</h3>
                        <canvas id="chart4"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="script.js"></script>
</body>
</html>
