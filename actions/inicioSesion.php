<?php

  include "../base/Conexion.php";

  $param = "";
  $salidaJSON = "{\"res\":\"0\", \"msg\":\"LOS PARAMETROS NO SE RECIBIERON CORRECTAMENTE\"}";
  $param = $_GET["param"];
  $param = base64_decode($param);

  $email = strtok($param,"_");
  $pass = strtok("_");

  /*conexion a la abase de datos*/
  $conex = new Conexion();
  $conex->creaConexion();
  if($conex->getIsConnected()){
    $resultado = mysqli_query($conex->getConexion(), "select count(*) as existe from tusuarios where email = '".$email."' and contrasena = PASSWORD('".$pass."') ");
    if($resultado != false){
      $fila = $resultado->fetch_assoc();
      $existe = $fila["existe"];
      if($existe > 0){
        $resultado  = "";
        $sqlqry     = "select idusuario, email, nombre, apellidos, idestatus, telefono,fechareg from tusuarios where email = '".$email."' ";
        $resultado  = mysqli_query($conex->getConexion(), $sqlqry);
        if($resultado != false){
          $fila = $resultado->fetch_assoc();
          session_start();
          $_SESSION["idusuario"]  = $fila["idusuario"];
          $_SESSION["email"]      = $fila["email"];
          $_SESSION["nombre"]     = $fila["nombre"];
          $_SESSION["apellidos"]  = $fila["apellidos"];
          $_SESSION["telefono"]   = $fila["telefono"];
          $_SESSION["idestatus"]  = $fila["idestatus"];
          $_SESSION["fechareg"]   = $fila["fechareg"];

          $salidaJSON = "{\"res\":\"1\", \"msg\":\"BIENVENIDO!\"}";
        }else{
          $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO SE PUDO OBTENER LOS DATOS DEL USUARIO\"}";
        }
      }else{
        $salidaJSON = "{\"res\":\"0\", \"msg\":\"USUARIO Y CONTRASEÑA INCORRECTOS\"}";
      }
    }else{
      $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO SE PUDO VALIDAR LOS DATOS DEL USUARIO\"}";
    }
  }else{
    $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO HAY CONEXION CON LA BASE DE DATOS\"}";
  }
  echo $salidaJSON;

 ?>
