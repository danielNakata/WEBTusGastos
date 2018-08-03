<?php



 ?>
 <div class="container" ng-controller="CatalogosController" ng-init="consultaCatalogos()">
   <div class="container">

     <div id="idAcordeonIngresos">
       <div class="card">
         <div id="divEncabezadoIngresos"  class="card-header">
          <h3>
            <button class="btn btn-link" data-toggle="collapse" data-target="#divDetalleIngresos" aria-expanded="true" aria-controls="divDetalleIngresos">
              Ingresos
            </button>
          </h3>
        </div>
        <div id="divDetalleIngresos" class="collapse show" aria-labelledby="divEncabezadoIngresos" data-parent="idAcordeonIngresos">
          <div class="card-body">
            <table class="table table-hover">
              <tr>
                <th>ID</th>
                <th>Tipo Ingreso</th>
              </tr>
              <tr ng-repeat="fila in lstTiposIngresos">
                <td>{{fila.idtipoingreso}}</td>
                <td>{{fila.tipoingreso}}</td>
              </tr>
            </table>
          </div>
        </div>
       </div>
     </div>
   </div>


   <div class="container">
     <h3>Catalogos Gastos</h3>
     <table class="table table-hover">
       <tr>
         <th>ID</th>
         <th>Tipo Gasto</th>
       </tr>
       <tr ng-repeat="fila in lstTiposPagos">
         <td>{{fila.idtipopago}}</td>
         <td>{{fila.tipopago}}</td>
       </tr>
     </table>
   </div>


 </div>
