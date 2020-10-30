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
		<form class="ui form" action="/admin/services/create" method="POST">
			<div class="field">
				<label class="ui black label">Nome do Serviço:</label>
				<input type="text" name="txnameservice">
			</div>
			<div class="field">
				<label class="ui black label">Descrição:</label>
				<input type="text" name="txdescriptionservice">
			</div>
			<div class="field">
				<label class="ui black label">Preço:</label>
				<input type="text" name="vlprice">
			</div>
			<div class="field" align="center">
				<div class="ui buttons">
					<button class="ui green button" type="submit">Inserir</button>
					<a class="ui red button" href="">Cancelar</a>
				</div>
			</div>
		</form>
	</div>
</div>
<br><br>