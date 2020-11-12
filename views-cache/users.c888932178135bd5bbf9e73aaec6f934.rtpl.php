<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Usuários</title>
<div class="ui segment">
  <div class="ui horizontal divider">Usuários</div><br>
  <div class="fields" id="margins">
    <div class="ui stackable grid">
      <div class="four wide column">
        <div class="ui vertical buttons" align="left">
          <a class="ui button" href="/manager/users">Gerentes</a>
          <a class="ui button" href="/manager/users/technical">Técnicos</a>
          <a class="ui button" href="/manager/users/customers">Clientes</a>
          <a class="ui button" href="/manager/users/farmworker">Funcionários Fazenda</a>
        </div>
      </div>

      <div class=" twelve wide column" align="center">
        <div class="ui horizontal divider">Menu</div>
        <div class="ui buttons">
          <a class="ui green button" href="/manager/users/managers/create">
            <i class="plus icon"></i> Adicionar Gerente
          </a>
          <a class="ui green button" href="/manager/users">
            <i class="list icon"></i>Gerentes
          </a>
        </div>
        <div class="field">
          <div class="ui horizontal divider">Gerentes</div>
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
                  <td><?php echo htmlspecialchars( $value1["pkuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["txlogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["txnamestatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["txnameusertype"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo formatDate($value1["dtregisteruser"]); ?></td>
                  <td>
                    <a href="/manager/users/<?php echo htmlspecialchars( $value1["pkuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="circular ui green icon button">
                      <i class="edit icon"></i>
                    </a>
                    <a href="/manager/users/<?php echo htmlspecialchars( $value1["pkuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir?')" class="circular ui red icon button">
                      <i class="delete icon"></i>
                    </a>
                  </td>
                </tr>
                <?php } ?>

            </tbody>        
          </table>
        </div>
      </div>
    </div>
  </div>
  <br>
</div>