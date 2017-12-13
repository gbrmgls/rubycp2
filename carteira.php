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
        <li><a href="principal.php?nome=">Início</a></li>
        <li><a class="opcao_atual" href="carteira.php">Carteira</a></li>
        <li><a href="config.php">Configurações</a></li>
        <li><a href="sobre.php">Sobre</a></li>
        <li><a href="index.php">Sair</a></li>
      </ul>
    </div>

    <div class="div_geral">

      <div class="tela">
        <!-- INÍCIO SCRIPT DOS GRÁFICOS////////////////////////////////////////////////////////// -->
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


        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['Dinheiro', 'Recebimentos'],
              ['Incompleto',     <?php echo $_SESSION["meta"]["valor"] - $_SESSION["saldo"];?>],
              ['Completo',      <?php echo $_SESSION["saldo"];?>,]
            ]);

            var options = {
              title: 'Andamento da Meta'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart4'));

            chart.draw(data, options);
          }
        </script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([

          ['Dinheiro', 'Pagamentos', { role: "style" }],
          ['Água',     <?php echo $_SESSION["agua"];?>, "blue"],
          ['Luz',      <?php echo $_SESSION["luz"];?>, "red"],
          ['Telefone',     <?php echo $_SESSION["tel"];?>, "yellow"],
          ['Internet',     <?php echo $_SESSION["int"];?>, "green"],
          ['Televisão',     <?php echo $_SESSION["tv"];?>, "pink"],
          ['Gás',     <?php echo $_SESSION["gas"];?>, "brown"],
          ['Aluguel',     <?php echo $_SESSION["aluguel"];?>, "purple"],
          ['Outros',     <?php echo $_SESSION["outros"];?>, "black"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                        { calc: "stringify",
                          sourceColumn: 1,
                          type: "string",
                          role: "annotation" },
                          2]);

                          var options = {
                            title: "Tipos de pagamentos",
                            width: 600,
                            height: 400,
                            bar: {groupWidth: "95%"},
                            legend: { position: "none" },
                          };
                          var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
      }
      </script>
      <!-- FIM SCRIPT DOS GRÁFICOS////////////////////////////////////////////////////////// -->

      <div id="piechart4" style="width: 40%; height: 30%;"></div>  <!-- GRAFICO DA META -->
      <div id="piechart3" style="width: 40%; height: 30%;"></div> <!-- GRAFICO DE RECEBIMENTOS -->
      <div id="piechart2" style="width: 40%; height: 30%;"></div> <!-- GRAFICO DE MOVIMENTACAO DE CAPITAL -->
      <div id="columnchart_values" style="width: 900px; height: 300px;"></div> <!-- GRAFICO DE PAGAMENTOS -->


      </div>
    </div>

  </body>

</html>
