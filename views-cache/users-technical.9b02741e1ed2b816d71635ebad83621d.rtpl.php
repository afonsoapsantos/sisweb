<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="ui segment">
	<div class="field">
		<div class="ui horizontal divider">Menu</div>
		<div class="ui buttons">
			<a class="ui green button" href="">
				<i class="plus icon"></i>Novo Técnico
			</a>
			<a class="ui green button" href="">
				<i class="list icon"></i>Técnicos
			</a>
			<a class="ui green button" href="">
				<i class="info icon"></i>Consultar Técnico
			</a>
		</div>
	</div><br>
	<div class="field" align="left" id="margins">
		<table class='ui very basic table'>
			<thead align='center'>
				<tr>
				  <th>Codigo</th>
				  <th>Login</th>
				  <th>Status</th>
				  <th>Tipo Usuário</th>
				  <th>Data de Cadastro</th> 
				  <th>Opções</th>
				</tr>
			</thead>
			<tbody align='center'>
				<?php $counter1=-1;  if( isset($technical) && ( is_array($technical) || $technical instanceof Traversable ) && sizeof($technical) ) foreach( $technical as $key1 => $value1 ){ $counter1++; ?>

					<tr>
					    <td><?php echo htmlspecialchars( $value1["pkuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					    <td><?php echo htmlspecialchars( $value1["txlogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					    <td><?php echo htmlspecialchars( $value1["txnamestatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					    <td><?php echo htmlspecialchars( $value1["txnameusertype"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					    <td><?php echo htmlspecialchars( $value1["dtregisteruser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					    <td>
					    	<a href="/admin/users/<?php echo htmlspecialchars( $value1["pkuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="circular ui green icon button">
					        	<i class="edit icon"></i>
					    	</a>
					    	<a href="/admin/users/admins/<?php echo htmlspecialchars( $value1["pkuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir?')" class="circular ui red icon button">
					        	<i class="delete icon"></i>
					    	</a>
					    </td>
					</tr>
				<?php } ?>

			</tbody>        
			</table>
	</div><br>
</div>