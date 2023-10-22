 <?php
#vincular el archivo de la BD
include 'conexion/conexion.php';

#incluimos la zona horaria
date_default_timezone_set('America/Guatemala');

session_start();

$fechadeaccion = date('y-m-d');
$horadeaccion = date("h:i:s");



 #ingresa un nuevo cliente y crear su usuario
 if (isset($_POST['agregarclie'])) {

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $identidad = $_POST['identidad'];
    $email = $_POST['email'];
    $genero = $_POST['generoempleado'];
    $contra1 = $_POST['contra1'];

    $hashed_pass = password_hash($contra1, PASSWORD_DEFAULT);


    $consulta9 = "SELECT nombre_cliente,email FROM clientes;";
    $centinela = "no";

    if ($result9 = $conn->query($consulta9)) {
        while ($row9 = $result9->fetch_assoc()) {
            #lectura datos de usuario
            $nombre_clientec = $row9['nombre_cliente'];
            $emailc = $row9['email'];

            if ($nombre_clientec == $nombre ||  $emailc == $email) {
                $centinela = "si";
            }
        }
        $result9->free();
    }


    if ($centinela == "si") {
        echo '<script type="text/javascript">alert("El cliente ya esta registrado");</script>';
        echo '<script> window.location="register.php"; </script>';
    } else {

        $consulta3 = "INSERT INTO usuarios (nombre_usuario,contrasena,tipo_rol,descripcion)
        VALUES('$email','$hashed_pass','cliente','cliente');";
        mysqli_query($conn, $consulta3);

        $consulta2 = "SELECT id_usuario,nombre_usuario FROM usuarios where nombre_usuario='$email';";

        if ($result = $conn->query($consulta2)) {
            while ($row = $result->fetch_assoc()) {

                #lectura datos de usuario
                $id_usuario = $row['id_usuario'];


                $consulta = "INSERT INTO clientes(nombre_cliente,numero_identidad,genero,n_telefono,email,id_usuario)
                VALUES('$nombre','$identidad','$genero',$telefono,'$email',$id_usuario);";
                mysqli_query($conn, $consulta);


                $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
                    VALUES('Se registro como cliente: $email','$fechadeaccion','$horadeaccion',$id_usuario);";
                mysqli_query($conn, $consulta69);


                header('Location: login.php');
            }
            $result->free();
        }
    }
}


if (isset($_POST['perfil-cliente'])) {

    $idususessionactiva = $_SESSION["idusu"];

    $nombrecomp = $_POST['nombrecomp'];
    $usuariocomp = $_POST['usuariocomp'];
    $contrascomp = $_POST['contrascomp'];
    $hashed_pass = password_hash($contrascomp, PASSWORD_DEFAULT);



    $consulta = "UPDATE usuarios
SET contrasena='$hashed_pass'
WHERE nombre_usuario='$usuariocomp';";


    mysqli_query($conn, $consulta);

    $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
    VALUES('Cambio su contraseña','$fechadeaccion','$horadeaccion',$idususessionactiva);";
    mysqli_query($conn, $consulta69);

    #recargamos la pagina
    header('Location: perfil-cliente.php');
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
    VALUES('Genero Venta $idcotizacion','$fechadeaccion','$horadeaccion',$idusu);";
    mysqli_query($conn, $consulta69);
    header('Location: tienda.php');
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
    VALUES('Genero Venta $idcotizacion','$fechadeaccion','$horadeaccion',$idusu);";
    mysqli_query($conn, $consulta69);
    header('Location: tienda.php');
}
 
 
 ?>