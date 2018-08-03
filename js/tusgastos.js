var tusgastos;
(function(){
    tusgastos = angular.module('tusgastos', ['chieffancypants.loadingBar', 'chart.js']);
    var gblidusuario = "";
    var gblemail = "";
    var gblnombre = "";
    var gblapellidos = "";

    var labelsPie = "";
    var datosPie = "";
    var optionsPie = "";


    tusgastos.directive('calendar', function(){
        return{
            require: 'ngModel',
            link: function(scope, el, attr, ngModel){
             $(el).datepicker({
                 dateFormat: 'yy-mm-dd',
                 onSelect: function(dateText){
                     scope.$apply(function (){
                         ngModel.$setViewValue(dateText);
                     });
                 }
             });
            }
        };
     });

    tusgastos.controller('fechaController', function($scope){

    });

    tusgastos.controller('InicioSesionController', function($scope, $http, $window){
        var datosraw = "";
        var inicioSesion = {
            txtLogin: ''
            ,txtPass: ''
        };

        $scope.iniciaSesion = function(){
            try{
              var param = encode64($scope.inicioSesion.txtLogin+"_"+$scope.inicioSesion.txtPass);
              $http({
                  method: 'GET'
                  ,url: 'actions/inicioSesion.php?param='+param
              }).then(function successCallback(response) {
                  $scope.datosraw = response.data;
                  if(($scope.datosraw.res === "1")||($scope.datosraw.res === 1)){
                    var rnd = Math.floor((Math.random() * 10000000) + 1);
                    var param = encode64($scope.inicioSesion.txtLogin+"_"+rnd);
                    $window.location.href="principal.php?param="+param;
                  }else{
                    alert($scope.datosraw.msg);
                  }
              }, function errorCallback(response) {
                  alert("en el error: " + JSON.stringify(response));
              });
            }catch(ex){
              console.log("excepcion General: " + ex.message);
            }
          };
    });


    tusgastos.controller('DashboardController', function($scope, $http, $window){
      var datosraw = "";
      var labelsPie = "";
      var datosPie = "";
      var optionsPie = "";

      $scope.cargaGraficas = function(){

        try{
          var param = encode64($scope.gblidusuario+'_');

          $http({
            method: 'GET'
            ,url: 'actions/cargaDashboard.php?param='+param
          }).then(function successCallback(response){
            $scope.datosraw = response.data;
            if(($scope.datosraw.res === "1")||($scope.datosraw.res === 1)){
              $scope.labelsPie = $scope.datosraw.graficaPie.labelsPie;
              $scope.datosPie = $scope.datosraw.graficaPie.datosPie;
            }else{
              alert($scope.datosraw.msg);
            }
          }, function errorCallback(response){
            console.log("Excepcion cargando las graficas: " + ex);
          });
        }catch(ex){

        }
      }

    });


    tusgastos.controller('IngresosController', function($scope, $http, $window){
        var datosraw = "";
        var nuevoPago = {
          txtConcepto:''
          ,cmbPago:'99'
          ,txtMonto:'0'
          ,txtIva:'0'
          ,txtTotal:'0'
          ,txtComentarios:'-'
        };
        var nuevoIngreso = {
          txtConcepto:''
          ,cmbIngreso:'99'
          ,txtMonto:'0'
          ,txtIva:'0'
          ,txtTotal:'0'
          ,txtComentarios:'-'
        };
        var listaPagos = [];
        var lstTiposPagos = [];
        var lstEstatusPagos  = [];
        var listaIngresos = [];
        var lstTiposIngresos = [];
        var lstEstatusIngresos  = [];


        $scope.consultaCatalogos = function(){
          try{
            $scope.limpiaCampos();
            $scope.buscarIngreso();
            param = encode64($scope.gblidusuario+"_");
            $http({
              method: 'GET'
              ,url: 'actions/consultaCatalogos.php?param='+param
            }).then(function successCallback(response){
              $scope.datosraw = response.data;
              if(($scope.datosraw.res === "1")||($scope.datosraw.res === 1)){
                $scope.lstTiposPagos = $scope.datosraw.catalogoTipoPagos;
                $scope.lstEstatusPagos = $scope.datosraw.catalogoEstatusPagos;
                $scope.lstTiposIngresos = $scope.datosraw.catalogoTipoIngreso;
                $scope.lstEstatusIngresos = $scope.datosraw.catalogoEstatusIngreso;
              }else{
                alert($scope.datosraw.msg);
              }
            }, function errorCallback(response){
              alert("en el error: " + JSON.stringify(response));
            });
          }catch(ex){
            console.log("Excepcion general ingresos: " + ex.message);
          }
        };

        $scope.limpiaCampos = function(){
          $scope.nuevoIngreso = {txtConcepto:''
          ,cmbIngreso:'99'
          ,txtMonto:'0'
          ,txtIva:'0'
          ,txtTotal:'0'
          ,txtComentarios:'-'};
        };

        $scope.guardaIngreso = function(){
          try{
            param = encode64($scope.nuevoIngreso.txtConcepto+"_"+$scope.nuevoIngreso.cmbIngreso
                            +"_"+$scope.nuevoIngreso.txtMonto+"_"+$scope.nuevoIngreso.txtIva
                            +"_"+$scope.nuevoIngreso.txtTotal+"_"+$scope.nuevoIngreso.txtComentarios+"_"+$scope.gblidusuario);
            $http({
              method:'GET'
              ,url:'actions/guardaIngreso.php?param='+param
            }).then(function successCallback(response){
              $scope.datosraw = response.data;
              if(($scope.datosraw.res === "1")||($scope.datosraw.res === 1)){
                $scope.buscarIngreso();
                $scope.limpiaCampos();
                $scope.broadcast();
              }
            }, function errorCallback(response){
                alert("En el error guardando ingresos: " + JSON.stringify(response));
            });
          }catch(ex){
            console.log("Excepcion general guardando ingreso: " + ex);
          }
        };


        $scope.buscarIngreso = function(){
          try{
            param = encode64($scope.gblidusuario+"_");
            $http({
              method:'GET'
              ,url:'actions/buscaIngreso.php?param='+param
            }).then(function successCallback(response){
              $scope.datosraw = response.data;
              if(($scope.datosraw.res === "1")||($scope.datosraw.res === 1)){
                $scope.listaIngresos = $scope.datosraw.listaIngresos;
              }else{
                alert($scope.datosraw.msg);
              }
            }, function errorCallback(response){
              alert("En el error buscando ingresos: " + JSON.stringify(response));
            });
          }catch(ex){
            console.log("Excepcion general buscando ingresos: " + ex);
          }
        };


    });


    tusgastos.controller('PagosController', function($scope, $http, $window){
        var datosraw = "";
        var nuevoPago = {
          txtConcepto:''
          ,cmbPago:'99'
          ,txtMonto:'0'
          ,txtIva:'0'
          ,txtTotal:'0'
          ,txtComentarios:'-'
        };
        var nuevoIngreso = {
          txtConcepto:''
          ,cmbIngreso:'99'
          ,txtMonto:'0'
          ,txtIva:'0'
          ,txtTotal:'0'
          ,txtComentarios:'-'
        };
        var listaPagos = [];
        var lstTiposPagos = [];
        var lstEstatusPagos  = [];
        var listaIngresos = [];
        var lstTiposIngresos = [];
        var lstEstatusIngresos  = [];


        $scope.consultaCatalogos = function(){
          try{
            $scope.limpiaCampos();
            $scope.buscarPago();
            param = encode64($scope.gblidusuario+"_");
            $http({
              method: 'GET'
              ,url: 'actions/consultaCatalogos.php?param='+param
            }).then(function successCallback(response){
              $scope.datosraw = response.data;
              if(($scope.datosraw.res === "1")||($scope.datosraw.res === 1)){
                $scope.lstTiposPagos = $scope.datosraw.catalogoTipoPagos;
                $scope.lstEstatusPagos = $scope.datosraw.catalogoEstatusPagos;
                $scope.lstTiposIngresos = $scope.datosraw.catalogoTipoIngreso;
                $scope.lstEstatusIngresos = $scope.datosraw.catalogoEstatusIngreso;
              }else{
                alert($scope.datosraw.msg);
              }
            }, function errorCallback(response){
              alert("en el error: " + JSON.stringify(response));
            });
          }catch(ex){
            console.log("Excepcion general pago: " + ex.message);
          }
        };

        $scope.limpiaCampos = function(){
          $scope.nuevoPago = {txtConcepto:''
          ,cmbPago:'99'
          ,txtMonto:'0'
          ,txtIva:'0'
          ,txtTotal:'0'
          ,txtComentarios:'-'};
        };

        $scope.guardaPago = function(){
          try{
            param = encode64($scope.nuevoPago.txtConcepto+"_"+$scope.nuevoPago.cmbPago
                            +"_"+$scope.nuevoPago.txtMonto+"_"+$scope.nuevoPago.txtIva
                            +"_"+$scope.nuevoPago.txtTotal+"_"+$scope.nuevoPago.txtComentarios+"_"+$scope.gblidusuario);
            $http({
              method:'GET'
              ,url:'actions/guardaGasto.php?param='+param
            }).then(function successCallback(response){
              $scope.datosraw = response.data;
              //alert($scope.datosraw.msg);
              if(($scope.datosraw.res === "1")||($scope.datosraw.res === 1)){
                $scope.buscarPago();
                $scope.limpiaCampos();
              }
            }, function errorCallback(response){
                alert("En el error guardando ingresos: " + JSON.stringify(response));
            });
          }catch(ex){
            console.log("Excepcion general guardando ingreso: " + ex);
          }
        }

        $scope.buscarPago = function(){
          try{
            param = encode64($scope.gblidusuario+"_");
            $http({
              method:'GET'
              ,url:'actions/buscaGastos.php?param='+param
            }).then(function successCallback(response){
              $scope.datosraw = response.data;
              if(($scope.datosraw.res === "1")||($scope.datosraw.res === 1)){
                $scope.listaPagos = $scope.datosraw.listaPagos;
              }else{
                alert($scope.datosraw.msg);
              }
            }, function errorCallback(response){
              alert("En el error buscando ingresos: " + JSON.stringify(response));
            });
          }catch(ex){
            console.log("Excepcion general buscando ingresos: " + ex);
          }
        }


    });

    tusgastos.controller('CatalogosController', function($scope, $http, $window){
        var datosraw = "";
        var tipoPago = {};
        var tipoIngreso = {};
        var lstTiposPagos = [];
        var lstEstatusPagos  = [];
        var lstTiposIngresos = [];
        var lstEstatusIngresos  = [];


        $scope.consultaCatalogos = function(){
          try{
            param = encode64($scope.gblidusuario+"_");
            $http({
              method: 'GET'
              ,url: 'actions/consultaCatalogos.php?param='+param
            }).then(function successCallback(response){
              $scope.datosraw = response.data;
              if(($scope.datosraw.res === "1")||($scope.datosraw.res === 1)){
                $scope.lstTiposPagos = $scope.datosraw.catalogoTipoPagos;
                $scope.lstEstatusPagos = $scope.datosraw.catalogoEstatusPagos;
                $scope.lstTiposIngresos = $scope.datosraw.catalogoTipoIngreso;
                $scope.lstEstatusIngresos = $scope.datosraw.catalogoEstatusIngreso;
              }else{
                alert($scope.datosraw.msg);
              }
            }, function errorCallback(response){
              alert("en el error: " + JSON.stringify(response));
            });
          }catch(ex){
            console.log("Excepcion general pago: " + ex.message);
          }
        };

        $scope.nuevoTipoIngreso = function(){
          $scope.tipoIngreso = {};
        };

        $scope.nuevoTipoPago = function(){
          $scope.tipoPago = {};
        };

        $scope.guardaTipoPago = function(){
          try{
            alert(JSON.stringify($scope.tipoPago));
          }catch(ex){
            console.log("Excepcion general guardando tipo pago: " + ex);
          }
        }

        $scope.guardaTipoIngreso = function(){
          try{
            alert(JSON.stringify($scope.tipoIngreso));
          }catch(ex){
            console.log("Excepcion general guardando tipo ingreso: " + ex);
          }
        }

        $scope.buscarPago = function(){
          try{
            alert("Buscando Pagos");
          }catch(ex){

          }
        }


    });







})();
