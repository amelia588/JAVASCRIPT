<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Técnico</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Asegúrate de incluir tu archivo CSS de estilos aquí -->
</head>
<body>
    <div id="logo"> 
        <h1 class="display-2"><i>formulario de técnico</i></h1>
    </div> 
    <section class="stark-login">
        <form action="guardar_tecnico.php" method="post">    
            <div id="fade-box">
                <!-- Dropdown para seleccionar un nivel existente desde la base de datos -->
                <label class="h3" for="nivel">Seleccionar Nivel:</label>
                <select class="form-control" name="nivel">
                    <?php
                        // Conectarse a la base de datos y obtener los niveles desde la tabla "tecnico"
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "amelia";

                        $conn = new mysqli($servername, $username, $password, $database);

                        if ($conn->connect_error) {
                            die("La conexión a la base de datos falló: " . $conn->connect_error);
                        }

                        // Consulta para obtener los niveles desde la tabla "tecnico"
                        $sql = "SELECT DISTINCT nivel FROM tecnico";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Mostrar los niveles como opciones en el menú desplegable
                                echo "<option value='" . $row["nivel"] . "'>" . $row["nivel"] . "</option>";
                            }
                        }

                        $conn->close();
                    ?>
                </select>

                <!-- Dropdown para seleccionar un empleado existente desde la base de datos -->
                <label class="h3" for="id_empleado">Seleccionar Empleado:</label>
                <select class="form-control" name="id_empleado">
                    <?php
                        // Conectarse a la base de datos y obtener los nombres de los empleados desde la tabla "empleados"
                        $conn = new mysqli($servername, $username, $password, $database);

                        if ($conn->connect_error) {
                            die("La conexión a la base de datos falló: " . $conn->connect_error);
                        }

                        // Consulta para obtener los nombres de los empleados desde la tabla "empleados"
                        $sql = "SELECT num_matricula, nombre FROM empleados";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Mostrar los nombres de los empleados como opciones en el menú desplegable
                                echo "<option value='" . $row["num_matricula"] . "'>" . $row["nombre"] . "</option>";
                            }
                        }

                        $conn->close();
                    ?>
                </select>

                <hr>

                <input class="btn btn-primary btn-lg" type="submit" value="Guardar">
            </div>
        </form>
    </section> 
    
    <div id="circle1">
        <div id="inner-circle1">
            <h2></h2>
        </div>
    </div>
    
    <ul>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</body>
</html>









