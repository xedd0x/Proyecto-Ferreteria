<?php


session_start();

if (!isset($_SESSION['Usuario'])) {

    echo '<script> window.location="login.php"; </script>';
}
if ($_SESSION['descaut'] != 'empleado') {

    echo '<script> window.location="login.php"; </script>';
}



$nombreusu = $_SESSION["nomemp"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ferretería EDD</title>

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
        <div class="sidebar-brand-text mx-3">Ferretería <sup>ED</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">Herramientas</div>


      <?php
      if($_SESSION['rol']=='Administrador' ){
      ?>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Gestiones</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="gestion-usuarios.php">Gestión de usuarios</a>
            <a class="collapse-item" href="gestion-empleados.php">Gestión de empleados</a>
            <a class="collapse-item" href="gestion-productos.php">Gestión de productos</a>
            <a class="collapse-item" href="gestion-inventario.php">Gestión de inventario</a>
            <a class="collapse-item" href="gestion-proveedores.php">Gestión de proveedores</a>
            <a class="collapse-item" href="gestion-informacion.php">Gestión información</a>
          </div>
        </div>
      </li>
      <?php
      }
      ?>



      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilidades</span>
        </a>
        <div id="collapseUtilities" class="collapse " aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item  " href="catalogo.php">Catálogo de productos</a>
            <a class="collapse-item" href="cotizacion-venta.php">Cotizaciones y ventas</a>
            <a class="collapse-item" href="cotizacion-espera.php">Cotizaciones en espera</a>
            <a class="collapse-item " href="fletes.php">Fletes y envíos</a>

          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">Información</div>


      <?php
      if($_SESSION['rol']=='Administrador' ){
      ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Reportes</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="reporte-ventas.php">Reportes de ventas</a>            <a class="collapse-item " href="reporte-ventas-online.php">Reportes compra en linea</a>

            <a class="collapse-item" href="reporte-cotizaciones.php">Reportes de Cotizaciones</a>
            <a class="collapse-item" href="reporte-envios.php">Reportes de envíos</a>
                          <a class="collapse-item " href="reporte-productos-bajos.php">Reportes poco inventario </a>

            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Otros reportes</h6>
            <a class="collapse-item" href="reporte-usuarios.php">Reportes de usuarios</a>
            <a class="collapse-item " href="bitacora.php">Bitácora</a>
          </div>
        </div>
      </li>
      <?php
      }
      ?>



      <!-- Nav Item - Charts -->
      <li class="nav-item active">
        <a class="nav-link" href="charts.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Graficas</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="informacion.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Acerca nosotros</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block" />

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
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>




            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">



                <!-- muestra el nombre de usuario-->
                <?php


                ?>
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nombreusu ?></span>
                <?php
                ?>







                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="perfil.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>
          </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Graficos</h1>
                    </div>



                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Productos en inventario por categoría</h6>
                                </div>
                                <div class="card-body"></div>
                                <div class="chart-area ">
                                    <div id="donutchart" style="width: 1000px; height: 320px; "></div>
                                </div>

                            </div>
                        </div>

                        <!-- Area Chart -->
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Envíos </h6>
                                </div>
                                <div class="card-body"></div>
                                <div class="chart-area ">
                                    <div id="top_x_div" style="width: 1000px; height: 320px;"></div>
                                </div>

                            </div>
                        </div>


                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Cotizaciones </h6>
                                </div>
                                <div class="card-body"></div>
                                <div class="chart-area ">
                                    <div id="piechart" style="width: 1000px; height: 320px;"></div>
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
                            <span>Copyright &copy; Josue Vargas 2023</span>
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
                        <h5 class="modal-title" id="exampleModalLabel">¿Listo para irse?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Seleccione cerrar sesión si desea salir.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">
                            Cancelar
                        </button>
                        <a class="btn btn-primary" href="login.php">Cerrar sesión</a>
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
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([








                    <?php
                    $plomeria = 0;
                    $jardineria = 0;
                    $electricidad = 0;
                    $construccion = 0;
                    $herramientas = 0;
                    $maquinaria = 0;
                    ##incluimos la conexion con la bd desde la clase conexion
                    include 'conexion/conexion.php';
                    #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
                    $consulta20 = "select count(*) from inventario where categoria = 'plomeria'";
                    if ($result20 = $conn->query($consulta20)) {
                        while ($row = $result20->fetch_assoc()) {
                            $plomeria = $row['count(*)'];
                        }
                    }
                    $consulta21 = "select count(*) from inventario where categoria = 'jardineria'";
                    if ($result21 = $conn->query($consulta21)) {
                        while ($row = $result21->fetch_assoc()) {
                            $jardineria = $row['count(*)'];
                        }
                    }
                    $consulta22 = "select count(*) from inventario where categoria = 'electricidad'";
                    if ($result22 = $conn->query($consulta22)) {
                        while ($row = $result22->fetch_assoc()) {
                            $electricidad = $row['count(*)'];
                        }
                    }
                    $consulta23 = "select count(*) from inventario where categoria = 'construccion'";
                    if ($result23 = $conn->query($consulta23)) {
                        while ($row = $result23->fetch_assoc()) {
                            $construccion = $row['count(*)'];
                        }
                    }
                    $consulta24 = "select count(*) from inventario where categoria = 'herramientas'";
                    if ($result24 = $conn->query($consulta24)) {
                        while ($row = $result24->fetch_assoc()) {
                            $herramientas = $row['count(*)'];
                        }
                    }
                    $consulta25 = "select count(*) from inventario where categoria = 'maquinaria'";
                    if ($result25 = $conn->query($consulta25)) {
                        while ($row = $result25->fetch_assoc()) {
                            $maquinaria = $row['count(*)'];
                        }
                    }


                    ?>


                    ['Task', 'Hours per Day'],
                    ['Plomería', <?php echo $plomeria ?>],
                    ['Jardinería', <?php echo $jardineria ?>],
                    ['Electricidad', <?php echo $electricidad ?>],
                    ['Construcción', <?php echo $construccion ?>],
                    ['Heramientas', <?php echo $herramientas ?>],
                    ['Maquinaria', <?php echo $maquinaria ?>]





                ]);

                var options = {

                    pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
            }
        </script>


        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['bar']
            });
            google.charts.setOnLoadCallback(drawStuff);

            function drawStuff() {
                var data = new google.visualization.arrayToDataTable([


                    <?php
                    $completo = 0;
                    $proceso = 0;

                    ##incluimos la conexion con la bd desde la clase conexion
                    include 'conexion/conexion.php';
                    #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
                    $consulta20 = "select count(*) from envios where estado = 1";
                    if ($result20 = $conn->query($consulta20)) {
                        while ($row = $result20->fetch_assoc()) {
                            $completo = $row['count(*)'];
                        }
                    }
                    $consulta21 = "select count(*) from envios where estado = 0";
                    if ($result21 = $conn->query($consulta21)) {
                        while ($row = $result21->fetch_assoc()) {
                            $proceso = $row['count(*)'];
                        }
                    }

                    ?>['Envíos ', 'Cantidad'],
                    ["Completados", <?php echo $completo ?>],
                    ["En proceso", <?php echo $proceso ?>],

                ]);

                var options = {

                    width: 900,
                    legend: {
                        position: 'none'
                    },
                    chart: {},
                    bars: 'horizontal', // Required for Material Bar Charts.
                    axes: {
                        x: {
                            0: {
                                side: 'top',
                                label: 'Cantidad'
                            } // Top x-axis.
                        }
                    },
                    bar: {
                        groupWidth: "90%"
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                chart.draw(data, options);
            };
        </script>


        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data2 = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],

                    <?php
                    $completa = 0;
                    $procesoc = 0;

                    ##incluimos la conexion con la bd desde la clase conexion
                    include 'conexion/conexion.php';
                    #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
                    $consulta20 = "select count(*) from cotizaciones where estado = 1";
                    if ($result20 = $conn->query($consulta20)) {
                        while ($row = $result20->fetch_assoc()) {
                            $completa = $row['count(*)'];
                        }
                    }
                    $consulta21 = "select count(*) from cotizaciones where estado = 0";
                    if ($result21 = $conn->query($consulta21)) {
                        while ($row = $result21->fetch_assoc()) {
                            $procesoc = $row['count(*)'];
                        }
                    }

                    ?>

                    ['Completas', <?php echo $completa ?>],
                    ['En espera', <?php echo $procesoc ?>]


                ]);

                var options2 = {
                    title: ''
                };

                var chart2 = new google.visualization.PieChart(document.getElementById('piechart'));

                chart2.draw(data2, options2);
            }
        </script>



</body>

</html>