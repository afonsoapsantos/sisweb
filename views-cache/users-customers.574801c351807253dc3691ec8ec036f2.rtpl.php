<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Clientes</title>
<div class="ui segment">
	<div class="field">
		<div class="ui horizontal divider">Menu</div>
		<div class="ui buttons">
			<a class="ui green button" href="/admin/users/customers/create">
				<i class="plus icon"></i>Novo Cliente
			</a>
			<a class="ui green button" href="/admin/users/customers">
				<i class="list icon"></i>Clientes
			</a>
			<a class="ui green button" href="/admin/users/customers/consult">
				<i class="info icon"></i>Consultar Cliente
			</a>
		</div>
	</div>
	<div class="field" id="margins">
		<div class="ui horizontal divider">Clientes</div>
		<table class="ui very basic table">
			<thead align="center">
				<tr>
					<th>Codigo</th>
					<th>Login</th>
					<th>Status</th>
					<th>Tipo Usuário</th>
					<th>Registro</th>
					<th>Opções</th>
				</tr>
			</thead>
			<tbody align="center">
				<?php $counter1=-1;  if( isset($userscustomers) && ( is_array($userscustomers) || $userscustomers instanceof Traversable ) && sizeof($userscustomers) ) foreach( $userscustomers as $key1 => $value1 ){ $counter1++; ?>
		            <tr>
		              <td><?php echo htmlspecialchars( $value1["pkuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		              <td><?php echo htmlspecialchars( $value1["txlogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		              <td><?php echo htmlspecialchars( $value1["txnamestatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		              <td><?php echo htmlspecialchars( $value1["txnameusertype"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		              <td><?php echo formatDate($value1["dtregisteruser"]); ?></td>
		              <td>
		                <a href="/admin/users/<?php echo htmlspecialchars( $value1["pkuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="circular ui green icon button">
		                  <i class="edit icon"></i>
		                </a>
		                <a href="/admin/users/<?php echo htmlspecialchars( $value1["pkuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir?')" class="circular ui red icon button">
		                  <i class="delete icon"></i>
		                </a>
		              </td>
		            </tr>
		        <?php } ?>
			</tbody>
		</table>
	</div>
</div>