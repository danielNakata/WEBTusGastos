<?php
  include "../base/Conexion.php";

  $param = "";
  $salidaJSON = "{\"res\":\"0\", \"msg\":\"LOS PARAMETROS NO SE RECIBIERON CORRECTAMENTE\"}";
  $param = $_GET["param"];
  $param = base64_decode($param);

  $txtIdUsuario = strtok($param,"_");

  $listaIngresos = "";

  $conex = new Conexion();
  $conex->creaConexion();
  if($conex->getIsConnected()){
    $resultado = mysqli_query($conex->getConexion(), "SELECT * FROM tgastos WHERE idusuario = ".$txtIdUsuario." order by idgasto desc ");
    if($resultado != false){
      $campos = $resultado->fetch_fields();
      while(($fila = mysqli_fetch_assoc($resultado))!=false){
        $filaaux = "";
        foreach($campos as $col){
          $filaaux .= ",\"".$col->name."\":\"".$fila[$col->name]."\" ";
        }
        $listaIngresos .= ",{".substr($filaaux,1)."}";
      }
      $listaIngresos = ",\"listaPagos\":[".substr($listaIngresos,1)."] ";
      $salidaJSON = "{\"res\":\"1\", \"msg\":\"LISTA DE GASTOS OBTENIDA\"".$listaIngresos."}";
    }else{
      $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO SE PUDO OBTENER LA LISTA DE GASTOS DEL USUARIO\"}";
    }
  }else{
    $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO SE PUDO CONECTAR A LA BASE DE DATOS\"}";
  }

  echo $salidaJSON;

 ?>
