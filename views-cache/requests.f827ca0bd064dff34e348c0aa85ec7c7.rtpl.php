<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Solicitações</title> 	
<div class="field">	
	<div class="ui horizontal divider">Menu</div>
	<div class="ui buttons">
      	<a class="ui green button" href="/customer/requests/create">
        	<i class="plus icon"></i>Nova Solicitação
      	</a>
      	<a class="ui green button" href="/customer/requests">
        	<i class="list icon"></i>Solicitações
      	</a>
    </div>
</div><br>
<?php if( $success != '' ){ ?>
  <div class="field">
    <div class="ui success message">
      <div class="header"><?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
    </div>
  </div>
<?php } ?>
<?php if( $error != '' ){ ?>
  <div class="field">
    <div class="ui negative message">
      <div class="header"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
    </div>
  </div>
<?php } ?>
<div class="field" style="margin-right: 60px; margin-left: 60px;">
    <div class="ui horizontal divider">Solicitações</div>
    <table class='ui very basic table'>
        <thead align='center'>
	        <tr>
	        	<th>Codigo</th>
            <th>Problema</th>
            <th>Situação</th>
            <th>Status</th> 
            <th>Opções</th>
	        </tr>
        </thead>
        <tbody align='center'>
            <?php $counter1=-1;  if( isset($requests) && ( is_array($requests) || $requests instanceof Traversable ) && sizeof($requests) ) foreach( $requests as $key1 => $value1 ){ $counter1++; ?>
            	<tr>
            		<td><?php echo htmlspecialchars( $value1["idrequest"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            		<td><?php echo htmlspecialchars( $value1["txproblem"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            		<td><?php echo htmlspecialchars( $value1["txsituation"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["txnamestatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td style="width: 200px;">
                  <a class="circular ui green icon button" href="/customer/requests/update/<?php echo htmlspecialchars( $value1["idrequest"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    Editar <i class="edit icon"></i>
                  </a>
                  <a class="circular ui icon button" href="/customer/requests/media/<?php echo htmlspecialchars( $value1["idrequest"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <i class="upload icon"></i>
                  </a>
                  <a class="circular ui red icon button" href="/customer/requests/delete/<?php echo htmlspecialchars( $value1["idrequest"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <i class="delete icon"></i>
                  </a>
                  <a class="circular ui icon button" href="/customer/requests/consult/<?php echo htmlspecialchars( $value1["idrequest"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <i class="info icon"></i>
                  </a>
                </td>
            	</tr>
            <?php } ?>
        </tbody>        
    </table>
    <br>
</div>