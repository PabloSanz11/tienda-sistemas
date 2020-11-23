<?php
    include('conexion.php');
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $fecha = new DateTime(null, new DateTimeZone('CST'));
    
    if(isset($_POST['nombre'])  && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['numTelefono']) && isset($_POST['contrasena']))
    {
        $nombre = utf8_encode($_POST['nombre']);
        $apellido = utf8_encode($_POST['apellido']);
        $correo = $_POST['correo'];
        $numTelefono = $_POST['numTelefono'];
        $domicilio = $_POST['direccion'];
        $fechaNac = $_POST['fechaNac'];
        $contrasena = $_POST['contrasena'];
        $ultimaCon = $fecha->format('Y-m-d H:i:s');
        $nombreCompleto = $nombre." ".$apellido;

        $userNuevo = "SELECT * FROM clientes WHERE correo = '$correo';";
        $rows = consulta($userNuevo);
        
        if(mysqli_num_rows($rows) == 0)
        {
            if(is_uploaded_file($_FILES['img']['tmp_name']))
            {
                $nombreDirectorio = "clientes-img/";
                $nombreFichero = $_FILES['img']['name'];
                $foto = $nombreDirectorio . $nombreFichero;
                
                if (is_file($foto))
                {
                    $idUnico = rand(0,1000);
                    $nombreFichero = $idUnico . "-" . $nombreFichero;
                }
            
                move_uploaded_file($_FILES['img']['tmp_name'],SITE_ROOT.'/'.$nombreDirectorio.$nombreFichero);
                
                $query = "INSERT INTO clientes (nombre, foto, fechaNac, correo, ultimaCon, numTelefono, contrasena, domicilio) 
                    VALUES ('$nombreCompleto','$foto','$fechaNac','$correo','$ultimaCon','$numTelefono','$contrasena','$domicilio');";
                $rows = consulta($query);
    
                header('Location: ../login.html');
            }else
            {
                header('Location: ../register.html');
            }
        }else
        {
            header('Location: ../register.html');
        }
    }else
    {
        header('Location: ../register.html');
    }

   
?>