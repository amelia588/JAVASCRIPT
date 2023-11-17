<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amelia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Datos del empleado
$num_matricula = $_POST["num_matricula"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$cod_depto = $_POST["cod_depto"];

// Consulta SQL para guardar el empleado
$sql_empleado = "INSERT INTO empleados (num_matricula, nombre, direccion, cod_depto) VALUES (?, ?, ?, ?)";

// Preparar la sentencia SQL
$stmt_empleado = $conn->prepare($sql_empleado);

// Vincular los parámetros
$stmt_empleado->bind_param("sssi", $num_matricula, $nombre, $direccion, $cod_depto);

// Ejecutar la consulta para guardar el empleado
if ($stmt_empleado->execute()) {
    echo "Empleado guardado correctamente.";
} else {
    echo "Error al guardar el empleado: " . $stmt_empleado->error;
}

// Consulta SQL para guardar la opción de departamento
$sql_departamento = "INSERT INTO opciones_departamento (cod_depto) VALUES (?)";

// Preparar la sentencia SQL
$stmt_departamento = $conn->prepare($sql_departamento);

// Vincular el parámetro
$stmt_departamento->bind_param("i", $cod_depto);

// Ejecutar la consulta para guardar la opción de departamento
if ($stmt_departamento->execute()) {
    echo "Opción de departamento guardada correctamente.";
} else {
    echo "Error al guardar la opción de departamento: " . $stmt_departamento->error;
}

// Cerrar las conexiones y las sentencias
$stmt_empleado->close();
$stmt_departamento->close();
$conn->close();
?>
