<!DOCTYPE html>
<html lang="en">

<head>
<?php
	session_start();

	if(isset($_SESSION['validacion']))
    {
    $idEmpleado = $_SESSION['idEmpleado'];
    $nombreEmpleado = utf8_encode($_SESSION['nombre']);
    $correo = utf8_encode($_SESSION['correo']);
    $tiempo = $_SESSION['tiempo'];
    $fotoperfil = $_SESSION['fotoperfil'];

	}else
	{
    header('Location: login.html');
  }
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tratos</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
        <i><img src="../images/logo-tienda.png" alt="" style="width:2em"/></i>
        </div>
        <div class="sidebar-brand-text mx-3">Vasa <sup>CRM</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Administración
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Componentes</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Secciones:</h6>
            <a class="collapse-item" href="leads.php">Leads</a>
            <a class="collapse-item" href="empleados.php">Empleados</a>
            <a class="collapse-item" href="tratos.php">Tratos</a>
            <a class="collapse-item" href="productos.php">Productos</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-receipt"></i>
          <span>Pedidos</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tipos:</h6>
            <a class="collapse-item" href="pedidos_pendientes.php">Pendientes</a>
            <a class="collapse-item" href="pedidos_devolucion.php">Devoluciones</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Análisis
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="tareas.php">
          <i class="fas fa-tasks"></i>
          <span>Progreso Actividades</span>
        </a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="graficas.php"> <!--nav-link href="charts.html"-->
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Gráficas</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTables" aria-expanded="true" aria-controls="collapsePages"> <!--<a class="nav-link" href="tables.html">-->
          <i class="fas fa-fw fa-table"></i>
          <span>Tablas</span>
        </a>
        <div id="collapseTables" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Elementos:</h6>
            <a href="tabla_clientes.php" class="collapse-item">Leads</a>
            <a href="tabla_empleados.php" class="collapse-item">Empleados</a>
            <a href="tabla_proveedores.php" class="collapse-item">Proveedores</a>
            <a href="tabla_pedidos.php" class="collapse-item">Pedidos</a>
            <a href="tabla_productos.php" class="collapse-item">Productos</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->


            <!-- Nav Item - Messages -->
            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nombreEmpleado; ?></span>
                <img class='img-profile rounded-circle' src="<?php echo "php/" . $fotoperfil;?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="perfil-empleado.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesión
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Tratos y proveedores</h1>
          <div class="card shadow mb-4">
            <div class = "card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Gestión de proveedores y tratos</h6>
            </div>
            <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#addModal" id="add-provider">
                    <span class="icon text-white-50">
                      <i class="fas fa-upload"></i>
                    </span>
                    <span class="text">Agregar un nuevo proveedor</span>
            </button>
            </div>

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Foto</th>
                      <th>Proveedor</th>
                      <th>clave</th>
                      <th>Teléfono</th>
                      <th>Domicilio</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                  <tr>
                      <th>Foto</th>
                      <th>Proveedor</th>
                      <th>clave</th>
                      <th>Teléfono</th>
                      <th>Domicilio</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                      include('../php/conexion.php');
                      $sql = "SELECT foto, nombre, idProveedor, numTelefono, domicilio FROM proveedores;";
                      $Query = consulta($sql);
                        if($Query){
                          for($a = 0; $a < mysqli_num_rows($Query); $a++){
                            $fila = mysqli_fetch_row($Query);
                            echo '<tr>'; 
                            echo "<td><img width=80 height=100 src=php/$fila[0]></td>";   
                            echo "<td class='nombre-proveedor'>$fila[1]</td>";  
                            echo "<td class='clave-proveedor'>$fila[2]</td>";  
                            echo "<td>$fila[3]</td>";  
                            echo "<td>$fila[4]</td>";   
                    ?>
                            <td><div><a href="#" data-toggle="modal" data-target="#editModal" class="link-edit">
                              <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Editar"></i>
                            </a>
                            <a href="#" data-toggle="modal" data-target="#deleteModal" class="link-delete">
                              <i class="fas fa-trash-alt" style="margin:10px;" data-toggle="tooltip" data-placement="top" title="Eliminar"></i>
                            </a><a href="#" data-toggle="modal" data-target="#mailModal" class="link-mail">
                              <i class="fas fa-envelope" data-toggle="tooltip" data-placement="top" title="Contactar">
                            </i>
                          </div></td>
                    <?php
                            echo '</tr>';
                          }
                        print("</table>"); 
                        echo '</table><br>';
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Mail Modal-->
  <div class="modal fade" id="mailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><p class="mail-prov"></p></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form id="form-mail" action="php/consultasProveedores.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
                <label for="destinatario">Para:</label>
                <input type='mail' class='form-control' name='destinatario' id='destinatario' required>
            </div>
            <div class="form-group">
                  <label for="asunto">Asunto:</label>
                  <input type="text" class="form-control" name="asunto" id="asunto" required>
            </div>
            <div class="form-group">
                  <label for="mensaje">Mensaje:</label>
                  <textarea name="mensaje" class="form-control" id="mensaje" rows="11" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <input type="hidden" name="vals" value="send" id="send">  
            <input class="btn btn-primary" type="submit" id="mailButton" value="Enviar">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--Eliminar empleado modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar proveedor</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><p class="del-prov"></p></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <form id="form-delete" action="php/consultasProveedores.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="idProveedor" class="idProveedor">  
            <input type="hidden" name="vals" value="delete" id="delete">  
            <input class="btn btn-primary" type="submit" name="submit" id="delete" value="Eliminar">
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Editar proveedor modal-->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><p class="nom-proveedor"></p></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form id="form-edit" action="php/consultasProveedores.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
                  <label for="nombreProveedor">Nombre</label>
                  <input type="text" class="form-control" name="nombreProveedor" id="nombreProveedor">
            </div>
            <div class="form-group">
                  <label for="telefonoProveedor">Teléfono</label>
                  <input type="tel" class="form-control" name="telefonoProveedor" id="telefonoProveedor">
            </div>
            <div class="form-group">
                  <label for="correoProveedor">Correo</label>
                  <input type="mail" class="form-control" name="correoProveedor" id="correoProveedor">
            </div>
            <div class="form-group">
                  <label for="domicilioProveedor">Domicilio</label>
                  <input type="text" class="form-control" name="domicilioProveedor" id="domicilioProveedor">
            </div>
            <div class="form-group">
                  <label for="fotoProveedor">Foto</label>
                  <input type="file" class="form-control-file" name="fotoProveedor" id="fotoProveedor">
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="idProveedor" class="idProveedor">  
            <input type="hidden" name="vals" value="edit" id="edit">  
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" type="submit" id="edit">Editar</a>
          </div>
        </form>
      </div>
    </div>
  </div>

    <!-- Agregar proveedor Modal-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo proveedor</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form id="form-add" action="php/consultasProveedores.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="nombreEmpresa">Empresa</label>
              <input type="text" class="form-control" name="nombreEmpresa" id="nombreEmpresa">
            </div>
            <div class="form-group">
              <label for="nombreDomicilio">Domicilio</label>
              <input type="text" class="form-control" name="nombreDomicilio" id="nombreDomicilio">
            </div>
            <div class="form-group">
              <label for="nombreCorreo">Correo</label>
              <input type="mail" class="form-control" name="nombreCorreo" id="nombreCorreo">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="fechaAlta">Fecha alta</label>
                  <input type="date" class="form-control" name="fechaAlta" id="fechaAlta">
                </div>
                <div class="form-group col-md-6">
                  <label for="numTelefono">Telefono</label>
                  <input type="tel" class="form-control" name="numTelefono" id="numTelefono">
                </div>
            </div>
            <div class="form-group">
              <label for="inputLogo">Logo</label>
              <input type="file" class="form-control" name="inputLogo" id="inputLogo">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input type="submit" value="Registrar" class="btn btn-primary" id="agregar-proveedor">
          </div>
          <input type="hidden" name="vals" value="add" id="add">
        </form>
      </div>
    </div>
  </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cerrar sesión</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">¿Estás seguro(a) de salir?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="php/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script>
    $(document).ready(function(e){
      $('[data-toggle="tooltip"]').tooltip();

      //API para insertar nuevo proveedor
      $("#form-add").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
          url: "../php/consultasProveedores.php",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          success: function(data){
            if(data == 'valid'){
              alert("Se ha agregado un nuevo proveedor con éxito.");
              window.location.href = "tratos.php";
            }else{
              alert("Ha ocurrido un error: " + data);
            }
          },
          error: function(){
            alert("Ha ocurrido un error");
          }
        });
      }));

      //API para editar un proveedor
      $(".link-edit").click(function(){
        var nombre = $(this).parents("tr").find(".nombre-proveedor").text();
        var idProveedor = $(this).parents("tr").find(".clave-proveedor").text();
        $(".idProveedor").val(idProveedor);
        $(".nom-proveedor").html("Editar a: "+ nombre);

        $("#form-edit").on('submit',(function(e) {
          e.preventDefault();

          $.ajax({
            url: "../php/consultasProveedores.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
              if(data == 'valid'){
                alert("Se ha editado al proveedor con éxito.");
                window.location.href = "tratos.php";
              }else{
                alert("Ha ocurrido un error: " + data);
              }
            },
            error: function(){
              alert("Ha ocurrido un error");
            }
        });
      }));
      });

      
      //API para eliminar un proveedor
      $(".link-delete").click(function(){
        var nombre = $(this).parents("tr").find(".nombre-proveedor").text();
        var idProveedor = $(this).parents("tr").find(".clave-proveedor").text();
        $(".idProveedor").val(idProveedor);
        $(".del-prov").html("Estás por eliminar a: "+ nombre + ", ¿estás seguro (a)?");

        $("#form-delete").on('submit',(function(e) {
          e.preventDefault();

          $.ajax({
            url: "../php/consultasProveedores.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
              if(data == 'valid'){
                alert("Se ha eliminado un proveedor con éxito");
                window.location.href = "tratos.php";
              }else{
                alert("Ha ocurrido un error: " + data);
              }
            },
            error: function(){
              alert("Ha ocurrido un errorcillo");
            }
        });
      }));
    });
      

      //API para contactar a un proveedor
      $(".link-mail").click(function(){
        var nombre = $(this).parents("tr").find(".nombre-proveedor").text();
        $(".mail-prov").html("Enviar correo a: "+ nombre);
        var idProveedor = $(this).parents("tr").find(".clave-proveedor").text();


        $.get('../php/consultasProveedores.php', { val:"mail", idProveedor: idProveedor})
            .done(function(mail){
              $("#destinatario").val(mail);
            });
        
        $("#form-mail").on('submit',(function(e) {
          e.preventDefault();

          $.ajax({
            url: "../php/consultasProveedores.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
              if(data=="valid"){
                alert("Se ha mandado el correo con éxito.");
              window.location.href = "tratos.php";
              }else{
                alert("Con éxito");
              }
            },
            error: function(){
              alert("Ha ocurrido un errorcillo");
            }
        });
    }));     
  });
});


    
  </script>

</body>

</html>
