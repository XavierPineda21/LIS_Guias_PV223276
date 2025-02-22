<?php
include 'validaciones.php';

session_start(); //iniciando sesión
if(!empty($_POST)){
    $errores=[];
    extract($_POST);
    $nombres=$_POST['nombres']??'';
    $apellidos=$_POST['apellidos']??'';
    $carnet=$_POST['carnet']??'';
    
    if(empty(trim($nombres))){
        array_push($errores,"Se debe ingresar el nombre");
    }
    else if(!isText(trim($nombres))){
        array_push($errores,"Formato de nombre no valido");
    }

    if(empty(trim($apellidos))){
        array_push($errores,"Se debe ingresar el apellido");
    }
    else if(!isText(trim($apellidos))){
        array_push($errores,"Formato de apellido no valido");
    }

    if(empty(trim($carnet))){
        array_push($errores,"Se debe ingresar el carnet");
    }
    else if(!isCarnet(trim($carnet))){
        array_push($errores,"Carnet invalido");
    }

    if(empty(trim($telefono))){
        array_push($errores,"Se debe ingresar el telefono");
    }
    else if(!isPhone(trim($telefono))){
        array_push($errores,"Formato de telfono invalido");
    }

    if(empty(trim($correo))){
        array_push($errores,"Se debe ingresar el correo");
    }
    else if(!isMail(trim($correo))){
        array_push($errores,"Formato de correo invalido");
    }

    if(empty($errores)){
        echo "<h1>Usuario registrado exitosamente</h1>";
    }
    else{
        $_SESSION['errores']=$errores;
        $_SESSION['datos']=['nombres'=>$nombres,
                            'apellidos'=>$apellidos,
                            'carnet'=>$carnet,
                            'telefono'=>$telefono,
                            'correo'=>$correo];
        header('Location:index.php');
    }
}