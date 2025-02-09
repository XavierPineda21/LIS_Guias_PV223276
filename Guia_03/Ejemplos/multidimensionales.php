<?php

    $alumnos=[
        [
            'nombre'=>'Guillermo',
            'apellido'=>'Calderon',
            'carnet'=>'CH111441',
            'CUM'=>5,
            'materias'=>['LIS104','APN501','PED104']
        ],
        [
            'nombre'=>'Miguel',
            'apellido'=>'Flores',
            'carnet'=>'FC111441',
            'CUM'=>8,
            'materias'=>['LIS104','APN501','ESA501']
        ],
        [
            'nombre'=>'Laura',
            'apellido'=>'Martinez',
            'carnet'=>'MM111441',
            'CUM'=>9.5,
            'materias'=>['CAD501','PRE104','ESA501']
        ]
        ];
?>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Carnet</th>
            <th>CUM</th>
            <th>Materias inscritas</th>
        </tr>
        <?php
        foreach($alumnos as $alumno){
            ?>
        <tr>
            <td><?=$alumno['nombre']?></td>          
            <td><?=$alumno['apellido']?></td> 
            <td><?=$alumno['carnet']?></td> 
            <td><?=$alumno['CUM']?></td> 
            <td><?=implode(', ',$alumno['materias'],) ?></td>   
        </tr>
        <?php
        }
        ?>
    </table>
        
        