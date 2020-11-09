<?php
    include('conexion.php');
    $fecha = new DateTime(null, new DateTimeZone('CST'));
    
    if(isset($_POST['correo']) && isset($_POST['contrasena']))
    {   
        $correo = $_POST['correo'];
        $ultimaCon = $fecha->format('Y-m-d H:i:s');
        $contrasena = $_POST['contrasena'];
        
        $query = "SELECT * FROM clientes WHERE correo ='$correo' AND contrasena = '$contrasena';";
        $rows = consulta($query);

        if(mysqli_num_rows($rows) == 1)
        {
            session_start();

            while($rU = mysqli_fetch_array($rows))
            {
                $idCliente = $rU['idCliente'];
                $nombre = $rU['nombre'];
            }
                
            $sql = "UPDATE clientes
                    SET ultimaCon = '$ultimaCon'
                    WHERE correo = '$correo'";

            $upd = consulta($sql);

            $_SESSION['idCliente'] = $idCliente;
            $_SESSION['nombre'] = utf8_encode($nombre);
            $_SESSION['correo'] = $correo;
            $_SESSION['validacion'] = TRUE;
            $_SESSION['tiempo']=time();

            if($upd == 1)
            {
               header('Location: ../index.php');
            }
        }else
        {
            header('Location: ../login.html');
        }
    }else
    {
        header('Location: ../login.html');
    }

?>