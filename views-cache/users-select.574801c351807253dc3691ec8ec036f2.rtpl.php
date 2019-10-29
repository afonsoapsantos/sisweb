<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Usuários</title>
    <div class='ui horizontal divider'>Usuários</div><br/>
    <form class="ui form">
      <select class="ui selection" name="iduser">
        <option value='0'>Selecione o usuário</option>
        <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
          <option class="item" value="<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["txlogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
        <?php } ?>
      </select></br>

      <div class="ui buttons">
        <a class="ui green button" type="submit">Alterar</a>
        <a class="ui green button" type="submit">Consultar</a>
        <a class="ui red button" href="/admin/users">Cancelar</a>
      </div>

    </form>
