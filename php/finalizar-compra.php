<?php

    include('consultas.php');
    session_start();
    $fecha = new DateTime(null, new DateTimeZone('CST'));
    $compra = 0;

    if(isset($_SESSION['validacion']) && isset($_SESSION['nombre']))
    {
        $idCliente = $_SESSION['idCliente'];
        
        //Direccion 
        $nombre = utf8_encode($_POST['nombre']);
        $direccion = utf8_encode($_POST['direccion']);
        $estado = utf8_encode($_POST['estado']);
        $ciudad = utf8_encode($_POST['ciudad']);
        $cp = $_POST['cp'];
        $numTelefono = $_POST['numTelefono'];
        $correo = $_POST['correo'];

        $sql = "INSERT INTO direcciones (nombre, direccion, estado, ciudad, cp, numTelefono, correo, idCliente)
                VALUES ('$nombre','$direccion','$estado','$ciudad','$cp','$numTelefono','$correo','$idCliente');";
        $query = consulta($sql);
        
        //Tarjeta
        $tipo = $_POST['tipo'];
        $numTarjeta = $_POST['numTarjeta'];
        $nombreTarjeta = utf8_encode($_POST['nombreTarjeta']);
        $mes = $_POST['mes'];
        $ano = $_POST['ano'];
        $fechaVencimiento = $mes."/".$ano;
        $cvv = $_POST['cvv'];

        $sql = "INSERT INTO tarjetas (tipo, numTarjeta, nombreTarjeta, fechaVencimiento, cvv, idCliente)
                VALUES ('$tipo','$numTarjeta','$nombreTarjeta','$fechaVencimiento','$cvv','$idCliente');";
        $query = consulta($sql);

        aplicarCambios();
        
        //Pedido y Carrito
        $car = productosCarrito($idCliente);
        $fechaCompra = $fecha->format('Y-m-d H:i:s');
        date_add($fecha,date_interval_create_from_date_string("7 days"));
        $fechaEntrega = date_format($fecha,"Y-m-d H:i:s");

        $total = $_POST['totalPagar'];
        $idTarjeta = ultimaTarjeta();
        $idDireccion = ultimaDireccion();

        while($rU = mysqli_fetch_array($car))
		{
            $idCarrito = $rU['idCarrito'];

            $insert = "INSERT INTO pedidos (fechaPedido, fechaEntrega, total, idCarrito, idTarjeta, idDireccion, estado)
                        VALUES ('$fechaCompra','$fechaEntrega','$total','$idCarrito','$idTarjeta','$idDireccion', 'En curso');";
            $query = consulta($insert);

            removerInventario($rU['idProducto'],$rU['cantidad']);
        }

        $sql = "UPDATE carritos
                SET vigente = FALSE,
                    comprado = TRUE
                WHERE idCliente = '$idCliente';";
        $query = consulta($sql);
        $compra = 1;
    }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Pedido</title>
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link href="../css/component.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script src="../js/jquery.easydropdown.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script src="../js/jquery.magnific-popup.js" type="text/javascript"></script>
<link href="../css/magnific-popup.css" rel="stylesheet" type="text/css">
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
			});
		});
		</script>
<!----details-product-slider--->
<!-- Include the Etalage files -->
<link rel="stylesheet" href="../css/etalage.css">
<script src="../js/jquery.etalage.min.js"></script>
				<!-- Include the Etalage files -->
				<script>
						jQuery(document).ready(function($){
			
							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,
								
								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
				</script>
				<!----//details-product-slider--->	
<script src="../js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
			   </script>	
</head>
<body>
  <div class="single">
	<div class="container">
		<div class="header-top">
      		 <div class="logo">
				<a href="../index.php"><img src="../images/logo-tienda.png" alt="" style="width:6em"/></a>
			 </div>
		   <div class="header_right">
			 <ul class="social">
				<li><a href=""> <i class="fb"> </i> </a></li>
				<li><a href=""><i class="tw"> </i> </a></li>
				<li><a href=""><i class="utube"> </i> </a></li>
				<li><a href=""><i class="instagram"> </i> </a></li>
			 </ul>
			<div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
		 </div>  
		</div>
    </div>
    </div>
</body>
    <div class="contenedor" style="height: auto; padding-bottom:1.2em;">
		<?php
			if($compra > 0)
			{
		?>
        <br>
        <h1>Su pedido se ha realizado exitosamente</h1>
        <h3>¡Gracias por su preferencia!</h3>
        <img src="https://cdn.pixabay.com/photo/2017/11/12/03/11/emojis-2941412_960_720.png" alt="" style="width:20%"><br><br>
        <a href="../perfil.php" class="add-car">Ver Pedidos</a>
        <a href="../index.php" class="add-car">Continuar Comprando</a>
		<?php
			}elseif($idCliente == 0)
			{
		?>
			<br>
			<h1>Ha oucrrido un error</h1>
			<h2>en la transferencia</h2>
			<br>
			<img src="http://antares-club.ro/images/alien.png" alt="" style="width:20%">
			<br><br>
			<a href="../login.html" class="add-car">Página Principal</a>
		<?php
			}
		?>
    </div>
</html>	

<style>

.contenedor{
    margin-top:2%;
    width:60%;
    height:35%;
    margin-left:20%;
    background-color:#f1f1f1;
    text-align: center;
    align-items:center;
    border-radius:14px;
    margin-bottom:2%;
    padding-bottom:3em;
}

.img-car{
    width:30%;
}
</style>