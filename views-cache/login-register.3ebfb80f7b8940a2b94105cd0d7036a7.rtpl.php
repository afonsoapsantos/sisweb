<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
  <head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- links -->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet" />

  </head>
  <body>
    <div id="page-register">
      <div class="container">
        <h2 id="title-register">Solicite o Registro</h2>
        <form method="POST" action="/login/register">
          <fieldset>
            <legend>Dados Físicos</legend>
            <div class="field"><label for="name">Nome</label><input name=""></div>
            <div class="field-two">
              <label for="rgnu">RG</label>
              <input name="">
              <label for="cpf">CPF</label>
              <input name="">
            </div>
            <div class="field"><label for="address">Endereço</label><input name=""></div>
            <div class="field-two">
              <label for="state">Estado</label>
              <input name="">
              <label for="city">Cidade</label>
              <input name="">
            </div>

            <legend>Dados Juridicos</legend>
            <div class="field"><label for="">Razão Social</label><input name=""></div>
            <div class="field"><label for="">Nome Fantasia</label><input name=""></div>
            <div class="field"><label for="">CNPJ</label><input name=""></div>
            <div class="field"><label for="">Endereço Comercial</label><input name=""></div>
            <div class="field"><label for="">Estado</label><input name=""></div>
            <div class="field"><label for="">Cidade</label><input name=""></div>

            <legend>Dados de Acesso</legend>
            <div class="field">
              <label for="login">Login</label>
              <input name="txlogin">
            </div>
            <div class="field">
              <label for="password">Senha</label>
              <input name="txpassword" type="password">
            </div>

          </fieldset>

          <div class="buttons">
            <button>Enviar pedido</button>
            <button type="button" onclick="history.go(-1)">Voltar</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>