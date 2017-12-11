<html>

  <head>

    <title>Ruby</title>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="css\estilo.css">

    <?php if(isset($_SESSION))session_destroy(); ?>

  </head>

  <body class="body1">
    <div class="cx1">
      <div class="titulo_cx1">
        Carteira Virtual Ruby<br>
        <img src="imagens\ruby.png" alt=""><br><br>
        Acesse sua conta:<br>
        <form method="POST" action="login.php">
          <div class="slide">
            <input type="email" id="email" name="email" placeholder="Email" required><br><br>
            <input type="password" id="senha" name="senha" placeholder="Senha" required><br><br>
          </div>
          <input type="submit" id="entrar" value="ENTRAR"><br>
        </form>
        <div class="footer_cx1">
          <a href="criar.html">Criar nova conta<a>
        </div>
      </div>
    </div>

  </body>

</html>
