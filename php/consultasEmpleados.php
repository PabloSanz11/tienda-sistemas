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

function get_employees_data(){
    $sql = "SELECT foto, nombre, correo, idEmpleado as id, ultimaCon FROM empleados;";
    $query = consulta($sql);
    return $query;
}

?>