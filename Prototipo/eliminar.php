<?php
#vincular el archivo de la BD
include 'conexion/conexion.php';

#incluimos la zona horaria
date_default_timezone_set('America/Guatemala');

session_start();

$idususessionactiva = $_SESSION["idusu"];
$fechadeaccion = date('y-m-d');
$horadeaccion = date("h:i:s");


#elimina al empleado y a su usuario
if (isset($_POST['delete_empleado'])) {
    $idbor = $_POST['idborraremp'];


    $consulta = "DELETE FROM empleados WHERE id_empleado=$idbor;";
    mysqli_query($conn, $consulta);

    $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
    VALUES('Elimino empleado y usuario $idbor','$fechadeaccion','$horadeaccion',$idususessionactiva);";
    mysqli_query($conn, $consulta69);

    #recargamos la pagina
    header('Location: gestion-empleados.php');
}

#elimina al proveedor y los productos relacionados con el
if (isset($_POST['delete_proveedor'])) {
    $idbor = $_POST['idborrarprov'];


    $consulta = "DELETE FROM proveedores WHERE id_proveedor=$idbor;";
    mysqli_query($conn, $consulta);

    $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
    VALUES('Elimino proveedor $idbor','$fechadeaccion','$horadeaccion',$idususessionactiva);";
    mysqli_query($conn, $consulta69);

    #recargamos la pagina
    header('Location: gestion-proveedores.php');
}

#elimina una direccion de local
if (isset($_POST['delete_direccion'])) {
    $idbor = $_POST['idborrardireccion'];


    $consulta = "DELETE FROM direccion_negocios WHERE id_direccion=$idbor;";
    mysqli_query($conn, $consulta);

    $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
    VALUES('Elimino direccion $idbor','$fechadeaccion','$horadeaccion',$idususessionactiva);";
    mysqli_query($conn, $consulta69);

    #recargamos la pagina
    header('Location: gestion-informacion.php');
}

#elimina del carrito un producto cotizado y devuelve a catalogo
if (isset($_POST['delete_prodcoticata'])) {
    $id_cotizacion = $_POST['id_cotizacion'];
    $id_producto = $_POST['id_producto'];


    $consulta = "DELETE FROM productos_cotizados WHERE id_cotizacion=$id_cotizacion and id_producto=$id_producto;";
    mysqli_query($conn, $consulta);

    #recargamos la pagina
    header('Location: catalogo.php');
}

#elimina del carrito un producto cotizado y devuelve a tienda
if (isset($_POST['delete_prodcoticatacli'])) {
    $id_cotizacion = $_POST['id_cotizacion'];
    $id_producto = $_POST['id_producto'];


    $consulta = "DELETE FROM productos_cotizados WHERE id_cotizacion=$id_cotizacion and id_producto=$id_producto;";
    mysqli_query($conn, $consulta);

    #recargamos la pagina
    header('Location: tienda.php');
}


#elimina del carrito un producto cotizado y devuelve a cotizacion espera
if (isset($_POST['delete_prodcoticotiesp'])) {
    $id_cotizacion = $_POST['id_cotizacion'];
    $id_producto = $_POST['id_producto'];


    $consulta = "DELETE FROM productos_cotizados WHERE id_cotizacion=$id_cotizacion and id_producto=$id_producto;";
    mysqli_query($conn, $consulta);

    #recargamos la pagina
    header('Location: cotizacion-espera.php');
}

#elimina del carrito un producto cotizado y devuelve a cotizacion venta
if (isset($_POST['delete_prodcotiventa'])) {
    $id_cotizacion = $_POST['id_cotizacion'];
    $id_producto = $_POST['id_producto'];


    $consulta = "DELETE FROM productos_cotizados WHERE id_cotizacion=$id_cotizacion and id_producto=$id_producto;";
    mysqli_query($conn, $consulta);

    #recargamos la pagina
    header('Location: cotizacion-venta.php');
}


#elimina un envio y su factura
if (isset($_POST['delete_envio'])) {
    $idborrarenvf = $_POST['idborrarenvf'];
    $idborrarenv = $_POST['idborrarenv'];


    $consulta = "DELETE FROM envios WHERE id_envios=$idborrarenv ;";
    mysqli_query($conn, $consulta);


    $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
        VALUES('Elimino envio $idbor','$fechadeaccion','$horadeaccion',$idususessionactiva);";
    mysqli_query($conn, $consulta69);

    #recargamos la pagina
    header('Location: fletes.php');
}
