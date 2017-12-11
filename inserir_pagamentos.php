<?php


  include_once "bd.php";

  session_start();

  $data = strtotime($_POST["data"]);
  $data = date('Y-m-d', $data);

  $BD = new BD;
  $retorno = $BD->comando("INSERT INTO pagamentos (valor, data, id, tipo) VALUES (".$_POST["valor"].", '".$data."', ".$_SESSION["id"].", '".$_POST["tipo"]."')");
  echo "<script type='text/javascript'> document.location = 'atualizar_dados.php'; </script>";

?>
