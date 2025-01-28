<?php
if (isset($_POST['codigo_original'])) {
    $codigo_original = $_POST['codigo_original'];
    $codigo_nuevo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $uvs = $_POST['uvs'];
    $nota = $_POST['nota'];

    $materias = simplexml_load_file('materias.xml');
    $found = false;

    foreach ($materias->materia as $materia) {
        if ($materia->codigo == $codigo_original) {
            $materia->codigo = $codigo_nuevo;
            $materia->nombre = $nombre;
            $materia->uvs = $uvs;
            $materia->nota = $nota;
            $found = true;
            break;
        }
    }

    if ($found) {
        file_put_contents('materias.xml', $materias->asXML());
        header('location: index.php?exito=editado');
    }
}
?>


