<?php

date_default_timezone_set('America/Guatemala');

 $nombre="josue vargas medina zapata";

$separador = " ";
$separada = explode($separador, $nombre);



$fechadeaccion = date('y-m-d');
$horadeaccion = date("h:i:s");


print $fechadeaccion;


$token=bin2hex(openssl_random_pseudo_bytes(16))






?>