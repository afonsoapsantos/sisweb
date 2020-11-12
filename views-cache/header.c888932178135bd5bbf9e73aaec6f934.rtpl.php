<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
</head>
<body class="pushable">
  <div class="pusher">
    <div class="ui stackable container menu">
      <a class="item" href="/manager">
        <i class="green home big icon"></i>
      </a>

      <a class="item" href="">
        <i class="cogs icon"></i>Serviços
      </a>
      <a class="item" href="/manager/providers">
        <i class="dolly icon"></i>Fornecedores
      </a>
      
      <a class="item" href="/manager/users">
        <i class="users icon"></i> Usuários
      </a>
      
      <div class="ui dropdown item" tabindex="0">
        <i class="clipboard icon"></i>Requisições
        <div class="menu transition hidden" tabindex="-1">
          <a class="item" href="/manager/requests">
            <i class="clipboard icon"></i>Solicitações
          </a>
          <a class="item" href="/manager/orders">
            <i class="clipboard icon"></i>Ordens de serviço
          </a>
        </div>
      </div>

      <div class="right menu">
          <a class="item" href="/logout">
            <div class="ui red button">Sair</div>
          </a>
      </div>
    </div>

    <div class="ui segments" id="component" align="center">