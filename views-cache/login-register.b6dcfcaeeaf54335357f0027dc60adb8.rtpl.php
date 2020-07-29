<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html><head>
  <!-- Standard Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Sisweb Login</title>
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
  <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your e-mail'
                },
                {
                  type   : 'email',
                  prompt : 'Please enter a valid e-mail'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your password'
                },
                {
                  type   : 'length[6]',
                  prompt : 'Your password must be at least 6 characters'
                }
              ]
            }
          }
        })
      ;
    })
  ;
  </script>
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui green image header">
      <div class="content">
        Entre na sua conta
      </div>
    </h2>
    <form class="ui large form" method="POST" action="/login/register">
      <div class="ui stacked segment">
        <h4 class="ui dividing header">Informações Fisicas</h4>
          <div class="ui field" align="left">
            <div class="field">
              <label>Nome:</label>
              <input type="text" name="name" placeholder="Nome Completo">
            </div>
            <div class="field">
              <label>Nome:</label>
              <input type="text" name="nurg" placeholder="RG">
            </div>
            <div class="field">
              <label>CPF:</label>
              <input type="text" name="nucpf" placeholder="CPF">
            </div>

            <div class="field">
              <label>Endereço: </label>
              <input type="text" name="addresscpf" placeholder="Endereço Fisico">
            </div>

            <div class="two fields">
              <div class="field">
                <label>Estado</label>
                <input type="text" name="statecpf" placeholder="Estado">
              </div>
              <div class="field">
                <label>Cidade:</label>
                <input type="text" name="citycpf" placeholder="Cidade">
              </div>
            </div>

            <h4 class="ui dividing header">Informações Juridicas</h4>
            <div class="field">
              <label>Razão Social:</label>
              <input type="text" name="corporatenamecnpj" placeholder="Razão Social">
            </div>

            <div class="field">
              <label>Nome Fantasia:</label>
              <input type="text" name="fantasynamecnpj" placeholder="Nome Fantasia - Opcional ">
            </div>

            <div class="field">
              <label>CNPJ:</label>
              <input type="text" name="cnpj" placeholder="CNPJ">
            </div>

            <div class="field">
              <label>Endereço: </label>
              <input type="text" name="addresscnpj" placeholder="Endereço Juridico">
            </div>

            <div class="two fields">
              <div class="field">
                <label>Estado</label>
                <input type="text" name="statecnpj">
              </div>
              <div class="field">
                <label>Cidade:</label>
                <input type="text" name="citycnpj">
              </div>
            </div>

            <h4 class="ui dividing header">Informações de Acesso</h4>
            <div class="field">
              <label>Usuário:</label>
              <input type="text" name="txlogin" placeholder="Usuário de Acesso">
            </div>

            <div class="field">
              <label>Senha:</label>
              <input type="password" name="txsenha" placeholder="Senha de acesso">
            </div>

            <div class="field" align="center">
              <div class="ui buttons">
                <button class="ui green button">Enviar pedido</button>
                <a class="ui black button" href="/login">Voltar</a>
              </div>
            </div>
          </div>
    </form>
  </div>
</div>




</body></html>