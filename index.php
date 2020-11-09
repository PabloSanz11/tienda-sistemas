<!DOCTYPE HTML>
<html>
<head>
<?php 
	include('php/conexion.php'); 
	session_start();

	if(isset($_SESSION['validacion']))
    {
		$Bienvenido = $_SESSION['nombre'];
		$saludo = explode(" ",$_SESSION['nombre']);
	}else
	{
		$Bienvenido = "Tienda dedicada a la venta de instrumentos de distintas categorias.";
	}
?>
	<meta charset="utf-8">
<title>Tienda</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
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
<div class="header">	
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
		 <div class="index-banner">
       	   <div class="wmuSlider example1">
			   <div class="wmuSliderWrapper">
				   <article style="position: absolute; width: 100%; opacity: 0;" class="header1"> 
				   	<div class="banner-wrap">
				   	       <div class="bannertop_box">
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
								  <?php if(isset($_SESSION['validacion']))
      								{
									?>
				   		 				<li class="view_cart"><a href="checkout.php">Ver carrito</a></li>
									<?php
									}else
									{?>
										<li class="view_cart"><a href="php/add-carrito.php">Ver carrito</a></li>
									<?php
									}?>
				   		 			<div class='clearfix'></div>
				   		 		</ul>
				   		 		<div class="search">
					  			   <input type="text" value="      Buscar" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '      Buscar';}">
								   <input type="submit" value="">
					  			</div>
					  			<div class="welcome_box">
					  				<h2>Bienvenido</h2>
					  				<p><?php echo $Bienvenido;?></p>
					  			</div>
				   		 	</div>
				   		 	<div class="banner_right">
				   		 		<h1>Instrumentos<br> de Viento</h1>
				   		 		<p>Los instrumentos de viento están formados por tubos cuya vibración produce los sonidos debido al paso de masas o corrientes de aire en su interior, inyectadas por sus ejecutantes</p>
				   		 	</div>
				   		 	<div class='clearfix'></div>
				   	  </div>
					</article>
				   <article style="position: relative; width: 100%; opacity: 1;" class="header2"> 
				   	   <div class="banner-wrap">
				   	      <div class="bannertop_box">
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
								  <?php if(isset($_SESSION['validacion']))
      								{
									?>
				   		 				<li class="view_cart"><a href="checkout.php">Ver carrito</a></li>
									<?php
									}else
									{?>
										<li class="view_cart"><a href="php/add-carrito.php">Ver carrito</a></li>
									<?php
									}?>
				   		 			<div class='clearfix'></div>
				   		 		</ul>
				   		 		<div class="search">
					  			   <input type="text" value="      Buscar" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '      Buscar';}">
								   <input type="submit" value="">
					  			</div>
					  			<div class="welcome_box">
					  				<h2>Bienvenido</h2>
					  				<p><?php echo $Bienvenido;?></p>
					  			</div>
				   		 	</div>
				   		 	<div class="banner_right">
				   		 		<h1>Instrumentos<br> de Cuerda</h1>
				   		 	</div>
				   		 	<div class='clearfix'></div>
				   		</div>
				   </article>
				   <article style="position: absolute; width: 100%; opacity: 0;" class="header3">
				   	  <div class="banner-wrap">
				   	       <div class="bannertop_box">
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
								  <?php if(isset($_SESSION['validacion']))
      								{
									?>
				   		 				<li class="view_cart"><a href="checkout.php">Ver carrito</a></li>
									<?php
									}else
									{?>
										<li class="view_cart"><a href="php/add-carrito.php">Ver carrito</a></li>
									<?php
									}?>
				   		 			<div class='clearfix'></div>
				   		 		</ul>
				   		 		<div class="search">
					  			   <input type="text" value="      Buscar" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '      Buscar';}">
								   <input type="submit" value="">
					  			</div>
					  			<div class="welcome_box">
					  				<h2>Bienvenido</h2>
					  				<p><?php echo $Bienvenido;?></p>
					  			</div>
				   		 	</div>
				   		 	<div class="banner_right">
				   		 		<h1>Instrumentos<br> de Percusión</h1>
				   		 	</div>
				   		 	<div class='clearfix'></div>
				   		 </div>
					 </article>
				 </div>
				<a class="wmuSliderPrev">Previous</a><a class="wmuSliderNext">Next</a>
                <ul class="wmuSliderPagination">
                	<li><a href="#" class="">0</a></li>
                	<li><a href="#" class="">1</a></li>
                	<li><a href="#" class="wmuActive">2</a></li>
                </ul>
            </div>
            <script src="js/jquery.wmuSlider.js"></script> 
			  <script>
       			$('.example1').wmuSlider();         
   		     </script> 	           	      
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
					   	  	<li><a href="apparel.html">Productos</a></li>
							<?php if(isset($_SESSION['validacion'])){?>
					   	  	<li><a href="checkout.php">Carrito</a></li>
							<?php }else{?>
								<li><a href="php/add-carrito.php">Carrito</a></li>
							<?php }?>
					   	  	<li><a href="apparel.html">Pedidos</a></li>
					   	 </ul>
			   	    </div>
			   	    <div class="category">
			   	    	<h3 class="menu_head">Categorias</h3>
			   	    	<ul class="category_nav">
					   	  	<li><a href="#"></a></li>
					   	  	<li><a href="#">cuerda</a></li>
					   	  	<li><a href="#">viento </a></li>
					   	  	<li><a href="#">percusión</a></li>
					   	  	<li><a href="#">idiófonos</a></li>
					   	  	<li><a href="#">electrófonos</a></li>
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
			   <h3 class="m_1">Nuevos Articulos</h3>
				<?php  //PHP---------------------------------------->
					 	$sql = "SELECT * FROM productos ORDER BY idProducto DESC";
						$query = consulta($sql);
						while($rU = mysqli_fetch_array($query)):
							$ruta = "php/".$rU['foto'];
				?>
				<div class="content_grid">
				   <div class="col_1_of_3 span_1_of_3" style="margin-left:14px;"> 
				  	 <div class="view view-first">
					    <form action="single.php" method="post">
						   <div class="inner_content clearfix">
							<div class="product_image">
								<img src="<?php echo $ruta?>" class="img-responsive" alt=""/>
								<div class="product_container">
								   <div class="cart-left">
									 <p class="title"><?php echo $rU['nombre'];?></p>
								   </div><br>
								   <div class="price">$<?php echo $rU['precio'];?> MXN</div><hr><hr>
								   	<input type="number" style="display:none;" name="idProducto" value="<?php echo $rU['idProducto'];?>">
								   	<input type="text" style="display:none;" name="foto" value="<?php echo $ruta;?>">
									<input class="cart-center" type="submit" value="Ver más">
								   <div class="clearfix"></div>
							    </div>		
							</div>
		                    <div class="sale-box"><span class="on_sale title_shop">Nuevo</span></div>	
		                   </div>
		                </form>
				       </div>
				    </div>
			  </div>
			  <?php endwhile;?>
			  <div class="content_grid">
				    <div class="clearfix"></div>
			   </div>
			   <h3 class="m_2">Productos más vendidos</h3>
			   <?php  //PHP---------------------------------------->
					 	$sql = "SELECT * FROM productos ORDER BY idProducto DESC LIMIT 3";
						$query = consulta($sql);
						while($rU = mysqli_fetch_array($query)):
							$ruta = "php/".$rU['foto'];
				?>
				<div class="content_grid">
				   <div class="col_1_of_3 span_1_of_3" style="margin-left:14px;"> 
				  	 <div class="view view-first">
					    <form action="single.php" method="post">
						   <div class="inner_content clearfix">
							<div class="product_image">
								<img src="<?php echo $ruta?>" class="img-responsive" alt=""/>
								<div class="product_container">
								   <div class="cart-left">
									 <p class="title"><?php echo $rU['nombre'];?></p>
								   </div><br>
								   <div class="price">$<?php echo $rU['precio'];?> MXN</div><hr><hr>
								   	<input type="number" style="display:none;" name="idProducto" value="<?php echo $rU['idProducto'];?>">
								   	<input type="text" style="display:none;" name="foto" value="<?php echo $ruta;?>">
									<input class="cart-center" type="submit" value="Ver más">
								   <div class="clearfix"></div>
							    </div>		
							</div>
		                   </div>
		                </form>
				       </div>
				    </div>
			  </div>
			  <?php endwhile;?>
			  <div class="content_grid">
				    <div class="clearfix"></div>
			   </div>
			    <h3 class="m_2">Recomendado</h3>
				<?php  //PHP---------------------------------------->
					 	$sql = "SELECT * FROM productos ORDER BY idProducto DESC LIMIT 3";
						$query = consulta($sql);
						while($rU = mysqli_fetch_array($query)):
							$ruta = "php/".$rU['foto'];
				?>
				<div class="content_grid">
				   <div class="col_1_of_3 span_1_of_3" style="margin-left:14px;"> 
				  	 <div class="view view-first">
					    <form action="single.php" method="post">
						   <div class="inner_content clearfix">
							<div class="product_image">
								<img src="<?php echo $ruta?>" class="img-responsive" alt=""/>
								<div class="product_container">
								   <div class="cart-left">
									 <p class="title"><?php echo $rU['nombre'];?></p>
								   </div><br>
								   <div class="price">$<?php echo $rU['precio'];?> MXN</div><hr><hr>
								   	<input type="number" style="display:none;" name="idProducto" value="<?php echo $rU['idProducto'];?>">
								   	<input type="text" style="display:none;" name="foto" value="<?php echo $ruta;?>">
									<input class="cart-center" type="submit" value="Ver más">
								   <div class="clearfix"></div>
							    </div>		
							</div>	
		                   </div>
		                </form>
				       </div>
				    </div>
			  </div>
			  <?php endwhile;?>
			  <div class="content_grid">
				    <div class="clearfix"></div>
			   </div>
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