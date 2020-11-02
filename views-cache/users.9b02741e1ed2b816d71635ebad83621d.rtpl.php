<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Usuários</title>
<div id="page-admin-users">
  <div class="container">
    <div class="container-users">
      <aside>
        <header class="vertical-menu">
          <a href="#" class="item">Inicio</a>
          <a href="#" class="item">Relatórios</a>
          <a href="#" class="item">Gráficos</a>
          <a href="#" class="item">Analises</a>
          <a href="#" class="item">Quadros</a>
          <a href="#" class="item">Agendas</a>
        </header>
      </aside>
    </div>

    <h1>Usuários</h1>

    <div class="page-users">
      <table>
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
              <td><?php echo htmlspecialchars( $value1["txnamestatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td><?php echo htmlspecialchars( $value1["txnameusertype"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td><?php echo formatDate($value1["dtregisteruser"]); ?></td>
              <td>
                <a href="/admin/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Editar</a>
                <a href="/admin/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" 
                  onclick="return confirm('Deseja realmente excluir?')">
                Excluir</a>
              </td>
            </tr>
            <?php } ?>

        </tbody>        
      </table>
    </div>
  </div>
</div>