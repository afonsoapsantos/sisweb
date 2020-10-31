<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="field">
	<div class="ui horizontal divider">Menu</div>
		<div class="ui buttons">
      	<a class="ui green button" href="/admin/providers/create">
        	<i class="plus icon"></i>Novo Fornecedor
      	</a>
      	<a class="ui green button" href="/admin/providers">
        	<i class="list icon"></i>Listar Fornecedor
      	</a>
    </div>
</div>

<div class="field">
<div class="ui horizontal divider">Solicitações</div>
	<table class='ui very basic table'>
	    <thead align='center'>
	        <tr>
	        	<th>Codigo</th>
	            <th>Fornecedor</th>
	            <th>Razao Social</th>
	            <th>CNPJ</th>
	            <th>Opções</th>
	        </tr>
	    </thead>
	    <tbody align='center'>
	        <?php $counter1=-1;  if( isset($providers) && ( is_array($providers) || $providers instanceof Traversable ) && sizeof($providers) ) foreach( $providers as $key1 => $value1 ){ $counter1++; ?>

	        	<tr>
	        		<td><?php echo htmlspecialchars( $value1["idprovider"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	        		<td><?php echo htmlspecialchars( $value1["txfantasyname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	        		<td><?php echo htmlspecialchars( $value1["txcorporatename"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	        		<td><?php echo htmlspecialchars( $value1["nucnpj"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	        		<td>
		                <a href="" class="circular ui green icon button">
		                  <i class="edit icon"></i>
		                </a>
		                <a href="" onclick="return confirm('Deseja realmente excluir?')" class="circular ui red icon button">
		                  <i class="delete icon"></i>
		                </a>
	          		</td>
	        	</tr>
	        <?php } ?>

	    </tbody>        
	</table>
</div>