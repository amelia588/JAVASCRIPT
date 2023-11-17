<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el número de matrícula del formulario
    $num_matricula = $_POST["num_matricula"];

    // Conectarse a la base de datos (ajusta los datos de conexión según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "amelia";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para insertar en la tabla "administrativo"
    $sql = "INSERT INTO administrativo (num_matricula) VALUES ($num_matricula)";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Datos ingresados con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
