<?php
    include('consultas.php');
    session_start();

    if(isset($_SESSION['validacion']) && isset($_POST['idPedido']))
    {
        $idPedido = $_POST['idPedido'];
        $idProducto = $_POST['idProducto'];
        $cantidad = $_POST['cantidad'];

        sumarInventario($idProducto,$idPedido,$cantidad);
        header('Location: ../perfil.php');
    }else
    {
        echo "efe";
    }
    
?>