<?php
//Escribe una funcion que se conecte a una API online y devuelva el resultado de la consulta en un array asociativo.

function getAPI($url){
    $json = file_get_contents($url);
    $data = json_decode($json, true);
    return $data;
}

$result = getAPI("https://jsonplaceholder.typicode.com/posts");

print_r($result);

// Crea una funcion para mostrar el array asociativo de getAPI en una tabla HTML. La tabla tendra una fila con los nombres de las columnas y una fila por cada elemento del array.
function showTable($data){
    echo "<table border='1'>";
    echo "<tr>";
    foreach($data[0] as $key => $value){
        echo "<th>$key</th>";
    }
    echo "</tr>";
    foreach($data as $row){
        echo "<tr>";
        foreach($row as $key => $value){
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

showTable($result);