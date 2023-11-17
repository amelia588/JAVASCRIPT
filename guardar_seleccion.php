<?php
// Conexión a la base de datos (puedes reutilizar la conexión anterior)

// Verificar si se han seleccionado conductores y paquetes
if (isset($_POST["conductores"]) && isset($_POST["paquetes"])) {
    // Obtener conductores y paquetes seleccionados
    $conductores = $_POST["conductores"];
    $paquetes = $_POST["paquetes"];

    // Insertar selección en la base de datos (tabla "distribuye")
    foreach ($conductores as $conductor) {
        foreach ($paquetes as $paquete) {
            $sql = "INSERT INTO distribuye (id_conductor, id_paquete) VALUES ('$conductor', '$paquete')";
            if ($conn->query($sql) !== TRUE) {
                echo "Error al guardar la selección: " . $conn->error;
            }
        }
    }

    echo "Selección guardada correctamente.";
} else {
    echo "No se han seleccionado conductores y paquetes.";
}
?>
