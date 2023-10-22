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
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Ferretería EDD</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />
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
      if ($_SESSION['rol'] == 'Administrador') {
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
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilidades</span>
        </a>
        <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item  " href="catalogo.php">Catálogo de productos</a>
            <a class="collapse-item active" href="cotizacion-venta.php">Cotizaciones y ventas</a>
            <a class="collapse-item" href="cotizacion-espera.php">Cotizaciones en espera</a>
            <a class="collapse-item" href="fletes.php">Fletes y envíos</a>

          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">Información</div>


      <?php
      if ($_SESSION['rol'] == 'Administrador') {
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
      <li class="nav-item">
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
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->



          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Cotizaciones y ventas
              </h6>
            </div>
            <div class="card-body">

              <section class="h-100" style="background-color: #eee;">
                <div class="container h-100 py-5">


                  <form method="post" enctype="multipart/form-data" class="user">



                    <div class="row d-flex justify-content-center align-items-center h-100">
                      <div class="col-10">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                          <h3 class="fw-normal mb-0 text-black">Carrito de compra </h3>

                        </div>

                        <?php

                        if (!isset($_SESSION['carrito'])) {
                        ?>

                          <div class="card rounded-3 mb-2">
                            <div class="card-body p-4">
                              <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                  <p class="lead fw-normal mb-2">El carrito está vacío</p>
                                </div>

                              </div>
                            </div>
                          </div>

                          <div class="card">
                            <div class="card-body">
                              <button type="button" name="pagar" id="pagar" class="btn btn-success btn-block btn-lg">Pagar</button>
                              <button type="button" name="nueva-coti" id="nueva-coti" class="btn btn-info btn-block btn-lg">Crear Cotizacion</button>
                            </div>
                          </div>
                          <?php
                        } else {



                          ##incluimos la conexion con la bd desde la clase conexion
                          include 'conexion/conexion.php';
                          $codigocoti = $_SESSION["carrito"];
                          #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
                          $consulta = "              
                                        select productos.codigo,productos.descripcion,productos_cotizados.id_cotizacion,productos.id_producto,productos.nombre_producto,productos_cotizados.cantidad,productos.foto,productos.precio_venta from 
                                        cotizaciones inner join productos_cotizados inner join productos 
                                        where cotizaciones.codigo='$codigocoti' 
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
                              $codigo = $row['codigo'];
                              $descripcion = $row['descripcion'];

                              $subtotal = doubleval($precio_venta) * doubleval($cantidad);


                          ?>

                              <div class="card rounded-3 mb-2">
                                <div class="card-body p-4">
                                  <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                      <img src="<?php echo $foto ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3 ">
                                      <p class="lead fw-normal mb-2"><?php echo $nombre_producto ?></p>
                                      <p><span class="text-muted"><?php echo $codigo ?> </span> <?php echo $descripcion ?> <span class="text-muted"> </span></p>
                                    </div>





                                    <div class="col-md-3 col-lg-3 col-xl-2 offset-lg-1">

                                      <p> <span class="text-muted">Cantidad: </span></p>
                                      <input id="form1" name="quantity" value="<?php echo $cantidad ?>" readonly="true" type="text" class="form-control form-control-sm" />

                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                      <h5 class="mb-0">L <?php echo number_format($subtotal, 2, '.', ',')  ?></h5>
                                    </div>



                                    <form action="eliminar.php" method="post">
                                      <input type="hidden" id="id_cotizacion" name="id_cotizacion" value="<?php echo $id_cotizacion ?>">
                                      <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $id_producto ?>">
                                      <div class="dropdown-list-image mr-7 d-flex flex-row-reverse ml-auto p-2">
                                        <button type="submit" name="delete_prodcotiventa" class="btn btn-danger btn-circle btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                          </svg></button>
                                      </div>
                                    </form>

                                  </div>
                                </div>
                              </div>





                            <?php
                            }
                            ?>


                            <div class="card">
                              <div class="card-body">
                                <button type="button" onclick="window.location.href='factura.php'" name="pagar" id="pagar" class="btn btn-success btn-block btn-lg">Pagar</button>
                                <br>
                                <form action="carrito.php" method="post">
                                  <button type="submit" name="nueva-coti" id="nueva-coti" class="btn btn-info btn-block btn-lg">Nueva cotización</button>
                                </form>
                              </div>
                            </div>
                        <?php
                            $result->free();
                          }
                        }
                        // endforeach
                        ?>







                      </div>
                    </div>




                  </form>

                </div>
              </section>


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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
</body>

</html>