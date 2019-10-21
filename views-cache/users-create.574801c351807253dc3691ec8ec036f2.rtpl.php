<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="ui segments" id="component" align="center">  
  	<div class="ui segment">
	    <div class="ui horizontal divider">Menu</div>
	    <div class="ui buttons">
	      <a class="ui green button" href="/admin/users/create">
	        <i class="user plus icon"></i>Novo Usuário
	      </a>
	      <a class="ui green button" href="/admin/users">
	        <i class="users icon"></i>Listar Usuários
	      </a>
	      <a class="ui green button" href="/admin/">
	        <i class="id card icon"></i>Consultar Usuário
	      </a>
	      <a class="ui red button" href="/admin/">
	        <i class="edit icon"></i>Editar Usuário
	      </a>
	      <a class="ui red button" href="/admin/">
	        <i class="user times icon"></i>Excluir Usuário
	      </a>
	    </div><br/><br/>


	    <div class="ui horizontal divider">Adicionar Usuário</div>
		<form class="ui form" action="/admin/users/create" method="POST">
			<div class="ui container">
				<div class="field" align="left">
				    <label>Usuário:</label>
				    <input type="text" name="login" placeholder="Usuário"><br><br>
				    <label>Senha:</label>
				    <input type="password" name="password" placeholder="Senha de acesso"><br><br>
					
				    <label>Tipo de Usuario: </label>
	                <select class="ui selection" name="usertype">
	                    <option value='0' selected="0">Selecione o tipo</option>
	                    <option value=1>Administrador</option>
	                    <option value=2>Gerente</option>
	                    <option value=3>Técnico</option>
	                    <option value=4>Cliente</option>
	                    <option value=5>Funcionario Fazenda</option>
	                </select></br>

	                <label>Status:</label>
	                <select class="uis selection" name='usertype'>
	                	<option>Ativo</option>
	                	<option>Solicitado</option>
	                	<option>Inativo</option>
	                	<option>Aguardando liberação</option>
	                </select></br>

	                <label>Data de registro:</label>
				    <div class="ui disable input">
				    	<input type="date" name="dtregisteruser" value="">
				    </div>
				</div>
				<div class="ui buttons">
					<button class="ui green button" type="submit"><i class="save icon"></i>Salvar</button>
					<a class="ui red button" href="/admin/users/create"> <i class="delete icon"></i>Cancelar</a>
				</div>
			</div>
		</form>
	</div>
</div>