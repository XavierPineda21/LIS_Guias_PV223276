<?php
include_once 'Models/EditorialesModel.php';
$model = new EditorialModel();
$editorial=[
    'codigo_editorial'=>"EDI789",
    'nombre_editorial'=>"Prueba INSERT",
    'contacto'=>"Xavier",
    'telefono'=>"22222222"
];
//echo $model->insert($editorial);
//echo $model->delete("EDI789");
//echo $model->update($editorial);
var_dump($model->get());

