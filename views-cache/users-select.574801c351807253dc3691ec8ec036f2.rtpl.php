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
      <a class="ui green button" href="/admin/users/edit">
        <i class="edit icon"></i>Editar Usuário
      </a>
      <a class="ui red button" href="/admin/users/delete">
        <i class="user times icon"></i>Excluir Usuário
      </a>
    </div><br/><br/>
    <div class='ui horizontal divider'>Usuários</div><br/>
    <form class="ui form" method="POST">
      <select class="ui selection" name="iduser">
        <option value='0'>Selecione o usuário</option>
        <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
          <option class="item" value="<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["txlogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
        <?php } ?>
      </select></br>

      <div class="ui buttons">
        <button class="ui green button" type="submit">Carregar</button>
        <a class="ui red button" href="/admin/users">Cancelar</a>
      </div>

    </form>
  </div><br/>
</div>