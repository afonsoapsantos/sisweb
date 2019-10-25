<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Solicitações</title>
<div class="ui segments" id="component" align="center">  
  	<div class="ui segment">
  		<div class="ui horizontal divider">Menu</div>
  		<div class="ui buttons">
	      	<a class="ui green button" href="/admin/requests/create">
	        	<i class="user plus icon"></i>Nova Solcitação
	      	</a>
	      	<a class="ui green button" href="/admin/requests">
	        	<i class="users icon"></i>Listar Solcitação
	      	</a>
	      	<a class="ui green button" href="/admin/requests/consult">
	        	<i class="id card icon"></i>Consultar Solcitação
	      	</a>
	      	<a class="ui green button" href="/admin/requests/edit">
	        	<i class="edit icon"></i>Editar Solcitação
	      	</a>
	      	<a class="ui red button" href="/admin/requests/delete">
	        	<i class="user times icon"></i>Excluir Solcitação
	      	</a>
	    </div>
	    <br/>
	    <br/>
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
	            <!--<?php $counter1=-1;  if( isset($requests) && ( is_array($requests) || $requests instanceof Traversable ) && sizeof($requests) ) foreach( $requests as $key1 => $value1 ){ $counter1++; ?>-->
	            	<tr>
	            		<td><!--<?php echo htmlspecialchars( $value1["idrequest"], ENT_COMPAT, 'UTF-8', FALSE ); ?>--></td>
	            		<td><!--<?php echo htmlspecialchars( $value1["idcustomer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>--></td>
	            		<td><!--<?php echo htmlspecialchars( $value1["txnameimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>--></td>
	            		<td><!--<?php echo htmlspecialchars( $value1["txproblem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>--></td>
	            		<td><!--<?php echo htmlspecialchars( $value1["txnamestatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>--></td>
	            		<td>
			                <a href="/admin/users/<?php echo htmlspecialchars( $value1["idrequest"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="circular ui green icon button">
			                  <i class="edit icon"></i>
			                </a>
			                <a href="/admin/users/<?php echo htmlspecialchars( $value1["idrequest"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir?')" class="circular ui red icon button">
			                  <i class="delete icon"></i>
			                </a>
	              		</td>
	            	</tr>
	            <!--<?php } ?>-->
	        </tbody>        
	    </table>
	</div>
</div>