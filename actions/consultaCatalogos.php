<?php
  include "../base/Conexion.php";

  $salidaJSON = "{\"res\":\"0\", \"msg\":\"NO SE PUDO OBTENER LOS CATALOGOS\"}";
  $catEstatusIngreso = "";
  $catEstatusPagos = "";
  $catEstatusUsuarios = "";
  $catTipoIngreso = "";
  $catTipoPagos = "";

  $conex = new Conexion();
  $conex->creaConexion();
  if($conex->getIsConnected()){
    $resultado = mysqli_query($conex->getConexion(), "select idestatusingreso, estatusingreso from tcatestatusingreso order by idestatusingreso");
    if($resultado != false){
      $campos = $resultado->fetch_fields();
      while(($fila = mysqli_fetch_assoc($resultado))!=false){
          $filaaux = "";
          foreach($campos as $col){
            $filaaux .= ",\"".$col->name."\":\"".$fila[$col->name]."\" ";
          }
          $catEstatusIngreso .= ",{".substr($filaaux,1)."}";
      }
      $catEstatusIngreso = ",\"catalogoEstatusIngreso\":[".substr($catEstatusIngreso,1)."] ";
    }

    $resultado = mysqli_query($conex->getConexion(), "select idestatuspago, estatuspago from tcatestatuspago order by idestatuspago");
    if($resultado != false){
      $campos = $resultado->fetch_fields();
      while(($fila = mysqli_fetch_assoc($resultado))!=false){
          $filaaux = "";
          foreach($campos as $col){
            $filaaux .= ",\"".$col->name."\":\"".$fila[$col->name]."\" ";
          }
          $catEstatusPagos .= ",{".substr($filaaux,1)."}";
      }
      $catEstatusPagos = ",\"catalogoEstatusPagos\":[".substr($catEstatusPagos,1)."] ";
    }

    $resultado = mysqli_query($conex->getConexion(), "select idestatususuario, estatususuario from tcatestatususuarios order by idestatususuario");
    if($resultado != false){
      $campos = $resultado->fetch_fields();
      while(($fila = mysqli_fetch_assoc($resultado))!=false){
          $filaaux = "";
          foreach($campos as $col){
            $filaaux .= ",\"".$col->name."\":\"".$fila[$col->name]."\" ";
          }
          $catEstatusUsuarios .= ",{".substr($filaaux,1)."}";
      }
      $catEstatusUsuarios = ",\"catalogoEstatusUsuarios\":[".substr($catEstatusUsuarios,1)."] ";
    }

    $resultado = mysqli_query($conex->getConexion(), "select idtipoingreso, tipoingreso from tcattipoingreso order by idtipoingreso");
    if($resultado != false){
      $campos = $resultado->fetch_fields();
      while(($fila = mysqli_fetch_assoc($resultado))!=false){
          $filaaux = "";
          foreach($campos as $col){
            $filaaux .= ",\"".$col->name."\":\"".$fila[$col->name]."\" ";
          }
          $catTipoIngreso .= ",{".substr($filaaux,1)."}";
      }
      $catTipoIngreso = ",\"catalogoTipoIngreso\":[".substr($catTipoIngreso,1)."] ";
    }

    $resultado = mysqli_query($conex->getConexion(), "select idtipopago, tipopago from tcattipopagos order by idtipopago");
    if($resultado != false){
      $campos = $resultado->fetch_fields();
      while(($fila = mysqli_fetch_assoc($resultado))!=false){
          $filaaux = "";
          foreach($campos as $col){
            $filaaux .= ",\"".$col->name."\":\"".$fila[$col->name]."\" ";
          }
          $catTipoPagos .= ",{".substr($filaaux,1)."}";
      }
      $catTipoPagos = ",\"catalogoTipoPagos\":[".substr($catTipoPagos,1)."] ";
    }

    $salidaJSON = "{\"res\":\"1\", \"msg\":\"CATALOGOS OBTENIDOS\"".$catTipoPagos.$catTipoIngreso.$catEstatusPagos.$catEstatusIngreso.$catEstatusUsuarios."}";

  }

  echo ($salidaJSON);

 ?>
