<?php
  include "../base/Conexion.php";

  $param = "";
  $salidaJSON = "{\"res\":\"0\", \"msg\":\"LOS PARAMETROS NO SE RECIBIERON CORRECTAMENTE\"}";
  $param = $_GET["param"];
  $param = base64_decode($param);

  $txtIdUsuario = strtok($param,"_");
  $graficaPie = "";
  $labelsPie = "";
  $datosPie = "";

  $conex = new Conexion();
  $conex->creaConexion();
  if($conex->getIsConnected()){
    $sql = "select ifnull((select sum(total) from tgastos where idusuario = ".$txtIdUsuario."),0) as 'Gastos',
    ifnull((select sum(total) from tingresos where idusuario = ".$txtIdUsuario."),0) as 'Ingresos' ";
    $resultado = mysqli_query($conex->getConexion(), $sql);
    if($resultado != false){
      $campos = $resultado->fetch_fields();
      $filaaux = "";
      foreach($campos as $col){
        $filaaux .= ",\"".$col->name."\"";
      }
      $labelsPie = "[".substr($filaaux,1)."]";

      while(($fila = mysqli_fetch_assoc($resultado))!=false){
        $filaaux = "";
        foreach($campos as $col){
          $filaaux .= ",\"".$fila[$col->name]."\" ";
        }
      }
      $datosPie .= "[".substr($filaaux,1)."]";
      $graficaPie = ",\"graficaPie\": {\"labelsPie\":".$labelsPie.", \"datosPie\":".$datosPie."} ";
      $salidaJSON = "{\"res\":\"1\", \"msg\":\"DATOS OBTENIDOS\"".$graficaPie."}";
    }else{
      $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO SE PUDO OBTENER LOS DATOS REQUERIDOS\"}";
    }
  }else{
    $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO SE PUDO CONECTAR A LA BASE DE DATOS\"}";
  }

  echo $salidaJSON;
?>
