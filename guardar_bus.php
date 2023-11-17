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
$matricula = $_POST['matricula'];
$modelo = $_POST['modelo'];
$capacidad = $_POST['capacidad'];
$tel_constancia = $_POST['tel_constancia'];
$tipo = $_POST['tipo'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO bus (matricula, modelo, capacidad, tel_constancia, tipo)
        VALUES ('$matricula', '$modelo', $capacidad, '$tel_constancia', '$tipo')";

if ($conn->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente.";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
