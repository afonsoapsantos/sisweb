<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="field" id="margin">
	<div class="field">	
		<div class="ui horizontal divider">Menu</div>
		<div class="ui buttons">
	      	<a class="ui green button" href="/customer/implements/create">
	        	<i class="plus icon"></i>Novo Implemento
	      	</a>
	      	<a class="ui green button" href="/customer/implements">
	        	<i class="list icon"></i>Implementos
	      	</a>
	    </div>
	</div>
	<div class="field" align="left">
		<div class="ui horizontal divider">Implementos</div>
		<form class="ui form" method="POST" action="/customer/implements/update/<?php echo htmlspecialchars( $implement["idimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			<div class="ui horizontal divider">Atualizando Implemento</div>

			<div class="field">
				<label class="ui label">Nome Implemento:</label>
				<input type="text" name="txnameimplement" value="<?php echo htmlspecialchars( $implement["txnameimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			</div>

			<div class="field">
				<label class="ui label">Modelo:</label>
				<input type="text" name="txmodelimplement" value="<?php echo htmlspecialchars( $implement["txmodelimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			</div>

			<div class="field">
				<label class="ui label">Tipo de Implemento</label>
				<input type="text" name="txtype" value="<?php echo htmlspecialchars( $implement["txtype"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			</div>

			<div class="field">
				<label class="ui label">Ano de Fabricação:</label>
				<input type="text" name="nuanofabricacaoimp" value="<?php echo htmlspecialchars( $implement["nuanofabricacaoimp"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			</div>

			<div class="field">
				<label class="ui label">Descrição:</label>
				<input type="text" name="txdescricaoimp" value="<?php echo htmlspecialchars( $implement["txdescricaoimp"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			</div>

			<div class="field" align="center">
				<div class="ui buttons">
					<button class="ui green button">Salvar</button>
					<a class="ui black button" href="/customer/implements">Cancelar</a>
				</div>
			</div><br>
		</form>
	</div>
</div>
</div>