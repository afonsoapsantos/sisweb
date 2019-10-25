<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Usuários</title>
<div class="ui segments" id="component" align="center">  
  	<div class="ui segment">
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
	      <a class="ui green button" href="/admin/">
	        <i class="edit icon"></i>Editar Usuário
	      </a>
	      <a class="ui red button" href="/admin/">
	        <i class="user times icon"></i>Excluir Usuário
	      </a>
	    </div><br/><br/>


	    <div class="ui horizontal divider">Alterar Usuário</div>
		<form class="ui form" action="/admin/users/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST">
			<div class="ui container">
				<div class="field" align="left">
				    <label>Usuário:</label>
				    <input type="text" name="txlogin" value="<?php echo htmlspecialchars( $user["txlogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><br><br>

	                <label>Status:</label>
	                <select class="uis selection" name='txstatususer'>
	                	<option class="item">Selecione o status</option>
	                	<?php $counter1=-1;  if( isset($status) && ( is_array($status) || $status instanceof Traversable ) && sizeof($status) ) foreach( $status as $key1 => $value1 ){ $counter1++; ?>
	                		<option class="item" value="<?php echo htmlspecialchars( $value1["idstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" 
	                		<?php if( $user["statususer"] == $value1["idstatus"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["txnamestatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
	                	<?php } ?>
	                </select></br>

	                <label>Tipo de Usuario: </label>
	                <select class="ui selection" name="usertype">
	                    <option value='0' selected="0">Selecione o tipo de usuário</option>
	                    <?php $counter1=-1;  if( isset($userstypes) && ( is_array($userstypes) || $userstypes instanceof Traversable ) && sizeof($userstypes) ) foreach( $userstypes as $key1 => $value1 ){ $counter1++; ?>
	                    <option value="<?php echo htmlspecialchars( $value1["idusertype"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $user["usertype"] == $value1["idusertype"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["txnameusertype"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
	                    <?php } ?>
	                </select></br>
				</div>
				<div class="ui buttons">
					<button class="ui green button" type="submit"><i class="save icon"></i>Alterar</button>
					<a class="ui red button" href="/admin/users/create"> <i class="delete icon"></i>Cancelar</a>
				</div>
			</div>
		</form>
	</div>
</div>