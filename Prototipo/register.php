<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear nuevo usuario!</h1>
                            </div>
                            <form class="user" method="post" action="crudclientes.php" >



                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nombre" name="nombre" required="" pattern="[A-Za-z\s]+" placeholder="Nombre completo." title="Solo se permite letras y espacios.">
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="telefono" name="telefono" required="" pattern="[0-9]+" maxlength="8" minlength="8" placeholder="Número de teléfono." 
                                        title="Solo se permiten número y deben ser 8 en total.">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="identidad" name="identidad" required="" pattern="[0-9]+" maxlength="13" minlength="13" placeholder="Número de identidad." title="Solo se permiten número y deben ser 13 en total.">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" required="" placeholder="Email">
                                </div>

                                <div class="form-group ">
                                    <label for="inputAddress2">Seleccione su Género</label>
                                    <div class="dropdown no-arrow mb-4">
                                        <select name="genero" id="genero" class="btn btn-secondary dropdown-toggle" >
                                            <option value="hombre">Hombre</option>
                                            <option value="mujer">Mujer</option>
                                            <option value="otro">Otro</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                <input type="password" class="form-control form-control-user" required="" id="contra1" name="contra1" placeholder="Contraseña" pattern="^(?=(?:.*\d){1})(?=(?:.*[A-Z]){1})(?=(?:.*[a-z]){1})\S{8,}$" title="La contraseña debe contener al menos 8 dígitos, una letra mayúscula, una minúscula y uno número.">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" name="agregarclie">Generar usuario</button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">¿Ya cuenta con un usuario? ¡Inicie sesión!</a>
                            </div>
                        </div>
                    </div>
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

    <!-- verificar contrasena-->


</body>

</html>