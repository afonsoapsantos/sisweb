<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="ui segments" id="component" align="center">  
  	<div class="ui segment">
	    <div class="ui horizontal divider">Menu</div>
	    <div class="ui buttons">
	      <a class="ui green button" href="/admin/users/create">
	        <i class="user plus icon"></i>Novo
	      </a>
	      <a class="ui green button" href="/admin/users">
	        <i class="users icon"></i>Listar
	      </a>
	      <a class="ui green button" href="/admin/">
	        <i class="id card icon"></i>Consultar
	      </a>
	      <a class="ui green button" href="/admin/">
	        <i class="edit icon"></i>Editar
	      </a>
	      <a class="ui red button" href="/admin/">
	        <i class="user times icon"></i>Excluir
	      </a>
	    </div><br/><br/>
		<form class="ui form">
			<div class="field" align="left">
			    <label>SQL:</label>
			    <textarea name="sqlcmd"></textarea>
		  	</div>
		</form><br/>

		<div class="ui buttons">
			<button class="ui green button">Gerar</button>
			<button class="ui black button">Voltar</button>
		</div>
	</div>
</div>