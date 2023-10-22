<?php
include 'conexion/conexion.php';

session_start();
if (!isset($_SESSION['Usuario'])) {
  echo '<script> window.location="login.php"; </script>';
}



if (!isset($_SESSION['carrito'])) {
  echo '<script> window.location="tienda.php"; </script>';
} 
if ($_SESSION['rol'] != 'cliente') {
  echo '<script> window.location="login.php"; </script>';
}

$nombreusu = $_SESSION["nomemp"];
$idcodigocoti = $_SESSION["carrito"];
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
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="tienda.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Ferretería <sup>ED</sup></div>
      </a>




      <li class="nav-item active">
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
        <div class="container-fluid" >



          <!-- Modal modificar informacion-->
          <div class="modal fade" id="modalpagot" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Tarjeta</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="crudclientes.php" method="post" enctype="multipart/form-data" class="user" autocomplete="off">
                  <div class="modal-body">

                    <div class="form-group">
                      <input type="text" hidden="true" class="form-control" id="idcotizaciont" name="idcotizaciont" readonly="true" value="" />
                      <input type="text" hidden="true" class="form-control" id="rtnt" name="rtnt" readonly="true" value="" />
                      <input type="text" hidden="true" class="form-control" id="subtotalt" name="subtotalt" readonly="true" value="" />
                      <input type="text" hidden="true" class="form-control" id="impuestot" name="impuestot" readonly="true" value="" />
                      <input type="text" hidden="true" class="form-control" id="ddescuentot" name="ddescuentot" readonly="true" value="" />
                      <input type="text" hidden="true" class="form-control" id="tpagart" name="tpagart" readonly="true" value="" />

                    </div>

                    <div class="form-group  ">
                      <label for="inputPassword4">Nombre en la tarjeta</label>
                      <input type="text" class="form-control" id="nombret" name="nombret" required="" pattern="[A-Za-z\s]+" autocomplete="off" />
                    </div>
                    <div class="form-group  ">
                      <label for="inputPassword4">Número en la tarjeta</label>
                      <input type="text" class="form-control" id="numerot" name="numerot" pattern="[0-9]{16}" required="" autocomplete="off" />
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Fecha de vencimiento</label>
                        <input type="date" class="form-control" id="fechat" name="fechat" required="" min="<?php echo date('Y-m-d'); ?>"/>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">CVV</label>
                        <input type="text" class="form-control" id="cvvt" name="cvvt" required="" pattern="[0-9]{3}" autocomplete="off" />
                      </div>
                    </div>


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="factura-tarjeta">Completar compra</button>
                  </div> 
                </form>
              </div>
            </div>
          </div>


          <!-- Page Heading -->


          <?php

          if (!isset($_SESSION['carrito'])) {
          ?>
            <h1 class="h3 mb-2 text-gray-800">El carrito este vacio </h1>
          <?php
          } else {

          ?>
            <h1 class="h3 mb-2 text-gray-800">Factura</h1>

            <button class=" btn btn-secondary " id="imprimir" name="imprimir">Imprimir</button>
            <br><br>
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
                  <h5 style="text-align: left;">ID# <?php echo $idcodigocoti; ?></h5>
                  <h5 style="text-align: left;">Cajero:00000000</h5>

                    <h5 style="text-align: left;">Caja:0000</h5>
                    <h5 style="text-align: left;">Fecha:<?php  echo date("d/m/Y", strtotime(date('Y-m-d'))) ; ?></h5>
                    <h5 style="text-align: left;">Hora:<?php echo date("h:i:s"); ?></h5>
                    <h5 style="text-align: left;">RTN:CF</h5>


                  </div>
                  <div class="form-group">
                  <label for="direccion">--------------------------------------------------------------------------------------------------------------------------------------------</label>
                  </div>
                  <div class="form-group">
                    <label for="direccion">Nombre</label>
                    <input type="text" class="form-control" id="nombrecliente" name="nombrecliente" value="" pattern="[A-Za-z\s]+" />
                  </div>
                  <div class="form-group">
                    <label for="direccion">RTN</label>
                    <input type="text" class="form-control" id="rtn" name="rtn" value="" pattern="[0-9]+" maxlength="13" minlength="13" />
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
                  $codigocoti = $_SESSION["carrito"];
                  #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
                  $consulta = "              
                                        select productos.codigo,productos.descripcion,productos_cotizados.id_cotizacion,productos.id_producto,productos.nombre_producto,productos_cotizados.cantidad,productos.foto,productos.precio_venta from 
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
                    <div class="form-group">
                      <label for="direccion">Selección un descuento</label><br>

                      <input type="radio" id="tedad" name="descuento" value="0.25">
                      <label for="tedad">Tercera edad</label><br>
                      <input type="radio" id="discapacidad" name="descuento" value="0.20">
                      <label for="discapacidad">Discapacidad</label><br>
                      <input type="radio" id="ninguno" name="descuento" value="0">
                      <label for="ninguno">Ninguno</label>
                    </div>
                    <div class="form-group">
                      <label for="direccion">Descuento</label>
                      <input type="text" class="form-control" id="ddescuento" name="ddescuento" readonly="true" value="" />
                    </div>
                    <div class="form-group">
                      <label for="direccion">Total a pagar</label>
                      <input type="text" class="form-control" id="tpagar" name="tpagar" readonly="true" value="" />
                    </div>
                  <?php


                    $result->free();
                  }

                  // endforeach
                  ?>

                  <!-- <button type="submit" class="btn btn-primary" name="mpago">Pago en efectivo</button> -->
                  <button type="button" class="btn btn-primary" name="mpagot" data-toggle="modal" data-target="#modalpagot">Pago Con tarjeta</button>
                </form>
              </div>
            </div>
          <?php
          }
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

  <!-- Script cargar datos en modal -->
  <script>
    $(document).ready(function() {

      var subtotal = +document.getElementById("subtotal").value;
      var impuesto = +document.getElementById("impuesto").value;
      var descuento = 0;

      var idcotizacion = document.getElementById("idcotizacion").value;





      $('input[type="radio"]').click(function() {
        var rtn = document.getElementById("rtn").value;

        if ($(this).attr("value") == "0") {


          descuento = subtotal * 0;
          $("#ddescuento").val(descuento);
          $("#tpagar").val(subtotal + impuesto - descuento);

          $("#idcotizaciont").val(idcotizacion);
          $("#rtnt").val(rtn);
          $("#subtotalt").val(subtotal);
          $("#impuestot").val(impuesto);
          $("#ddescuentot").val(descuento);
          $("#tpagart").val(subtotal + impuesto - descuento);



        }
        if ($(this).attr("value") == "0.25") {
          descuento = subtotal * 0.25;
          $("#ddescuento").val(descuento);
          $("#tpagar").val(subtotal + impuesto - descuento);

          $("#idcotizaciont").val(idcotizacion);
          $("#rtnt").val(rtn);
          $("#subtotalt").val(subtotal);
          $("#impuestot").val(impuesto);
          $("#ddescuentot").val(descuento);
          $("#tpagart").val(subtotal + impuesto - descuento);


        }
        if ($(this).attr("value") == "0.20") {
          descuento = subtotal * 0.20;
          $("#ddescuento").val(descuento);
          $("#tpagar").val(subtotal + impuesto - descuento);

          $("#idcotizaciont").val(idcotizacion);
          $("#rtnt").val(rtn);
          $("#subtotalt").val(subtotal);
          $("#impuestot").val(impuesto);
          $("#ddescuentot").val(descuento);
          $("#tpagart").val(subtotal + impuesto - descuento);

        }
      });
      $("#tpagar").val(subtotal);




      $('input[type="radio"]').trigger('click'); // trigger the event
    });
  </script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js" integrity="sha256-s/wuIT+s0uE5Igk30VS2UAcs5Ck6SDt+iTlUzYQBn/4=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(() => {
      $('#imprimir').click(function() {
        $.print('#imprimible');
      });
    });
  </script>
</body>

</html>