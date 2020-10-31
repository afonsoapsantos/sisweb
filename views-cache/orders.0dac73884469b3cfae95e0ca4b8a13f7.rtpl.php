<?php if(!class_exists('Rain\Tpl')){exit;}?>  <title>Sisweb - Usuários</title>
  <div class="ui segment">
    <div class="field">
      <div class="ui horizontal divider">Menu</div>
      <div class="ui buttons">
        <a class="ui green button" href="/technical/orders/customer/select">
          <i class="user plus icon"></i>Nova Ordem
        </a>
        <a class="ui green button" href="/technical/orders">
          <i class="users icon"></i>Ordens de Serviço
        </a>
      </div>
    </div><br>
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

        <?php if( $filesuccess != '' ){ ?>

      <div class="ui success message">
        <div class="header"><?php echo htmlspecialchars( $filesuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
      </div>
    <?php } ?>

    <?php if( $fileerror != '' ){ ?>

      <div class="ui negative message">
        <div class="header"><?php echo htmlspecialchars( $fileerror, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
      </div>
    <?php } ?>

    <div class='ui horizontal divider'>Ordens de Serviço</div><br/>
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
              <td style="width: 300px;">
                <a href="/technical/orders/start/<?php echo htmlspecialchars( $value1["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="circular ui icon button"><i class="clipboard outline icon"></i><a>
                <a href="/technical/orders/finish/<?php echo htmlspecialchars( $value1["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir?')" class="circular ui red icon button"><i class="close icon"></i></a>
                <a href="/technical/orders/medias/<?php echo htmlspecialchars( $value1["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="circular ui icon button"><i class="download icon"></i><a>
              </td>
            </tr>
            <?php } ?>

        </tbody>        
      </table>
    </div><br>
  </div>