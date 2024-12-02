<?php
$servername = "fdb1028.awardspace.net";
$username = "4557145_cosplaymasterclass";
$password = "Paty20041977345@";
$dbname = "4557145_cosplaymasterclass";

// Crear la conexión usando $conexion
$conexion = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
?>