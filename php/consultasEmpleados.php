<?php
include('conexion.php');

if(isset($_POST["val"]) == true){

    switch($_POST['val']){
        case "delete":
            delete_employee();
            break;
        
        case "edit":
            update_employee();
            break;
        
        case "task":
            assign_tasks();
        break;

        case "term":
            finish_task();
        break;
    }
}


function update_employee(){
    $id = $_POST['id'];
    $sql1 = "SELECT * FROM empleados WHERE idEmpleado = '$id'";
    $query1 = consulta($sql1);
    $totalRows = mysqli_num_rows($query1);

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $pass = $_POST['contrasena'];
    $telefono = $_POST['telefono'];
    $foto = "empleados-img/" . $_POST['foto'];

    if($totalRows == 1){

        $sql = "UPDATE empleados
                SET `nombre` = CASE WHEN '$nombre'!='' THEN '$nombre' ELSE `nombre` END,
                `correo` = CASE WHEN '$correo' != '' THEN '$correo' ELSE `correo` END,
                `numTelefono` = CASE WHEN '$telefono' != '' THEN '$telefono' ELSE `numTelefono` END,
                `contrasena` = CASE WHEN '$pass' != '' THEN '$pass' ELSE `contrasena` END,
                `foto` = CASE WHEN '$foto' != 'empleados-img/' THEN '$foto' ELSE `foto` END
                WHERE idEmpleado = '$id';";
        
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



function delete_employee() {
    if(isset($_POST['name'])){
      $arg1 = $_POST['name'];
      $sql1 = "SELECT * FROM empleados WHERE nombre='$arg1'";
      $query1 = consulta($sql1);
      $totalRows = mysqli_num_rows($query1);
   
      if($totalRows == 1){
         $sql = "DELETE FROM empleados WHERE nombre = '$arg1'";
         $query = consulta($sql);
         echo "valid"; 
         exit();
      } else{
          echo "invalid";
          exit();
      }
   }   
}

function assign_tasks(){
    $fecha = new DateTime(null, new DateTimeZone('CST'));

    if(isset($_POST['descripcion']) && isset($_POST['idEmpleado'])){
        $descripcion = $_POST['descripcion'];
        $id = $_POST['idEmpleado'];
        $ultimaCon = $fecha->format('Y-m-d H:i:s');

        $sql = "SELECT * FROM empleados WHERE idEmpleado = '$id'";
        $query = consulta($sql);
        $row = mysqli_num_rows($query);
        if($row == 1){
            $sql2 = "INSERT INTO tareas (descripcion, estado, fechaCreacion, idEmpleado)
                    VALUES('$descripcion', 'Pendiente', '$ultimaCon', '$id');";
            $con = mysqli_connect('us-cdbr-east-02.cleardb.com','b5bb920c4d74d4','7b5379b9','heroku_2eb4075a39b1458');
            $res = mysqli_query($con,$sql2);
            if(!$res){
                echo "Error: " . mysqli_error($con);
            }else{
                echo "valid";
                exit();
            }
            mysqli_close($con);
//            $query = consulta($sql);
        } 
    }
}


function get_employees_data(){
    $sql = "SELECT foto, nombre, correo, idEmpleado as id, ultimaCon FROM empleados;";
    $query = consulta($sql);
    return $query;
}


//Funciones para Tareas

function get_tasks($value){
    $sql = "SELECT empleados.nombre, tareas.descripcion, tareas.fechaCreacion
     FROM tareas
     INNER JOIN empleados ON tareas.idEmpleado = empleados.idEmpleado
     WHERE tareas.estado = '$value'";
    $query = consulta($sql);
    return $query;
}

function finish_task(){
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $con = mysqli_connect('us-cdbr-east-02.cleardb.com','b5bb920c4d74d4','7b5379b9','heroku_2eb4075a39b1458');
        $sql = "UPDATE tareas SET estado = 'Terminada' WHERE idTarea='$id'";
        $res = mysqli_query($con,$sql);
        if(!$res){
            echo "Error: " . mysqli_error($con);
        }
    }
    mysqli_close($con);
    header('Location: ../CRM/perfil-empleado.php');
}

function get_progress(){
   $sql =  "SELECT COUNT(*) FROM tareas WHERE estado = 'Terminada';";
   $query = consulta($sql);
   return $query;
}

?>