<?php
include('conexion.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/PHPMailer/src/Exception.php';
require 'vendor/phpmailer/PHPMailer/src/PHPMailer.php';
require 'vendor/phpmailer/PHPMailer/src/SMTP.php';

filter_function();

function filter_function(){
    if(isset($_GET["val"]) == true){
        switch($_GET['val']){
            case "mail":
                get_provider_mail();
                break;
        }
    }else{
        if(isset($_POST["vals"]) == true){
    
            switch($_POST["vals"]){
                case "send":
                    send_msg(); //Función para mandar correos
                    break;
        
                case "add":
                    add_provider(); //Función para agregar a un nuevo proveedor
                    break;
        
                case "delete":
                    delete_provider();  //Función para eliminar a un proveedor
                    break;
                
                case "edit":
                    update_provider();    //Función para actualizar datos de un proveedor
                    break;
            }
        }
    }
}

function get_provider_mail(){
    if(isset($_GET['idProveedor'])){
        $id = $_GET['idProveedor'];
        $sql = "SELECT correo FROM proveedores WHERE idProveedor='$id'";
        $query = consulta($sql);
        $row = mysqli_fetch_assoc($query);
        echo $row["correo"];
        exit();
    }
}


function get_providers_data(){
    $sql = "SELECT foto, nombre, numTelefono, domicilio FROM proveedores;";
    $query = consulta($sql);
    return $query;
}

function add_provider(){
    define ('SITE_ROOT', realpath(dirname(__FILE__)));


    if(isset($_POST['nombreEmpresa']) && isset($_POST['nombreCorreo']) && isset($_POST['nombreDomicilio']) && isset($_POST['fechaAlta']) && isset($_POST['numTelefono']))
    {
        $nombreDirectorio = "proveedores-img/";
        $nombre = utf8_encode($_POST['nombreEmpresa']);
        $correo =utf8_encode($_POST['nombreCorreo']);
        $domicilio = $_POST['nombreDomicilio'];
        $fechaAlta = $_POST['fechaAlta'];
        $telefono = $_POST['numTelefono'];

       $userNuevo = "SELECT * FROM proveedores WHERE correo = '$correo';";

       $rows = consulta($userNuevo);

       if(mysqli_num_rows($rows) == 0)
       {

        if(isset($_FILES['inputLogo']) &&  !empty($_FILES['inputLogo'])){
            $nombreFichero = $_FILES['inputLogo']['name'];
            $foto_path = $nombreDirectorio . basename($nombreFichero);
            $errors = array();
            $tmp=explode('.',$_FILES['inputLogo']['name']);
            $file_ext = strtolower(end($tmp));

            $extensions = array("jpeg", "jpg", "png");

            if(in_array($file_ext, $extensions) === false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if(empty($errors)==true){
                move_uploaded_file($_FILES['inputLogo']['tmp_name'],SITE_ROOT.'/'.$nombreDirectorio.$nombreFichero);
            }
            else{
                print_r($errors);
                }
        }     
        else{
               $foto_path = $nombreDirectorio;
        }
        
        $query = "INSERT INTO proveedores (nombre, foto, fechaNac, correo, numTelefono, domicilio) VALUES ('$nombre', '$foto_path', '$fechaAlta', '$correo', '$telefono', '$domicilio')";

        $row = consulta($query);

        echo "valid";
        exit();

       } else{
           echo "Ya hay un usuario existente";
           exit();
       }
    }
}


function send_msg(){
    if(isset($_POST['mensaje']) && isset($_POST['destinatario']) && isset($_POST['asunto']))
    {
        $mensaje = $_POST['mensaje'];
        $destinatario = $_POST['destinatario'];
        $asunto = $_POST['asunto'];

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug =  2;//SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.office365.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'cartici2020@outlook.com';                     // SMTP username
            $mail->Password   = 'kPpQN6fc36rpVv5';                               // SMTP password
            $mail->SMTPSecure = 'tls';                    //PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('cartici2020@outlook.com', 'noreply@isaski');
            $mail->addAddress($destinatario, 'To: ');     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Enviar archivos
            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $asunto;
            $mail->Body = 'Correo: ' . $destinatario . '<br/>Asunto: ' . $asunto . '<br/>' . $mensaje ;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'valid';
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}


function update_provider(){
    $id = $_POST['idProveedor'];
    $nombre = $_POST['nombreProveedor'];
    $correo = $_POST['correoProveedor'];
    $domicilio = $_POST['domicilioProveedor'];
    $telefono = $_POST['telefonoProveedor'];
    $foto = "proveedores-img/" . $_FILES['fotoProveedor']['name'];

    $sql1 = "SELECT * FROM proveedores WHERE idProveedor = '$id'";
    $query1 = consulta($sql1);
    $totalRows = mysqli_num_rows($query1);

    if($totalRows == 1){

        $sql = "UPDATE proveedores
                SET `nombre` = CASE WHEN '$nombre'!='' THEN '$nombre' ELSE `nombre` END,
                `correo` = CASE WHEN '$correo' != '' THEN '$correo' ELSE `correo` END,
                `numTelefono` = CASE WHEN '$telefono' != '' THEN '$telefono' ELSE `numTelefono` END,
                `domicilio` = CASE WHEN '$domicilio' != '' THEN '$domicilio' ELSE `domicilio` END,
                `foto` = CASE WHEN '$foto' != 'proveedores-img/' THEN '$foto' ELSE `foto` END
                WHERE idProveedor = '$id';";

        $q = consulta($sql);
        if($q == 1){
            echo "valid";
            exit();
        }
        else{
            echo "invalid";
            exit();
        }
    }
}

function delete_provider(){
    if(isset($_POST['idProveedor'])){
        $id = $_POST['idProveedor'];
        $sql1 = "SELECT * FROM proveedores WHERE idProveedor='$id'";
        $query1 = consulta($sql1);
        $totalRows = mysqli_num_rows($query1);
     
        if($totalRows == 1){
           $sql = "DELETE FROM proveedores WHERE idProveedor = '$id'";
           $query = consulta($sql);
           
           if($query == 1){
            echo "valid"; 
            exit();
           } else{
            echo "invalid";
            exit();
            }
        }   
    }
}


?>