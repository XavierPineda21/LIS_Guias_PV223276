<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Codigo php -->
    <?php

    //Variables
    $name = "Xavier";
    $edad = 22;
    $last_name = "Villatoro";
        
    //echo: imprimir (puede interpolar variables pero no es concatenacion)
    echo "Hola $name tiene $edad años<br>";
    //Con comillas simples es tiene que concatenar las variables (. punto para concatenar)
    echo ' Mi nombre es '. $name . " ". $last_name. '<br>';

    //Coercion de tipos (==) Verifica el valor de la variable, (===) Verifica el valor y tipo de ka variable
    $numero=5;
    $numero2="5";
    echo "==<br>";
    var_dump($numero==$numero2);
    echo "<br>===<br>";
    var_dump($numero===$numero2);

    //Casting explicito (Convertir una varible en otro tipo)
    $numero3=(int)$numero2;
    var_dump($numero===$numero3);

    ?>
</body>
</html>
