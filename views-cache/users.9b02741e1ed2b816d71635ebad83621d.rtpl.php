<?php if(!class_exists('Rain\Tpl')){exit;}?><div id="page-admin-users">
  <div class="container">
    <aside>
      <header class="vertical-menu">
        <a href="/admin/users" class="item">Usuários</a>
        <a href="/admin/users/create" class="item">Novo Usuário</a>
        <a href="#" class="item">Permissões</a>
        <a href="#" class="item">Analises</a>
        <a href="#" class="item">Relatórios</a>
        <a href="#" class="item">Agendas</a>
      </header>
    </aside>

    <main>
      <h2>Usuários</h2>
      <table>
        <thead>
          <tr>
            <!-- <th>Codigo</th> -->
            <th>Login</th>
            <th>Status</th>
            <th>Tipo Usuário</th>
            <th>Data de Cadastro</th> 
            <th>Opções</th>
          </tr>
        </thead>
        <tbody align='center'>
            <?php $counter1=-1;  if( isset($data) && ( is_array($data) || $data instanceof Traversable ) && sizeof($data) ) foreach( $data as $key1 => $value1 ){ $counter1++; ?>

            <tr>
              <!-- <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> -->
              <td><?php echo htmlspecialchars( $value1["txlogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td><?php echo htmlspecialchars( $value1["txnamestatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td><?php echo htmlspecialchars( $value1["txnameusertype"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td><?php echo formatDate($value1["dtregisteruser"]); ?></td>
              <td>
                <a href="/admin/users/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  <span class="material-icons">cached</span>
                </a>
                <a href="/admin/users/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" 
                  onclick="return confirm('Deseja realmente excluir?')">
                  <span class="material-icons">delete</span>
                </a>
              </td>
            </tr>
            <?php } ?>

        </tbody>        
      </table>

      <nav>
        <ul>
          <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

          <li><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
          <?php } ?>

        </ul>
      </nav>

    </main>
  </div>
</div>