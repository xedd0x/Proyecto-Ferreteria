<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    <link rel="stylesheet" href="../css/es.css">



    <title>Usuarios</title>
</head>

<br>
<div class="container is-fluid">


    <div class="col-xs-12">


        <h2>BUSCADOR POR FECHA CON PHP</h2>
        <br>

        <div>

            <style>
                th {
                    font-weight: bold;
                    color: white;
                }
            </style>

            <form action="" method="GET">

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">
                            <label><b>Del Dia</b></label>
                            <input type="date" name="from_date" value="<?php if (isset($_GET['from_date'])) {
                                                                            echo $_GET['from_date'];
                                                                        } ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><b> Hasta el Dia</b></label>
                            <input type="date" name="to_date" value="<?php if (isset($_GET['to_date'])) {
                                                                            echo $_GET['to_date'];
                                                                        } ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><b></b></label> <br>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
                </div>
                <br>
            </form>




            <table class="table table-striped" id="table_id">
                <thead>
                    <tr>
                        <th>ID factura</th>
                        <th>Fecha</th>
                        <th>RTN</th>
                        <th>Subtotal</th>
                        <th>Descuento</th>
                        <th>Impuesto </th>
                        <th>Total </th>
                        <th>ID cotización</th>
                        <th>Empleado</th>
                    </tr>
                </thead>
                <tbody>
                <tbody>
                    <tr>
                        <?php

                        if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
                            $from_date = $_GET['from_date'];
                            $to_date = $_GET['to_date'];




                            ##incluimos la conexion con la bd desde la clase conexion
                            include 'conexion/conexion.php';
                            #preparamos la consulta a realizar, mediante la funcion inner join llamaremos los campos cargo y jornada laboral de sus respectivas tablas
                            $consulta = "SELECT id_factura,fecha_factura,rtn,subtotal,descuento,impuesto, total,id_cotizacion,empleados.nombre_empleado
                        FROM facturas_venta
                        inner join usuarios
                        inner join empleados
                        ON usuarios.id_usuario=facturas_venta.id_usuario and usuarios.id_usuario=empleados.id_usuario
                        where fecha_factura BETWEEN '$from_date' AND '$to_date';";

                            if ($result = $conn->query($consulta)) {

                                ##seguidamente ejecutamos un while para que lea los datos fila por fila dentro el cual
                                ##mostraremos en la tabla mendiate el metoco echo
                                while ($row = $result->fetch_assoc()) {

                                    $id_factura = $row['id_factura'];

                                    $fecha_factura = $row['fecha_factura'];
                                    $latinfechan = date("d/m/Y", strtotime($fecha_factura));

                                    $rtn = $row['rtn'];
                                    $subtotal = $row['subtotal'];
                                    $descuento = $row['descuento'];
                                    $impuesto = $row['impuesto'];
                                    $total = $row['total'];
                                    $id_cotizacion = $row['id_cotizacion'];
                                    $nombre_empleado = $row['nombre_empleado'];


                        ?>



                                    <td><?php echo $id_factura ?></td>
                                    <td><?php echo $latinfechan ?></td>
                                    <td><?php echo $rtn ?></td>
                                    <td>L <?php echo number_format($subtotal, 2, '.', ',') ?></td>
                                    <td>L <?php echo number_format($descuento, 2, '.', ',')  ?></td>
                                    <td>L <?php echo number_format($impuesto, 2, '.', ',')  ?></td>
                                    <td>L <?php echo number_format($total, 2, '.', ',')  ?></td>
                                    <td><?php echo $id_cotizacion ?></td>
                                    <td><?php echo $nombre_empleado ?></td>


                    </tr>
        <?php

                                }
                                $result->free();
                            }
                            // endforeach
                        }
        ?>

        </tr>
                </tbody>
        </div>




</html>