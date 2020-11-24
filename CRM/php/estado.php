<?php
    header('Content-Type: application/json');
    include('../../php/conexion.php');
    $data = array();

    $sql = "SELECT COUNT(estado) AS cantidad, estado
            FROM pedidos 
            GROUP by estado
            ORDER by estado ASC;";
            
    $rows = consulta($sql);
        
    foreach ($rows as $row) 
    {
        $data[] = $row;
    }
  

    echo json_encode($data);
?>
