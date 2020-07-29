<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Novo Funcionário</title>
	<div class="field">	
		<div class="ui horizontal divider">Menu</div>
		<div class="ui buttons">
	      	<a class="ui green button" href="/customer/farmworker/create">
	        	<i class="plus icon"></i>Novo Funcionário
	      	</a>
	      	<a class="ui green button" href="/customer/farmworker">
	        	<i class="list icon"></i>Listar Funcionários
	      	</a>
	    </div>
	</div>
	<br>
	<div class="field" align="left" id="margin"	>
		<h2 class="ui header dividing" align="center">Novo Funcionário</h2>
		<?php if( $success != '' ){ ?>
			<div class="ui success message">
				<div class="header"><?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
			</div>
		<?php } ?>
		<?php if( $error != '' ){ ?>
			<div class="ui negative message">
				<div class="header"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
			</div>
		<?php } ?>
		<form class="ui form" method="POST" action="/customer/farmworker/create">

			<div class="ui stackable grid">
				<div class="ten wide column">
					<div class="ui horizontal divider">Dados Pessoais</div>
					<div class="field">
						<label>Nome: </label>
						<input type="text" name="txname">
					</div>

					<div class="field">
						<label>Ultimo Nome: </label>
						<input type="text" name="txlastname">
					</div>

					<div class="field">
						<label>Função: </label>
						<input type="text" name="txfuncao">
					</div>
				</div>
				<div class="six wide column">
					<div class="ui horizontal divider">Acesso</div>
					<div class="field">
						<label>Usuário de Acesso:</label>
						<input type="text" name="txlogin">
					</div>

					<div class="field">
						<label>Senha de Acesso:</label>
						<input type="password" name="txpassword">
					</div>
				</div>
			</div>
			<div class="ui horizontal divider">Endereço</div>

			<div class="field">
				<label>Endereço: </label>
				<input type="text" name="txnameaddress">
			</div>

			<div class="field">
				<label>Bairro: </label>
				<input type="text" name="txneighborhood">
			</div>

			<div class="field">
				<label>Complemento: </label>
				<input type="text" name="txcomplement">
			</div>

			<div class="field">
				<label>Cidade:</label>
				<select class="ui selection" name="cityfk">
					<option class="item" value="0">Selecione</option>
					<?php $counter1=-1;  if( isset($cities) && ( is_array($cities) || $cities instanceof Traversable ) && sizeof($cities) ) foreach( $cities as $key1 => $value1 ){ $counter1++; ?><option class="item" value="<?php echo htmlspecialchars( $value1["pkcity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["txnamecity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option><?php } ?>
				</select>
			</div>

			<div class="field">
				<label>Estado:</label>
				<select class="ui selection" name="statefk">
					<option class="item" value="0">Selecione</option>
					<?php $counter1=-1;  if( isset($states) && ( is_array($states) || $states instanceof Traversable ) && sizeof($states) ) foreach( $states as $key1 => $value1 ){ $counter1++; ?><option class="item" value="<?php echo htmlspecialchars( $value1["pkstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["txnamestate"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option><?php } ?>
				</select>
			</div>

			<div class="field" align="center">
				<div class="ui buttons">
					<button class="ui green button" type="submit">Salvar</button>
					<a class="ui black button" href="/customer/farms">Cancelar</a>
				</div>
			</div>

		</form><br>
	</div>