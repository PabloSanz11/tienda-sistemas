<?php
    include('conexion.php');
    $fecha = new DateTime(null, new DateTimeZone('CST'));
    
    if(isset($_POST['InputEmail']) && isset($_POST['InputPassword']))
    {   
        $correo = $_POST['InputEmail'];
        $ultimaCon = $fecha->format('Y-m-d H:i:s');
        $contrasena = $_POST['InputPassword'];
        
        $query = "SELECT * FROM empleados WHERE correo ='$correo' AND contrasena = '$contrasena';";
        $rows = consulta($query);

        if(mysqli_num_rows($rows) == 1)
        {
            session_start();

            while($rU = mysqli_fetch_array($rows))
            {
                $idEmpleado= $rU['idEmpleado'];
                $nombre = $rU['nombre'];
            }
                
            $sql = "UPDATE empleados
                    SET ultimaCon = '$ultimaCon'
                    WHERE correo = '$correo'";

            $upd = consulta($sql);

            $_SESSION['idEmpleado'] = $idEmpleado;
            $_SESSION['nombre'] = utf8_encode($nombre);
            $_SESSION['correo'] = $correo;
            $_SESSION['validacion'] = TRUE;
            $_SESSION['tiempo']=time();

            if($upd == 1)
            {
               header('Location: ../index.html');
            }
        }else
        {
            echo "No funciona";
            //header('Location: ../login.html');
        }
    }else
    {
        echo "No funciona2";
        //header('Location: ../login.html');
    }

?>