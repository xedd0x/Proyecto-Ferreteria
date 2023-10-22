<?php


session_start();
if (!isset($_SESSION['Usuario'])) {
  echo '<script> window.location="login.php"; </script>';
}

if ($_SESSION['descaut'] != 'empleado' ) {
  echo '<script> window.location="login.php"; </script>';
}
if ($_SESSION['rol'] != 'Administrador') {
  echo '<script> window.location="login.php"; </script>';
}


$nombreusu = $_SESSION["nomemp"]; ?>
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
      if($_SESSION['rol']=='Administrador' ){
      ?>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Gestiones</span>
        </a>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="gestion-usuarios.php">Gestión de usuarios</a>
            <a class="collapse-item " href="gestion-empleados.php">Gestión de empleados</a>
            <a class="collapse-item active" href="gestion-productos.php">Gestión de productos</a>
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
            <a class="collapse-item" href="fletes.php">Fletes y envíos</a>

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


          <!-- Modal modificar informacion-->
          <div class="modal fade" id="modalmodificarproductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Modificar</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="modificar.php" method="post" enctype="multipart/form-data" class="user">
                  <div class="modal-body">
                    <div class="form-group  ">
                      <label for="inputPassword4">ID Producto</label>
                      <input type="text" class="form-control" id="midprod" name="midprod"  readonly="true" />
                    </div>

                    <div class="form-row">
                      <div class="form-group  col-md-6">
                        <label for="inputPassword4">Código del producto</label>
                        <input type="text" class="form-control" id="mcodprod" name="mcodprod"  readonly="true" />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Nombre del producto</label>
                        <input type="text" class="form-control" id="mnom" name="mnom"   required="" pattern="[A-Za-z\s]+" title="Solo se permite letras y espacios."
/>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Precio de compra</label>
                        <input type="text" class="form-control" id="mprec" name="mprec"  required="" pattern="[0-9\.]+" title="Solo se permiten número y un punto."
/>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Precio de venta</label>
                        <input type="text" class="form-control" id="mprev" name="mprev"  required="" pattern="[0-9\.]+" title="Solo se permiten número y un punto."/>
                      </div>
                    </div>


                    <div class="form-group ">
                      <label for="inputAddress2">Seleccione el Proveedor</label>
                      <div class="dropdown no-arrow mb-4">
                        <select name="midprov" id="midprov"  class="btn btn-secondary dropdown-toggle" placeholder="Proveedor">

                          <?php
                          ##incluimos la conexion con la bd desde la clase conexion
                          include 'conexion/conexion.php';
                          #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
                          $consulta = "SELECT       id_proveedor,nombre_proveedor                            
                                       FROM proveedores;";

                          if ($result = $conn->query($consulta)) {

                            ##seguidamente ejecutamos un while para que lea los datos fila por fila dentro el cual
                            ##mostraremos en la tabla mendiate el metoco echo
                            while ($row = $result->fetch_assoc()) {
                              $mosidprov = $row['id_proveedor'];
                              $mosnombreprov = $row['nombre_proveedor'];
                          ?>
                              <option value="<?php echo $mosidprov ?>"><?php echo $mosnombreprov ?></option>
                          <?php
                            }
                            $result->free();
                          }
                          // endforeach

                          ?>

                        </select>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="inputAddress">Descripción </label>
                      <textarea name="mdesc" required="" pattern="[A-Za-z0-9\s]+" id="mdesc" class="form-control" title="Solo se permiten letras,número y espacios"
></textarea>
                    </div>

                    <div class="form-group ">
                      <label for="inputAddress">Ingrese imagen del producto</label>
                      <br>
                      <input type="file" name="mimagen" id="mimagen" class="fileUpload btn btn-primary " accept="image/*" />
                    </div>






                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="modificar_producto">Guardar cambios</button>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Gestión  de Productos</h1>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Ingresar Producto
              </h6>
            </div>
            <div class="card-body">
              <form action="ingresar.php" method="post" enctype="multipart/form-data" class="user">
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Código del producto</label>
                    <input type="text" class="form-control" id="codigoprod" name="codigoprod" required="" pattern="[A-Za-z0-9\s]+" />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Nombre del producto</label>
                    <input type="text" class="form-control" id="nombreprod" name="nombreprod"  required="" pattern="[A-Za-z\s]+" title="Solo se permite letras y espacios."
/>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Precio de compra</label>
                    <input type="text" class="form-control" id="precompra" name="precompra"  required="" pattern="[0-9\.]+"  title="Solo se permiten número y un punto."/>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Precio de venta</label>
                    <input type="text" class="form-control" id="preventa" name="preventa"  required="" pattern="[0-9\.]+"  title="Solo se permiten número y un punto."/>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="inputAddress2">Seleccione el Proveedor</label>
                    <div class="dropdown no-arrow mb-4">
                      <select name="idprov" id="idprov"  class="btn btn-secondary dropdown-toggle" >

                        <?php
                        ##incluimos la conexion con la bd desde la clase conexion
                        include 'conexion/conexion.php';
                        #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
                        $consulta = "SELECT       id_proveedor,nombre_proveedor                            
                        FROM proveedores;";

                        if ($result = $conn->query($consulta)) {

                          ##seguidamente ejecutamos un while para que lea los datos fila por fila dentro el cual
                          ##mostraremos en la tabla mendiate el metoco echo
                          while ($row = $result->fetch_assoc()) {
                            $mosidprov = $row['id_proveedor'];
                            $mosnombreprov = $row['nombre_proveedor'];
                        ?>
                            <option value="<?php echo $mosidprov ?>"><?php echo $mosnombreprov ?></option>
                        <?php
                          }
                          $result->free();
                        }
                        // endforeach

                        ?>

                      </select>


                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputAddress2">Seleccione el categoria</label>
                    <div class="dropdown no-arrow mb-4">
                      <select name="categoria" id="categoria" class="btn btn-secondary dropdown-toggle" >

                      <option value="plomeria">Plomería</option>
                      <option value="jardineria">Jardinería</option>
                      <option value="electricidad">Electricidad</option>
                      <option value="construccion">Construcción</option>
                      <option value="herramientas">Heramientas</option>
                      <option value="maquinaria">Maquinaria</option>

                      </select>


                    </div>
                  </div>

                </div>





                <div class="form-group">
                  <label for="inputAddress">Descripción</label>
                  <textarea name="desc" id="desc" class="form-control" required="" pattern="[A-Za-z0-9]+" title="Solo se permiten letras,número y espacios"
></textarea>
                </div>

                <div class="form-group ">
                  <label for="inputAddress">Ingrese imagen del producto</label>
                  <br>
                  <input type="file" name="imagen" id="imagen" class="fileUpload btn btn-primary " accept="image/*" required=""/>
                </div>
                <br>
                <button type="submit" name="ingresar-producto" class="btn btn-primary">Guardar</button>
              </form>
            </div>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Nombre</th>
                      <th>Precio de compra</th>
                      <th>Precio de venta</th>
                      <th>Descripción</th>
                      <th>Proveedor</th>
                      <th>Muestra</th>

                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      ##incluimos la conexion con la bd desde la clase conexion
                      include 'conexion/conexion.php';
                      #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
                      $consulta = "SELECT       id_producto,codigo,nombre_producto,precio_compra,precio_venta,descripcion,foto,productos.id_proveedor,proveedores.nombre_proveedor                            
                        FROM productos
                        INNER JOIN proveedores
                        ON productos.id_proveedor = proveedores.id_proveedor;";

                      if ($result = $conn->query($consulta)) {

                        ##seguidamente ejecutamos un while para que lea los datos fila por fila dentro el cual
                        ##mostraremos en la tabla mendiate el metoco echo
                        while ($row = $result->fetch_assoc()) {

                          $id_producto = $row['id_producto'];
                          $codigo = $row['codigo'];
                          $nombre_producto = $row['nombre_producto'];
                          $precio_compra = $row['precio_compra'];
                          $precio_venta = $row['precio_venta'];
                          $descripcion = $row['descripcion'];
                          $foto = $row['foto'];
                          $id_proveedor = $row['id_proveedor'];
                          $nombre_proveedor = $row['nombre_proveedor'];

                      ?>


                          <td><?php echo $codigo ?></td>
                          <td><?php echo $nombre_producto ?></td>
                          <td>L <?php echo number_format($precio_compra, 2, '.',',') ?></td>
                          <td>L <?php echo number_format($precio_venta, 2, '.',',') ?></td>
                          <td><?php echo $descripcion ?></td>
                          <td><?php echo $nombre_proveedor ?></td>
                          <td><img src="<?php echo $foto ?>" height="100" width="100" /></td>




                          <form method="post">

                            <td>
                              <a href="#" class="btn btn-warning btn-circle btn-sm">
                                <button type="button" id="btnmodificarp" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#modalmodificarproductos" data-id_producto="<?php echo $id_producto ?>" data-codigo="<?php echo $codigo ?>" data-nombre_producto="<?php echo $nombre_producto ?>" data-precio_compra="<?php echo $precio_compra ?>" data-precio_venta="<?php echo $precio_venta ?>" data-descripcion="<?php echo $descripcion ?>" data-id_proveedor="<?php echo $id_proveedor ?>" data-foto="<?php echo $foto ?>">

                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-wide" viewBox="0 0 16 16">
                                    <path d="M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434L8.932.727zM8 12.997a4.998 4.998 0 1 1 0-9.995 4.998 4.998 0 0 1 0 9.996z" />
                                  </svg>
                                </button>
                              </a>


                            </td>



                          </form>
                    </tr>
                <?php

                        }
                        $result->free();
                      }
                      // endforeach

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
          <span>Copyright &copy; Josue Vargas 2023</span>          </div>
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

  <script>
    $(document).on("click", "#btnmodificarp", function() {
      var id_producto = $(this).data('id_producto');
      var codigo = $(this).data('codigo');
      var nombre_producto = $(this).data('nombre_producto');
      var precio_compra = $(this).data('precio_compra');
      var precio_venta = $(this).data('precio_venta');
      var descripcion = $(this).data('descripcion');
      var id_proveedor = $(this).data('id_proveedor');
      var foto = $(this).data('foto');


      $("#midprod").val(id_producto);
      $("#mcodprod").val(codigo);
      $("#mnom").val(nombre_producto);
      $("#mprec").val(precio_compra);
      $("#mprev").val(precio_venta);
      $("#mdesc").val(descripcion);
      $("#midprov").val(id_proveedor);
      $("#mimagen").val(foto);



    })
  </script>
</body>

</html>