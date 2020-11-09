<!DOCTYPE HTML>
<html lang="es-419">
<html>
<head>
<?php
    include('php/consultas.php');
    session_start();

    if(isset($_SESSION['validacion']))
    {
        $idCliente = $_SESSION['idCliente'];
        $query = productosCarrito($idCliente);
        $ruta = "php/";
        $subTotal = 0;
        $saludo = explode(" ",$_SESSION['nombre']);

        $array = obtenerDireccion($idCliente);
        $tar = obtenerTarjetas($idCliente);
        $fechas = explode("/",$tar[4]);

        if(mysqli_num_rows($query) == 0)
        {
            $respuesta = "SIN PRODUCTOS EN EL CARRITO";
        }
    }

?>
	<meta charset="utf-8">
<title>Carrito</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/bootstrap-css.css" rel='stylesheet' type='text/css' />
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
   			</div>
			<div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
		 </div>  
		 <div class="apparel_box">
		 	<ul class="login">
				<?php if(isset($_SESSION['validacion']))
      				{?>
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
				   	<li class="view_cart"><a href="index.php">Página Principal</a></li>
				   	<div class='clearfix'></div>
				</ul>
		  </div>
		</div>
    </div>
    <div class="main" style="background: white;">
	   <div class="container">
		   <div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <div style="display: table; margin: auto;">
                        <span class="step step_complete"> <a href="#" class="check-bc">Carrito</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="#" class="check-bc">Pagar</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                        <span class="step_thankyou check-bc step_complete">Gracias</span>
                    </div>
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div> <br>
            <div class="row cart-body">
                <div class="form-horizontal" method="post" action="checkout.php">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading" style="color: #ffffff";>
                            Revisar Orden <div class="pull-right"><small><a class="afix-1" href="#"></a></small></div>
                        </div>
                        <div class="panel-body">
                        <?php
                                if(mysqli_num_rows($query) != 0)
                                {
                                    while($rU = mysqli_fetch_array($query)):
                                        $subTotal = $subTotal + $rU['total'];?>
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="<?php echo $ruta.$rU['foto'];?>" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12"><?php echo $rU['nombre'];?></div><br>
                                    <div class="col-xs-12">
                                        <form action="php/add-carrito.php" method="post">
                                            <small style="margin-top:5px;">Cantidad:</small>
                                            <select class="inv-cant" name="cantidad">
                                                <?php
                                                for ($i=0; $i < $rU['inventario']; $i++):
                                                    if($rU['cantidad'] == ($i+1))
                                                    {?>
                                                        <option selected="true"><?php echo $i + 1;?></option>
                                                <?php }else{?>
                                                        <option><?php echo $i + 1;?></option>
                                                <?php }endfor;?>
                                            </select><br>
                                            <small>Eliminar Producto: &nbsp;</small><input type="checkbox" name="check" value="TRUE"><br>
                                            <input style="display:none;" name="idCarrito" type="number" value="<?php echo $rU['idCarrito'];?>">
                                            <input style="display:none;" name="idProducto" type="number" value="<?php echo $rU['idProducto'];?>">
                                            <input style="display:none;" name="precio" type="number" value="<?php echo $rU['total'];?>">
                                            <input class="gone" type="submit" value="Aplicar Cambios">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h4><span>$ </span><?php echo $rU['total'];?> MXN</h4>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <?php endwhile;
                                }else{?>
                                    <div class="col-sm-6 col-xs-6" style="text-align:center">
                                        <div class="col-xs-12" style="color:red; margin-left:7em; font-size:1.2em;"><?php echo $respuesta;?></div><br>
                                    </div>
                                <?php }?>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Subtotal</strong>
                                    <div class="pull-right"><span>$ </span><span><?php echo $subTotal;?> MXN</span></div>
                                </div>
                                <div class="col-xs-12">
                                    <small>Envío</small>
                                    <div class="pull-right"><span>Gratis</span></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Total Orden</strong>
                                    <div class="pull-right"><span>$ </span><span><?php echo $subTotal;?> MXN</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <form class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6" action="php/finalizar-compra.php" method="post">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading" style="color: #ffffff";>Dirección</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Dirección de Envío</h4>
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="col-md-12"><strong>Nombre Completo:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="nombre" class="form-control" value="<?php echo $array[1];?>" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Dirección:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="direccion" class="form-control" value="<?php echo $array[2];?>" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Estado:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="estado" class="form-control" value="<?php echo $array[3];?>" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Ciudad:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="ciudad" class="form-control" value="<?php echo $array[4];?>" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Código Postal:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="cp" class="form-control" value="<?php echo $array[5];?>" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Número de Teléfono:</strong></div>
                                <div class="col-md-12"><input type="text" name="numTelefono" class="form-control" value="<?php echo $array[6];?>" required/></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Correo:</strong></div>
                                <div class="col-md-12"><input type="email" name="correo" class="form-control" value="<?php echo $array[7];?>" required/></div>
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                    <div class="panel panel-info">
                        <div class="panel-heading" style="color: #ffffff";><span><i class="glyphicon glyphicon-lock"></i></span> Pago Seguro</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Tipo de Tarjeta:</strong></div>
                                <div class="col-md-12">
                                    <select id="CreditCardType" name="tipo" class="form-control" required>
                                        <option value="Visa" selected>Visa</option>
                                        <option value="MasterCard">MasterCard</option>
                                        <option value="American Express">American Express</option>
                                        <option value="Discover">Discover</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Número de Tarjeta:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="numTarjeta" value="<?php echo $tar[2];?>" required/></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Nombre en Tarjeta:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="nombreTarjeta" value="<?php echo $tar[3];?>" required/></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>CVV:</strong></div>
                                <div class="col-md-12"><input type="password" class="form-control" name="cvv" value="<?php echo $tar[4];?>" required/></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Fecha de Expiración (Mes / Año)</strong>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="mes" required>
                                        <?php for($i = 1; $i <= 12; $i++){
                                                if($fechas[0] == strval($i) || $fechas[0] == strval("0".$i)){?>
                                                    <option value="<?php echo $i?>" selected><?php echo $i?></option>
                                                <?php }else{?>
                                                <option value="<?php echo $i?>"><?php echo $i;?></option>
                                        <?php }}?>
                                </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="ano" required>
                                    <?php for($i = 0; $i <= 6; $i++){
                                                if($fechas[1] == strval('2'.$i)){?>
                                                    <option value="<?php echo '2'.$i?>" selected><?php echo '2'.$i?></option>
                                                <?php }else{?>
                                                <option value="<?php echo '2'.$i?>"><?php echo '2'.$i;?></option>
                                    <?php }}?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <span>Paga seguro usando tu tarjeta.</span>
                                </div>
                                <div class="col-md-12">
                                    <ul class="cards">
                                        <li class="visa hand">Visa</li>
                                        <li class="mastercard hand">MasterCard</li>
                                        <li class="amex hand">Amex</li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php if(mysqli_num_rows($query) != 0){?>
                                    <input style="display:none;" name="totalPagar" type="number" value="<?php echo $subTotal;?>">
                                    <button type="submit" class="btn btn-primary btn-submit-fix">Realizar Pedido</button>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                </form>
                
                </div>
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>
	     </div>
	    </div>
		<div class="container" style="background: white;">
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
	    <div class="container" style="background: white;">
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