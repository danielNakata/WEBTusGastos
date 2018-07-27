<?php


?>
<div class="container" ng-controller="PagosController" ng-init="consultaCatalogos()">
  <h1>Gastos</h1>
  <table class="table">
    <tr>
      <td>

      </td>
      <td>
        <div style="display: box; float:right;">
          <button class="btn btn-primary" href="#" ng-click="buscarPago()">Buscar</button>
          <button class="btn btn-success" href="#" ng-click="guardaPago()">Guardar</button>
          <button class="btn btn-warning" href="#" ng-click="limpiaCampos()">Limpiar</button>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        Concepto:
      </td>
      <td>
        <input class="form form-control" type="text" name="txtConcepto" id="txtConcepto" ng-model="nuevoPago.txtConcepto" placeholder="Concepto del Gasto" />
      </td>
    </tr>
    <tr>
      <td>
        Tipo:
      </td>
      <td>
        <select class="form form-control" name="cmbTipoPago" id="cmbPago" ng-model="nuevoPago.cmbPago">
          <option ng-repeat="item in lstTiposPagos" value="{{item.idtipopago}}">{{item.tipopago}}</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>
        Monto:
      </td>
      <td>

        <input class="form form-control" style="text-align: right" type="text" name="txtMonto" id="txtMonto" ng-model="nuevoPago.txtMonto" placeholder="0.00" value="0.00" />
      </td>
    </tr>
    <tr>
      <td>
        IVA:
      </td>
      <td>
        <input class="form form-control" style="text-align: right" type="text" name="txtIva" id="txtIva" ng-model="nuevoPago.txtIva" placeholder="0.00" value="0.00" />
      </td>
    </tr>
    <tr>
      <td>
        Total:
      </td>
      <td>
        <input class="form form-control" style="text-align: right" type="text" name="txtTotal" id="txtTotal" ng-model="nuevoPago.txtTotal" placeholder="0.00" value="0.00" />
      </td>
    </tr>
  </table>
  <h3>Lista Gastos</h3>
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
    <tr ng-repeat="fila in listaPagos">
      <td>{{fila.idgasto}}</td>
      <td>{{fila.idusuario}}</td>
      <td>{{fila.fechareg}}</td>
      <td>{{fila.concepto}}</td>
      <td>{{fila.idtipogasto}}</td>
      <td>${{fila.monto|number:2}}</td>
      <td>${{fila.iva|number:2}}</td>
      <td>${{fila.total|number:2}}</td>
      <td>{{fila.idestatus}}</td>
    </tr>
  </table>
</div>
