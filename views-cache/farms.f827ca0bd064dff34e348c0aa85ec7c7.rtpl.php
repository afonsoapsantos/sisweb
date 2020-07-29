<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Fazendas</title>
<div class="ui segment">
  <div class="field"> 
    <div class="ui horizontal divider">Menu</div>
    <div class="ui buttons">
          <a class="ui green button" href="/customer/farms/create">
            <i class="plus icon"></i>Nova Fazenda
          </a>
          <a class="ui green button" href="/customer/farms">
            <i class="list icon"></i>Listar Fazendas
          </a>
      </div>
  </div>
  <?php if( $error != '' ){ ?>
  <div class="ui horizontal divider">Mensagem do Sistema</div>
  <div class="ui negative message">
    <div class="header"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
  </div>
  <?php } ?>
  <?php if( $sucess != '' ){ ?>
  <div class="ui horizontal divider">Mensagem do Sistema</div>
  <div class="ui success message">
    <div class="header"><?php echo htmlspecialchars( $sucess, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
  </div>
  <?php } ?>
  <div class="field" id="margin">
    <div class="ui horizontal divider">Fazendas</div>
    <table class="ui very basic table">
      <thead align="center">
        <tr>
          <th>Codigo</th>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Endereço</th>
          <th>Opções</th>
        </tr>
      </thead>
      <tbody align="center">
        <?php $counter1=-1;  if( isset($farms) && ( is_array($farms) || $farms instanceof Traversable ) && sizeof($farms) ) foreach( $farms as $key1 => $value1 ){ $counter1++; ?>
          <tr>
            <td><?php echo htmlspecialchars( $value1["idfarm"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["txnamefarm"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["txdescriptionfarm"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["txnameaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["txneighborhood"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["txcomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["txnamecity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["txabbreviation"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td>
              <a class="circular ui icon green button" href="/customer/farms/<?php echo htmlspecialchars( $value1["idfarm"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                Editar <i class="edit icon"></i>
              </a>
              <a class="circular ui icon red button" onclick="return confirm('Deseja realmente excluir?')" href="/customer/farms/delete/<?php echo htmlspecialchars( $value1["idfarm"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <i class="delete icon"></i>
              </a>
              <a class="circular ui icon button" href="/customer/farms/consult/<?php echo htmlspecialchars( $value1["idfarm"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <i class="info icon"></i>
              </a>
              <a class="circular ui icon button" href="/customer/farms/address/<?php echo htmlspecialchars( $value1["idaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <i class="address book icon"></i>
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>