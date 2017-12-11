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
        <li><a href="principal.php?nome=">Início</a></li>
        <li><a class="opcao_atual" href="carteira.php">Carteira</a></li>
        <li><a href="config.php">Configurações</a></li>
        <li><a href="sobre.php">Sobre</a></li>
        <li><a href="index.php">Sair</a></li>
      </ul>
    </div>

    <div class="div_geral">

      <div class="tela">

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['Dinheiro', 'Entrada e Saida'],
              ['Recebimentos',     <?php echo $_SESSION["total_recebimentos"];?>],
              ['Pagamentos',      <?php echo $_SESSION["total_pagamentos"];?>]
            ]);

            var options = {
              title: 'Movimentação de capital'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart.draw(data, options);
          }
        </script>
        <div id="piechart1" style="width: 40%; height: 40%;"></div>

        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['Dinheiro', 'Pagamentos'],
              ['Água',     <?php echo $_SESSION["agua"];?>],
              ['Luz',      <?php echo $_SESSION["luz"];?>],
              ['Telefone',     <?php echo $_SESSION["tel"];?>],
              ['Internet',     <?php echo $_SESSION["int"];?>],
              ['Televisão',     <?php echo $_SESSION["tv"];?>],
              ['Gás',     <?php echo $_SESSION["gas"];?>],
              ['Aluguel',     <?php echo $_SESSION["aluguel"];?>],
              ['Outros',     <?php echo $_SESSION["outros"];?>]
            ]);

            var options = {
              title: 'Tipos de pagamentos'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

            chart.draw(data, options);
          }
        </script>

        <div id="piechart2" style="width: 40%; height: 30%;"></div>

        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['Dinheiro', 'Recebimentos'],
              ['Salário',     <?php echo $_SESSION["receb_salario"];?>],
              ['Outros',      <?php echo $_SESSION["receb_outros"];?>]
            ]);

            var options = {
              title: 'Tipos de recebimentos'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

            chart.draw(data, options);
          }
        </script>
        <div id="piechart3" style="width: 40%; height: 30%;"></div>
      </div>

    </div>

  </body>

</html>
