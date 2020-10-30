<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="ui segment">
	<div class="field">
		<div class="ui horizontal divider">Menu</div>
		<div class="ui buttons">
			<a class="ui green button" href="/admin/services/create">
				<i class="plus icon"></i>Novo Serviço
			</a>
			<a class="ui green button" href="">
				<i class="list icon"></i>Serviços
			</a>
		</div>
		
	</div>
	<div class="field" id="margins">
		<div class="ui horizontal divider">Serviços</div>
		<table class="ui very basic table">
			<thead align="center">
				<tr>
					<th>Codigo</th>
					<th>Serviço</th>
					<th>Descrição</th>
					<th>Preço</th>
					<th>Opções</th>
				</tr>
			</thead>
			<tbody align="center">
				<?php $counter1=-1;  if( isset($services) && ( is_array($services) || $services instanceof Traversable ) && sizeof($services) ) foreach( $services as $key1 => $value1 ){ $counter1++; ?>

				<tr>
					<td><?php echo htmlspecialchars( $value1["servicepk"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["txnameservice"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["txdescriptionservice"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td>R$<?php echo formPrice($value1["vlprice"]); ?></td>
					<td>
						<a href="/admin/services/update/<?php echo htmlspecialchars( $value1["servicepk"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="circular ui green icon button">
			                <i class="edit icon"></i>
			              </a>
			              <a href="/admin/services/delete/<?php echo htmlspecialchars( $value1["servicepk"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir?')" class="circular ui red icon button">
			                <i class="delete icon"></i>
			              </a>
					</td>
				</tr>
				<?php } ?>

			</tbody>
		</table>
	</div>
</div><br>