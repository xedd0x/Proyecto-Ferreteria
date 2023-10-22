<?php

#vincular el archivo de la BD
include 'conexion/conexion.php';
session_start();

if (isset($_POST['agregarc'])) {

    $cid_producto = $_POST['cid_producto'];
    $ccodigo = $_POST['ccodigo'];
    $cnombre_producto = $_POST['cnombre_producto'];
    $cprecio_venta = $_POST['cprecio_venta'];
    $ccantidadcompra = $_POST['ccantidadcompra'];






    #Se genera un nuevo carrito en caso de que no exista uno activo y se genera su cotizacion con el producto que se esta agregando
    if (!isset($_SESSION['carrito'])) {
        $bytes = openssl_random_pseudo_bytes(4);
        $pass = bin2hex($bytes);


        $_SESSION['carrito'] = "$pass";


        #estado 0 es en proceso esta 1 es finalizado
        $consulta = "INSERT  INTO cotizaciones(codigo,estado,total)
            VALUES('$pass',0,$cprecio_venta);";
        mysqli_query($conn, $consulta);

        $consulta2 = "SELECT id_cotizacion FROM cotizaciones WHERE codigo='$pass';";

        if ($result = $conn2->query($consulta2)) {
            while ($row = $result->fetch_assoc()) {

                #lectura datos de usuario
                $id_cotizacion = $row['id_cotizacion'];

                $consulta3 = "INSERT  INTO productos_cotizados(id_producto,cantidad,id_cotizacion)
            VALUES($cid_producto,$ccantidadcompra,$id_cotizacion);";

                mysqli_query($conn3, $consulta3);
                header('Location: catalogo.php');
            }
            $result->free();
        }
    }
    #Si el carrito ya existe solo guarda el producto en productos cotizados y  cotizacion
    else {

        $codigocoti = $_SESSION["carrito"];
        $cid_producto = $_POST['cid_producto'];
        $ccodigo = $_POST['ccodigo'];
        $cnombre_producto = $_POST['cnombre_producto'];
        $cprecio_venta = $_POST['cprecio_venta'];
        $ccantidadcompra = $_POST['ccantidadcompra'];



        $consulta9 = "SELECT id_producto FROM productos_cotizados inner join cotizaciones where codigo='$codigocoti' 
        and cotizaciones.id_cotizacion=productos_cotizados.id_cotizacion  ;
        ";
        $centinela = "no";

        if ($result9 = $conn->query($consulta9)) {
            while ($row9 = $result9->fetch_assoc()) {
                #lectura datos de usuario
                $id_productos = $row9['id_producto'];


                if ($id_productos == $cid_producto) {
                    $centinela = "si";
                }
            }
            $result9->free();
        }


        if ($centinela == "si") {
            echo '<script type="text/javascript">alert("El producto ya esta en el carrito");</script>';
            echo '<script> window.location="catalogo.php"; </script>';
        } else {

            $consulta2 = "SELECT id_cotizacion FROM cotizaciones WHERE codigo='$codigocoti';";


            if ($result = $conn2->query($consulta2)) {
                while ($row = $result->fetch_assoc()) {


                    #lectura datos de usuario
                    $id_cotizacion = $row['id_cotizacion'];

                    $consulta3 = "INSERT  INTO productos_cotizados(id_producto,cantidad,id_cotizacion)
        VALUES($cid_producto,$ccantidadcompra,$id_cotizacion);";
                    mysqli_query($conn3, $consulta3);
                    header('Location: catalogo.php');
                }
                $result->free();
            }
        }
    }
}


if (isset($_POST['agregarcclie'])) {

    $cid_producto = $_POST['cid_producto'];
    $ccodigo = $_POST['ccodigo'];
    $cnombre_producto = $_POST['cnombre_producto'];
    $cprecio_venta = $_POST['cprecio_venta'];
    $ccantidadcompra = $_POST['ccantidadcompra'];



    #falta el select para agregar el resultado total de la cotizacion


    #Se genera un nuevo carrio en caso de que no exista uno activo y se genera su cotizacion con el producto que se esta agregando
    if (!isset($_SESSION['carrito'])) {
        $bytes = openssl_random_pseudo_bytes(4);
        $pass = bin2hex($bytes);


        $_SESSION['carrito'] = "$pass";


        #estado 0 es en proceso esta 1 es finalizado
        $consulta = "INSERT  INTO cotizaciones(codigo,estado,total)
            VALUES('$pass',0,$cprecio_venta);";
        mysqli_query($conn, $consulta);

        $consulta2 = "SELECT id_cotizacion FROM cotizaciones WHERE codigo='$pass';";

        if ($result = $conn2->query($consulta2)) {
            while ($row = $result->fetch_assoc()) {

                #lectura datos de usuario
                $id_cotizacion = $row['id_cotizacion'];

                $consulta3 = "INSERT  INTO productos_cotizados(id_producto,cantidad,id_cotizacion)
            VALUES($cid_producto,$ccantidadcompra,$id_cotizacion);";

                mysqli_query($conn3, $consulta3);
                header('Location: tienda.php');
            }
            $result->free();
        }
    }
    #Si el carrito ya existe solo guarda el producto en productos cotizados y  cotizacion
    else {

        $codigocoti = $_SESSION["carrito"];
        $cid_producto = $_POST['cid_producto'];
        $ccodigo = $_POST['ccodigo'];
        $cnombre_producto = $_POST['cnombre_producto'];
        $cprecio_venta = $_POST['cprecio_venta'];
        $ccantidadcompra = $_POST['ccantidadcompra'];



        $consulta9 = "SELECT id_producto FROM productos_cotizados inner join cotizaciones where codigo='$codigocoti' 
        and cotizaciones.id_cotizacion=productos_cotizados.id_cotizacion  ;
        ";
        $centinela = "no";

        if ($result9 = $conn->query($consulta9)) {
            while ($row9 = $result9->fetch_assoc()) {
                #lectura datos de usuario
                $id_productos = $row9['id_producto'];


                if ($id_productos == $cid_producto) {
                    $centinela = "si";
                }
            }
            $result9->free();
        }


        if ($centinela == "si") {
            echo '<script type="text/javascript">alert("El producto ya esta en el carrito");</script>';
            echo '<script> window.location="tienda.php"; </script>';
        } else {

            $consulta2 = "SELECT id_cotizacion FROM cotizaciones WHERE codigo='$codigocoti';";


            if ($result = $conn2->query($consulta2)) {
                while ($row = $result->fetch_assoc()) {


                    #lectura datos de usuario
                    $id_cotizacion = $row['id_cotizacion'];

                    $consulta3 = "INSERT  INTO productos_cotizados(id_producto,cantidad,id_cotizacion)
        VALUES($cid_producto,$ccantidadcompra,$id_cotizacion);";
                    mysqli_query($conn3, $consulta3);
                    header('Location: tienda.php');
                }
                $result->free();
            }
        }
    }
}

#genera nuevo carrito
if (isset($_POST['nueva-coti'])) {

    $bytes = openssl_random_pseudo_bytes(4);
    $pass = bin2hex($bytes);

    #estado 0 es en proceso esta 1 es finalizado
    $consulta = "INSERT  INTO cotizaciones(codigo,estado,total)
            VALUES('$pass',0,0);";
    mysqli_query($conn, $consulta);


    $_SESSION['carrito'] = "$pass";
    header('Location: catalogo.php');
}
