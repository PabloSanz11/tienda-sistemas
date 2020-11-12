<?php 
	include('php/consultas.php');
  session_start();
  
	if(isset($_SESSION['validacion']))
  {
		$idCliente = $_SESSION['idCliente'];
    $saludo = explode(" ",$_SESSION['nombre']);
    $cliente = obtenerCliente($idCliente);

    while($rm = mysqli_fetch_array($cliente))
    {
      $nombre = utf8_encode($rm['nombre']);
      $foto = "php/".$rm['foto'];
      $fechaNac = $rm['fechaNac'];
      $correo = $rm['correo'];
      $numTelefono = $rm['numTelefono'];
      $contrasena = $rm['contrasena'];
      $domicilio = utf8_encode($rm['domicilio']);
    }

    $historial = historialPedidos($idCliente);
    $fechaPedido = array("","");
    $subTotal = 0;
  }else
  {
    header('Location: php/add-carrito.php');
  }
?>
<!DOCTYPE HTML>
<html lang="es-419">
<html>
<head>
	<meta charset="utf-8">
<title>Perfil</title>

<title>account settings - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<link href="css/perfil.css" rel='stylesheet' type='text/css' />
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


<style type="text/css">
        body{
    background: #f5f5f5;
    margin-top:20px;
}

.ui-w-80 {
    width: 80px !important;
    height: auto;
}

.btn-default {
    border-color: rgba(24,28,33,0.1);
    background: rgba(0,0,0,0);
    color: #4E5155;
}

label.btn {
    margin-bottom: 0;
}

.btn-outline-primary {
    border-color: #26B4FF;
    background: transparent;
    color: #26B4FF;
}

.btn {
    cursor: pointer;
}

.text-light {
    color: #babbbc !important;
}

.btn-facebook {
    border-color: rgba(0,0,0,0);
    background: #3B5998;
    color: #fff;
}

.btn-instagram {
    border-color: rgba(0,0,0,0);
    background: #000;
    color: #fff;
}

.card {
    background-clip: padding-box;
    box-shadow: 0 1px 4px rgba(24,28,33,0.012);
}

.row-bordered {
    overflow: hidden;
}

.account-settings-fileinput {
    position: absolute;
    visibility: hidden;
    width: 1px;
    height: 1px;
    opacity: 0;
}
.account-settings-links .list-group-item.active {
    font-weight: bold !important;
}
html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: transparent !important;
}
.account-settings-multiselect ~ .select2-container {
    width: 100% !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.material-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.dark-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.03) !important;
}
.dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4E5155 !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24,28,33,0.03) !important;
}
.img-perfi
{
  width: 140px;
	height: 140px;
	background-color: #363f3b;
	box-shadow: 0 0 0px 5px #beccc5;
	margin-top: 2em;
  border-radius: 24em;
  margin-left:20em;
}



    </style>


<!----details-product-slider--->
</head>
<body>
   <div class="single">
	<div class="container">
		<div class="header-top">
      		<div class="logo">
           <a href="index.php"><img src="images/logo-tienda.png" alt="" style="width:6em; margin-right:2em;"/></a><br><br>
			    </div>
		   <div class="header_right">
			 <ul class="social">
				<li><a href=""> <i class="fb"> </i> </a></li>
				<li><a href=""><i class="tw"> </i> </a></li>
				<li><a href=""><i class="utube"> </i> </a></li>
				<li><a href=""><i class="instagram"> </i> </a></li>
			 </ul>
		    <div class="lang_list">
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
    <div class="main" style="background: white;">
	   <div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-3 mb-4" style="font-size:1.6em;"><br>
      Mi Perfil
    </h4>

    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Redes Sociales</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Pedidos</a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">
              <div class="card-body media align-items-center">
                <img src="<?php echo $foto;?>" class="img-perfi">
                <div class="media-body ml-4">
                </div>
              </div>
              <hr class="border-light m-0">

              <div class="card-body">
                <div class="form-group">
                  <label class="form-label">Nombre</label>
                  <input type="text" class="form-control" value="<?php echo $nombre;?>">
                </div>
                <div class="form-group">
                  <label class="form-label">Correo Electronico</label>
                  <input type="text" class="form-control mb-1" value="<?php echo $correo;?>">
                </div>
                <div class="form-group">
                  <label class="form-label">Número de Celular</label>
                  <input type="text" class="form-control" value="<?php echo $numTelefono;?>">
                </div>
                <div class="form-group">
                  <label class="form-label">Domicilio</label>
                  <input type="text" class="form-control" value="<?php echo $domicilio;?>">
                </div>
                <a href="php/logout.php" class="btn btn-primary">Cerrar Sesión</a>
              </div>

            </div>
            <div class="tab-pane fade" id="account-change-password">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">Contraseña Actual</label>
                  <input type="password" class="form-control">
                </div>

                <div class="form-group">
                  <label class="form-label">Nueva COntraseña</label>
                  <input type="password" class="form-control">
                </div>

                <div class="form-group">
                  <label class="form-label">Repetir Nueva Contraseña</label>
                  <input type="password" class="form-control">
                </div>

              </div>
            </div>
            <div class="tab-pane fade" id="account-info">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">Bio</label>
                  <textarea class="form-control" rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nunc arcu, dignissim sit amet sollicitudin iaculis, vehicula id urna. Sed luctus urna nunc. Donec fermentum, magna sit amet rutrum pretium, turpis dolor molestie diam, ut lacinia diam risus eleifend sapien. Curabitur ac nibh nulla. Maecenas nec augue placerat, viverra tellus non, pulvinar risus.</textarea>
                </div>
                <div class="form-group">
                  <label class="form-label">Cumpleaños</label>
                  <input type="text" class="form-control" value="Mayo 3, 1995">
                </div>
                <div class="form-group">
                  <label class="form-label">País</label>
                  <select class="custom-select">
                    <option>USA</option>
                    <option selected="">México</option>
                    <option>UK</option>
                    <option>Germany</option>
                    <option>France</option>
                  </select>
                </div>


              </div>
              <hr class="border-light m-0">
              <div class="card-body pb-2">

                <h6 class="mb-4">Contacto</h6>
                <div class="form-group">
                  <label class="form-label">teléfono</label>
                  <input type="text" class="form-control" value="+52 (123) 456 7891">
                </div>
                <div class="form-group">
                  <label class="form-label">Website</label>
                  <input type="text" class="form-control" value="">
                </div>

              </div>
      
            </div>
            <div class="tab-pane fade" id="account-social-links">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">Twitter</label>
                  <input type="text" class="form-control" value="https://twitter.com/user">
                </div>
                <div class="form-group">
                  <label class="form-label">Facebook</label>
                  <input type="text" class="form-control" value="https://www.facebook.com/user">
                </div>
                <div class="form-group">
                  <label class="form-label">Google+</label>
                  <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label class="form-label">LinkedIn</label>
                  <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label class="form-label">Instagram</label>
                  <input type="text" class="form-control" value="https://www.instagram.com/user">
                </div>

              </div>
            </div>
            <div class="tab-pane fade" id="account-connections">
              <br>
              <p style="font-size:1.6em; margin-left:2em;">Historial de Pedidos</p><br><br>
              <table>
                <tr>
                  <th style="text-align:center;">Producto</th>
                  <th style="text-align:center;">Datos Generales</th>
                  <th style="text-align:center;">Costo</th>
                  <th style="text-align:center;">Estado</th>
                </tr>
                <?php while($ri = mysqli_fetch_array($historial)):
                          $estado = $ri['estado'];   
                ?>
                <tr>
                  <td class="white" style="width: 25%;"><img style="width:8em;" src="<?php echo "php/".$ri['foto'];?>" alt=""></td>
                  <td class="white" style="width: 25%;">
                    <p class="title"><?php echo utf8_encode($ri['nombre']);?></p><br>
                    <p class="quick_desc" style="color:#363434;">Pedido Realizado el <?php echo $ri['fechaPedido'];?></p>
                    <p class="quick_desc" style="color:#363434;"></p><br><br>
                    <p class="quick_desc" style="text-align:justify;color:#363434;"><?php echo utf8_encode($ri['descripcion']);?>
                  </td>
                  <td class="white" style="width: 25%; text-aling:center"><p style="color:#0e87ab">$ <?php echo $ri['PRECIO'];?> MXN</p></td>
                  <td class="white">
                    <?php if($estado == "En curso"){ $subTotal = $subTotal + $ri['PRECIO'];?>
                      <p>En Curso<br>Se Entrega el <br><br> <?php echo $ri['fechaEntrega'];?></p>
                      <form action="php/cancelar.php" method="post">
                        <input style="display:none;" type="number" name="idPedido" value="<?php echo $ri['idPedido'];?>">
                        <input style="display:none;" type="number" name="idProducto" value="<?php echo $ri['idProducto'];?>">
                        <input style="display:none;" type="number" name="cantidad" value="<?php echo $ri['cantidad'];?>"><br>
                        <input class="eliminar" type="submit" value="Cancelar Pedido">
                      </form>
                    
                    <?php }elseif ($estado == "Entregado") { $subTotal = $subTotal + $ri['PRECIO'];?>
                      <p>Entregado<br>Entregado el <br><br> <?php echo $ri['fechaEntrega'];?></p>
                      <form action="php/cancelar.php" method="post">
                        <input style="display:none;" type="number" name="idPedido" value="<?php echo $ri['idPedido'];?>">
                        <input style="display:none;" type="number" name="idProducto" value="<?php echo $ri['idProducto'];?>">
                        <input style="display:none;" type="number" name="cantidad" value="<?php echo $ri['cantidad'];?>"><br>
                        <input class="eliminar" type="submit" value="Devolver">
                      </form>
                    <?php }elseif ($estado == "Devuelto") {?>
                      <p>Producto Devuelto</p>
                    <?php }?>
                  </td>
                </tr>
                <?php endwhile;?>
              </table>
              <table>
                <tr>
                  <th></th>
                  <th></th>
                  <th style="text-align:center;">Total <br>(Sin contar Devoluciones)</th>
                </tr>
                <tr>
                  <td class="white" style="width: 33%;"></td>
                  <td class="white" style="width: 33%;"></td>
                  <td class="white" style="width: 33%; text-aling:center"><p style="color:#0e87ab">$ <?php echo $subTotal;?> MXN</p></td>
                </tr>
              </table>
              <br><br>
            </div>
            <div class="tab-pane fade" id="account-notifications">
              <div class="card-body pb-2">

                <h6 class="mb-4">Actividad</h6>

                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                  
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Enviar correo para novedades.</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Enviar correo cuando un artículo esté con descuento</span>
                  </label>
                </div>
              </div>
              <hr class="border-light m-0">
              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
    
</script>
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
<style>
.eliminar
{
  background:#620606;
	padding:6px 8px;
	cursor: pointer;
  color:#fff;
  border-style:none;
	outline: none;
	line-height: 1.5em;
	text-transform: uppercase;
	font-size: 0.8125em;
	-webkit-transition: all 0.3s ease-out;
	-moz-transition: all 0.3s ease-out;
	-ms-transition: all 0.3s ease-out;
	-o-transition: all 0.3s ease-out;
	transition: all 0.3s ease-out;
}

.eliminar:hover{
	background:#cb2027;
}
</style>