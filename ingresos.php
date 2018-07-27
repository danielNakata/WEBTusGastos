<?php


?>
<div class="container" ng-controller="IngresosController" ng-init="consultaCatalogos()">
  <h3>Ingresos</h3>
  <table class="table">
    <tr>
      <td>

      </td>
      <td>
        <div style="display: box; float:right;">
          <button class="btn btn-primary" href="#" ng-click="buscarIngreso()">Buscar</button>
          <button class="btn btn-success" href="#" ng-click="guardaIngreso()">Guardar</button>
          <button class="btn btn-warning" href="#" ng-click="limpiaCampos()">Limpiar</button>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        Concepto:
      </td>
      <td>
        <input class="form form-control" type="text" name="txtConcepto" id="txtConcepto" ng-model="nuevoIngreso.txtConcepto" placeholder="Concepto del Ingreso" />
      </td>
    </tr>
    <tr>
      <td>
        Tipo:
      </td>
      <td>
        <select class="form form-control" name="cmbTipoIngreso" id="cmbIngreso" ng-model="nuevoIngreso.cmbIngreso">
          <option ng-repeat="item in lstTiposIngresos" value="{{item.idtipoingreso}}">{{item.tipoingreso}}</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>
        Monto:
      </td>
      <td>
        <input class="form form-control" style="text-align: right" type="text" name="txtMonto" id="txtMonto" ng-model="nuevoIngreso.txtMonto" placeholder="0.00" value="0.00" />
      </td>
    </tr>
    <tr>
      <td>
        IVA:
      </td>
      <td>
        <input class="form form-control" style="text-align: right" type="text" name="txtIva" id="txtIva" ng-model="nuevoIngreso.txtIva" placeholder="0.00" value="0.00" />
      </td>
    </tr>
    <tr>
      <td>
        Total:
      </td>
      <td>
        <input class="form form-control" style="text-align: right" type="text" name="txtTotal" id="txtTotal" ng-model="nuevoIngreso.txtTotal" placeholder="0.00" value="0.00" />
      </td>
    </tr>
  </table>
  <h3>Lista Ingresos</h3>
  <table class="table table-hover">
    <tr>
      <th>ID</th>
      <th>Usuario</th>
      <th>Fecha</th>
      <th>Concepto</th>
      <th>Tipo</th>
      <th>Monto</th>
      <th>IVA</th>
      <th>Total</th>
      <th>Estatus</th>
    </tr>
    <tr ng-repeat="fila in listaIngresos">
      <td>{{fila.idingreso}}</td>
      <td>{{fila.idusuario}}</td>
      <td>{{fila.fechareg}}</td>
      <td>{{fila.concepto}}</td>
      <td>{{fila.idtipo}}</td>
      <td>${{fila.monto|number:2}}</td>
      <td>${{fila.iva|number:2}}</td>
      <td>${{fila.total|number:2}}</td>
      <td>{{fila.idestatus}}</td>
    </tr>
  </table>
</div>
