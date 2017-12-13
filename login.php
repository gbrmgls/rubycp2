<html>

  <head>
  </head>

  <body>

    <?php

      include_once "bd.php";

      session_start();

      $total_recebimentos = 0;
      $total_pagamentos = 0;

      $pag_vet=array();
      $receb_vet=array();

      $_SESSION["email"] = $_POST["email"];
      $_SESSION["senha"] = $_POST["senha"];

      $BD = new BD;
      $usuarios_bd = $BD->comando("SELECT * FROM usuarios WHERE email = '".$_POST["email"]."' AND senha = '".$_POST["senha"]."'");
      $usuario = $usuarios_bd->fetch_assoc();
      if($usuario["email"] == $_POST["email"] && $usuario["senha"] == $_POST["senha"]) {
        $_SESSION["nome"] = $usuario["nome"];
        $_SESSION["email"] = $usuario["email"];
        $_SESSION["senha"] = $usuario["senha"];
        $_SESSION["id"] = $usuario["id"];
        $_SESSION["foto"] = $usuario["foto"];

        $metas_bd = $BD->comando("SELECT * FROM metas WHERE id = '".$_SESSION["id"]."'");
        $meta = $metas_bd->fetch_assoc();
        $_SESSION["meta"] = $meta;

        $recebimentos_bd = $BD->comando("SELECT * FROM recebimentos WHERE id = '".$_SESSION["id"]."'");
        for($i = 0; $recebimentos = $recebimentos_bd->fetch_assoc(); $i++) {
          $receb_vet[$i] = $recebimentos;
        }
        $_SESSION["recebimentos"] = $receb_vet;

        $pagamentos_bd = $BD->comando("SELECT * FROM pagamentos WHERE id = '".$_SESSION["id"]."'");
        for($i = 0; $pagamentos = $pagamentos_bd->fetch_assoc(); $i++) {
          $pag_vet[$i] = $pagamentos;
        }
        $_SESSION["pagamentos"] = $pag_vet;

        $recebimento_bd = $BD->comando("SELECT * FROM recebimentos WHERE id = '".$_SESSION["id"]."'");
        $pagamento_bd = $BD->comando("SELECT * FROM pagamentos WHERE id = '".$_SESSION["id"]."'");

        while($recebimentos = $recebimento_bd->fetch_assoc()) {
          $total_recebimentos += $recebimentos["valor"];
        }

        while($pagamentos = $pagamento_bd->fetch_assoc()) {
          $total_pagamentos += $pagamentos["valor"];
        }

        $_SESSION["total_recebimentos"] = $total_recebimentos;
        $_SESSION["total_pagamentos"] = $total_pagamentos;
        $_SESSION["saldo"] = $total_recebimentos - $total_pagamentos;

        if($_SESSION["saldo"] >= $_SESSION["meta"]["valor"]) {
          $BD->comando("UPDATE metas SET completa = 1 WHERE id = ".$_SESSION["id"]."");
        }
        else {
          $BD->comando("UPDATE metas SET completa = 0 WHERE id = ".$_SESSION["id"]."");
        }

        $pag_agua = $BD->comando("SELECT SUM(valor) FROM pagamentos WHERE tipo = 'Água' AND id = ".$_SESSION["id"]);
        $_SESSION["agua"]= $pag_agua->fetch_assoc()["SUM(valor)"];

        $pag_luz = $BD->comando("SELECT SUM(valor) FROM pagamentos WHERE tipo = 'Luz' AND id = ".$_SESSION["id"]);
        $_SESSION["luz"]= $pag_luz->fetch_assoc()["SUM(valor)"];

        $pag_tel = $BD->comando("SELECT SUM(valor) FROM pagamentos WHERE tipo = 'Telefone' AND id = ".$_SESSION["id"]);
        $_SESSION["tel"]= $pag_tel->fetch_assoc()["SUM(valor)"];

        $pag_int = $BD->comando("SELECT SUM(valor) FROM pagamentos WHERE tipo = 'Internet' AND id = ".$_SESSION["id"]);
        $_SESSION["int"]= $pag_int->fetch_assoc()["SUM(valor)"];

        $pag_tv = $BD->comando("SELECT SUM(valor) FROM pagamentos WHERE tipo = 'Televisão' AND id = ".$_SESSION["id"]);
        $_SESSION["tv"]= $pag_tv->fetch_assoc()["SUM(valor)"];

        $pag_aluguel = $BD->comando("SELECT SUM(valor) FROM pagamentos WHERE tipo = 'Aluguel' AND id = ".$_SESSION["id"]);
        $_SESSION["aluguel"]= $pag_aluguel->fetch_assoc()["SUM(valor)"];

        $pag_gas = $BD->comando("SELECT SUM(valor) FROM pagamentos WHERE tipo = 'Gás' AND id = ".$_SESSION["id"]);
        $_SESSION["gas"]= $pag_gas->fetch_assoc()["SUM(valor)"];

        $pag_outros = $BD->comando("SELECT SUM(valor) FROM pagamentos WHERE tipo = 'Outros' AND id = ".$_SESSION["id"]);
        $_SESSION["outros"]= $pag_outros->fetch_assoc()["SUM(valor)"];

        $receb_salario = $BD->comando("SELECT SUM(valor) FROM recebimentos WHERE tipo = 'Salário' AND id = ".$_SESSION["id"]);
        $_SESSION["receb_salario"]= $receb_salario->fetch_assoc()["SUM(valor)"];

        $receb_outros = $BD->comando("SELECT SUM(valor) FROM recebimentos WHERE tipo = 'Outros' AND id = ".$_SESSION["id"]);
        $_SESSION["receb_outros"]= $receb_outros->fetch_assoc()["SUM(valor)"];

        echo "<script type='text/javascript'> document.location = 'principal.php'; </script>";
      }
      else {
        echo "<script type='text/javascript'> document.location = 'criar.html'; </script>";
      }

     ?>

  </body>

</html>
