<?php if(!class_exists('Rain\Tpl')){exit;}?>	<div class="field">	
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
		<h2 class="ui header dividing" align="center">Atualizando Funcionario</h2>
		<form class="ui form" action="/customer/farmworker/update/<?php echo htmlspecialchars( $farmworker["pkfarmworker"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST">

			<input type="hidden" name="pkfarmworker" value="<?php echo htmlspecialchars( $farmworker["pkfarmworker"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

			<div class="field">
				<label>Nome: </label>
				<input type="text" name="txname" value="<?php echo htmlspecialchars( $farmworker["txname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			</div>

			<div class="field">
				<label>Ultimo nome: </label>
				<input type="text" name="txlastname" value="<?php echo htmlspecialchars( $farmworker["txlastname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			</div>

			<div class="field">
				<label>Função: </label>
				<input type="text" name="txfuncao" value="<?php echo htmlspecialchars( $farmworker["txfuncao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			</div>

			<div class="field" align="center">
				<div class="ui buttons">
					<button class="ui green button" type="submit">Atualizar</button>
					<a class="ui black button" href="/customer/farms">Cancelar</a>
				</div>
			</div>

		</form><br>
	</div>