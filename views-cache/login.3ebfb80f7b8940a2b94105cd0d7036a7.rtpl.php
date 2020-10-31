<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
  <head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- Site Properties -->
    <title>Sisweb Login</title>
    <!-- Links -->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet" />
  </head>
  <body>
    <div class="container">
      
      <form method="POST" action="/login">
        <h1>Sisweb</h1>
        <fieldset>
          <div class="input-block">
            <label for="login">Login</label>
            <input id="login" name="txlogin" required />
          </div>
          <div class="input-block">
            <label for="password">Senha</label>
            <input type="password" id="password" name="txpassword" required />
          </div>

          <div class="message">
            <div class="message-field">
              <p>Não é registrado ainda?</p>
              <a href="/login/register">Registre-se</a>
            </div>
            <div class="message-field">
              <p>Esqueceu a senha?</p>
              <a href="/forgot">Esqueci</a>
            </div>
          </div>
          <div class="buttons">
            <button>Acessar</button>
            <button type="button" id="out">Sair</button>
          </div>
        </fieldset>
        <?php if( $error != '' ){ ?>

          <div class="message-login">
            <p><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>            
          </div>
        <?php } ?>

      </form>   
    </div>
  </body>
</html> 