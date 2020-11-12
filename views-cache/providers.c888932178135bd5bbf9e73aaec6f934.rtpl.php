<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="field">
	<div class="ui horizontal divider">Menu</div>
		<div class="ui buttons">
      	<a class="ui green button" href="/manager/providers/create">
        	<i class="plus icon"></i>Novo Fornecedor
      	</a>
      	<a class="ui green button" href="/manager/providers">
        	<i class="list icon"></i>Listar Fornecedor
      	</a>
    </div>
</div>
<br>
<div class="field" id="margins">
	<?php if( $success != '' ){ ?>

	<div class="ui message">
		<div class="header"><?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
	</div>
	<?php } ?>

	<?php if( $error != '' ){ ?>

	<div class="ui message">
		<div class="header"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
	</div>
	<?php } ?>

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
		                <a href="/manager/providers/update/<?php echo htmlspecialchars( $value1["idprovider"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="circular ui green icon button">
		                  <i class="edit icon"></i>
		                </a>
		                <a href="/manager/providers/delete/<?php echo htmlspecialchars( $value1["idprovider"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir?')" class="circular ui red icon button">
		                  <i class="delete icon"></i>
		                </a>
	          		</td>
	        	</tr>
	        <?php } ?>

	    </tbody>        
	</table>
</div><br>