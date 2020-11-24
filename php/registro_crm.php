<?php
    include('conexion.php');
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $fecha = new DateTime(null, new DateTimeZone('CST'));

    $nombreDirectorio = "empleados-img/";
    $nombreFichero = $_FILES['foto-subir']['name'];


    if(isset($_POST['nombre'])  && isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['contrasena']) && isset($_POST['contrasena-2']))
    {
        if($_POST['contrasena'] != $_POST['contrasena-2']){
            echo "Contraseñas diferentes";
           // header("Location: ../register.html");
        }
        
        $nombre = utf8_encode($_POST['nombre']);
        $telefono = utf8_encode($_POST['telefono']);
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $ultimaCon = $fecha->format('Y-m-d H:i:s');
        //Verificar si no hay alguien con el mismo correo
        
        $userNuevo = "SELECT * FROM empleados WHERE correo = '$correo';";

        $rows = consulta($userNuevo);

        if(mysqli_num_rows($rows) == 0)
        {
            $foto_path = $nombreDirectorio . basename($nombreFichero);
            
            $query = "INSERT INTO empleados(foto, nombre ,correo, numTelefono, contrasena, ultimaCon) VALUES ('$foto_path', '$nombre','$correo', '$telefono', '$contrasena', '$ultimaCon');";

           $row= consulta($query);

            if(isset($_FILES['foto-subir'])){
                $errors= array();
                $tmp=explode('.',$_FILES['foto-subir']['name']);
                $file_ext = strtolower(end($tmp));

            $extensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$extensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if(empty($errors)==true){
                move_uploaded_file($_FILES['foto-subir']['tmp_name'],SITE_ROOT.'/'.$nombreDirectorio.$nombreFichero);
            }
            else{
                print_r($errors);
                }
        }
    }
}
?>