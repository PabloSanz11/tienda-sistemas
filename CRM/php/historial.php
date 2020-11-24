<?php
    header('Content-Type: application/json');
    include('../../php/conexion.php');
    $data = array();

    if(isset($_POST['filtro']))
    {
        $filtro = $_POST['filtro'];
        
        $sql = "SELECT COUNT(fechaEntrega) AS vendidos, fechaEntrega
                FROM pedidos 
                WHERE estado = 'Entregado'
                GROUP by fechaEntrega
                ORDER by fechaEntrega ASC;";
        $rows = consulta($sql);

        if(!is_null($rows)):
            foreach ($rows as $row) 
            {
                $data[] = $row;
            }
        endif;     

    }

    echo json_encode($data);
?>