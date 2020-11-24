<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Productos</title>

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
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
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
            <a class="collapse-item" href="pedidos_pendientes.html">Pendientes</a>
            <a class="collapse-item" href="pedidos_devolucion.html">Devoluciones</a>
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
        <a class="nav-link" href="tareas.html">
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
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

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
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Productos</h1>
          <div class="card shadow mb-4">
            <div class = "card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Gestión de productos</h6>
            </div>
            <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#addModal" id="add-provider">
                    <span class="icon text-white-50">
                      <i class="fas fa-upload"></i>
                    </span>
                    <span class="text">Agregar nuevo producto</span>
              </a>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar reporte</a>
            </div>

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Foto</th>
                      <th>Producto</th>
                      <th>Categoría</th>
                      <th>Clave</th>
                      <th>En stock</th>
                      <th>Precio</th>
                      <th>Proveedor</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Foto</th>
                      <th>Producto</th>
                      <th>Categoría</th>
                      <th>Clave</th>
                      <th>En stock</th>
                      <th>Precio</th>
                      <th>Proveedor</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                      include('../php/conexion.php');
                      $sql = "SELECT productos.foto, productos.nombre, productos.categoria, productos.idProducto , productos.cantidad, productos.precio, proveedores.nombre AS Proveedor
                       FROM productos
                        INNER JOIN proveedores ON productos.idProveedor = proveedores.idProveedor;";
                      $Query = consulta($sql);
                       // $Query = obtenerClientes();
                        if($Query){
                          for($a = 0; $a < mysqli_num_rows($Query); $a++){
                            $fila = mysqli_fetch_row($Query);
                            echo '<tr>'; 
                            echo "<td><img width=80 height=100 src=php/$fila[0]></td>";   
                            echo "<td class='nombre-producto'>$fila[1]</td>";   
                            echo "<td>$fila[2]</td>";  
                            echo "<td class='clave-producto'>$fila[3]</td>";   
                            echo "<td>$fila[4]</td>";
                            echo "<td>$fila[5]</td>";
                            echo "<td>$fila[6]</td>";
                    ?>
                            <td>
                              <div>
                                <a href="#" data-toggle="modal" data-target="#editModal" class="link-edit">
                                  <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Editar producto"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#deleteModal" class="link-delete">
                                  <i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Eliminar producto" style="margin:10px;"></i>
                                </a>
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

  <!--Eliminar producto modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar producto</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><p class="del-producto"></p></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <form id="form-delete" action="php/consultasProductos.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="idProducto" class="idProducto">  
            <input type="hidden" name="vals" value="delete" id="delete">  
            <input class="btn btn-primary" type="submit" name="submit" id="delete" value="Eliminar">
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Editar producto modal-->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><p class="nom-producto"></p></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form id="form-edit" action="php/consultasProductos.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
                  <label for="nombreProducto">Nombre de producto</label>
                  <input type="text" class="form-control" name="nombreProducto" id="nombreProducto">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="marcaProducto">Marca</label>
                  <input type="text" class="form-control" name="marcaProducto" id="marcaProducto">
                </div>
                <div class="form-group col-md-6">
                  <label for="categoriaProducto">Categoria</label>
                  <select class="form-control" name="categoriaProducto" id="exampleFormControlSelect1">
                    <option value="Electrofonos">Electrofonos</option>
                    <option value="Viento">Viento</option>
                    <option value="Cuerdas">Cuerdas</option>
                    <option value="Percusion">Percusion</option>
                    <option value="Idiofonos">Idiofonos</option>
                  </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="modeloProducto">Modelo</label>
                  <input type="text" class="form-control" name="modeloProducto" id="modeloProducto">
                </div>
                <div class="form-group col-md-6">
                  <label for="precioProducto">Precio</label>
                  <input type="text" class="form-control" name="precioProducto" id="precioProducto" placeholder="5000.00">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="cantProducto">Cantidad</label>
                  <input type="number" class="form-control" name="cantProducto" id="cantProducto">
                </div>
                <div class="form-group col-md-6">
                  <label for="proovedorProducto">Proveedor</label>
                  
                  <select class="form-control" name="proovedorProducto" id="proovedorProducto">
                  <?php
                     $sql = "SELECT nombre FROM proveedores";
                     $Query = consulta($sql);
                     if($Query){
                       for($a = 0; $a < mysqli_num_rows($Query); $a++){
                         $fila = mysqli_fetch_row($Query);
                        echo "<option value='$fila[0]'>$fila[0]</option>";
                       }
                     }
                  ?>
                  </select>
                  
                </div>
            </div>
            <div class="form-group">
              <label for="descrProducto">Descripción:</label>
              <textarea name="descrProducto" class="form-control" id="descrProducto" rows="11"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="idProducto" class="idProducto">  
            <input type="hidden" name="vals" value="edit" id="edit">  
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <input class="btn btn-primary" type="submit" id="edit" value="Editar">
          </div>
        </form>
      </div>
    </div>
  </div>  

  <!-- Agregar producto Modal-->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar un producto nuevo</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form id="form-add" action="php/consultasProductos.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
                  <label for="nombreProducto">Nombre de producto</label>
                  <input type="text" class="form-control" name="nombreProducto" id="nombreProducto" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="marcaProducto">Marca</label>
                  <input type="text" class="form-control" name="marcaProducto" id="marcaProducto" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="categoriaProducto">Categoria</label>
                  <select class="form-control" name="categoriaProducto" id="exampleFormControlSelect1" required>
                    <option value="Electrofonos">Electrofonos</option>
                    <option value="Viento">Viento</option>
                    <option value="Cuerdas">Cuerdas</option>
                    <option value="Percusion">Percusion</option>
                    <option value="Idiofonos">Idiofonos</option>
                  </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="modeloProducto">Modelo</label>
                  <input type="text" class="form-control" name="modeloProducto" id="modeloProducto" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="precioProducto">Precio</label>
                  <input type="text" class="form-control" name="precioProducto" id="precioProducto" placeholder="5000.00" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="cantProducto">Cantidad</label>
                  <input type="number" class="form-control" name="cantProducto" id="cantProducto" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="proovedorProducto">Proveedor</label>
                  <select class="form-control" name="proovedorProducto" id="proovedorProducto" required>
                  <?php
                     $sql = "SELECT nombre FROM proveedores";
                     $Query = consulta($sql);
                     if($Query){
                       for($a = 0; $a < mysqli_num_rows($Query); $a++){
                         $fila = mysqli_fetch_row($Query);
                        echo "<option value='$fila[0]'>$fila[0]</option>";
                       }
                     }
                  ?>
                  </select>
                </div>
            </div>
            <div class="form-group">
              <label for="descrProducto">Descripción:</label>
              <textarea name="descrProducto" class="form-control" id="descrProducto" rows="8" required></textarea>
            </div>
            <div class="form-group">
                  <label for="fotoProducto">Foto</label>
                  <input type="file" class="form-control-file" name="fotoProducto" id="fotoProducto" required>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="vals" value="add" id="add">  
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <input class="btn btn-primary" type="submit" id="add-button" value="Agregar">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
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

      //API para eliminar un producto
      $(".link-delete").click(function(){
        var nombre = $(this).parents("tr").find(".nombre-producto").text();
        $(".del-producto").html("Estás por eliminar: "+ nombre + ", ¿estás seguro (a)?");
        var idProducto = $(this).parents("tr").find(".clave-producto").text();
        $(".idProducto").val(idProducto);

        $("#form-delete").on('submit',(function(e) {
          e.preventDefault();

          $.ajax({
            url: "../php/consultasProductos.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
              if(data == 'valid'){
                alert("Se ha eliminado el producto");
                window.location.href = "productos.php";
              }else{
                alert(data);
              }
            },
            error: function(){
              alert("Ha ocurrido un errorcillo");
            }
        });
      }));
    });

      //API para agregar un nuevo producto
      $("#form-add").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
          url: "../php/consultasProductos.php",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          success: function(data){
            alert(data);
            /*
            if(data == 'valid'){
              alert("Se ha agregado un nuevo producto con éxito.");
              window.location.href = "productos.php";
            }else{
              alert("Ha ocurrido un error: " + data);
            }*/
          },
          error: function(){
            alert("Ha ocurrido un errorcillo");
          }
        });
      }));


      //API para editar un producto
      $(".link-edit").click(function(){
        var nombre = $(this).parents("tr").find(".nombre-producto").text();
        var idProducto = $(this).parents("tr").find(".clave-producto").text();
        $(".idProducto").val(idProducto);
        $(".nom-producto").html("Editar: "+ nombre);

        $("#form-edit").on('submit',(function(e) {
          e.preventDefault();

          $.ajax({
            url: "../php/consultasProductos.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
              if(data == 'valid'){
                alert("Se ha editado el producto con éxito.");
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
    });

  </script>
</body>

</html>
