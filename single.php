<!DOCTYPE HTML>
<html>
<head>
<?php 
	include('php/consultas.php');
	session_start();
	if(isset($_SESSION['validacion']))
    {
		$idCliente = $_SESSION['idCliente'];
		$saludo = explode(" ",$_SESSION['nombre']);
	}

	if(isset($_POST['idProducto']))
	{
		$idProducto = $_POST['idProducto'];
		$foto = $_POST['foto'];
		$query = productoEspecifico($idProducto);
		while($rU = mysqli_fetch_array($query))
		{
			$nombre = utf8_encode($rU['nombre']);
			$descripcion = utf8_encode($rU['descripcion']);
			$categoria = utf8_encode($rU['categoria']);
			$cantidad = $rU['cantidad'];
			$ruta = "php/".$rU['foto'];
			$precio = $rU['precio'];
		}
	}
?>
<title>Producto</title>
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
<!----details-product-slider--->
<!-- Include the Etalage files -->
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
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
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
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
			  <select tabindex="4" class="dropdown">
				<option value="" class="label" value="">Sesión</option>
				<option value="1">Cerrar</option>
			  </select>
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
					   	  	<li><a href="index.php">Página Principal</a></li>
					   	  	<li><a href="perfil.php">Perfil</a></li>
					   	  	<li><a href="apparel.html">Productos</a></li>
					   	  	<li><a href="checkout.php">Carrito</a></li>
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
			    <div class="dreamcrub">
				<ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php" title="Go to Home Page">Inicio</a>&nbsp;
                       <span>&gt;</span>
					</li>
                    <li class="home">&nbsp;
						<?php echo $categoria;?>&nbsp;
                        <span>&gt;</span>&nbsp;
					</li>
					<li class="women">
						<?php echo $nombre;?>
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php">Volver a la Página anterior</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="singel_right">
			     <div class="labout span_1_of_a1">
				<!-- start product_slider -->
				<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="<?php echo $foto?>" class="img-responsive" />
									<img class="etalage_source_image" src="<?php echo $foto?>" class="img-responsive" />
								</a>
							</li>
						</ul>
					<!-- end product_slider -->
			  </div>
			  <div class="cont1 span_2_of_a1">
				<h1><?php echo $nombre;?></h1>
			    <div class="price_single">
				  <span class="actual">$<?php echo $precio;?></span>
				</div>
				<h2 class="quick">Descripción:</h2>
				<p class="quick_desc" style="text-align:justify;"><?php echo $descripcion;?></p>
				<form action="php/add-carrito.php" method="post">
				<ul class="product-qty">
				   <span>Cantidad:</span>
				   <?php
				 	if($cantidad > 0):
				   ?>
				   <select name="cantidad">
				   	<?php for ($i=0; $i < $cantidad; $i++):?>
					 <option><?php echo $i + 1;?></option>
					   <?php endfor;
					endif;?>
				   </select>
				   <?php if($cantidad == 0): ?>
					<p class="quick_desc" style="color:red;font-size:1.1em;"><b>PRODUCTO SIN EXISTENCIAS</b></p>
				   <?php endif; ?>
			    </ul><br>
			    <div class="btn_form">
					<?php if($cantidad > 0): ?>
					<input style="display:none;" type="text" name="idProducto" value="<?php echo $idProducto;?>">
					<input style="display:none;" type="text" name="foto" value="<?php echo $ruta;?>">
					<input style="display:none;" type="text" name="total" value="<?php echo $precio;?>">
					<input class="add-car" type="submit" value="Agregar al Carrito" title="">
					<?php endif; ?>
				</div>
				</form>
			</div>
			<div class="clearfix"></div>
		   </div>
		   <div class="sap_tabs">	
				     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
						  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Información Adicional</span></li>
							  <div class="clear"></div>
						  </ul>				  	 
							<div class="resp-tabs-container">
							    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
									<div class="facts">
									  <ul class="tab_list" style="align-text:center;">
									  	<li><a href="#"><?php echo $descripcion;?></a></li>
									  </ul>           
							        </div>
							     </div>
							 </div>
					      </div>
					 </div>	
					 <h3 class="like">Productos Relacionados</h3>
				     <ul id="flexiselDemo3">
					<?php
						$query = productosRelacionados($categoria);
						while($rU = mysqli_fetch_array($query)):
							$ruta = "php/".$rU['foto'];
					?>
						<li><img src="<?php echo $ruta;?>"/><div class="grid-flex"><a href="#"></a></li>
					<?php endwhile;?>
					 </ul>
				    <script type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 3,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });
					    
					});
				   </script>
				   <script type="text/javascript" src="js/jquery.flexisel.js"></script>
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