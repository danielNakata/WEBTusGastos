<?php
    include "base/Conexion.php";

    $param = "";
    if(isset($_GET["param"])){
      $param = $_GET["param"];
      $param = base64_decode($param);
      $email = strtok($param,"_");
      $rnd = strtok("_");
      session_start();
      if(!isset($_SESSION["idusuario"])){
          header("Location: index.php");
      }
    }else{
      header("Location: index.php");
    }

?>
<html lang="es" ng-app="tusgastos">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

        <link rel="stylesheet" href="css/dashboard.css"/>
        <script type="text/javascript" src="js/angular.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery331min.js"></script>
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
    <body>
        <input type="hidden" id="txtparam1" name="txtparam1" ng-init="gblidusuario = <?php echo $_SESSION["idusuario"] ?>" ng-model="gblidusuario" ng-value="{{gblidusuario}}" />
        <input type="hidden" id="txtparam2" name="txtparam2" ng-init="gblemail = '<?php echo str_replace($_SESSION["email"],'@','_') ?>'" ng-model="gblemail" ng-value="{{gblemail}}" />
        <input type="hidden" id="txtparam3" name="txtparam3" ng-init="gblnombre = '<?php echo $_SESSION["nombre"] ?>'" ng-model="gblnombre" ng-value="{{gblnombre}}" />
        <input type="hidden" id="txtparam4" name="txtparam4" ng-init="gblapellidos='<?php echo $_SESSION["apellidos"] ?>'" ng-model="gblapellidos" ng-value="{{gblapellidos}}" />
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Tus Gastos</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Buscar" aria-label="Buscar">
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="#"><span data-feather="user"></span>{{gblnombre}} {{gblapellidos}}</a>
          </li>
        </ul>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
            <a class="nav-link" href="actions/cierraSesion.php">Salir</a>
            </li>
        </ul>
        </nav>

        <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" onclick="muestraDivMenuPrin('divMainDashboard')" >
                        <span data-feather="home"></span>
                        Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="muestraDivMenuPrin('divMainIngresos')" >
                        <span data-feather="file"></span>
                        Ingresos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="muestraDivMenuPrin('divMainGastos')">
                        <span data-feather="shopping-cart"></span>
                        Gastos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="muestraDivMenuPrin('divMainCatalogos')">
                        <span data-feather="users"></span>
                        Catalogos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="muestraDivMenuPrin('divMainReportes')">
                        <span data-feather="bar-chart-2"></span>
                        Reportes
                        </a>
                    </li>
                </ul>
            </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div id="contenido" class="container">
                    <div id="divMainDashboard" ng-include="'dashboard.php'" style="visibility: visible; height: auto;">
                    </div>
                    <div id="divMainIngresos" ng-include="'ingresos.php'" style="visibility: hidden; height: 0px;">
                    </div>
                    <div id="divMainGastos" ng-include="'gastos.php'" style="visibility: hidden; height: 0px;">
                    </div>
                    <div id="divMainCatalogos" ng-include="'catalogos.php'" style="visibility: hidden; height: 0px;">
                    </div>
                    <div id="divMainReportes" ng-include="'reportes.php'" style="visibility: hidden; height: 0px;">
                    </div>
                </div>

               </div>
            </main>
        </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->

        <!-- Icons -->
        <script>
          feather.replace();
        </script>
        <!-- Graphs -->

        <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
            labels: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
            datasets: [{
                data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                borderWidth: 4,
                pointBackgroundColor: '#007bff'
            }]
            },
            options: {
            scales: {
                yAxes: [{
                ticks: {
                    beginAtZero: true
                }
                }]
            },
            legend: {
                display: false,
            }
            }
        });
        </script>

    </body>
</html>
