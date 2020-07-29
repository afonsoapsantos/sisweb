<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Adicionar Implemento</title>
<div class="field">
	<div class="ui horizontal divider">Menu</div>
	<div class="ui buttons">
		<a class="ui green button" href="/admin/implements/create"><i class="plus icon"></i>Adicionar Implemento</a>
		<a class="ui green button" href="/admin/implements">
			<i class="list icon"></i>Listar Implementos
		</a>
		<a class="ui green button" href=""><i class="info icon"></i>Consultar Implemento</a>
	</div>
</div><br>
<div class="field" align="left" style="margin-right: 60px; margin-left: 60px;">
	<div class="ui horizontal divider">Adicionar implemento</div>
	<form class="ui form" method="POST" action="/admin/implements/create">	
		<div class="field">
			<label class="ui black label">Nome do Implemento:</label>
			<input class="ui input" type="text" name="">
		</div>
		<div class="field">
			<label class="ui black label">Modelo do Implemento:</label>
			<input class="ui input" type="text" name="">
		</div>
		<div class="field">
			<label class="ui black label">Tipo do Implemento:</label>
			<input class="ui input" type="text" name="">
		</div>
		<div class="field">
			<label class="ui black label">Ano de fabricação:</label>
			<input class="ui input" type="text" name="">
		</div>
		<div class="field">
			<label class="ui black label">Descrição:</label>
			<input class="ui input" type="text" name="">
		</div>

		<div class="field" align="center">
			<div align="center" class="ui buttons">
				<button class="ui green button">Salvar</button>
				<a class="ui red button" href="">Cancelar</a>
			</div>
		</div>
	</form>
</div>
