<?php


  include_once "bd.php";

  session_start();

  $BD = new BD;
  $comando =  "UPDATE usuarios set nome = '".$_POST["nome"]."', email = '".$_POST["email"]."', senha = '".$_POST["senha"]."'".
              "WHERE email = '".$_SESSION["email"]."'";
  $retorno = $BD->comando($comando);
  echo "<script type='text/javascript'> document.location = 'alteracao_efetuada.html'; </script>";

?>
