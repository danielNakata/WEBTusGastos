<?php



 ?>
 <div class="container" ng-controller="CatalogosController" ng-init="consultaCatalogos()">
   <div class="container">
     <h3>Catalogos Ingresos</h3>
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
