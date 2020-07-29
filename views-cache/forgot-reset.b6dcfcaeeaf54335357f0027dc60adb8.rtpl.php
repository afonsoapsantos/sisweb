<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html><head>
  <!-- Standard Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Sisweb - Recuperar senha</title>
  <link rel="stylesheet" type="text/css" href="../res/semantic/dist/components/reset.css">
  <link rel="stylesheet" type="text/css" href="../res/semantic/dist/components/site.css">

  <link rel="stylesheet" type="text/css" href="../res/semantic/dist/components/container.css">
  <link rel="stylesheet" type="text/css" href="../res/semantic/dist/components/grid.css">
  <link rel="stylesheet" type="text/css" href="../res/semantic/dist/components/header.css">
  <link rel="stylesheet" type="text/css" href="../res/semantic/dist/components/image.css">
  <link rel="stylesheet" type="text/css" href="../res/semantic/dist/components/menu.css">

  <link rel="stylesheet" type="text/css" href="../res/semantic/dist/components/divider.css">
  <link rel="stylesheet" type="text/css" href="../res/semantic/dist/components/segment.css">
  <link rel="stylesheet" type="text/css" href="../res/semantic/dist/components/form.css">
  <link rel="stylesheet" type="text/css" href="../res/semantic/dist/components/input.css">
  <link rel="stylesheet" type="text/css" href="../res/semantic/dist/components/button.css">
  <link rel="stylesheet" type="text/css" href="../res/semantic/dist/components/list.css">
  <link rel="stylesheet" type="text/css" href="../res/semantic/dist/components/message.css">
  <link rel="stylesheet" type="text/css" href="../res/semantic/dist/components/icon.css">

  <script src="../res/semantic/examples/assets/library/jquery.min.js"></script>
  <script src="../res/semantic/dist/components/form.js"></script>
  <script src="../res/semantic/dist/components/transition.js"></script>

  <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui green image header">
      <img src="../res/semantic/examples/assets/images/logo.png" class="image">
      <div class="content">
        Recupere sua conta
      </div>
    </h2>
    <form class="ui large form" method="POST" action="/forgot/reset">
      <div class="ui stacked segment">
        <div class="field" align="left">
          <label class="ui label">Senha:</label>
          <div class="ui left icon input">
            <i class="eye slash icon"></i>
            <input type="password" name="password" placeholder="Nova senha">
          </div>
        </div>
        <div class="field" align="left">
          <label class="ui label">Confirmar senha: </label>
          <div class="ui left icon input">
            <i class="eye slash icon"></i>
            <input type="password" name="password" placeholder="Nova senha">
          </div>
        </div>

        <button type="submit" class="ui fluid large green submit button">Recuperar</button><br/>
      </div>

      <div class="ui error message"></div>

    </form>
  </div>
</div>




</body>
</html>