<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html><head>
  <!-- Standard Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Links -->
  <link rel="stylesheet" type="text/css" href="../css/forgot.css">
 
</head>
<body>
  <div class="container">
    <h2>Solicite a recuperação da Conta</h2>
    <form action="/forgot" method="POST,">
      <div class="field">
        <label for="email">E-mail</label>
        <input type="text" name="email">
      </div>

      <div class="buttons">
        <button>Solicitar</button>
        <button type="button" onclick="history.go(-1)">Voltar</button>
      </div>
    </form>
  </div>
</body>
</html>