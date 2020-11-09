<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include('conexion.php');
      $sql = "SELECT * FROM carritos";
      $query = consulta($sql);
      while($rU = mysqli_fetch_array($query)):
    ?>

    <h1>id:<?php echo $rU['idCarrito'];?></h1>
    <h1>idPRODUCTO:<?php echo $rU['idProducto'];?></h1>
    <h1>Cantidad seleccionada:<?php echo $rU['cantidad'];?></h1>

  <?php
    endwhile;
    $sql = "SELECT * FROM productos";
    $query = consulta($sql);
    while($rU = mysqli_fetch_array($query)):
  ?>

  <h1>id:<?php echo $rU['idProducto'];?></h1>
  <h1>Cantidad TOTAL:<?php echo $rU['cantidad'];?></h1>

  <?php
    endwhile;
  ?>
  </body>
</html>
