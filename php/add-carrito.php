<?php

	include('consultas.php');
	session_start();

	if(isset($_SESSION['validacion']))
    {
		$idCliente = $_SESSION['idCliente'];

		if(isset($_POST['idProducto']) && isset($_POST['cantidad']) && isset($_POST['total']) && !isset($_POST['idCarrito']))
		{   
			$vigente = TRUE;
			$comprado = FALSE;
			$cantidad = $_POST['cantidad'];
			$precio = $_POST['total'];
			$total = $cantidad * $precio;
			$idProducto = $_POST['idProducto'];
	
			$query = "INSERT INTO carritos (vigente, comprado, cantidad, total, idCliente, idProducto) 
						VALUES ('$vigente','$comprado','$cantidad','$total','$idCliente','$idProducto');";
			$rows = consulta($query);
			
			//removerInventario($idProducto,$cantidad);
			$query = productoEspecifico($idProducto);

		}elseif(isset($_POST['idCarrito']))
		{
			$idCarrito = $_POST['idCarrito'];
			$cantidad = $_POST['cantidad'];
			$idProducto = $_POST['idProducto'];

			$query = productoEspecifico($idProducto);

			while($rU = mysqli_fetch_array($query))
			{
				$precio = $rU['precio'];
			}

			$total = $cantidad * $precio;

			if(isset($_POST['check']))
			{
				removerCarrito($idCarrito);
				header('Location: ../checkout.php');
			}else
			{
				actualizarCarrito($idCarrito,$cantidad,$total);
				header('Location: ../checkout.php');
			}

		}
		else
		{
			header('Location: ../registro.php');
		}
	}else
	{
		$idCliente = 0;
	}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Producto</title>
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
    <div class="contenedor">
		<?php
			if($idCliente > 0)
			{
		?>
        <br>
        <h1>Producto agregado correctamente</h1>
        <?php
            while($rU = mysqli_fetch_array($query)):
        ?>
        <h3><?php echo utf8_encode($rU['nombre']);?></h3>
        <img class="img-car" src="<?php echo $rU['foto'];?>" alt=""><br><br>
        <a href="../checkout.php" class="add-car">Ver Carrito</a>
        <a href="../index.php" class="add-car">Continuar Comprando</a>
		<?php endwhile;
			}elseif($idCliente == 0)
			{
		?>
			<br>
			<h1>Debes Registrarte ó Iniciar Sesión</h1>
			<h2>para continuar</h2>
			<br>
			<img src="http://antares-club.ro/images/alien.png" alt="" style="width:20%">
			<br><br>
			<a href="../login.html" class="add-car">Identificate</a>
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