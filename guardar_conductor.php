<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amelia";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$celular = $_POST['celular'];
$ciudad = $_POST['ciudad'];
$distrito = $_POST['distrito'];
$salario = $_POST['salario'];
$celula = $_POST['celula'];
$telefono = $_POST['telefono'];
$departamento = $_POST['departamento'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO conductor (nombre, direccion, celular, ciudad, distrito, salario, celula, telefono, departamento)
        VALUES ('$nombre', '$direccion', '$celular', '$ciudad', '$distrito', '$salario', '$celula', '$telefono', '$departamento')";

if ($conn->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente.";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
