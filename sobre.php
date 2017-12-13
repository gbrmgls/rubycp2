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
      <img class="container" src="<?php echo $_SESSION["foto"]; ?>"><br>

      Olá, <?php echo $_SESSION["nome"]; ?>
      <ul>
        <li><a href="principal.php">Início</a></li>
        <li><a href="carteira.php">Carteira</a></li>
        <li><a href="config.php">Configurações</a></li>
        <li><a class="opcao_atual" href="sobre.php">Sobre</a></li>
        <li><a href="index.php">Sair</a></li>
      </ul>
    </div>

    <div class="div_geral">

      <div class="tela">
        <div class="sobre">

        <b> <center> A Carteira Virtual Ruby tem o objetivo de auxiliar o usuário na tarefa de
          gerenciar seus gastos e ganhos, tornando assim mais fácil a visualização do fluxo de capital.
          <br>
          <br>
          Gabriel Magalhães, Yago Delfino, Pedro de Campos, Pedro Alvarengal, Brenda Reis / IN311 / CP2 - CSC3

        </div>
      </div>

    </div>

  </body>

</html>
