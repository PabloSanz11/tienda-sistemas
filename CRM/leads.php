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

  <title>SB Admin 2 - leads</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
          <h1 class="h3 mb-4 text-gray-800">Leads</h1>
          <div class="card shadow mb-4">
            <div class = "card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tratamiento de leads</h6>
            </div>
            <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#addModal">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Agregar nuevo lead</span>
              </a>
            </div>

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Foto</th>
                      <th>Lead/Cliente</th>
                      <th>Ultima conexión</th>
                      <th>No. Cuenta</th>
                      <th>Teléfono</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Foto</th>
                      <th>Lead/Cliente</th>
                      <th>Ultima conexión</th>
                      <th>No. Cuenta</th>
                      <th>Teléfono</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                      include('../php/consultasLeads.php');
                      $Query = get_leads_data();
                       // $Query = obtenerClientes();
                        if($Query){
                          for($a = 0; $a < mysqli_num_rows($Query); $a++){
                            $fila = mysqli_fetch_row($Query);
                            
                            echo '<tr>'; 
                            echo "<td><img width=80 height=100 src=../php/$fila[0]></td>";   
                            echo "<td class='nombre-lead'>".utf8_encode($fila[1])."</td>";   
                            echo "<td>$fila[2]</td>";  
                            echo "<td class='id-lead'>$fila[3]</td>";   
                            echo "<td>$fila[4]</td>";
                    ?>
                            <td>
                              <div>
                                <a href="#" data-toggle="modal" data-target="#mailModal" class="link-mail">
                                  <i class="fas fa-envelope" data-toggle="tooltip" data-placement="top" title="Enviar correo"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#deleteModal" class="link-del">
                                  <i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Borrar lead" style="margin:10px;"></i></a>
                                </div>
                              </td>
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
          <h5 class="modal-title" id="exampleModalLabel"><p class="mail-lead"></p></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label for="destinatario">Para:</label>
              <input type='mail' class='form-control' name='destinatario' id='destinatario'>
          </div>
          <div class="form-group">
                <label for="asunto">Asunto:</label>
                <input type="text" class="form-control" name="asunto" id="asunto">
          </div>
          <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea name="mensaje" class="form-control" id="mensaje" rows="11"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <button class="btn btn-primary" type="submit" id="mailButton">Enviar</a>
        </div>
      </div>
    </div>
  </div>


    <!--Eliminar lead modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar lead</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><p class="del-user"></p></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <button class="btn btn-primary" type="submit" id="delete">Eliminar</a>
        </div>
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

  <!-- Agregar nuevo lead modal-->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingresa los datos del nuevo lead</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form id="form" action="php/consultasLeads.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nombreLead">Nombre</label>
                  <input type="text" class="form-control" name="nombreLead" id="nombreLead" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="mailLead">E-mail</label>
                  <input type="email" class="form-control" name="mailLead" id="mailLead" required>
                </div>
              </div>
              <div class="form-group">
                <label for="domicilioLead">Domicilio</label>
                <input type="text" class="form-control" name="domicilioLead" id="domicilioLead" required>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nacLead">Fecha de nac.:</label>
                  <input type="date" class="form-control" name="nacLead" id="nacLead" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="telLead">Teléfono</label>
                  <input type="tel" class="form-control" name="telLead" id="telLead" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="imgLead">Foto</label>
                  <input type="file" class="form-control-file" name="imgLead" id="imgLead">
                </div>
                <div class="form-group col-md-6">
                  <label for="passLead">Contraseña</label>
                  <input type="password" class="form-control" name="passLead" id="passLead" required>
                </div>
                <input type="hidden" name="vals" value="add" id="add">
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input class="btn btn-primary" type="submit" value="Registrar">
            </div>
          </div>
        </form>
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

      //API para enviar correo a lead
      $(".link-mail").click(function(){
        var nombre = $(this).parents("tr").find(".nombre-lead").text();
        $(".mail-lead").html("Enviar correo a: "+ nombre);
        var id = $(this).parents("tr").find(".id-lead").text();


       $.get('../php/consultasLeads.php', { val:"mail", idLead:id})
            .done(function(mail){
              $("#destinatario").val(mail);
            });

        $('#mailButton').click(function(){
          var destinatario = $("#destinatario").val();
          var asunto = $("#asunto").val();
          var mensaje = $("#mensaje").val();

          $.ajax({
            type : "POST",
            url: '../php/consultasLeads.php',
            data : {
              "vals": "send",
              "id": id,
              "destinatario" : destinatario,
              "asunto" : asunto,
              "mensaje" : mensaje
            },
            dataType : "html",
            success: function(res){
                alert("El mensaje se ha enviado con éxito");
                window.location.href = "leads.php";
            },
            error: function(){
              alert("Ha ocurrido un error en el proceso");
            }
          });
        });
      });

      //API para eliminar lead
      $(".link-del").click(function(){
        var nombre = $(this).parents("tr").find(".nombre-lead").text();
        $('.del-user').html("Estás por eliminar a: "+ nombre + ", ¿estás seguro(a)?");  //+ a+ ", ¿estás seguro(a)?");
        value = "delete";
        $("#delete").click(function(){
          $.ajax({
            type: "POST",
            url: '../php/consultasLeads.php',
            data: {
              "vals": value,
              "name": nombre
            },
            dataType: "html",
            success: function(res){
              if(res == "valid"){
                alert("Se ha eliminado con éxito");
                window.location.href = "leads.php";
              } else{
                alert("Ha ocurrido un error, no se ha eliminado");
              }
            },
            error: function(){
              alert("Ha ocurrido un error en el proceso");
            }
          });
        });
      });

      //API para insertar nuevo lead
      $("#form").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
          url: "../php/consultasLeads.php",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          success: function(data){
            if(data == 'valid'){
              alert("Se ha agregado un nuevo lead con éxito.");
              window.location.href = "leads.php";
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
    
  </script>


</body>

</html>
