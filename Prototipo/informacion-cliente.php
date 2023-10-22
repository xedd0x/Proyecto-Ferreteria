<?php


session_start();

if (!isset($_SESSION['Usuario'])) {
  echo '<script> window.location="login.php"; </script>';
}

if ($_SESSION['rol'] != 'cliente') {
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
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="tienda.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Ferretería <sup>ED</sup></div>
      </a>




      <li class="nav-item ">
        <a class="nav-link" href="tienda.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Catálogo de productos</span></a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider" />

      <li class="nav-item ">
        <a class="nav-link" href="compras-clientes.php">
          <i class="fas fa-fw fa-store"></i>
          <span>Compras realizadas </span></a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider" />


      <!-- Nav Item - Charts -->

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="informacion-cliente.php">
          <i class="fas fa-fw fa-info"></i>
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



            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-shopping-cart fa-fw"></i>
                <!-- Counter - Messages -->



                <?php

                if (!isset($_SESSION['carrito'])) {
                ?>
                  <span class="badge badge-danger badge-counter">0+</span>
                  <?php
                } else {

                  ##incluimos la conexion con la bd desde la clase conexion
                  include 'conexion/conexion.php';
                  $codigocoti = $_SESSION["carrito"];
                  #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
                  $consulta3 = "select count(*) from cotizaciones inner join productos_cotizados inner join productos where 
                cotizaciones.codigo='$codigocoti' and cotizaciones.id_cotizacion=productos_cotizados.id_cotizacion 
                and productos.id_producto=productos_cotizados.id_producto;";
                  if ($result3 = $conn3->query($consulta3)) {
                    while ($row = $result3->fetch_assoc()) {
                      $conteo = $row['count(*)'];
                  ?>
                      <span class="badge badge-danger badge-counter"><?php echo $conteo ?>+</span>
                <?php
                    }
                  }
                }

                ?>

              </a>
              <!-- Dropdown - Messages -->



              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">Carrito de compras</h6>

                <?php

                if (!isset($_SESSION['carrito'])) {
                ?>

                  <a class="dropdown-item d-flex align-items-center" href="#">


                    <div class="font-weight-bold">
                      <div class="text-truncate">
                      El carrito está vacío                      </div>


                    </div>

                  </a>
                  <?php
                } else {



                  ##incluimos la conexion con la bd desde la clase conexion
                  include 'conexion/conexion.php';
                  $codigocoti = $_SESSION["carrito"];
                  #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
                  $consulta = "              
                select productos_cotizados.id_cotizacion,productos.id_producto,productos.nombre_producto,productos_cotizados.cantidad,productos.foto,productos.precio_venta from 
                cotizaciones inner join productos_cotizados inner join productos where cotizaciones.codigo='$codigocoti' 
                and cotizaciones.id_cotizacion=productos_cotizados.id_cotizacion and 
                productos.id_producto=productos_cotizados.id_producto;";
                  if ($result = $conn->query($consulta)) {
                    while ($row = $result->fetch_assoc()) {

                      $id_cotizacion = $row['id_cotizacion'];
                      $id_producto = $row['id_producto'];
                      $nombre_producto = $row['nombre_producto'];

                      $precio_venta = $row['precio_venta'];

                      $foto = $row['foto'];
                      $cantidad = $row['cantidad'];
                      $precio_venta = $row['precio_venta'];
                  ?>

                      <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                          <img class="rounded-circle" src="<?php echo $foto ?>" alt="..." />

                        </div>

                        <div class="font-weight-bold">
                          <div class="text-truncate">
                            <?php echo $nombre_producto ?>
                          </div>
                          <div class="small text-gray-500">Cantidad:<?php echo $cantidad ?>. Precio unidad: <?php echo $precio_venta ?>

                          </div>

                        </div>

                        <form action="eliminar.php" method="post">
                          <input type="hidden" id="id_cotizacion" name="id_cotizacion" value="<?php echo $id_cotizacion ?>">
                          <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $id_producto ?>">
                          <div class="dropdown-list-image mr-7 d-flex flex-row-reverse ml-auto p-2">
                            <button type="submit" name="delete_prodcoticata" class="btn btn-danger btn-circle btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                              </svg></button>
                          </div>

                        </form>
                      </a>


                <?php
                    }
                    $result->free();
                  }
                }
                // endforeach
                ?>
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
                <a class="dropdown-item" href="perfil-cliente.php">
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


          <!-- Content Row -->


          <!-- Content Row -->

          <div class="row">
            <!-- Content Row -->
            <div class="row">

              <div class="col-lg-6 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Historia de la empresa</h6>
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="...">
                    </div>


                    <?php
                    ##incluimos la conexion con la bd desde la clase conexion
                    include 'conexion/conexion.php';
                    #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
                    $consulta3 = "select historia from informacion_empresa";
                    if ($result3 = $conn3->query($consulta3)) {
                      while ($row = $result3->fetch_assoc()) {
                        $conteo = $row['historia'];
                    ?>

                        <p><?php echo $conteo ?></p>

                    <?php
                      }
                    }
                    ?>
                  </div>
                </div>

                <!-- Approach -->

              </div>
              <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Saludos.</h6>
                  </div>
                  <div class="card-body">
                    <?php
                    ##incluimos la conexion con la bd desde la clase conexion
                    include 'conexion/conexion.php';
                    #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
                    $consulta3 = "select mensaje from informacion_empresa";
                    if ($result3 = $conn3->query($consulta3)) {
                      while ($row = $result3->fetch_assoc()) {
                        $conteo = $row['mensaje'];
                    ?>

                        <p><?php echo $conteo ?></p>

                    <?php
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-12 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Mapa.</h6>
                </div>
                <div class="card-body">
                  <div id="map_div" style="width: 1200px; height: 600px"></div>

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
        "packages": ["map"],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        "mapsApiKey": "AIzaSyAoH2y8KPYlG-4-rJo3-SCVxkfw2K5mi8k"
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Lat', 'Long', 'Name'],

          <?php


          ##incluimos la conexion con la bd desde la clase conexion
          include 'conexion/conexion.php';
          #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
          $consulta21 = "select direccion,longitud,latitud,descripcion from direccion_negocios";
          if ($result21 = $conn->query($consulta21)) {
            while ($row = $result21->fetch_assoc()) {
              $direccion = $row['direccion'];
              $longitud = $row['longitud'];
              $latitud = $row['latitud'];
              $descripcion = $row['descripcion'];

          ?>[<?php echo $latitud ?>, <?php echo $longitud ?>, '<?php echo $direccion ?>'],
          <?php
            }
          }

          ?>

          [14.08325, -87.18524, 'Ceutec']
        ]);

        var map = new google.visualization.Map(document.getElementById('map_div'));
        map.draw(data, {
          showTooltip: true,
          showInfoWindow: true
        });
      }
    </script>
</body>

</html>