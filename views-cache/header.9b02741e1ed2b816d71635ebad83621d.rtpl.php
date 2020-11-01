<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Links -->
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
    <link rel="stylesheet" type="text/css" href="../../css/page-admin.css">
    <link rel="stylesheet" type="text/css" href="../../css/page-admin-header.css">
    <link rel="stylesheet" type="text/css" href="../../css/page-admin-index.css">
    <link rel="stylesheet" type="text/css" href="../../css/page-admin-footer.css">
</head>
<body>
  <div id="page-admin">
    
    <header id="page-admin-header">
      <div class="menu">
        <div class="left">
          <a class="item active" href="/admin">Home</a>
        <a class="item" href="/admin">Loja</a>
        <a class="item" href="/admin/services">Serviços</a>
        <a class="item" href="/admin/products">Produtos</a>
        <a class="item" href="/admin/requests">Requisições</a>
        <a class="item" href="/admin/orders">Ordens</a>
        <a class="item" href="/admin/users">Usuários</a>
        </div>
        <div class="right">
          <a class="item" href="/logout">Logout</a>
        </div>
      </div>
    </header>



     <!-- <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/semantic.min.css">
    <link rel="stylesheet" type="text/css" src="../../../../res/semantic/dist/semantic.js">
    <link rel="stylesheet" type="text/css" src="../../../../res/semantic/dist/semantic.min.js"> -->

    <!-- Scripts -->
   <!--  <script type="text/javascript" src="../../../../res/semantic/examples/assets/library/jquery.min.js"></script>
    <script type="text/javascript" src="../../../../res/semantic/examples/assets/library/iframe.js"></script>
    <script type="text/javascript" src="../../../../res/semantic/dist/components/visibility.js"></script>
    <script type="text/javascript" src="../../../../res/semantic/dist/components/sidebar.js"></script>
    <script type="text/javascript" src="../../../../res/semantic/examples/assets/library/iframe-content.js"></script>
      <script src="../../../../res/semantic/examples/assets/library/iframe-content.js"></script>
      <script type="text/javascript" src="../../../../res/semantic/dist/components/transition.js"></script>
    <script type="text/javascript" src="../../../../res/semantic/dist/components/dropdown.js"></script>  

    <script>
      $(document)
      .ready(function() {

        // fix menu when passed
        $('.masthead')
          .visibility({
            once: false,
            onBottomPassed: function() {
              $('.fixed.menu').transition('fade in');
            },
            onBottomPassedReverse: function() {
              $('.fixed.menu').transition('fade out');
            }
          })
        ;

        // create sidebar and attach to menu open
        $('.ui.sidebar')
          .sidebar('attach events', '.toc.item')
        ;

      })
      ;
    </script>

    <script type="text/javascript"> 
      $('#multi-select')
        .dropdown()
      ;
    </script>

    <style type="text/css">
      #component{ 
        margin-top: 60px;
        margin-bottom: 80px; 
      }
      #margins{
        margin-left: 80px;
        margin-right: 80px;
      }
    </style> -->

    <!-- Site Properties -->
    <!-- <link type="text/css" rel="stylesheet" charset="UTF-8" href="https://translate.googleapis.com/translate_static/css/translateelement.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/reset.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/site.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/container.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/grid.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/header.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/image.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/menu.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/divider.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/segment.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/form.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/input.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/button.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/list.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/message.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/icon.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/dropdown.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/transition.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/sidebar.css">
    <link rel="stylesheet" type="text/css" href="../../../../res/semantic/dist/components/popup.css">
    
    <style type="text/css">
          .hidden.menu {
            display: none;
          }

          .masthead.segment {
            min-height: 700px;
            padding: 1em 0em;
          }
          .masthead .logo.item img {
            margin-right: 1em;
          }
          .masthead .ui.menu .ui.button {
            margin-left: 0.5em;
          }
          .masthead h1.ui.header {
            margin-top: 3em;
            margin-bottom: 0em;
            font-size: 4em;
            font-weight: normal;
          }
          .masthead h2 {
            font-size: 1.7em;
            font-weight: normal;
          }

          .ui.vertical.stripe {
            padding: 8em 0em;
          }
          .ui.vertical.stripe h3 {
            font-size: 2em;
          }
          .ui.vertical.stripe .button + h3,
          .ui.vertical.stripe p + h3 {
            margin-top: 3em;
          }
          .ui.vertical.stripe .floated.image {
            clear: both;
          }
          .ui.vertical.stripe p {
            font-size: 1.33em;
          }
          .ui.vertical.stripe .horizontal.divider {
            margin: 3em 0em;
          }

          .quote.stripe.segment {
            padding: 0em;
          }
          .quote.stripe.segment .grid .column {
            padding-top: 5em;
            padding-bottom: 5em;
          }

          .footer.segment {
            padding: 5em 0em;
          }

          .secondary.pointing.menu .toc.item {
            display: none;
          }

          @media only screen and (max-width: 700px) {
            .ui.fixed.menu {
              display: none !important;
            }
            .secondary.pointing.menu .item,
            .secondary.pointing.menu .menu {
              display: none;
            }
            .secondary.pointing.menu .toc.item {
              display: block;
            }
            .masthead.segment {
              min-height: 350px;
            }
            .masthead h1.ui.header {
              font-size: 2em;
              margin-top: 1.5em;
            }
            .masthead h2 {
              margin-top: 0.5em;
              font-size: 1.5em;
            }
          }
      </style>
    <style type="text/css">
      .ui.container {
          margin-top: 3em;
          text-align: center;
          align-items: center;
          align-content: center;
          alignment-baseline: central;
          margin-left: 3em;
          border-image: all;  
          background-color: white;
        padding: 1em;
      }
      iframe {
        border: none;
        width: calc(100% + 2em);
        margin: 0em -1em;
        height: 300px;
      }
      iframe html {
        overflow: hidden;
      }
      iframe body {
        padding: 0em;
      }
      .ui.container > h1 {
       font-size: 3em;
        text-align: center;
        font-weight: normal;
      }
      .ui.container > h2.dividing.header {
        font-size: 2em;
        font-weight: normal;
        margin: 4em 0em 3em;
      }
      .ui.table {
          table-layout: fixed;
              }
      .hidden.menu {
          display: none;
      }
      .masthead.segment {
        min-height: 700px;
        padding: 1em 0em;
      }
      .masthead .logo.item img {
        margin-right: 1em;
      }
      .masthead .ui.menu .ui.button {
          margin-left: 0.5em;
      }
      .masthead h1.ui.header {
          margin-top: 3em;
          margin-bottom: 0em;
          font-size: 4em;
          font-weight: normal;
      }
      .masthead h2 {
          font-size: 1.7em;
          font-weight: normal;
      }
      .ui.vertical.stripe {
          padding: 8em 0em;
      }
      .ui.vertical.stripe h3 {
          font-size: 2em;
      }
      .ui.vertical.stripe .button + h3,
      .ui.vertical.stripe p + h3 {
          margin-top: 3em;
      }
      .ui.vertical.stripe .floated.image {
          clear: both;
      }
      .ui.vertical.stripe p {
          font-size: 1.33em;
      }
      .ui.vertical.stripe .horizontal.divider {
          margin: 3em 0em;
      }
      .quote.stripe.segment {
          padding: 0em;
      }
      .quote.stripe.segment .grid .column {
          padding-top: 5em;
          padding-bottom: 5em;
      }
      .footer.segment {
        padding: 5em 0em;
      }
      .secondary.pointing.menu .toc.item {
        display: none;
      }
      @media only screen and (max-width: 700px) {
      .ui.fixed.menu {
         display: none !important;
      }
      .secondary.pointing.menu .item,
      .secondary.pointing.menu .menu {
         display: none;
      }
      .secondary.pointing.menu .toc.item {
        display: block;
      }
      .masthead.segment {
        min-height: 350px;
        }
      .masthead h1.ui.header {
        font-size: 2em;
        margin-top: 1.5em;
      }
      .masthead h2 {
          margin-top: 0.5em;
          font-size: 1.5em;
        }
      }"); 
    </style>
    <script type="text/javascript">
      $('.ui.dropdown')
        .dropdown()
      ;
    </script>
    <script>
          $(document)
            .ready(function() {
              $('.ui.menu .ui.dropdown').dropdown({
                on: 'hover'
              });
              $('.ui.menu a.item')
              .on('click', function() {
                $(this)
                    .addClass('active')
                    .siblings()
                    .removeClass('active');
                });
            })
          ;
    </script>
    <style type="text/css">
         .ui.visible.left.sidebar ~ .fixed, .ui.visible.left.sidebar ~ .pusher {   
          -webkit-transform: translate3d(260px, 0, 0);           
          transform: translate3d(260px, 0, 0); 
         }
    </style>
    <style type="text/css">
         .ui.visible.left.sidebar ~ .fixed, .ui.visible.left.sidebar ~ .pusher {   
          -webkit-transform: translate3d(260px, 0, 0);           
          transform: translate3d(260px, 0, 0); 
         }
    </style>
</head>

<body class="pushable">

  <div class="pusher">
    <div class="ui stackable container menu">
      <a class="item" href="/admin">
        <i class="green home big icon"></i>
      </a>

      <a class="item" href="/admin/products">
        <i class="box icon"></i>Produtos
      </a>

      <a class="item" href="/admin/services">
        <i class="cogs icon"></i>Serviços
      </a>

      <a class="item" href="/admin/providers">
        <i class="dolly icon"></i>Fornecedores
      </a>

      <div class="ui dropdown item" tabindex="0">
        <i class="green users icon"></i>Usuários
        <i class="dropdown icon"></i>
        <div class="menu transition hidden" tabindex="-1">
          <a class="item" href="/admin/users/admins">
            <i class="users icon"></i>Administradores
          </a>
          <a class="item" href="/admin/users/technical">
            <i class="users icon"></i>Técnicos
          </a>
          <a class="item" href="/admin/users/customers">
            <i class="users icon"></i>Clientes
          </a>
          <a class="item" href="/admin/users/farmworker">
            <i class="users icon"></i>Funcionários Fazenda
          </a>
          <a class="item" href="/admin/users">
            <i class="users icon"></i>Usuários
          </a>
        </div>
      </div>
      
      <div class="ui dropdown item" tabindex="0">
        <i class="clipboard icon"></i>Requisições
        <div class="menu transition hidden" tabindex="-1">
          <a class="item" href="/admin/requests">
            <i class="clipboard icon"></i>Solicitações
          </a>
          <a class="item" href="/admin/orders">
            <i class="clipboard icon"></i>Ordens de serviço
          </a>
        </div>
      </div>

      <div class="right menu">
          <div class="item" >
            <a class="ui red button" href="/logout">Sair</a>
          </div>
      </div>
    </div>

    <div class="ui segments" id="component" align="center">  -->