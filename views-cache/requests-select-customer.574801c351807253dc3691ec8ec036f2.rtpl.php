<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Selecione cliente</title>

<div class="field">	
	<div class="ui horizontal divider">Menu</div>
	<div class="ui buttons">
      	<a class="ui green button" href="/admin/requests/select">
        	<i class="plus icon"></i>Nova Solcitação
      	</a>
      	<a class="ui green button" href="/admin/requests">
        	<i class="list icon"></i>Listar Solcitação
      	</a>
      	<a class="ui green button" href="/admin/requests/consult">
        	<i class="info icon"></i>Consultar Solcitação
      	</a>
    </div>
</div>

<div class="field" style="margin-left: 60px; margin-right: 60px;">
	<form class="ui form" method="POST" action="/admin/requests/select/customer">
		<div class="field">
			<div class="ui horizontal divider">Selecione o cliente:</div>
			<div class="field">
				<label class="ui grey label">Cliente:</label>
				<select class="ui selection" name="idcustomer">
					<option value="0" selected>Seleciones o cliente</option>
					<?php $counter1=-1;  if( isset($customers) && ( is_array($customers) || $customers instanceof Traversable ) && sizeof($customers) ) foreach( $customers as $key1 => $value1 ){ $counter1++; ?>
						<option value="<?php echo htmlspecialchars( $value1["idcustomer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["idcustomer"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["txnamecustomer"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
					<?php } ?>
				</select>
			</div>

			<div class="ui horizontal divider">Ou</div>
			<div class="field">
				<label class="ui grey label">Nome do Cliente:</label>
				<input type="text" name="txnamecustomer">
			</div>

			<div class="ui horizontal divider">Ou</div>
			<div class="field">
				<label class="ui grey label">Código do Cliente:</label>
				<input class="ui input" type="number" name="id">
			</div>

			<div class="field" align="center" style="margin-right: 340px; margin-left: 340px;">
				<div class="ui message" align="center">
					<div class="header">Aviso: </div>
					<ul class="list">
					    <li class="red">Use apenas uma das opções acima para buscar o cliente desejado!</li>
					    <li>Caso encontre algum erro comunicar o suporte.</li>
					</ul>
				</div>
			</div>

			<div class="field">
				<div class="ui buttons">
					<button type="submit" class="ui black button">Carregar</button>
					<a class="ui red button" href="/admin/requests">Cancelar</a>
				</div>
			</div>
		</div>
	</form>
</div>