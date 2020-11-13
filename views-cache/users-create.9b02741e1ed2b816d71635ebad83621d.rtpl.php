<?php if(!class_exists('Rain\Tpl')){exit;}?><div id="page-admin-users-create">
	<div class="container">
		<aside>
			<header class="vertical-menu">
				<a href="/admin/users" class="item">Usuários</a>
				<a href="" class="item">Novo Usuário</a>
				<a href="#" class="item">Permissões</a>
		        <a href="#" class="item">Analises</a>
		        <a href="#" class="item">Relatórios</a>
		        <a href="#" class="item">Agendas</a>
			</header>
		</aside>
		<main>
			<section>
				<h2>Adicionar Usuário</h2>
				<form action="/admin/users/create" method="POST">
					<div class="field">
						<label for="txperson">Nome Completo:</label>
				    	<input name="txperson" placeholder="Nome Completo">
					</div>
				    
				    <div class="field">
				    	<label for="nurg">RG:</label>
				    	<input name="nurg" placeholder="RG">
				    </div>
				    
				    <div class="field">
				    	<label>CPF/CNPJ:</label>
				    	<input name="nucpf" placeholder="CPF">
				    </div>
				    
				    <div class="field">
				    	<label for="txemail">email:</label>
				    	<input type="email" name="txemail" placeholder="Email">
				    </div>
				    
				    <h2>Dados de Acesso</h2>
				    
				    <div class="field">
				    	<label for="txlogin">Usuário:</label>
				    	<input name="txlogin" placeholder="Usuário">
				    </div>
				    
				    <div class="field">
				    	<label for="txpassword">Senha:</label>
				    	<input type="password" name="txpassword" placeholder="Senha de acesso">
				    </div>

		            <div class="field">
		            	<label>Status:</label>
			            <select class="uis selection" name='fkstatususer'>
			            	<option value="0">Selecione o status</option>
			            	<?php $counter1=-1;  if( isset($status) && ( is_array($status) || $status instanceof Traversable ) && sizeof($status) ) foreach( $status as $key1 => $value1 ){ $counter1++; ?>

			            		<option value="<?php echo htmlspecialchars( $value1["idstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["txnamestatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
			            	<?php } ?>

			            </select>
		            </div>

		            <div class="field">
		            	<label>Tipo de Usuario: </label>
			            <select class="ui selection" name="fkusertype">
			                <option value='0' selected="0">Selecione o tipo de usuário</option>
			                <?php $counter1=-1;  if( isset($userstypes) && ( is_array($userstypes) || $userstypes instanceof Traversable ) && sizeof($userstypes) ) foreach( $userstypes as $key1 => $value1 ){ $counter1++; ?>

			                	<option value="<?php echo htmlspecialchars( $value1["idusertype"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["txnameusertype"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
			                <?php } ?>

			            </select>
		            </div>
					<div class="buttons">
						<button type="submit">Salvar</button>
						<a href="/admin/users/create">Cancelar</a>
					</div>
				</form>
			</section>
		</main>
	</div>
</div>