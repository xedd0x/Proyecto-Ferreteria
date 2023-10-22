<?php
#vincular el archivo de la BD
include 'conexion/conexion.php';

date_default_timezone_set('America/Guatemala');

#Capturar datos de el usuario y contrasena
$posusu = $_POST['User'];
$pospass = $_POST['Password'];
#crear variable para ayudar a saber si se registro exitosamente o volver al login
$sentinela = "NO";


#consulta la base de datos
$consulta = "SELECT usuarios.id_usuario,nombre_usuario,contrasena,tipo_rol,descripcion
FROM usuarios;";


if ($result = $conn->query($consulta)) {
    while ($row = $result->fetch_assoc()) {

        #lectura datos de usuario
        $id_usuario = $row['id_usuario'];
        $nombre_usuario = $row['nombre_usuario'];

        $contrasena = $row['contrasena'];
        $tipo_rol = $row['tipo_rol'];

        $descripcion = $row['descripcion'];


        #verificacion usuario
        if ($posusu == $nombre_usuario and password_verify($pospass, $contrasena)) {
            if ($descripcion == "empleado") {


                $sentinela = "SI";

                session_start();
                $_SESSION["Usuario"] = $posusu;
                $_SESSION['idusu'] = $id_usuario;
                $_SESSION['rol'] = $tipo_rol;
                $_SESSION['descaut'] = $descripcion;

                $_SESSION['nomemp'] = "";

                $consulta9 = "SELECT nombre_empleado FROM empleados where id_usuario=$id_usuario;";
                if ($result9 = $conn->query($consulta9)) {
                    while ($row9 = $result9->fetch_assoc()) {
                        $nombre = $row9['nombre_empleado'];

                        $_SESSION['nomemp'] = $nombre;
                    }
                    $result9->free();
                }

                header('Location: index.php');
            } else {
                $sentinela = "SI";

                session_start();
                $_SESSION["Usuario"] = $posusu;
                $_SESSION['idusu'] = $id_usuario;
                $_SESSION['rol'] = $tipo_rol;
                $_SESSION['descaut'] = $descripcion;


                $_SESSION['nomemp'] = "";

                $consulta9 = "SELECT nombre_cliente FROM clientes where id_usuario=$id_usuario;";


                if ($result9 = $conn->query($consulta9)) {
                    while ($row9 = $result9->fetch_assoc()) {
                        $nombre = $row9['nombre_cliente'];

                        $_SESSION['nomemp'] = $nombre;
                    }
                    $result9->free();
                }

                header('Location: tienda.php');
            }
        }
    }
    if ($sentinela == "NO") {


        echo '<script type="text/javascript">alert("Usuario o contraseña incorrectos");</script>';
        echo '<script> window.location="login.php"; </script>';
    }

    $result->free();
}
