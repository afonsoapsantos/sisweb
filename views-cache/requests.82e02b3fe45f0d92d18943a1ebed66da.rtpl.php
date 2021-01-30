<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Solicitações</title> 	

<div class="field" style="margin-right: 60px; margin-left: 60px;">
    <div class="ui horizontal divider">Solicitações</div>
    <table class='ui very basic table'>
        <thead align='center'>
	        <tr>
	        	<th>Codigo</th>
	            <th>Cliente</th>
	            <th>Implemento</th>
	            <th>Problema</th>
	            <th>Status</th> 
	            <th>Opções</th>
	        </tr>
        </thead>
        <tbody align='center'>
            <?php $counter1=-1;  if( isset($requests) && ( is_array($requests) || $requests instanceof Traversable ) && sizeof($requests) ) foreach( $requests as $key1 => $value1 ){ $counter1++; ?>
            	<tr>
            		<td><?php echo htmlspecialchars( $value1["idrequest"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            		<td><?php echo htmlspecialchars( $value1["txcorporatename"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            		<td><?php echo htmlspecialchars( $value1["txnameimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            		<td><?php echo htmlspecialchars( $value1["txproblem"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            		<td><?php echo htmlspecialchars( $value1["txnamestatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            		<td>
            			<a href="/admin/requests/generate/order/<?php echo htmlspecialchars( $value1["idrequest"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="circular ui black icon button">
            				<i class="clipboard icon"></i>
            			</a>
		                <a href="/admin/requests/<?php echo htmlspecialchars( $value1["idrequest"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="circular ui green icon button">
		                  <i class="edit icon"></i>
		                </a>
		                <a href="/admin/requests/<?php echo htmlspecialchars( $value1["idrequest"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir?')" class="circular ui red icon button">
		                  <i class="delete icon"></i>
		                </a>
              		</td>
            	</tr>
            <?php } ?>
        </tbody>        
    </table>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>