<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Usuários</title>
<div class="ui segment">
  <div class="ui horizontal divider">Técnicos</div><br>
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
        <div class="field">
          <div class="ui horizontal divider">Menu</div>
          <div class="ui buttons">
            <a class="ui green button" href="/manager/users/managers/create">
              <i class="plus icon"></i> Adicionar Técnico
            </a>
            <a class="ui green button" href="/manager/users">
              <i class="list icon"></i>Técnicos
            </a>
          </div>
        </div>
        <div class="field">
          <div class="ui horizontal divider">Adicionar Técnico</div>
          <form class="ui form" action="/manager/users/managers/create" method="POST">
            <div class="field" align="left">
              <label>Nome:</label>
              <input type="text" name="txnametec">
            </div>
            <div class="field" align="left">
              <label>Email:</label>
              <input type="text" name="txemailtec">
            </div>
            <div class="field" align="left">
              <label>Celular:</label>
              <input type="text" name="nucellphonetec">
            </div>
            <div class="field" align="left">
              <label>Especialidade:</label>
              <input type="text" name="txespecialidade">
            </div>
            <div class="field" align="left">
              <label>Funçao:</label>
              <input type="text" name="txfuncao">
            </div>
            <div class="ui horizontal divider">Acesso</div>
            <div class="field" align="left">
              <label>Usuário de Acesso:</label>
              <input type="text" name="txlogin">
            </div>
            <div class="field" align="left">
              <label>Senha de Acesso:</label>
              <input type="password" name="txpassword">
            </div>
            <div class="field">
              <button class="ui green button" type="submit"><i class="save icon"></i>Cadastrar</button>
              <a class="ui red button" href="/manager/users/managers">
                <i class="delete icon"></i>Cancelar
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br>
</div>