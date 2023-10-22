<?php
include 'conexion/conexion.php';

session_start();
if (!isset($_SESSION['Usuario'])) {
  echo '<script> window.location="login.php"; </script>';
}

if ($_SESSION['descaut'] != 'empleado') {
  echo '<script> window.location="login.php"; </script>';
}



$nombreusu = $_SESSION["nomemp"];


$idcoti =  intval($_POST['idcoti']);
$idfact = intval($_POST['idfact']);
$codigo = $_POST['codigo'];




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
      <li class="nav-item ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilidades</span>
        </a>
        <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item  " href="catalogo.php">Catálogo de productos</a>
            <a class="collapse-item" href="cotizacion-venta.php">Cotizaciones y ventas</a>
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


          <?php


          ?>
          <h1 class="h3 mb-2 text-gray-800">Factura</h1>
          <br>
          <div class="card shadow mb-4" id="imprimible">
            <div class="card-body">
              <form action="ingresar.php" method="post" enctype="multipart/form-data" class="user">
                <div class="form-group">
                  <h1 style="text-align: center;">Ferretería EDD</h1>
                </div>
                <div class="form-group">
                  <h4 style="text-align: center;">Colonia cerro grande zona 4, bloque 3, casa 19. Salida al norte contiguo a gasolinera puma. Tegucigalpa Francisco Morazán. </h4>
                </div>
                <div class="form-group">
                  <h5 style="text-align: center;">RTN:08011999229518</h5>
                  <h5 style="text-align: center;">Josuevamedina@gmail.com</h5>
                  <h5 style="text-align: center;">+504 3395-3285</h5>
                </div>
                <div class="form-group">
                  <label for="direccion">--------------------------------------------------------------------------------------------------------------------------------------------</label>
                </div>
                <div class="form-group">
                  <h5 style="text-align: left;">ID# <?php echo $codigo; ?></h5>
                  <h5 style="text-align: left;">Cajero:<?php echo $nombreusu; ?></h5>

                  <h5 style="text-align: left;">Caja:0000</h5>
                  <h5 style="text-align: left;">Fecha:<?php echo date("d/m/Y", strtotime(date('Y-m-d'))); ?></h5>
                  <h5 style="text-align: left;">Hora:<?php echo date("h:i:s"); ?></h5>
                  <h5 style="text-align: left;">RTN:CF</h5>


                </div>


                <div class="form-group">
                  <label for="direccion">--------------------------------------------------------------------------------------------------------------------------------------------</label>
                </div>
                <div class="form-group">
                  <h5 style="text-align: center;">Descripción</h5>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="nombre">Producto</label>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="telefono">Cantidad</label>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="telefono">Precio</label>
                  </div>
                </div>


                <?php


                $acumsubtotal = 0;


                ##incluimos la conexion con la bd desde la clase conexion
                include 'conexion/conexion.php';

                #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
                $consulta = "              
                                        select productos.codigo,productos.descripcion,productos_cotizados.id_cotizacion,productos.id_producto,productos.nombre_producto,productos_cotizados.cantidad,productos.foto,productos.precio_venta from 
                                        cotizaciones inner join productos_cotizados inner join productos where cotizaciones.codigo='$codigo' 
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

                    $subtotalprod = doubleval($precio_venta) * doubleval($cantidad);
                    $acumsubtotal = $acumsubtotal + $subtotalprod;


                ?>



                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <input type="text" class="form-control" id="nombre" name="nombre" readonly="true" value="<?php echo $nombre_producto ?>" />
                      </div>
                      <div class="form-group col-md-4">
                        <input type="text" class="form-control" id="cantidadproddd" name="cantidadproddd" readonly="true" value="<?php echo $cantidad ?>" />
                      </div>
                      <div class="form-group col-md-4">
                        <input type="text" class="form-control" id="subtotalproddd" name="subtotalproddd" readonly="true" value="L <?php echo number_format($subtotalprod, 2, '.', ',') ?>" />
                      </div>
                    </div>

                  <?php
                  }

                  $impuesto = $acumsubtotal * 0.15;

                  ?>

                  <div class="form-group">
                    <input hidden="true" type="text" class="form-control" id="idcotizacion" name="idcotizacion" readonly="true" value="<?php echo $id_cotizacion ?>" />
                  </div>
                  <div class="form-group">
                    <label for="direccion">Subtotal</label>
                    <input type="text" class="form-control" id="subtotal" name="subtotal" readonly="true" value="<?php echo $acumsubtotal ?>" />
                  </div>
                  <div class="form-group">
                    <label for="direccion">Impuesto</label>
                    <input type="text" class="form-control" id="impuesto" name="impuesto" readonly="true" value="<?php echo $impuesto ?>" />
                  </div>







                <?php


                  $result->free();
                }

                // endforeach
                ?>

                <?php
                #vincular el archivo de la BD
                include 'conexion/conexion.php';

                $consulta2 = "SELECT descuento,total FROM facturas_venta WHERE id_factura=$idfact;";

                if ($result2 = $conn2->query($consulta2)) {
                  while ($row = $result2->fetch_assoc()) {

                    #lectura datos de usuario
                    $descuento = $row['descuento'];
                    $tottal = $row['total'];
                ?>
                    <div class="form-group">
                      <label for="direccion">Descuento</label>
                      <input type="text" class="form-control" id="ddescuento" name="ddescuento" readonly="true" value="<?php echo $descuento ?>" />
                    </div>
                    <div class="form-group">
                      <label for="direccion">Total a pagar</label>
                      <input type="text" class="form-control" id="tpagar" name="tpagar" readonly="true" value="<?php echo $tottal ?>" />
                    </div>
                <?php

                  }
                  $result2->free();
                }
                ?>
              </form>
            </div>
          </div>
          <?php

          ?>




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




  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js" integrity="sha256-s/wuIT+s0uE5Igk30VS2UAcs5Ck6SDt+iTlUzYQBn/4=" crossorigin="anonymous"></script>


</body>

</html>