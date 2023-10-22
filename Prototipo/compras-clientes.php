<?php


session_start();
if (!isset($_SESSION['Usuario'])) {
  echo '<script> window.location="login.php"; </script>';
}
if ($_SESSION['rol'] != 'cliente') {
  echo '<script> window.location="login.php"; </script>';
}

$nombreusu = $_SESSION["nomemp"]; 
$idususessionactiva = $_SESSION["idusu"];
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


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="main.css">

  <!--datables CSS básico-->
  <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

  <!--font awesome con CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="main.css">

  <!--datables CSS básico-->
  <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

  <!--font awesome con CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
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

      <li class="nav-item active">
        <a class="nav-link" href="compras-clientes.php">
          <i class="fas fa-fw fa-store"></i>
          <span>Compras realizadas </span></a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider" />


      <!-- Nav Item - Charts -->

      <!-- Nav Item - Tables -->
      <li class="nav-item">
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
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Modal modificar -->





          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Compras realizadas</h1>




          <!-- DataTales Example -->
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Factura</th>
                        <th>Fecha</th>
                        <th>RTN</th>
                        <th>Subtotal</th>
                        <th>Descuento</th>
                        <th>Impuesto </th>
                        <th>Total </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>

                        <?php
                        ##incluimos la conexion con la bd desde la clase conexion
                        include 'conexion/conexion.php';
                        #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
                        $consulta = "SELECT id_factura,fecha_factura,rtn,subtotal,descuento,impuesto, total,id_cotizacion,clientes.nombre_cliente
                        FROM facturas_venta
                        inner join usuarios
                        inner join clientes
                        where usuarios.id_usuario=facturas_venta.id_usuario and usuarios.id_usuario=clientes.id_usuario and facturas_venta.id_usuario=$idususessionactiva;";

                        if ($result = $conn->query($consulta)) {

                          ##seguidamente ejecutamos un while para que lea los datos fila por fila dentro el cual
                          ##mostraremos en la tabla mendiate el metoco echo
                          while ($row = $result->fetch_assoc()) {

                            $id_factura = $row['id_factura'];

                            $fecha_factura = $row['fecha_factura'];
                            $latinfechan = date("d/m/Y", strtotime($fecha_factura));

                            $rtn = $row['rtn'];
                            $subtotal = $row['subtotal'];
                            $descuento = $row['descuento'];
                            $impuesto = $row['impuesto'];
                            $total = $row['total'];
                            $id_cotizacion = $row['id_cotizacion'];
                            $nombre_cliente = $row['nombre_cliente'];


                        ?>



                            <td><?php echo $id_factura ?></td>
                            <td><?php echo $latinfechan ?></td>
                            <td><?php echo $rtn ?></td>
                            <td>L <?php echo number_format($subtotal, 2, '.',',') ?></td>
                            <td>L <?php echo number_format($descuento, 2, '.',',')  ?></td>
                            <td>L <?php echo number_format($impuesto, 2, '.',',')  ?></td>
                            <td>L <?php echo number_format($total, 2, '.',',')  ?></td>



                      </tr>
                  <?php

                          }
                          $result->free();
                        }
                        // endforeach

                  ?>


                  </tr>
                    </tbody>
                  </table>
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




  <!-- datatables JS -->
  <script type="text/javascript" src="datatables/datatables.min.js"></script>

  <!-- para usar botones en datatables JS -->
  <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>
  <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

  <!-- código JS propìo-->
  <script type="text/javascript" src="main.js"></script>


</body>

</html>