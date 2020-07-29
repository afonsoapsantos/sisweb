<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="ui segment">
	<div class="field">
	    <div class="ui horizontal divider">Menu</div>
	    <div class="ui buttons">
		    <a class="ui green button" href="/admin/orders/customer/select">
		    	<i class="user plus icon"></i>Nova Ordem
		    </a>
	    	<a class="ui green button" href="/admin/orders">
	        	<i class="users icon"></i>Ordens de Serviço
	    	</a>
	    	<a class="ui green button" href="/admin/orders/consult">
	        	<i class="id card icon"></i>Consultar Ordem
	    	</a>
	    </div>
	</div><br>

	<div class="field" style="margin-right: 60px; margin-left: 60px;">
		<div class="ui horizontal divider">Selecione o cliente:</div>
		<table class="ui very basic table">
			<thead align="center">
				<tr>
				<th>Codigo</th>
				<th>Nome</th>
				<th>Opção</th>
			</tr>
			</thead>
			<tbody align="center">
				<?php $counter1=-1;  if( isset($customers) && ( is_array($customers) || $customers instanceof Traversable ) && sizeof($customers) ) foreach( $customers as $key1 => $value1 ){ $counter1++; ?>
					<tr>
						<td><?php echo htmlspecialchars( $value1["idcustomer"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["txcorporatename"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td>
							<a href="/admin/orders/create/<?php echo htmlspecialchars( $value1["idcustomer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="circular ui blue icon button">
				                <i class="plus icon"></i>
				            </a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><br><br>