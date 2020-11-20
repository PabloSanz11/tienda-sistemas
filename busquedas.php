<?php
	include('php/consultas.php');
	session_start();

	if(isset($_SESSION['validacion']) && isset($_GET['keyword']))
    {
		$idCliente = $_SESSION['idCliente'];
		$fecha = new DateTime(null, new DateTimeZone('CST'));
		$fechaBusqueda = $fecha->format('Y-m-d H:i:s');
		$saludo = explode(" ",$_SESSION['nombre']);
		$palabra = $_GET['keyword'];

		$sql = "INSERT INTO busquedas (palabra, fechaBusqueda, idCliente)
				VALUES ('$palabra','$fechaBusqueda','$idCliente');";
		consulta($sql);
    }
    
    if(isset($_GET['keyword']))
    {
        $palabra = $_GET['keyword'];
    }
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
<title>Busquedas</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/component.css" rel='stylesheet' type='text/css' />

<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script src="js/jquery.easydropdown.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
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
</head>
<body>
  <div class="apparel">
	<div class="container">
		<div class="header-top">
      		 <div class="logo">
			   <a href="index.php"><img src="images/logo-tienda.png" alt="" style="width:6em"/></a>
			 </div>
		   <div class="header_right">
			 <ul class="social">
				<li><a href=""> <i class="fb"> </i> </a></li>
				<li><a href=""><i class="tw"> </i> </a></li>
				<li><a href=""><i class="utube"> </i> </a></li>
				<li><a href=""><i class="instagram"> </i> </a></li>
			 </ul>
		     <div class="lang_list">
   			</div>
			<div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
		 </div>  
		 <div class="apparel_box">
		 	<ul class="login">
				<?php if(isset($_SESSION['validacion']))
      				{
				?>
				   		<li class="login_text"><a href="perfil.php"><?php echo $saludo[0];?></a></li>
				<?php
					}else
					{?>
						<li class="login_text"><a href="login.html">Iniciar Sesión</a></li>
					<?php
					}?>
				   	<div class='clearfix'></div>
				</ul>
				<ul class="quick_access">
				   	<li class="view_cart"><a href="checkout.php">Ver carrito</a></li>
				   	<div class='clearfix'></div>
				</ul>
				<form class="search" action="busquedas.php" method="get">
					<input type="text" name="keyword" value="      Buscar" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '      Buscar';}">
					<input type="submit" value="">
				</form>
		  </div>
		</div>
    </div>
	<div class="main">
	  <div class="content_box">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="menu_box"><br>
				   	  	<h3 class="menu_head">Menu</h3>
				   	     <ul class="nav">
							<li><a href="perfil.php">Perfil</a></li>
					   	  	<li><a href="productos.php">Productos</a></li>
							<?php if(isset($_SESSION['validacion'])){?>
					   	  	<li><a href="checkout.php">Carrito</a></li>
							<?php }else{?>
								<li><a href="php/add-carrito.php">Carrito</a></li>
							<?php }?>
					   	  	<li><a href="perfil.php">Pedidos</a></li>
					   	 </ul>
			   	    </div>
			   	    <div class="category">
			   	    	<h3 class="menu_head">Categorias</h3>
			   	    	<ul class="category_nav">
					   	  	<li><a href="#"></a></li>
					   	  	<li><a href="categorias.php?categoria=cuerda">cuerda</a></li>
					   	  	<li><a href="categorias.php?categoria=viento">viento </a></li>
					   	  	<li><a href="categorias.php?categoria=percusion">percusión</a></li>
					   	  	<li><a href="categorias.php?categoria=idiofonos">idiófonos</a></li>
					   	  	<li><a href="categorias.php?categoria=electrofonos">electrófonos</a></li>
					   	</ul>
			   	    </div>
				     <div class="side_banner">
					   <div class="banner_img"><img src="images/gui.jpg" class="img-responsive" alt=""/></div>
					   <div class="banner_holder">
						  <h3 style="color: white;">Now <br> is <br> Open!</h3>
					   </div>
				     </div>
			  </div>
			  <div class="col-md-9">
			    <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php" title="Go to Home Page">Inicio</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="home">&nbsp;
                        Productos&nbsp;
                        <span>&gt;</span>&nbsp;
                    </li>
                    <li class="women">
                        Busqueda
                    </li>
               </ul>
                <ul class="previous">
                	<li><a href="index.php">Volver a la página de inicio</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="mens-toolbar">
    	        <ul class="women_pagenation dc_paginationA dc_paginationA06">
		  	    </ul>
                  <p class="cat">Resultados para <b><?php echo $palabra;?></b></p>
                <div class="clearfix"></div>		
		        </div>		
				<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
					<div class="cbp-vm-options">
					</div>
					<div class="pages">   
       	   </div>
					<div class="clearfix"></div>
					<ul>
					<?php  //PHP---------------------------------------->
                        $query = busquedas($palabra);
                        if(is_null($query))
                        {
                    ?>
                        <p style="font-size:2em;margin-left:7em;">OOps! Producto no identificado</p>
                        <img src="https://th.bing.com/th/id/OIP.qJW4X92Ug2rrzaa1OK_TYwHaHa?pid=Api&rs=1" class="img-responsive" alt="" style="margin-left:14em;"/>
                    <?php
                        }else
                        {
                            while($rU = mysqli_fetch_array($query)):
                                $ruta = "php/".$rU['foto'];
					?>
					  	<li>
						  <form action="single.php" method="post">
							<a class="cbp-vm-image" href="single.php">
							 <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<img src="<?php echo $ruta;?>" class="img-responsive" alt=""/>
									<div class="product_container">
									   <div class="cart-left">
									   		<div class="price" style="marginleft:5em;">$<?php echo $rU['precio'];?> MXN</div>
									   </div><br><hr>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
							</a>
							<div class="cbp-vm-details">
								<p class="title" style="font-size:1.4em;"><?php echo utf8_encode($rU['nombre'])."\n";?></p><br>
								<?php echo utf8_encode(substr($rU['descripcion'],0,100))."...";?>
							</div>							
								<input type="number" style="display:none;" name="idProducto" value="<?php echo $rU['idProducto'];?>">
								<input type="text" style="display:none;" name="foto" value="<?php echo $ruta;?>">
								<input class="cbp-vm-icon cbp-vm-add" style="border:none;" type="submit" value="Más Información">
							</form>
						</li>
					<?php
                        endwhile;
                    }
					?>
					</ul>
				</div>
				<script src="js/cbpViewModeSwitch.js" type="text/javascript"></script>
                <script src="js/classie.js" type="text/javascript"></script>
			</div>
		 </div>
		</div>
	    </div>
<div class="container">
		  <div class="brands">
			 <ul class="brand_icons">
				<li><img src='images/icon1.jpg' class="img-responsive" alt=""/></li>
				<li><img src='images/icon2.jpg' class="img-responsive" alt=""/></li>
				<li><img src='images/icon3.jpg' class="img-responsive" alt=""/></li>
				<li><img src='images/icon4.jpg' class="img-responsive" alt=""/></li>
				<li><img src='images/icon5.jpg' class="img-responsive" alt=""/></li>
				<li><img src='images/icon6.jpg' class="img-responsive" alt=""/></li>
				<li class="last"><img src='images/icon7.jpg' class="img-responsive" alt=""/></li>
			 </ul>
		   </div>
	    </div>
	    <div class="container">
	      <ul class="footer_social">
			<li><a href="#"> <i class="fb"> </i> </a></li>
			<li><a href="#"><i class="tw"> </i> </a></li>
			<li><a href="#"><i class="pin"> </i> </a></li>
			<div class="clearfix"></div>
		   </ul>
	    </div>
        <div class="footer">
			<div class="container">
				<div class="footer-grid">
					<h3></h3>
					<ul class="list1">
					  <li><a href="#"></a></li>
					  <li><a href="#"></a></li>
					  <li><a href="#"></a></li>
					  <li><a href="#"></a></li>
				    </ul>
				</div>
				<div class="footer-grid">
					<h3>Menú</h3>
					<ul class="list1">
					  <li><a href="#">Perfil</a></li>
					  <li><a href="#">Productos</a></li>
					  <li><a href="#">Carrito</a></li>
					  <li><a href="#">Pedidos</a></li>
				    </ul>
				</div>
				<div class="footer-grid">
					<h3>Categorias</h3>
				    <ul class="list1">
					  <li><a href="#">Cuerda</a></li>
					  <li><a href="#">Viento</a></li>
					  <li><a href="#">Percusión</a></li>
					  <li><a href="#">Idiófonos</a></li>
					  <li><a href="#">Electrófonicos</a></li>
				    </ul>
				</div>
				 <div class="footer-grid footer-grid_last">
					<h3>Sobre nosotros</h3>
					<p class="footer_desc">Diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,.</p>
                    <p class="f_text">Phone:  &nbsp;&nbsp;&nbsp;00-250-2131</p>
                    <p class="email">Email: &nbsp;&nbsp;&nbsp;<span>info(at)Surfhouse.com</span></p>	
                 </div>
				 <div class="clearfix"> </div>
			</div>
		</div>
        <div class="footer_bottom">
        	<div class="container">
        		<div class="copy">
				   <p>&copy; 2020 by <a href="http://w3layouts.com" target="_blank"> Equipo verde</a></p>
			    </div>
        	</div>
        </div>
</body>
</html>		