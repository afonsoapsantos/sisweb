<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Adicionar Fornecerdor</title>
<div class="ui segment">
	<div class="ui horizontal divider">Menu</div>
	<div class="ui buttons">
		<a class="ui green button" href="">
			<i class="plus icon"></i>Novo Fornecedor
		</a>
		<a class="ui green button" href="/manager/providers">
			<i class="list icon"></i>Fornecedores
		</a>
	</div>

	<div class="field">
		<?php if( $error != '' ){ ?>
		<div class="ui message">
			<div class="header"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
		</div>
		<?php } ?>
		<?php if( $success != '' ){ ?>
		<div class="ui message">
			<div class="header"><?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
		</div>
		<?php } ?>
		<form class="ui form" method="POST" action="/manager/providers/update/<?php echo htmlspecialchars( $provider["idprovider"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			
			<div class="ui field" style="margin-left: 60px; margin-right: 60px;">
				<div class="ui horizontal divider">Atualizar Fornecedor</div>
				<div class="ui field" align="left">

					<div class="field">
						<label class="ui label">Razão Social: </label>
						<input type="text" name="txcorporatename" value="<?php echo htmlspecialchars( $provider["txcorporatename"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					</div>

					<div class="field">
						<label class="ui label">Nome Fantasia: </label>
						<input type="text" name="txfantasyname" value="<?php echo htmlspecialchars( $provider["txfantasyname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					</div>

					<div class="field">
						<label class="ui label">CNPJ: </label>
						<input type="number" name="nucnpj" value="<?php echo htmlspecialchars( $provider["nucnpj"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					</div>

					<div class="field">
						<label class="ui label">Inscrição Estadual: </label>
						<input type="number" name="nustateregistration" value="<?php echo htmlspecialchars( $provider["nustateregistration"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					</div>

					<div class="field">
						<label class="ui label">Inscrição Municipal: </label>
						<input type="number" name="numunicipalregistration" value="<?php echo htmlspecialchars( $provider["numunicipalregistration"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					</div>
					
				</div>

				<div class="ui buttons">
					<button type="submit" class="ui green button"><i class="save icon"></i>Alterar</button>
					<a href="/manager/providers" class="ui red button">Cancelar</a>
				</div>
			</div>

		</form>
	</div>
</div>