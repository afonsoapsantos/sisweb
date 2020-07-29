<?php if(!class_exists('Rain\Tpl')){exit;}?>    <div class="field">
      <div class="ui container">
        <h1 class="ui dividing header" align="center">Cadastro</h1>
        <form class="ui form">

          <h4 class="ui dividing header">Informações Fisicas</h4>
          <div class="ui field">
            <div class="field">
              <label>Nome:</label>
              <input type="text" name="name" placeholder="Nome Completo">
            </div>
            <div class="field">
              <label>Nome:</label>
              <input type="text" name="nurg" placeholder="RG">
            </div>
            <div class="field">
              <label>CPF:</label>
              <input type="text" name="nucpf" placeholder="CPF">
            </div>

            <div class="field">
              <label>Endereço: </label>
              <input type="text" name="addresscpf" placeholder="Endereço Fisico">
            </div>

            <div class="two fields">
              <div class="field">
                <label>Estado</label>
                <input type="text" name="statecpf" placeholder="Estado">
              </div>
              <div class="field">
                <label>Cidade:</label>
                <input type="text" name="citycpf" placeholder="Cidade">
              </div>
            </div>

            <h4 class="ui dividing header">Informações Juridicas</h4>
            <div class="field">
              <label>Razão Social:</label>
              <input type="text" name="corporatenamecnpj" placeholder="Razão Social">
            </div>

            <div class="field">
              <label>Nome Fantasia:</label>
              <input type="text" name="fantasynamecnpj" placeholder="Nome Fantasia - Opcional ">
            </div>

            <div class="field">
              <label>CNPJ:</label>
              <input type="text" name="cnpj" placeholder="CNPJ">
            </div>

            <div class="field">
              <label>Endereço: </label>
              <input type="text" name="addresscnpj" placeholder="Endereço Juridico">
            </div>

            <div class="two fields">
              <div class="field">
                <label>Estado</label>
                <input type="text" name="statecnpj">
              </div>
              <div class="field">
                <label>Cidade:</label>
                <input type="text" name="citycnpj">
              </div>
            </div>

            <h4 class="ui dividing header">Informações de Acesso</h4>
            <div class="field">
              <label>Usuário:</label>
              <input type="text" name="txlogin" placeholder="Usuário de Acesso">
            </div>

            <div class="field">
              <label>Senha:</label>
              <input type="password" name="txsenha" placeholder="Senha de acesso">
            </div>

            <div class="field" align="center">
              <div class="ui buttons">
                <button class="ui green button">Enviar pedido</button>
                <a class="ui black button" href="/">Voltar</a>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>