<?php

class Empleado {
    private $num_matricula;
    private $nombre;
    private $direccion;
    private $cod_detpo;

    public function __construct($num_matricula, $nombre, $direccion, $cod_detpo) {
        $this->num_matricula = $num_matricula;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->cod_detpo = $cod_detpo;
    }

    public function getNumMatricula() {
        return $this->num_matricula;
    }

    public function setNumMatricula($num_matricula) {
        $this->num_matricula = $num_matricula;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getCodDetpo() {
        return $this->cod_detpo;
    }

    public function setCodDetpo($cod_detpo) {
        $this->cod_detpo = $cod_detpo;
    }
}

// Ejemplo de uso:
$empleado = new Empleado(12345, 'Juan Perez', 'Calle 123', 1);

echo 'Número de Matrícula: ' . $empleado->getNumMatricula() . '<br>';
echo 'Nombre: ' . $empleado->getNombre() . '<br>';
echo 'Dirección: ' . $empleado->getDireccion() . '<br>';
echo 'Código de Departamento: ' . $empleado->getCodDetpo() . '<br>';

// Puedes actualizar los atributos si es necesario
$empleado->setNombre('María García');
$empleado->setDireccion('Avenida 456');

echo 'Nombre actualizado: ' . $empleado->getNombre() . '<br>';
echo 'Dirección actualizada: ' . $empleado->getDireccion() . '<br>';
?>








<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Empleado</title>
</head>
<body>
    <h1>Formulario de Empleado</h1>
    <form action="guardar_empleado.php" method="POST">
        <label for="num_matricula">Número de Matrícula:</label>
        <input type="text" id="num_matricula" name="num_matricula" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label for="cod_detpo">Departamento:</label>
        <select id="cod_detpo" name="cod_detpo" required>
            <option value="1">Ventas</option>
            <option value="2">Recursos Humanos</option>
            <option value="3">Tecnología de la Información</option>
        </select><br><br>

        <input type="submit" value="Guardar">
    </form>
</body>
</html>
