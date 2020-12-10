<?php if(!class_exists('Rain\Tpl')){exit;}?><div id="page-admin-users-update">
	<div class="container">
		<aside>
			<header class="vertical-menu">
				<a href="/admin/users" class="item">Usuários</a>
				<a href="/admin/users/create" class="item">Novo Usuário</a>
				<a href="#" class="item">Permissões</a>
				<a href="#" class="item">Analises</a>
				<a href="#" class="item">Relatórios</a>
				<a href="#" class="item">Agendas</a>
			</header>
		</aside>
		<main>
			<section>
				<h2>Alterar Usuário</h2>
				<form action="/admin/users/<?php echo htmlspecialchars( $user["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST">
						<fieldset align="left">
							<label>Usuário:</label>
							<input type="text" name="txlogin" value="<?php echo htmlspecialchars( $user["txlogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
	
							<label>Status:</label>
							<select name='fkstatus'>
								<option >Selecione o status</option>
								<?php $counter1=-1;  if( isset($status) && ( is_array($status) || $status instanceof Traversable ) && sizeof($status) ) foreach( $status as $key1 => $value1 ){ $counter1++; ?>

									<option class="item" value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" 
									<?php if( $user["fkstatus"] == $value1["id"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["txnamestatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
								<?php } ?>

							</select>
	
							<label>Tipo de Usuario: </label>
							<select class="ui selection" name="fkusertype">
								<option value='0' selected="0">Selecione o tipo de usuário</option>
								<?php $counter1=-1;  if( isset($userstypes) && ( is_array($userstypes) || $userstypes instanceof Traversable ) && sizeof($userstypes) ) foreach( $userstypes as $key1 => $value1 ){ $counter1++; ?>

								<option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $user["fkusertype"] == $value1["id"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["txnameusertype"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
								<?php } ?>

							</select>
						<div class="buttons">
							<button class="ui green button" type="submit"><i class="save icon"></i>Alterar</button>
							<a class="ui red button" href="/admin/users/create"> <i class="delete icon"></i>Cancelar</a>
						</div>
					</fieldset>
				</form>
			</section>
		</main>
	</div>
</div>