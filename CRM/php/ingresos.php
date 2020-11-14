<?php
    header('Content-Type: application/json');
    include('../../php/conexion.php');
    $data = array();

    $sql = "SELECT SUM(total) AS TOTALES, fechaEntrega
            FROM pedidos
            WHERE estado = 'Entregado'
            GROUP by fechaEntrega
            ORDER by fechaEntrega ASC;";
            
    $rows = consulta($sql);
        
    foreach ($rows as $row) 
    {
        $data[] = $row;
    }
  

    echo json_encode($data);
?>