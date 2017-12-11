<html>

  <head>
  </head>

  <body>

    <?php

      include_once "bd.php";

      $nome = $_POST["nome"];
      $senha = $_POST["senha"];
      $email = $_POST["email"];

      $BD = new BD;
      $BD->comando("INSERT INTO usuarios (nome, senha, email) VALUES ('".$nome."', '".$senha."', '".$email."')");
      echo "<script type='text/javascript'> document.location = 'cadastro_efetuado.html'; </script>";
     ?>

  </body>

</html>
