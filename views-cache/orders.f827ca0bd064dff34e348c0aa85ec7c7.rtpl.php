<?php if(!class_exists('Rain\Tpl')){exit;}?>  <title>Sisweb - Usuários</title>
  <div class="ui segment">
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
            </tr>
            <?php } ?>
        </tbody>        
      </table>
    </div><br>
  </div>