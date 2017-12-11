<!DOCTYPE html>
<html>

  <head>

    <meta charset="utf-8">
    <title>Ruby</title>
    <link rel="stylesheet" href="css\principal.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <?php session_start(); ?>
  </head>

  <body>

    <div class="menu_lateral">
      <img src="imagens/usuario.png"><br>
      Olá, <?php echo $_SESSION["nome"]; ?>
      <ul>
        <li><a href="principal.php">Início</a></li>
        <li><a href="carteira.php">Carteira</a></li>
        <li><a class="opcao_atual" href="config.php">Configurações</a></li>
        <li><a href="sobre.php">Sobre</a></li>
        <li><a href="index.php">Sair</a></li>
      </ul>
    </div>

    <div class="div_geral">

      <div class="tela">

				<img class="usuario" src="imagens/usuario.png">
		<button class="button button8">ⵙ</button>
        <div class="config_conta">

          <form method="POST" action="alterar_cadastro.php">
          <u><b><font size="5">Alterar Configurações da Conta:</font></b></u><br><br>
          <b>Nome:</b> <input type="text" name="nome" value="<?php echo $_SESSION["nome"]; ?>"required><br><br><br>
          <b>Email:</b> <input type="email" name="email" value="<?php echo $_SESSION["email"]; ?>" required><br><br><br>
          <b>Senha:</b> <input type="password" name="senha" value="<?php echo $_SESSION["senha"]; ?>" required><br><br><br>
          <button class="button button7">Confirmar Alteração</button>
			<img class="seta" src="imagens/seta.png">


        </form>
        </div>
      </div>

    </div>

  </body>

</html>
