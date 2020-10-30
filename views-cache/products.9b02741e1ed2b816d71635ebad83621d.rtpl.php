<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Produtos</title>
<div class="ui segment">
	<div class="field">
		<div class="ui buttons">
			<a href="/admin/products/create" class="ui green button">
				<i class="plus icon"></i> Novo Produto
			</a>
			<a href="" class="ui green button">
				<i class="list icon"></i> Listar Produtos
			</a>
		</div>	
	</div><br>
	<div class="field" id="margins">
		<div class="ui horizontal divider">Produtos</div>
		<table class="ui very basic table">
			<thead>
				<tr>
					<th>Código</th>
					<th>Produto</th>
					<th>Descrição</th>
					<th>Unitário</th>
					<th>Quantidade</th>
					<th>Marca</th>
					<th>Opções</th>
				</tr>
			</thead>
			<tbody>
				<?php $counter1=-1;  if( isset($poduct) && ( is_array($poduct) || $poduct instanceof Traversable ) && sizeof($poduct) ) foreach( $poduct as $key1 => $value1 ){ $counter1++; ?>

					<tr>$value.pkproduct
						<td><?php echo htmlspecialchars( $value1["pkproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["txnameproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["txdescriptionproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["priceproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["nuamountproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["txnamebrand"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td>
							<a href="/admin/products/<?php echo htmlspecialchars( $value1["pkproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="circular ui green icon button">
                				<i class="edit icon"></i>
              				</a>
              				<a href="/admin/products/<?php echo htmlspecialchars( $value1["pkproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir?')" class="circular ui red icon button">
                				<i class="delete icon"></i>
              				</a>
						</td>
					</tr>
				<?php } ?>

			</tbody>
		</table>
	</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>