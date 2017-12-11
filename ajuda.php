<!DOCTYPE html>
<html>

  <head>

    <meta charset="utf-8">
    <title>Ruby</title>
    <link rel="stylesheet" href="css\principal.css">
    <?php session_start(); ?>

  </head>

  <body>

    <div class="menu_lateral">
      <img src="imagens/usuario.png"><br>
      Olá, <?php echo $_SESSION["nome"]; ?>
      <ul>
        <li><a class="opcao_atual" href="principal.php">Início</a></li>
        <li><a href="carteira.php">Carteira</a></li>
        <li><a href="config.php">Configurações</a></li>
        <li><a href="sobre.php">Sobre</a></li>
        <li><a href="ajuda.php">Ajuda</a></li>
        <li><a href="index.php">Sair</a></li>
      </ul>
    </div>

    <div class="div_geral">

      <div class="tela">
        <div class="ajuda">
        </div>
      </div>

    </div>

  </body>

</html>
