<?php


  include_once "bd.php";

  session_start();

  $BD = new BD;

  $retorno = $BD->comando("UPDATE metas SET valor = ".$_POST["valor"]." WHERE id = ".$_SESSION["id"]);

  if(isset($retorno)) {
    $BD->comando("UPDATE metas SET valor = ".$_POST["valor"]." WHERE id = ".$_SESSION["id"]);
  }
  else {
    $BD->comando("INSERT INTO metas (id, valor, completa) VALUES (".$_SESSION["id"].", ".$_POST["valor"].", 0)");
  }
  echo "<script type='text/javascript'> document.location = 'atualizar_dados.php'; </script>";

?>
