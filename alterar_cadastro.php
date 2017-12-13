<?php


  include_once "bd.php";

  session_start();

  $pasta = "fotos/";
  $foto = $pasta . basename($_FILES["foto"]["name"]);
  move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);

  $BD = new BD;
  $comando =  "UPDATE usuarios set nome = '".$_POST["nome"]."', email = '".$_POST["email"]."', senha = '".$_POST["senha"]."', foto = '".$foto."'".
              "WHERE email = '".$_SESSION["email"]."'";
  $retorno = $BD->comando($comando);
  echo "<script type='text/javascript'> document.location = 'alteracao_efetuada.html'; </script>";

?>
