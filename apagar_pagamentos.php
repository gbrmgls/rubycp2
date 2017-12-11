<?php


  include_once "bd.php";

  session_start();

  $BD = new BD;
  $retorno = $BD->comando("DELETE FROM pagamentos WHERE numero = ".$_POST["numero"]);
  echo "<script type='text/javascript'> document.location = 'atualizar_dados.php'; </script>";

?>
