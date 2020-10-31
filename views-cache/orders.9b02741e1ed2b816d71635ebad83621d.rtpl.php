<?php if(!class_exists('Rain\Tpl')){exit;}?>  <title>Sisweb - Usuários</title>
  <div class="ui segment">
    <div class="field">
      <div class="ui horizontal divider">Menu</div>
      <div class="ui buttons">
        <a class="ui green button" href="/admin/orders/customer/select">
          <i class="user plus icon"></i>Nova Ordem
        </a>
        <a class="ui green button" href="/admin/orders">
          <i class="users icon"></i>Ordens de Serviço
        </a>
      </div>
    </div><br>
    <div class='ui horizontal divider'>Ordens de Serviço</div><br/>
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

    <div class="field" id="margins">
      <table class='ui very basic table'>
        <thead align='center'>
          <tr>
            <th>Codigo</th>
            <th>Descrição</th>
            <th>Local</th>
            <th>Fazenda</th>
            <th>Implemento</th>
            <th>Status</th>
            <th>Opções</th>
          </tr>
        </thead>
        <tbody align='center'>
            <?php $counter1=-1;  if( isset($orders) && ( is_array($orders) || $orders instanceof Traversable ) && sizeof($orders) ) foreach( $orders as $key1 => $value1 ){ $counter1++; ?>

            <tr>
              <td><?php echo htmlspecialchars( $value1["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td><?php echo htmlspecialchars( $value1["txdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td><?php echo htmlspecialchars( $value1["txlocation"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td><?php echo htmlspecialchars( $value1["txnamefarm"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td><?php echo htmlspecialchars( $value1["txnameimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td><?php echo htmlspecialchars( $value1["txnamestatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td style="width: 200px;">
                <a href="/admin/orders/update/<?php echo htmlspecialchars( $value1["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="circular ui green icon button">
                  <i class="edit icon"></i>
                </a>
                <a href="/admin/orders/delete/<?php echo htmlspecialchars( $value1["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir?')" class="circular ui red icon button">
                  <i class="delete icon"></i>
                </a>
              </td>
            </tr>
            <?php } ?>

        </tbody>        
      </table>
    </div><br>
  </div>





   
     
     
    
    