<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Funcionarios Fazendas</title>

<div class="ui segment">
  <div class="field"> 
    <div class="ui horizontal divider">Menu</div>
    <div class="ui buttons">
          <a class="ui green button" href="/customer/farmworker/create">
            <i class="plus icon"></i>Novo Funcionario
          </a>
          <a class="ui green button" href="/customer/farmworker">
            <i class="list icon"></i>Listar Funcionarios
          </a>
      </div>
  </div>
  <br>
  <div class="field" id="margin">
    <?php if( $success != '' ){ ?>
      <div class="ui success message">
        <div class="header"><?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
      </div>
    <?php } ?>
    <?php if( $error != '' ){ ?>
      <div class="ui negative message">
        <div class="header"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
      </div>
    <?php } ?>
    <div class="ui horizontal divider">Funcionarios Fazendas</div>
      <table class="ui very basic table">
        <thead align="center">
          <tr>
            <th>Codigo</th>
            <th>Nome:</th>
            <th>Ultimo Nome</th>
            <th>Função</th>
            <th>Opções</th>
          </tr>
        </thead>
        <tbody align="center">
          <?php $counter1=-1;  if( isset($farmworker) && ( is_array($farmworker) || $farmworker instanceof Traversable ) && sizeof($farmworker) ) foreach( $farmworker as $key1 => $value1 ){ $counter1++; ?>
          <tr>
            <td><?php echo htmlspecialchars( $value1["pkfarmworker"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["txname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["txlastname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["txfuncao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td>
              <a class="circular ui icon green button" href="/customer/farmworker/update/<?php echo htmlspecialchars( $value1["pkfarmworker"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                Editar <i class="edit icon"></i>
              </a>
              <a class="circular ui icon red button" onclick="return confirm('Deseja realmente excluir?')" href="/customer/farmworker/delete/<?php echo htmlspecialchars( $value1["pkfarmworker"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <i class="delete icon"></i>
              </a>
              <a class="circular ui icon button" href="/customer/farmworker/consult/<?php echo htmlspecialchars( $value1["pkfarmworker"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <i class="info icon"></i>
              </a>
              <a class="circular ui icon button" href="/customer/farms/address/<?php echo htmlspecialchars( $value1["idaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <i class="address book icon"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table><br>
  </div>
</div>