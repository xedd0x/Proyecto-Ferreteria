<?php
#vincular el archivo de la BD
include 'conexion/conexion.php';

#incluimos la zona horaria
date_default_timezone_set('America/Guatemala');

session_start();

$idususessionactiva = $_SESSION["idusu"];
$fechadeaccion = date('y-m-d');
$horadeaccion = date("h:i:s");



#Modifica el empleado
if (isset($_POST['modificar_empleado'])) {
    $idempleado = $_POST['midemp'];
    $nombre = $_POST['mnombre'];
    $telefono = $_POST['mtelefono'];
    $identidad = $_POST['midentidad'];
    $email = $_POST['memail'];
    $direccion = $_POST['mdireccion'];
    $nacimiento = $_POST['mnacimiento'];
    $contratacion = $_POST['mcontratacion'];
    $genero = $_POST['mgeneroempleado'];
    $cargo = $_POST['mcargoempleado'];


    $consulta9 = "SELECT nombre_empleado,email FROM empleados;";
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
        echo '<script type="text/javascript">alert("Informacion ya esta en uso por otro empleado");</script>';
        echo '<script> window.location="gestion-empleados.php"; </script>';
    } else {


        $consulta = "UPDATE empleados
        SET nombre_empleado='$nombre', numero_identidad='$identidad', genero='$genero', n_telefono=$telefono, direccion='$direccion',
        email='$email', fecha_nacimiento='$nacimiento', fecha_contratacion='$contratacion', cargo='$cargo'
        WHERE id_empleado=$idempleado;";


        $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
        VALUES('Modifico empleado  $nombre','$fechadeaccion','$horadeaccion',$idususessionactiva);";
        mysqli_query($conn, $consulta69);

        mysqli_query($conn, $consulta);

        #recargamos la pagina
        header('Location: gestion-empleados.php');
    }
}


#modifica el usuario
if (isset($_POST['modificar_usuario'])) {
    $idusuario = $_POST['midus'];
    $nombreusu = $_POST['mnombreusu'];
    $contrasena = $_POST['mcontra'];
    $cargo = $_POST['mcargo'];
    $descripcion = $_POST['mdesc'];
    $hashed_pass = password_hash($contrasena, PASSWORD_DEFAULT);

    $consulta = "UPDATE usuarios
    SET nombre_usuario='$nombreusu', contrasena='$hashed_pass', tipo_rol='$cargo', descripcion='$descripcion'
    WHERE id_usuario=$idusuario;";
    #recargamos la pagina



    mysqli_query($conn, $consulta);

    $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
        VALUES('Modifico usuario $nombreusu','$fechadeaccion','$horadeaccion',$idususessionactiva);";
    mysqli_query($conn, $consulta69);

    header('Location: gestion-usuarios.php');
}

#modifica el proveedor
if (isset($_POST['modificar_prov'])) {
    $id_proveedor = $_POST['midprov'];
    $nombre_proveedor = $_POST['mnombreemp'];
    $telefono = $_POST['mtelefonoemp'];
    $email = $_POST['mcorreoemp'];
    $direccion = $_POST['mdireccionemp'];
    $encargado = $_POST['mnombreresp'];
    $telefono_encargado = $_POST['mtelefonoresp'];
    $comentarios = $_POST['mcomentarios'];


    $consulta9 = "SELECT nombre_proveedor FROM proveedores;";
    $centinela = "no";

    if ($result9 = $conn->query($consulta9)) {
        while ($row9 = $result9->fetch_assoc()) {
            #lectura datos de usuario
            $nombre_proveedors = $row9['nombre_proveedor'];


            if ($nombre_proveedors == $nombre_proveedo) {
                $centinela = "si";
            }
        }
        $result9->free();
    }


    if ($centinela == "si") {
        echo '<script type="text/javascript">alert("Otro proveedor ya utiliza la informacion");</script>';
        echo '<script> window.location="gestion-proveedores.php"; </script>';
    } else {


        $consulta = "UPDATE proveedores
        SET nombre_proveedor='$nombre_proveedor', telefono='$telefono', email='$email', direccion='$direccion', 
        encargado='$encargado', telefono_encargado='$telefono_encargado', comentarios='$comentarios'
        WHERE id_proveedor=$id_proveedor;";
        #recargamos la pagina


        mysqli_query($conn, $consulta);

        $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
            VALUES('Modifico proveedor $nombre_proveedor','$fechadeaccion','$horadeaccion',$idususessionactiva);";
        mysqli_query($conn, $consulta69);

        header('Location: gestion-proveedores.php');
    }
}

#modifica la informacion de muestra al publico
if (isset($_POST['modificar_informacion'])) {
    $idinfo = $_POST['midinfo'];
    $historia = $_POST['mhistoria'];
    $mensaje = $_POST['mmensaje'];



    $consulta = "UPDATE informacion_empresa
SET historia='$historia', mensaje='$mensaje'
WHERE id_informacion=$idinfo;";
    #recargamos la pagina


    mysqli_query($conn, $consulta);

    $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
    VALUES('Modifico informacion empresa','$fechadeaccion','$horadeaccion',$idususessionactiva);";
    mysqli_query($conn, $consulta69);

    header('Location: gestion-informacion.php');
}

#modifica las direcciones del negocio
if (isset($_POST['modificar_direccion'])) {
    $iddir = $_POST['middir'];
    $dir = $_POST['mdir'];
    $desc = $_POST['mdesc'];
    $longitud = $_POST['mlongitud'];
    $latitud = $_POST['mlatitud'];



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
        $consulta = "UPDATE direccion_negocios
        SET direccion='$dir', descripcion='$desc', longitud='$longitud', latitud='$latitud'
        WHERE id_direccion=$iddir;";
        #recargamos la pagina


        mysqli_query($conn, $consulta);

        $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
            VALUES('Modifico direccion $dir','$fechadeaccion','$horadeaccion',$idususessionactiva);";
        mysqli_query($conn, $consulta69);
        header('Location: gestion-informacion.php');
    }
}

#modifica el producto
if (isset($_POST['modificar_producto'])) {
    $midprod = $_POST['midprod'];
    $mcodprod = $_POST['mcodprod'];
    $mnom = $_POST['mnom'];
    $mprec = $_POST['mprec'];
    $mprev = $_POST['mprev'];
    $midprov = $_POST['midprov'];
    $mdesc = $_POST['mdesc'];
    $mimagen = $_POST['mimagen'];



    if (!empty($_FILES['mimagen']['name'])) {
        $foto = $_FILES['mimagen']['name'];
        $temporal = $_FILES['mimagen']['tmp_name'];
        $carpeta = '../Prototipo/img';
        $ruta = 'img/' . $foto;
        move_uploaded_file($temporal, $carpeta . '/' . $foto);



        $consulta = "UPDATE productos
    SET codigo='$mcodprod', nombre_producto='$mnom', precio_compra=$mprec, precio_venta=$mprev, 
    descripcion='$mdesc', foto='$ruta', id_proveedor=$midprov
    WHERE id_producto=$midprod;";
        #recargamos la pagina


        mysqli_query($conn, $consulta);

        $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
        VALUES('Modifico producto $mnom','$fechadeaccion','$horadeaccion',$idususessionactiva);";
        mysqli_query($conn, $consulta69);

        header('Location: gestion-productos.php');
    } else {




        $consulta = "UPDATE productos
    SET codigo='$mcodprod', nombre_producto='$mnom', precio_compra=$mprec, precio_venta=$mprev, 
    descripcion='$mdesc', id_proveedor=$midprov
    WHERE id_producto=$midprod;";

        mysqli_query($conn, $consulta);

        $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
        VALUES('Modifico producto $mnom','$fechadeaccion','$horadeaccion',$idususessionactiva);";
        mysqli_query($conn, $consulta69);

        header('Location: gestion-productos.php');
    }
}


#modifica el inventario de un producto
if (isset($_POST['modificar_inventario'])) {
    $id_inventario = $_POST['midinventario'];
    $cantidad_producto = $_POST['mcantinv'];
    $categoria = $_POST['mcategoria'];
    $fecha_ulti_ingreso = date('y-m-d');
    $cant_ulti_ingreso = $_POST['mcantiing'];

    $cantnueva = doubleval($cantidad_producto) + doubleval($cant_ulti_ingreso);


    $consulta = "UPDATE inventario
SET cantidad_producto=$cantnueva, categoria='$categoria', fecha_ulti_ingreso='$fecha_ulti_ingreso'
,cant_ulti_ingreso=$cant_ulti_ingreso 
WHERE id_inventario=$id_inventario;";


    mysqli_query($conn, $consulta);

    $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
    VALUES('Modifico inventario de $id_inventario','$fechadeaccion','$horadeaccion',$idususessionactiva);";
    mysqli_query($conn, $consulta69);

    #recargamos la pagina
    header('Location: gestion-inventario.php');
}

#modifica el envio
if (isset($_POST['modificarenvio'])) {
    $id_envio = $_POST['moidenvio'];
    $fecha = $_POST['mofecha'];
    $direccion = $_POST['modireccion'];
    $telefono = $_POST['motelefono'];



    $consulta = "UPDATE envios
SET fecha_pedido='$fecha', direccion='$direccion', 
    telefono=$telefono 
WHERE id_envios=$id_envio;";


    mysqli_query($conn, $consulta);

    $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
    VALUES('Modifico envio de $id_envio','$fechadeaccion','$horadeaccion',$idususessionactiva);";
    mysqli_query($conn, $consulta69);

    #recargamos la pagina
    header('Location: fletes.php');
}

#modifica el estado del envio cambiandolo de en proceso=0 a completado=1
if (isset($_POST['completarenvio'])) {
    $id_envio = $_POST['moidenvio'];
    $fecha = $_POST['mofecha'];
    $direccion = $_POST['modireccion'];
    $telefono = $_POST['motelefono'];



    $consulta = "UPDATE envios
SET estado=1
WHERE id_envios=$id_envio;";


    mysqli_query($conn, $consulta);

    $consulta69 = "INSERT INTO bitacora ( accion, fecha , hora, id_usuario )
    VALUES('Completo envio  $id_envio','$fechadeaccion','$horadeaccion',$idususessionactiva);";
    mysqli_query($conn, $consulta69);

    #recargamos la pagina
    header('Location: fletes.php');
}


if (isset($_POST['perfil'])) {
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
    header('Location: perfil.php');
}
