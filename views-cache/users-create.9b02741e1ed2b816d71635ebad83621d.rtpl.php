<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Usuários</title>
<div class="ui horizontal divider">Menu</div>
    <div class="ui buttons">
      <a class="ui green button" href="/admin/users/create">
        <i class="user plus icon"></i>Novo Usuário
      </a>
      <a class="ui green button" href="/admin/users">
        <i class="users icon"></i>Listar Usuários
      </a>
      <a class="ui green button" href="/admin/users/consult">
        <i class="id card icon"></i>Consultar Usuário
      </a>
</div><br/><br/>
<form class="ui form" action="/admin/users/create" method="POST">
	<div class="ui field">
		<div class="ui horizontal divider">Adicionar Usuário</div>
		<div class="field" align="left" style="margin-left: 50px; margin-right: 50px;">
			<div class="ui horizontal divider">Dados</div>
			
			<label class="ui black label">Nome Completo:</label>
		    <input type="text" name="txperson" placeholder="Nome Completo"><br><br>
		    
		    <label class="ui black label">RG:</label>
		    <input type="text" name="nurg" placeholder="RG"><br><br>
		    
		    <label class="ui black label">CPF/CNPJ:</label>
		    <input type="text" name="nucpf" placeholder="CPF"><br><br>
		    
		    <label class="ui black label">email:</label>
		    <input type="email" name="txemail" placeholder="Email"><br><br>
		    
		    <div class="ui horizontal divider">Dados de Acesso</div>
		    
		    <label class="ui black label">Usuário:</label>
		    <input type="text" name="txlogin" placeholder="Usuário"><br><br>
		    
		    <label class="ui black label">Senha:</label>
		    <input type="password" name="txpassword" placeholder="Senha de acesso"><br><br>

            <label class="ui black label">Status:</label>
            <select class="uis selection" name='fkstatususer'>
            	<option value="0">Selecione o status</option>
            	<?php $counter1=-1;  if( isset($status) && ( is_array($status) || $status instanceof Traversable ) && sizeof($status) ) foreach( $status as $key1 => $value1 ){ $counter1++; ?>

            		<option value="<?php echo htmlspecialchars( $value1["pkstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["txnamestatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
            	<?php } ?>

            </select></br>

            <label class="ui black label">Tipo de Usuario: </label>
            <select class="ui selection" name="fkusertype">
                <option value='0' selected="0">Selecione o tipo de usuário</option>
                <?php $counter1=-1;  if( isset($userstypes) && ( is_array($userstypes) || $userstypes instanceof Traversable ) && sizeof($userstypes) ) foreach( $userstypes as $key1 => $value1 ){ $counter1++; ?>

                	<option value="<?php echo htmlspecialchars( $value1["idusertype"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["txnameusertype"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>

            </select>
        	</br>
		</div>
		<div class="ui buttons">
			<button class="ui green button" type="submit"><i class="save icon"></i>Salvar</button>
			<a class="ui red button" href="/admin/users/create">
				<i class="delete icon"></i>Cancelar
			</a>
		</div><br>
	</div>
</form><br><br>
