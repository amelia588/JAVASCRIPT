<?php
// Conexión a la base de datos MySQL (Ajusta los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amelia";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtiene los datos del formulario
$nombre_proyecto = $_POST['nombre_proyecto'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$cliente = $_POST['cliente'];

// Inserta los datos en la tabla "proyecto"
$sql = "INSERT INTO proyecto (nombre_proyecto, fecha_inicio, fecha_fin, cliente) VALUES ('$nombre_proyecto', '$fecha_inicio', '$fecha_fin', '$cliente')";

if ($conn->query($sql) === TRUE) {
    echo "Proyecto guardado exitosamente.";
} else {
    echo "Error al guardar el proyecto: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
?>
