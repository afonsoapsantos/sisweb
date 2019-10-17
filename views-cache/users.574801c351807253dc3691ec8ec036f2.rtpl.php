<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="ui segments" id="component" align="center">  
  <div class="ui segment">
    <div class="ui horizontal divider">Menu</div>
    <div class="ui buttons">
      <button class="ui green button"><i class="user plus icon"></i>Novo Usuário</button>
      <button class="ui green button"><i class="users icon"></i>Listar Usuários</button>
      <button class="ui green button"><i class="id card icon"></i>Consultar Usuário</button>
      <button class="ui red button"><i class="edit icon"></i>Editar Usuário</button>
      <button class="ui red button"><i class="user times icon"></i>Excluir Usuário</button>
    </div>
    <div class='ui horizontal divider'>Usuários</div><br/>
    <table class='ui very basic table'>
      <thead align='center'>
        <tr>
          <th>Codigo</th>
          <th>Login</th>
          <th>Status</th>
          <th>Tipo Usuário</th>
          <th>Data de Cadastro</th> 
          <th>Opções</th>
        </tr>
      </thead>
      <tbody align='center'>
          <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
          <tr>
            <td><?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["txlogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["txstatususer"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["txnameusertype"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["dtregisteruser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td>
              <a href="/admin/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="circular ui blue icon button">
                <i class="edit icon"></i>
              </a>
              <a href="/admin/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" class="circular ui red icon button">
                <i class="delete icon"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
      </tbody>        
    </table>
  </div><br/>
</div>