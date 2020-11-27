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
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <title>Graficas</title>

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
          <h1 class="h3 mb-2 text-gray-800">Ventas  </h1>
          <br>
          
          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-8 col-lg-7">

              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ventas Realizadas
                  <select onchange="showGraph(this.value)" name="filtro" class="bg-white py-2 collapse-inner rounded" style="border-style:none;float:right;">
                    <option value="semana" class="collapse-item" selected>Semana</option>
                    <option value="mes" class="collapse-item">Mes</option>
                    <option value="ano" class="collapse-item">Año</option>
                  </select></h6>
                </div>
                <div class="card-body">
                  <div class="chart-area" style="height:auto">
                    <canvas id="graphCanvas"></canvas>
                  </div>
                  <hr>
                  Cantidad de productos que han sido entregados a los respectivos clientes.
                </div>
              </div>

              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ingresos Generados en 2020               
                  </h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar" style="height:auto;">
                    <canvas id="graphsCanvas"></canvas>
                  </div>
                  <hr>
                  Ingresos generados en pesos mexicanos, correspondientes al año 2020.
                </div>
              </div>

            </div>

            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Información de Pedidos
                  </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="height:auto">
                  <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <hr>
                  Cantidad de productos<b>
                  <span style="color:#36b9cc;">Entregados</span>, 
                  <span style="color:#4e73df;">En curso</span> y
                  <span style="color:#c81c1c;">Devueltos por los clientes</span>.</b>
                </div>
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

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->

</body>
</html>
<script>
$(document).ready(function()
{
  showGraph("semana");
});

$.ajax({
    type: 'POST',
    url:'php/estado.php',
    success:function(data)
    {
      console.log(data);
      cantidad = [];
      estado = [];

      for(var i in data)
      {
        cantidad.push(data[i].cantidad);
        estado.push(data[i].estado);
      }

      var ctx = document.getElementById("myPieChart");
      var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: estado,
          datasets: [{
            data: cantidad,
            backgroundColor: ['#c81c1c','#4e73df','#36b9cc'],
            hoverBackgroundColor: ['#8c0404','#2e59d9', '#2c9faf'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          }],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
          },
          legend: {
            display: false
          },
          cutoutPercentage: 80,
        },
      });
    }
});

$.ajax({
    type: 'POST',
    url:'php/ingresos.php',
    success:function(data)
    {
      var cantidad = [];
      var num = [];
      var datosBD = [0,0,0,0,0,0,0,0,0,0,0,0];
      var datosInf = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];

      for(var i in data)
      {
        cantidad.push(data[i].TOTALES);
        num.push(data[i].fechaEntrega.substring(5, 7));
      }

      for(let i = 1; i <= 12; i++)
      {
        for(let index = 0; index < num.length; index++) 
        {
          if(i == num[index])
          {
            datosBD[i-1] = parseInt(cantidad[index]) + datosBD[i-1];
          }
        }
      }

      var chartdata = 
      {
        labels: datosInf,
        datasets: [
                    {
                      label: 'Ingresos (MXN)',
                      lineTension: 0.3,
                      backgroundColor: '#36b9cc',
                      borderColor: "rgba(78, 115, 223, 1)",
                      hoverBackgroundColor: '#2c9faf',
                      hoverBorderColor: '#666666',
                      data: datosBD
                    }
                  ]
      };

        var graphTarget = $("#graphsCanvas");

        var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
    }
});

function showGraph(filtro)
{
  $.ajax({
    type: 'POST',
    url:'php/historial.php',
    data:'filtro='+filtro,
    success:function(data)
    {
      var cantidad = [];
      var num = [];
      var datosBD = [0,0,0,0,0,0,0,0,0,0,0,0];
      var datosInf = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
      var fecha = new Date();

      if(filtro == "mes")
      {
        for(var i in data)
        {
          cantidad.push(data[i].vendidos);
          num.push(data[i].fechaEntrega.substring(5,7));
        }

        for(let i = 1; i <= 12; i++)
        {
          for(let index = 0; index < num.length; index++) 
          {
            if(i == num[index])
            {
              datosBD[i-1] = parseInt(cantidad[index]) + datosBD[i-1];
            }
          }
        }
        
        
      }else if(filtro == "semana")
      {
        datosBD = [0,0,0,0,0,0,0];
        var dia = fecha.getDate();
        var days = [1,2,3,4,5,6,0];
        var restar = 0;
        var sumar = 0;
        var fechaDada = fecha.getDay();
        var contador = 0;
        var indice = 0;

        for(var j = 0; j <= 6; j++)
        {
          if(days[j] != fechaDada && days[j] < fechaDada)
          {
            restar++;
          }else if(days[j] != fechaDada && days[j] > fechaDada)
          {
            sumar++;
          }
        }

        var lunes = (dia - restar) + 1;
        var domingo = (dia + sumar) + 1;
        datosInf = ["Lunes "+lunes,"Martes "+(lunes+1),"Miercoles "+(lunes+2),"Jueves "+(lunes+3),"Viernes "+(lunes+4),"Sabado "+(lunes+5),"Domingo "+domingo];

        for(var i in data)
        {
          if(data[i].fechaEntrega.substring(5,7) == (fecha.getMonth()+1).toString())
          {
            for(let m = lunes; m <= domingo; m++)
            {
              if(parseInt(data[i].fechaEntrega.substring(8,10)) == m)
              {
                datosBD[indice] = data[i].vendidos;
                contador++;
              }
              console.log(m);
              indice++;
            }

            indice = 0;
          }
        }

        for (let index = 0; index < datosBD.length; index++) {
          console.log(index + ": " + datosBD[index]);
          
        }
      }else if(filtro == "ano")
      {
        datosInf = ["2020","2021","2022","2023","2024"];
        datosBD = [0,0,0,0,0,0,0];
        var suma = 0;

        for(var i in data)
        {
          if(data[i].fechaEntrega.substring(0,4) == "2020")
          {
            suma = suma + parseInt(data[i].vendidos);
            datosBD[0] = suma;
          }
        }
      }

      chartdata = 
      {
       labels: datosInf,
       datasets: [
                  {
                    label: 'Productos Vendidos',
                    lineTension: 1,
                    backgroundColor: '#36b9cc',
                    borderColor: "rgba(78, 115, 223, 1)",
                    hoverBackgroundColor: '#2c9faf',
                    hoverBorderColor: '#666666',
                    data: datosBD
                  }
                ]
      };

      graphTarget = $("#graphCanvas");
      barGraph = new Chart(graphTarget, {
                      type: 'bar',
                      data: chartdata
                    });   
    }
  });
}

/**----------------- */

Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

</script>
