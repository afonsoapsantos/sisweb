<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Administradores</title>
<div class="ui segment">
  <div class="field">
    <div class="ui horizontal divider">Menu</div>
    <div class="ui buttons">
      <a class="ui green button" href="/admin/users/admins/create">
        <i class="user plus icon"></i>Novo Adminsitrador
      </a>
      <a class="ui green button" href="/admin/users/admins">
        <i class="users icon"></i>Adminsitradores
      </a>
      <a class="ui green button" href="/admin/users/admins/consult">
        <i class="id card icon"></i>Consultar Adminsitrador
      </a>
    </div>
  </div>

  <br>

  <div class="field" id="margins">
    <div class='ui horizontal divider'>Administradores</div><br/>
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
          <?php $counter1=-1;  if( isset($admins) && ( is_array($admins) || $admins instanceof Traversable ) && sizeof($admins) ) foreach( $admins as $key1 => $value1 ){ $counter1++; ?>
          <tr>
            <td><?php echo htmlspecialchars( $value1["pkuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["txlogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["txnamestatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["txnameusertype"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["dtregisteruser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td>
              <a href="/admin/users/<?php echo htmlspecialchars( $value1["pkuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="circular ui green icon button">
                <i class="edit icon"></i>
              </a>
              <a href="/admin/users/admins/<?php echo htmlspecialchars( $value1["pkuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir?')" class="circular ui red icon button">
                <i class="delete icon"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
      </tbody>        
    </table>
  </div>
</div>