<!DOCTYPE html>
<html>

  <head>

    <meta charset="utf-8">
    <title>Ruby</title>
    <link rel="stylesheet" href="css\principal.css">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 <?php session_start(); ?>
  </head>

  <body class="roupa">

    <div class="menu_lateral" >

      <img src="imagens/usuario.png"><br>
      Olá, <?php echo $_SESSION["nome"]; ?>
      <ul>
        <li><a class="opcao_atual" href="principal.php">Início</a></li>
        <li><a href="carteira.php">Carteira</a></li>
        <li><a href="config.php">Configurações</a></li>
        <li><a href="sobre.php">Sobre</a></li>
        <li><a href="index.php">Sair</a></li>
      </ul>
    </div>

    <div class="div_geral">
      <div class="tela">
	  <div class="saldo">
       <br></br><center><font size="9"> Saldo:  R$ <b><?php echo $_SESSION["saldo"]; ?></b></font><br>
		  <form method="POST" action="atualizar_dados.php">
		 <br> <button class="button button1">Atualizar Saldo</button>
		</center>
          </form>
        </div>

		<div  class="recebimentos">
          <u><b><center><font size="5">Historico de recebimentos:</font></center></b> <br></u>
          <form method="POST" action="apagar_recebimentos.php">
            <b>Apagar:</b> <input type="number" name="numero" style="width: 10%" required>
            <br><button class="button button5">Remover Recebimento</button><br><br>
          </form>
          <form method="POST" action="inserir_recebimentos.php">
           <b>Inserir:</b> <input type="number" name="valor" style="width: 10%" placeholder="valor" required>
            <input type="date" name="data" required>
            <select name="tipo" required>
              <option>Salário</option>
              <option>Outros</option>
            </select>
            <button class="button button6">Inserir Recebimento</button>
          </form>
          <?php
          if(isset($_SESSION["pagamentos"])) {
            foreach($_SESSION["recebimentos"] as $x) {
              echo "NUM: ".$x["numero"]." DATA: ".$x["data"]." VALOR: ".$x["valor"]." TIPO: ".$x["tipo"]."<br>";
            }
          }
          ?>
        </div>
		<div class="pagamentos">
        <u><b><center> <font size="5"> Historico de pagamentos:	</font></center></b></u><br>
          <form method="POST" action="apagar_pagamentos.php">
           <center><b>Apagar:</b> <input type="number" name="numero" style="width: 10%" required>
            <br><button class="button button3">Remover Pagamento</button>
          </form>
          <form method="POST" action="inserir_pagamentos.php">
           <br><b>Inserir:</b> <input type="number" name="valor" style="width: 10%" placeholder="valor" required>
          <input type="date" name="data" required>
            <select name="tipo" required>
              <option>Água</option>
              <option>Luz</option>
              <option>Telefone</option>
              <option>Internet</option>
              <option>Televisão</option>
              <option>Gás</option>
              <option>Aluguel</option>
              <option>Outros</option>
            </select>
            <button class="button button4">Inserir Pagamento</button>
          </form></center>
          <?php
          if(isset($_SESSION["pagamentos"])) {
            foreach($_SESSION["pagamentos"] as $x) {
              echo "NUM: ".$x["numero"]." DATA: ".$x["data"]." VALOR: ".$x["valor"]." TIPO: ".$x["tipo"]."<br>";
            }
          }
          ?>
        </div>

        <div class="metas" >

         <center><font size="5"> <u><b>Metas</b></u></font><br><br><b>Meta:</b>  Juntar <?php echo $_SESSION["meta"]["valor"]; ?> reais<br></br>

          <form method="POST" action="alterar_metas.php">
            <b>Nova meta:</b> <input type="number" name="valor" placeholder="valor" style="width: 20%" required>
			<b>Status:</b> <?php echo ($_SESSION["meta"]["completa"]==0?"INCOMPLETA":"COMPLETA"); ?><br></center>
         <br>  <center> <button class="button button2">Atualizar Meta</button> </center>
          </form>
        </div>




      </div>
    </div>

  </body>

</html>
