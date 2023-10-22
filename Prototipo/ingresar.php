<?php


#vincular el archivo de la BD
include 'conexion/conexion.php';

#incluimos la zona horaria
date_default_timezone_set('America/Guatemala');

session_start();

$idususessionactiva = $_SESSION["idusu"];
$fechadeaccion = date('y-m-d');
$horadeaccion = date("h:i:s");




#genera nuevo empleado y usuario para dicho empleado, la contrasena se genera automatica
if (isset($_POST['send'])) {

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $identidad = $_POST['identidad'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $fechac = $_POST['nacimiento'];
    $fechan = $_POST['contratacion'];
    $genero = $_POST['generoempleado'];
    $cargo = $_POST['cargoempleado'];


    $separador = " ";
    $separada = explode($separador, $nombre);
    $hashed_pass = password_hash($separada[0], PASSWORD_DEFAULT);


    $consulta9 = "SELECT id_empleado,nombre_empleado,email FROM empleados;";
    $centinela = "no";

    if ($result9 = $conn->query($consulta9)) {
        while ($row9 = $result9->fetch_assoc()) {
            #lectura datos de usuario
            $nombre_empleado = $row9['nombre_empleado'];
            $emaile = $row9['email'];

            if ($nombre_empleado == $nombre ||  $emaile == $email) {
                $centinela = "si";
            }
        }
        $result9->free();
    }


    if ($centinela == "si") {
        echo '<script type="text/javascript">alert("Empleado ya existe");</script>';
        echo '<script> window.location="gestion-empleados.php"; </script>';
    } else {

        $consulta3 = "INSERT INTO usuarios (nombre_usuario,contrasena,tipo_rol,descripcion)
        VALUES('$email','$hashed_pass','$cargo','empleado');";
        mysqli_query($conn, $consulta3);

        $consulta2 = "SELECT id_usuario,nombre_usuario FROM usuarios where nombre_usuario='$email';";

        if ($result = $conn->query($consulta2)) {
            while ($row = $result->fetch_assoc()) {

                #lectura datos de usuario
                $id_usuario = $row['id_usuario'];


                $consulta = "INSERT INTO empleados(nombre_empleado,numero_identidad,genero,n_telefono,direccion,email,fecha_nacimiento,fecha_contratacion,cargo,id_usuario)
                VALUES('$nombre','$identidad','$genero',$telefono,'$direccion','$email','$fechac','$fechan','$cargo',$id_usuario);";
                mysqli_query($conn, $consulta);


                $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
                    VALUES('Genero usuario y empleado: $email','$fechadeaccion','$horadeaccion',$idususessionactiva);";
                mysqli_query($conn, $consulta69);


                header('Location: gestion-empleados.php');
            }
            $result->free();
        }
    }
}

#ingresa nuevo proveedor
if (isset($_POST['ingresarprov'])) {

    $nombre = $_POST['nombreemp'];
    $telefono = $_POST['telefonoemp'];
    $correo = $_POST['correoemp'];
    $direccion = $_POST['direccionemp'];
    $nombreresp = $_POST['nombreresp'];
    $telefonoresp = $_POST['telefonoresp'];
    $comentarios = $_POST['comentarios'];

    $consulta9 = "SELECT nombre_proveedor FROM proveedores;";
    $centinela = "no";

    if ($result9 = $conn->query($consulta9)) {
        while ($row9 = $result9->fetch_assoc()) {
            #lectura datos de usuario
            $nombre_proveedor = $row9['nombre_proveedor'];

            if ($nombre_proveedor == $nombre) {
                $centinela = "si";
            }
        }
        $result9->free();
    }


    if ($centinela == "si") {
        echo '<script type="text/javascript">alert("proveedor ya existe");</script>';
        echo '<script> window.location="gestion-proveedores.php"; </script>';
    } else {

        $consulta = "INSERT INTO proveedores(nombre_proveedor,telefono,email,direccion,encargado,telefono_encargado,comentarios)
        VALUES('$nombre',$telefono,'$correo','$direccion','$nombreresp',$telefonoresp,'$comentarios');";
        mysqli_query($conn, $consulta);


        $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
        VALUES('Genero Proveedor: $nombre','$fechadeaccion','$horadeaccion',$idususessionactiva);";
        mysqli_query($conn, $consulta69);
        header('Location: gestion-proveedores.php');
    }
}


#ingresa una nueva direccion para un local diferente
if (isset($_POST['ingresar-direccion'])) {

    $direccion = $_POST['direccion'];
    $descripcion = $_POST['descripcion'];
    $longitud = $_POST['longitud'];
    $latitud = $_POST['latitud'];

    $consulta9 = "SELECT direccion,longitud,latitud FROM direccion_negocios;";
    $centinela = "no";

    if ($result9 = $conn->query($consulta9)) {
        while ($row9 = $result9->fetch_assoc()) {
            #lectura datos de usuario
            $direccions = $row9['direccion'];
            $longituds = $row9['longitud'];
            $latituds = $row9['latitud'];


            if ($direccions == $direccion ||  $longituds == $longitud ||  $latituds == $latitud) {
                $centinela = "si";
            }
        }
        $result9->free();
    }


    if ($centinela == "si") {
        echo '<script type="text/javascript">alert("Direccion ya existe");</script>';
        echo '<script> window.location="gestion-informacion.php"; </script>';
    } else {

        $consulta = "INSERT INTO direccion_negocios(direccion,descripcion,longitud,latitud)
        VALUES('$direccion','$descripcion','$longitud','$latitud');";
        mysqli_query($conn, $consulta);



        $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
    VALUES('Genero Direccion: $direccion','$fechadeaccion','$horadeaccion',$idususessionactiva);";
        mysqli_query($conn, $consulta69);
        header('Location: gestion-informacion.php');
    }
}


#ingresa un nuevo producto y genera su inventario con 0 como predeterminado para la cantidad
if (isset($_POST['ingresar-producto'])) {

    $codigo = $_POST['codigoprod'];
    $nombre_producto = $_POST['nombreprod'];
    $precio_compra = $_POST['precompra'];
    $precio_venta = $_POST['preventa'];
    $descripcion = $_POST['desc'];
    $id_proveedor = $_POST['idprov'];
    $categoria = $_POST['categoria'];

    $date = date('y-m-d');

    $foto = $_FILES['imagen']['name'];
    $temporal = $_FILES['imagen']['tmp_name'];
    $carpeta = '../Prototipo/img';
    $ruta = 'img/' . $foto;




    $consulta9 = "SELECT codigo,nombre_producto FROM productos;";
    $centinela = "no";

    if ($result9 = $conn->query($consulta9)) {
        while ($row9 = $result9->fetch_assoc()) {
            #lectura datos de usuario
            $codigos = $row9['codigo'];
            $nombre_productos = $row9['nombre_producto'];

            if ($codigos == $codigo ||  $nombre_productos == $nombre_producto) {
                $centinela = "si";
            }
        }
        $result9->free();
    }


    if ($centinela == "si") {
        echo '<script type="text/javascript">alert("Producto ya existe");</script>';
        echo '<script> window.location="gestion-productos.php"; </script>';
    } else {
        $consulta = "INSERT  INTO productos(codigo,nombre_producto,precio_compra,precio_venta,descripcion,foto,id_proveedor)
        VALUES('$codigo','$nombre_producto',$precio_compra,$precio_venta,'$descripcion','$ruta',$id_proveedor);";
        mysqli_query($conn, $consulta);

        $consulta2 = "SELECT id_producto FROM productos WHERE codigo='$codigo';";

        if ($result = $conn2->query($consulta2)) {
            while ($row = $result->fetch_assoc()) {

                #lectura datos de usuario
                $id_producto = $row['id_producto'];

                $consulta3 = "INSERT  INTO inventario(cantidad_producto,categoria,fecha_ulti_ingreso,cant_ulti_ingreso,id_producto)
        VALUES(0,'$categoria','$date',0,$id_producto);";
                mysqli_query($conn3, $consulta3);



                $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
        VALUES('Genero Producto e inventario: $nombre_producto','$fechadeaccion','$horadeaccion',$idususessionactiva);";
                mysqli_query($conn, $consulta69);
                move_uploaded_file($temporal, $carpeta . '/' . $foto);
                header('Location: gestion-productos.php');
            }
            $result->free();
        }
    }
}


#genera una nueva cotizacion dejando la anterior en espera, regresa a cotizacion venta
if (isset($_POST['nueva-coti'])) {

    $bytes = openssl_random_pseudo_bytes(4);
    $pass = bin2hex($bytes);

    $codigocoti = $pass;




    $_SESSION['carrito'] = "$codigocoti";

    $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
    VALUES('Genero Nuevo carrito: $codigocoti','$fechadeaccion','$horadeaccion',$idususessionactiva);";
    mysqli_query($conn, $consulta69);

    header('Location: cotizacion-venta.php');
}




#genera factura (metodo en efectivo), actuliza cotizacion en espera a cotizacion completada y actualiza inventario.
if (isset($_POST['mpago'])) {

    $idcotizacion = $_POST['idcotizacion'];

    $date = date('y-m-d');

    $rtn = $_POST['rtn'];
    $subtotal = $_POST['subtotal'];
    $impuesto = $_POST['impuesto'];
    $ddescuento = $_POST['ddescuento'];
    $tpagar = $_POST['tpagar'];
    $idusu = $_SESSION["idusu"];

    $consulta = "INSERT INTO facturas_venta(fecha_factura,rtn,subtotal,descuento,impuesto,total,id_cotizacion,id_usuario)
        VALUES('$date','$rtn',$subtotal,$ddescuento,$impuesto,$tpagar,$idcotizacion,$idusu);";
    mysqli_query($conn, $consulta);





    #estado 1 significa cotizacion finalizada
    $consulta2 = "UPDATE cotizaciones
    SET estado='1'
    WHERE id_cotizacion=$idcotizacion;";
    #recargamos la pagina


    mysqli_query($conn2, $consulta2);


    $consulta3 = "SELECT id_producto,cantidad FROM productos_cotizados WHERE id_cotizacion=$idcotizacion;";

    if ($result = $conn->query($consulta3)) {
        while ($row = $result->fetch_assoc()) {
            $id_producto = $row['id_producto'];
            $cantidadcoti = doubleval($row['cantidad']);

            $consulta4 = "SELECT cantidad_producto FROM inventario WHERE id_producto=$id_producto;";

            if ($result2 = $conn->query($consulta4)) {
                while ($row2 = $result2->fetch_assoc()) {

                    $cantidad_producto = doubleval($row2['cantidad_producto']);
                    $cantidad_nueva = $cantidad_producto - $cantidadcoti;

                    $consulta5 = "UPDATE inventario
                        SET cantidad_producto='$cantidad_nueva'
                        WHERE id_producto=$id_producto;";
                    #recargamos la pagina
                    mysqli_query($conn, $consulta5);
                }
                $result2->free();
            }
        }
        $result->free();
    }


    $consulta7 = "SELECT id_factura FROM facturas_venta  where id_cotizacion=$idcotizacion;";

    if ($result = $conn->query($consulta7)) {
        while ($row = $result->fetch_assoc()) {

            $id_factura = $row['id_factura'];

            $consulta = "INSERT INTO metodo_pago(metodo,cantidad,id_factura)
            VALUES('Efectivo',$tpagar,$id_factura);";
            mysqli_query($conn, $consulta);
        }
        $result->free();
    }

    $bytes = openssl_random_pseudo_bytes(4);
    $pass = bin2hex($bytes);

    $codigocoti = $pass;

    $_SESSION['carrito'] = "$codigocoti";

    #estado 0 es en proceso esta 1 es finalizado
    $consulta77 = "INSERT  INTO cotizaciones(codigo,estado,total)
        VALUES('$pass',0,0);";
    mysqli_query($conn, $consulta77);

    $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
    VALUES('Genero Venta $idcotizacion','$fechadeaccion','$horadeaccion',$idususessionactiva);";
    mysqli_query($conn, $consulta69);
    header('Location: catalogo.php');
}


#genera factura(metodo de tarjeta), actuliza cotizacion en espera a cotizacion completada y actualiza inventario.
if (isset($_POST['factura-tarjeta'])) {

    $idcotizacion = $_POST['idcotizaciont'];

    $date = date('y-m-d');

    $rtn = $_POST['rtnt'];
    $subtotal = $_POST['subtotalt'];
    $impuesto = $_POST['impuestot'];
    $ddescuento = $_POST['ddescuentot'];
    $tpagar = $_POST['tpagart'];
    $idusu = $_SESSION["idusu"];

    $consulta = "INSERT INTO facturas_venta(fecha_factura,rtn,subtotal,descuento,impuesto,total,id_cotizacion,id_usuario)
        VALUES('$date','$rtn',$subtotal,$ddescuento,$impuesto,$tpagar,$idcotizacion,$idusu);";
    mysqli_query($conn, $consulta);

    #estado 1 significa cotizacion finalizada
    $consulta2 = "UPDATE cotizaciones
    SET estado='1'
    WHERE id_cotizacion=$idcotizacion;";
    #recargamos la pagina

    mysqli_query($conn2, $consulta2);

    $consulta3 = "SELECT id_producto,cantidad FROM productos_cotizados WHERE id_cotizacion=$idcotizacion;";

    if ($result = $conn->query($consulta3)) {
        while ($row = $result->fetch_assoc()) {
            $id_producto = $row['id_producto'];
            $cantidadcoti = doubleval($row['cantidad']);

            $consulta4 = "SELECT cantidad_producto FROM inventario WHERE id_producto=$id_producto;";

            if ($result2 = $conn->query($consulta4)) {
                while ($row2 = $result2->fetch_assoc()) {

                    $cantidad_producto = doubleval($row2['cantidad_producto']);
                    $cantidad_nueva = $cantidad_producto - $cantidadcoti;

                    $consulta5 = "UPDATE inventario
                        SET cantidad_producto='$cantidad_nueva'
                        WHERE id_producto=$id_producto;";
                    #recargamos la pagina
                    mysqli_query($conn, $consulta5);
                }
                $result2->free();
            }
        }
        $result->free();
    }


    $consulta7 = "SELECT id_factura FROM facturas_venta  where id_cotizacion=$idcotizacion;";

    if ($result = $conn->query($consulta7)) {
        while ($row = $result->fetch_assoc()) {

            $id_factura = $row['id_factura'];

            $consulta = "INSERT INTO metodo_pago(metodo,cantidad,id_factura)
            VALUES('Tarjeta',$tpagar,$id_factura);";
            mysqli_query($conn, $consulta);
        }
        $result->free();
    }

    $bytes = openssl_random_pseudo_bytes(4);
    $pass = bin2hex($bytes);

    $codigocoti = $pass;

    $_SESSION['carrito'] = "$codigocoti";

    #estado 0 es en proceso esta 1 es finalizado
    $consulta77 = "INSERT  INTO cotizaciones(codigo,estado,total)
            VALUES('$pass',0,0);";
    mysqli_query($conn, $consulta77);

    $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
    VALUES('Genero Venta $idcotizacion','$fechadeaccion','$horadeaccion',$idususessionactiva);";
    mysqli_query($conn, $consulta69);
    header('Location: catalogo.php');
}


#genera envio y factura envio.
if (isset($_POST['envioyfacturaenv'])) {

    $midfactura = $_POST['midfactura'];
    $mfecha2 = $_POST['mfecha2'];
    $mdireccion = $_POST['mdireccion'];
    $mtelefono = $_POST['mtelefono'];
    $mrtn = $_POST['mrtn'];
    $subtotal = $_POST['subtotal'];
    $impuesto = $_POST['impuesto'];
    $ddescuento = $_POST['ddescuento'];
    $tpagar = $_POST['tpagar'];


    $fechasubir = date("y-m-d", strtotime($mfecha2));

    #estado envio 0= en proceso
    $consulta = "INSERT INTO envios(fecha_pedido,direccion,telefono,estado,id_factura)
        VALUES('$fechasubir','$mdireccion',$mtelefono,0,$midfactura);";
    mysqli_query($conn, $consulta);



    $consulta3 = "SELECT id_envios FROM envios WHERE id_factura=$midfactura;";

    if ($result = $conn->query($consulta3)) {
        while ($row = $result->fetch_assoc()) {
            $idenvio = $row['id_envios'];

            $consulta2 = "INSERT INTO factura_envio(rtn,subtotal,descuento,impuesto,total,id_envios)
            VALUES('$mrtn',$subtotal,$impuesto,$ddescuento,$tpagar,$idenvio);";
            mysqli_query($conn, $consulta2);
        }
        $result->free();
    }

    $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
    VALUES('Genero envio para factura $midfactura','$fechadeaccion','$horadeaccion',$idususessionactiva);";
    mysqli_query($conn, $consulta69);
    header('Location: fletes.php');
}



