<?php
include "../base/Conexion.php";

$param = "";
$salidaJSON = "{\"res\":\"0\", \"msg\":\"LOS PARAMETROS NO SE RECIBIERON CORRECTAMENTE\"}";
$param = $_GET["param"];
$param = base64_decode($param);

$txtConcepto = strtok($param,"_");
$cmbIngreso = strtok("_");
$txtMonto = strtok("_");
$txtIva = strtok("_");
$txtTotal = strtok("_");
$txtComentarios = strtok("_");
$txtIdUsuario = strtok("_");

$conex = new Conexion();
$conex->creaConexion();
if($conex->getIsConnected()){
    $sql = "SELECT IFNULL((SELECT MAX(idingreso) FROM tingresos WHERE idusuario = ".$txtIdUsuario."), 0) as existe ";
    echo "<br />".$sql;
    $resultado = mysqli_query($conex->getConexion(), $sql);
    if($resultado != false){
      $fila = $resultado->fetch_assoc();
      $max = $fila["existe"];
      if($max >= 0){
        $max = $max + 1;
        $sql = "INSERT INTO tingresos(idingreso, idusuario, concepto, monto, iva, otroimp, total, idtipo, idestatus, comentarios, fechareg) VALUES (".$max.",".$txtIdUsuario.", '".$txtConcepto."', ".$txtMonto.", ".$txtIva.", 0.00, ".$txtTotal.", ".$cmbIngreso.", 1, '-', CURRENT_TIMESTAMP) ";
        $resultado = mysqli_query($conex->getConexion(), $sql);
        if($resultado === true){
          $salidaJSON = "{\"res\":\"1\", \"msg\":\"INGRESO GUARDADO CORRECTAMENTE\"}";
        }else{
          $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO SE PUDO GUARDAR EL INGRESO CORRECTAMENTE\"}";
        }
      }
    }else{
      $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO SE PUDO OBTENER EL MAXIMO DE LOS INGRESOS\"}";
    }
}else{
  $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO SE PUDO CONECTAR A LA BASE DE DATOS\"}";
}

echo $salidaJSON;

?>
