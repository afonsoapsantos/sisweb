<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Novo Serviço</title>
<div class="ui segment">
	<div class="field">
		<div class="ui horizontal divider">Menu</div>
		<div class="ui buttons">
			<a class="ui green button" href="">
				<i class="plus icon"></i>Novo Serviço
			</a>
			<a class="ui green button" href="/admin/services">
				<i class="list icon"></i>Serviços
			</a>
		</div>
	</div><br>
	<div class="field" align="left" id="margins">
		<div class="ui horizontal divider">Novo Serviço</div>
		<form class="ui form" action="/admin/services/update/<?php echo htmlspecialchars( $service["idservice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST">
			<div class="field">
				<label class="ui black label">Nome do Serviço:</label>
				<input type="text" name="txnameservice" value="<?php echo htmlspecialchars( $service["txnameservice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			</div>
			<div class="field">
				<label class="ui black label">Descrição:</label>
				<input type="text" name="txdescriptionservice" value="<?php echo htmlspecialchars( $service["txdescriptionservice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			</div>
			<div class="field">
				<label class="ui black label">Preço:</label>
				<input type="text" name="vlpriceservice" value="<?php echo htmlspecialchars( $service["vlpriceservice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			</div>
			<div class="field" align="center">
				<div class="ui buttons">
					<button class="ui green button" type="submit"><i class="edit icon"></i> Alterar</button>
					<a class="ui red button" href="/admin/services"><i class="delete icon"></i> Cancelar</a>
				</div>
			</div>
		</form>
	</div>
</div>
<br><br>