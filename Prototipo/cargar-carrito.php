<?php
#vincular el archivo de la BD
include 'conexion/conexion.php';

#incluimos la zona horaria
date_default_timezone_set('America/Guatemala');

session_start();

if (isset($_POST['btncodigo'])) {

    $codigocoti = $_POST['codigo'];

    $_SESSION['carrito'] = "$codigocoti";
    header('Location: cotizacion-espera.php');
}
