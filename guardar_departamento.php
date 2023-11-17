<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Cod_depto = $_POST["Cod_depto"];
    $nombre_depto = $_POST["nombre_depto"];

    // Conexión a la base de datos (reemplaza con tus propios datos de conexión)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "amelia";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    // Consulta SQL para insertar el departamento en la tabla de departamentos
    $sql = "INSERT INTO departamentos (Cod_depto, nombre_depto) VALUES ('$Cod_depto', '$nombre_depto')";

    if ($conn->query($sql) === TRUE) {
        echo "Departamento guardado con éxito.";
    } else {
        echo "Error al guardar el departamento: " . $conn->error;
    }

    $conn->close();
}
?>
