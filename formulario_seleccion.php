<?php
include("conexion.php");
 // Incluye el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario cuando se envía
    if (isset($_POST["conductores"]) && isset($_POST["paquetes"])) {
        // Obtener los valores seleccionados
        $conductoresSeleccionados = $_POST["conductores"];
        $paquetesSeleccionados = $_POST["paquetes"];

        // Guardar los datos seleccionados en la base de datos
        // Aquí debes escribir el código para realizar la inserción en la tabla "distribuye"
        // Puedes utilizar un bucle para recorrer los conductores y paquetes seleccionados y guardarlos en la tabla "distribuye"
    }
}

// Consulta para obtener conductores
$sqlConductores = "SELECT id, nombre FROM conductor";
$resultConductores = $conn->query($sqlConductores);

// Consulta para obtener paquetes
$sqlPaquetes = "SELECT id, descripcion FROM paquete";
$resultPaquetes = $conn->query($sqlPaquetes);

// No cierres la conexión aquí
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Selección</title>
</head>
<body>
    <h1>Formulario de Selección</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="conductores">Seleccionar Conductor:</label>
        <select name="conductores[]" id="conductores" multiple>
            <?php
            while ($row = $resultConductores->fetch_assoc()) {
                echo '<option value="' . $row["id"] . '">' . $row["nombre"] . '</option>';
            }
            ?>
        </select>

        <br>

        <label for="paquetes">Seleccionar Paquetes:</label>
        <select name="paquetes[]" id="paquetes" multiple>
            <?php
            while ($row = $resultPaquetes->fetch_assoc()) {
                echo '<option value="' . $row["id"] . '">' . $row["descripcion"] . '</option>';
            }
            ?>
        </select>

        <br>

        <input type="submit" value="Guardar Selección">
    </form>
</body>
</html>

