<?php
// Incluir el archivo de conexión
include('conexion.php');  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Buscar al usuario en la base de datos
    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = mysqli_query($conexion, $query);  // Usar $conexion, no $conn

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verificar la contraseña
        if (password_verify($clave, $user['clave'])) {
            echo "Bienvenido, $usuario!";
            // Aquí podrías redirigir a otra página o iniciar sesión
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cosplay Masterclass</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h2>Cosplay Masterclass</h2>
            </div>
            <ul>
                <li><a href="index.html" class="nav-link">Inicio</a></li>
                <li><a href="galeria.html" class="nav-link">Galería</a></li>
                <li><a href="login.php" class="nav-link">Login</a></li>
                <li><a href="registro.php" class="nav-link">Registro</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="login">
            <h2>Iniciar sesión</h2>
            <form method="POST" action="">
                <input type="text" name="usuario" placeholder="Usuario" required>
                <input type="password" name="clave" placeholder="Contraseña" required>
                <button type="submit" class="btn-main">Iniciar sesión</button>
                <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
            </form>
        </section>
    </main>

    <footer>
        <div class="contact-info">
            <p>&copy; 2024 Cosplay Masterclass. Todos los derechos reservados.</p>
            <p><a href="mailto:contacto@cosplaymasterclass.com">contacto@cosplaymasterclass.com</a></p>
        </div>
    </footer>

</body>
</html>