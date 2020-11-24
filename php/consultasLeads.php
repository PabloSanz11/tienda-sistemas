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
                get_lead_mail();
                break;
        }
    }else{
        if(isset($_POST["vals"]) == true){
    
            switch($_POST["vals"]){
                case "send":
                    send_msg();
                    break;
        
                case "add":
                    add_lead();
                    break;
        
                case "delete":
                    delete_lead();
                    break;
            }
        }
    }
}


function get_leads_data(){
    $sql = "SELECT foto, nombre, ultimaCon, idCliente, numTelefono FROM clientes;";
    $query = consulta($sql);
    return $query;
}

function get_lead_mail(){
    if(isset($_GET['idLead'])){
        $id = $_GET['idLead'];
        $sql = "SELECT correo FROM clientes WHERE idCliente='$id'";
        $query = consulta($sql);
        $row = mysqli_fetch_assoc($query);
        echo $row["correo"];
        exit();
    }
}

function add_lead(){
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $fecha = new DateTime(null, new DateTimeZone('CST'));


    if(isset($_POST['nombreLead']) && isset($_POST['mailLead']) && isset($_POST['domicilioLead']) && isset($_POST['nacLead']) && isset($_POST['telLead']) && isset($_POST['passLead']))
    {
        $nombreDirectorio = "clientes-img/";
        $nombre = utf8_encode($_POST['nombreLead']);
        $correo =utf8_encode($_POST['mailLead']);
        $domicilio = $_POST['domicilioLead'];
        $fechaNac = $_POST['nacLead'];
        $telefono = $_POST['telLead'];
        $password = $_POST['passLead'];
        $ultimaCon = $fecha->format('Y-m-d H:i:s');




       $userNuevo = "SELECT * FROM clientes WHERE correo = '$correo';";

       $rows = consulta($userNuevo);

       if(mysqli_num_rows($rows) == 0)
       {

        if(isset($_FILES['imgLead']) &&  !empty($_FILES['imgLead'])){
            $nombreFichero = $_FILES['imgLead']['name'];
            $foto_path = $nombreDirectorio . basename($nombreFichero);
            $errors = array();
            $tmp=explode('.',$_FILES['imgLead']['name']);
            $file_ext = strtolower(end($tmp));

            $extensions = array("jpeg", "jpg", "png");

            if(in_array($file_ext, $extensions) === false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if(empty($errors)==true){
                move_uploaded_file($_FILES['imgLead']['tmp_name'],SITE_ROOT.'/'.$nombreDirectorio.$nombreFichero);
            }
            else{
                print_r($errors);
                }
        }     
        else{
               $foto_path = $nombreDirectorio;
        }
        
        $query = "INSERT INTO clientes (nombre, foto, fechaNac, correo, ultimaCon, numTelefono, contrasena, domicilio) VALUES ('$nombre', '$foto_path', '$fechaNac', '$correo', '$ultimaCon', '$telefono', '$password', '$domicilio')";

        $row = consulta($query);

        echo "valid";
        exit();

       } else{
           echo "Ya hay un usuario existente";
       }
    }
}

function delete_lead() {

    if(isset($_POST['name'])){
      $con = mysqli_connect('us-cdbr-east-02.cleardb.com','b5bb920c4d74d4','7b5379b9','heroku_2eb4075a39b1458');
      $name = $_POST['name'];
      $sql1 = "SELECT * FROM clientes WHERE nombre='$name'";
      $res = mysqli_query($con,$sql1);

      $totalRows = mysqli_num_rows($res);
   
      if($totalRows == 1){
         $sql2 = "DELETE FROM clientes WHERE nombre = '$name'";
         $res = mysqli_query($con,$sql2);
         if (!$res){
           echo("Error description: " . mysqli_error($con));
         }
         echo "valid"; 
         exit();
      } else{
          echo "invalid";
          exit();
      }
   }   
}


function send_msg(){
    if(isset($_POST['mensaje']) && isset($_POST['destinatario']) && isset($_POST['asunto']))
    {
        $id = $_POST['id'];
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
?>