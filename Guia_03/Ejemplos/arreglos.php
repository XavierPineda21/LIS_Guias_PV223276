<?php
    $edades=[10, 14, 25, 96, 96.7]; //Creando arreglo

    echo $edades[0]."<br/r>"; //Accediendo a un elemento

    $edades[1]=28; //Modificando un elemento
    array_push($edades,100); //Añadiendo un elemento
    $edades[10] = 10;
    unset($edades[0]); //Eliminando la posicion 0
    print_r($edades);

    echo "<h2>Recoriendo la red</h2>";
    foreach($edades as $edad){
        echo "<p>$edad</p>";
    }

    //Tamaño de un arreglo
    $tamaño=count($edades);
    echo "<p>El tamaño del arreglo es $tamaño</p>";

    //Ordenando un arreglo
    //Ascendente
    sort($edades); //Ordenamos de forma mutable
    print_r($edades);

    //Descendente
    $edades=array_reverse($edades); //Invertimos el orden de forma inmutable
    print_r($edades);


    $datos_personales=[];
    $datos_personales['nombre']="Guillermo";
    $datos_personales['apellido']="Calderon";
    $datos_personales['estatura']=1.75;
    $datos_personales['genero']="Masculino";
    print_r($datos_personales);
    echo "<h2>Imprimiendo los elementos del arreglo aosociativo</h2>";
    //Datos
    foreach($datos_personales as $dato){
        echo "<p>$dato</p>";
    }

    //Indice
    foreach($datos_personales as $clave=>$dato){
        echo "<p>$clave : $dato</p>";
    }

    $persona2=[
        'nombre'=>"Juan",
        'apellido'=>"Perez",
        'estatura'=>"1.80",
        'Genero'=>"Masculino"
    ];
    print_r($persona2);
?>