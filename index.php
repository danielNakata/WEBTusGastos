<?php



?>
<html lang="es" ng-app="tusgastos">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Pagina para Control de Pagos de Patty">
        <meta name="author" content="Danweb">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <link rel="stylesheet" href="css/signin.css"/>
        <script type="text/javascript" src="js/angular.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery331min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/datetimepicker.js"></script>
        <script type="text/javascript" src="js/loading-bar.js"></script>
        <script type="text/javascript" src="js/common.js"></script>
        <script type="text/javascript" src="js/feathers.js"></script>
        <script type="text/javascript" src="js/init.js"></script>
        <script type="text/javascript" src="js/modernzr.js"></script>
        <script type="text/javascript" src="js/popper.js"></script>
        <script type="text/javascript" src="js/Chart.min.js"></script>
        <script type="text/javascript" src="js/angular-chart.js"></script>
        <script type="text/javascript" src="js/tusgastos.js"></script>
        <script type="text/javascript" src="js/funciones.js"></script>
    </head>
    <body ng-controller="InicioSesionController">
        <form class="form-signin">
        <img class="mb-4" src="https://i.pinimg.com/236x/03/c3/dd/03c3ddb0d453a726d771ae3167c6ec4c--hockey.jpg" alt="Dinero" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Tus Gastos!</h1>
        <label for="inputEmail" class="sr-only">Correo Electronico</label>
        <input type="email" id="txtLogin" name="txtLogin" ng-model="inicioSesion.txtLogin" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="txtPass" name="txtPass" ng-model="inicioSesion.txtPass" class="form-control" placeholder="Contrasena" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" ng-click="iniciaSesion()">Ingresar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
        </form>
    </body>
</html>
