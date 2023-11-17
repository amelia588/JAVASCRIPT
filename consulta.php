<!DOCTYPE html>
<html lang="es">
<head>
    <title>Consulta de Matriculas</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Enlace a Bootstrap JS (jQuery incluido) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        /* Estilos personalizados */
        body {
            background-color: #D8BFD8;
        }

        .container {
            background-color: rgb(255, 105, 180); /* Fondo semi-transparente */
            margin-top: 20px;
            padding: 20px;
            border-radius: 5px;
            /* Agrega sombra normal a la caja */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #333;
            text-align: center; /* Centra el texto */
        }

        .form-group {
            margin-bottom: 15px;
        }

        .table {
            background-color: rgb(255, 192, 203); /* Fondo semi-transparente */
            border: 1px solid #FF1493; /* Cambia el color del borde de la tabla */
        }

        .table th {
            background-color: #343a40;
            color: #fff;
        }

        .table td, .table th {
            border: 1px solid #ddd; /* Cambia el color del borde de las celdas */
            text-align: center; /* Centra el contenido de las celdas */
        }

        .modal-content {
            background-color: rgba(255, 255, 255, 0.9); /* Fondo semi-transparente */
        }

        /* Cambia el color del botón Consultar */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container shadow p-3 mb-5 bg-light rounded">
        <h1 class="mt-4">Consulta de Matriculas</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="grado">Grado:</label>
                <!-- Utiliza un campo de selección (select) con opciones de grado -->
                <select class="form-control" name="grado" id="grado" required>
                    <option value="Primero A">Primero A</option>
                    <option value="Segundo B">Segundo B</option>
                    <option value="Tercero C">Tercero C</option>
                    <option value="Cuarto A">Cuarto A</option>
                    <option value="Quinto B">Quinto B</option>
                    <!-- Agrega más opciones según tus necesidades -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Consultar</button>
        </form>

        <?php
        // Código PHP para la consulta de datos
        if (isset($_POST['grado'])) {
            $host = 'localhost';
            $usuario = 'root';
            $contrasena = '';
            $base_de_datos = 'amelia';

            $conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

            if ($conexion->connect_error) {
                die('Error de conexión: ' . $conexion->connect_error);
            }

            $grado = $_POST['grado'];

            $consulta = "SELECT 
                p.nombre AS nombre_alumno,
                c.nombre_curso AS nombre_curso,
                a.carrera AS carrera,
                ca.nota AS nota
            FROM
                matriculas m
                JOIN alumnos a ON m.idalumno = a.idalumno
                JOIN cursos_alumnos ca ON m.idalumno = ca.idalumno
                JOIN cursos c ON ca.idcurso = c.idcurso
                JOIN personas p ON a.idpersona = p.idpersona
            WHERE
                m.grado = '$grado'";

            $resultado = $conexion->query($consulta);

            $resultados = array();

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    $resultados[] = $fila;
                }
            }

            $conexion->close();
        }
        ?>

        <!-- Mostrar resultados si existen -->
        <?php if (!empty($resultados)) { ?>
            <h2 class="bg-primary text-white p-2">Resultados de la Consulta</h2>
            <table class="table">
                <tr class="bg-dark text-white">
                    <th>Nombre del Alumno</th>
                    <th>Nombre del Curso</th>
                    <th>Carrera</th>
                    <th>Nota</th>
                </tr>
                <?php foreach ($resultados as $fila) { ?>
                    <tr>
                        <td><?php echo $fila['nombre_alumno']; ?></td>
                        <td><?php echo $fila['nombre_curso']; ?></td>
                        <td><?php echo $fila['carrera']; ?></td>
                        <td><?php echo $fila['nota']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else if (isset($_POST['grado'])) { ?>
            <p class="bg-warning text-white p-2">No se encontraron resultados para el grado especificado.</p>
        <?php } ?>
    </div>
</body>
</html>







