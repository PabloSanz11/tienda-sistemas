<?php 

include('conexion.php');
filter_function();

function filter_function(){
    if(isset($_POST["vals"]) == true){
        switch($_POST["vals"]){
            case "delete":
                delete_product();
                break;

            case "add":
                add_product();
                break;

            case "edit":
                update_product();
                break;
        }
    }
}


function add_product(){
    define ('SITE_ROOT', realpath(dirname(__FILE__)));

        if(isset($_POST['nombreProducto']) && isset($_POST['marcaProducto']) && isset($_POST['categoriaProducto']) && isset($_POST['modeloProducto']) && isset($_POST['precioProducto']) && isset($_POST['cantProducto']) && isset($_POST['proovedorProducto']) && isset($_POST['descrProducto']) && isset($_FILES['fotoProducto'])){
            $nombreDirectorio = "productos-img/";
            $nombre = $_POST['nombreProducto'];
            $marca = $_POST['marcaProducto'];
            $modelo= $_POST['modeloProducto'];
            $precio =$_POST['precioProducto'];
            $cantidad= $_POST['cantProducto'];
            $proveedor =  $_POST['proovedorProducto'];
            $descripcion = $_POST['descrProducto'];
            $categoria = $_POST['categoriaProducto'];
            $nombreFichero = $_FILES['fotoProducto']['name'];

            $prodNuevo = "SELECT * FROM productos WHERE nombre = '$nombre';";
            $con = mysqli_connect('us-cdbr-east-02.cleardb.com','b5bb920c4d74d4','7b5379b9','heroku_2eb4075a39b1458');
            $res = mysqli_query($con,$prodNuevo);
             if(!$res){
                 echo("Error description: " . mysqli_error($con));
                 mysqli_close($con);
                 exit();
             }
             //mysqli_close($con);
            //$rows = consulta($prodNuevo);
     
            if(mysqli_num_rows($res) == 0)
            {
                if(isset($_FILES['fotoProducto']) &&  !empty($_FILES['fotoProducto'])){
                    $nombreFichero = $_FILES['fotoProducto']['name'];
                    $foto_path = $nombreDirectorio . basename($nombreFichero);
                    $errors = array();
                    $tmp=explode('.',$_FILES['fotoProducto']['name']);
                    $file_ext = strtolower(end($tmp));
        
                    $extensions = array("jpeg", "jpg", "png");
        
                    if(in_array($file_ext, $extensions) === false){
                        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                    }
                    if(empty($errors)==true){
                        move_uploaded_file($_FILES['fotoProducto']['tmp_name'],SITE_ROOT.'/'.$nombreDirectorio.$nombreFichero);
                    }
                    else{
                        print_r($errors);
                        }
                }     
            }
            else{
                $foto_path = $nombreDirectorio;
         }

         $query = "INSERT INTO productos(nombre, marca, modelo, categoria, foto, descripcion, precio, cantidad, idProveedor)
         VALUES(
             '$nombre', '$marca', '$modelo', '$categoria', '$foto_path', '$descripcion', '$precio', '$cantidad',
             (SELECT idProveedor FROM proveedores WHERE nombre='$proveedor')
         );";

        $con = mysqli_connect('us-cdbr-east-02.cleardb.com','b5bb920c4d74d4','7b5379b9','heroku_2eb4075a39b1458');
        $res = mysqli_query($con,$query);
         if(!$res){
             echo("Error description: " . mysqli_error($con));
         }else{
             echo "valid";
         }
         mysqli_close($con);
         exit();
        }
    }

function delete_product(){
    if(isset($_POST['idProducto'])){
        $id = $_POST['idProducto'];
        $sql1 = "SELECT * FROM productos WHERE idProducto='$id'";
        $query1 = consulta($sql1);
        $totalRows = mysqli_num_rows($query1);
     
        if($totalRows == 1){
           $sql = "DELETE FROM productos WHERE idProducto = '$id'";
           $con = mysqli_connect('us-cdbr-east-02.cleardb.com','b5bb920c4d74d4','7b5379b9','heroku_2eb4075a39b1458');
           $res = mysqli_query($con,$sql);
            if(!$res){
                echo("Error description: " . mysqli_error($con));
            }else{
                echo "valid"; 
                exit();
            }
            mysqli_close($con);
            exit();
            /*
           if($query == 1){
            echo "valid"; 
            exit();
           } else{
            echo "invalid";
            exit();
            }*/
        }   
    }
}

function update_product(){
    //$nombreDirectorio = "productos-img/";
    $id = $_POST['idProducto'];
    $nombre = $_POST['nombreProducto'];
    $marca = $_POST['marcaProducto'];
    $modelo= $_POST['modeloProducto'];
    $precio =$_POST['precioProducto'];
    $cantidad= $_POST['cantProducto'];
    $proveedor =  $_POST['proovedorProducto'];
    $descripcion = $_POST['descrProducto'];
    $categoria = $_POST['categoriaProducto'];
    //$nombreFichero = $_FILES['fotoProducto']['name'];

    $sql1 = "SELECT * FROM productos WHERE idProducto = '$id'";
    $query1 = consulta($sql1);
    $totalRows = mysqli_num_rows($query1);

    if($totalRows == 1){

        $sql = "UPDATE productos
        SET `nombre` = CASE WHEN '$nombre'!='' THEN '$nombre' ELSE `nombre` END,
        `marca` = CASE WHEN '$marca' != '' THEN '$marca' ELSE `marca` END,
        `modelo` = CASE WHEN '$modelo' != '' THEN '$modelo' ELSE `modelo` END,
        `precio` = CASE WHEN '$precio' != '' THEN '$precio' ELSE `precio` END,
        `cantidad` = CASE WHEN '$cantidad' != '' THEN '$cantidad' ELSE `cantidad` END,
        `descripcion` = CASE WHEN '$descripcion' != '' THEN '$descripcion' ELSE `descripcion` END,
        `cantidad` = CASE WHEN '$cantidad' != '' THEN '$cantidad' ELSE `cantidad` END,
        `idProveedor` = CASE WHEN '$proveedor' != '' THEN (SELECT idProveedor FROM proveedores WHERE nombre='$proveedor') ELSE `idProveedor` END
        WHERE idProducto = '$id'";

        $con = mysqli_connect('us-cdbr-east-02.cleardb.com','b5bb920c4d74d4','7b5379b9','heroku_2eb4075a39b1458');
        $res = mysqli_query($con,$sql);
        if(!$res){
            echo("Error description: " . mysqli_error($con));
        }else{
            echo "valid"; 
            exit();
        }
        mysqli_close($con);
        exit();
    }
}


?>