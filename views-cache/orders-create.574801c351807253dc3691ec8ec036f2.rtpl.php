<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Nova Ordem de Serviço</title>
<div class="ui segment">
	<div class="field">
	    <div class="ui horizontal divider">Menu</div>
	    <div class="ui buttons">
		    <a class="ui green button" href="/admin/orders/create">
		    	<i class="user plus icon"></i>Nova Ordem
		    </a>
	    	<a class="ui green button" href="/admin/orders">
	        	<i class="users icon"></i>Ordens de Serviço
	    	</a>
	    	<a class="ui green button" href="/admin/orders/consult">
	        	<i class="id card icon"></i>Consultar Ordem
	    	</a>
	    </div>
	</div><br>

	<div class="ui horizontal divider">Nova Ordem</div>
	<div class="field" style="margin-right: 60px; margin-left: 60px;">

		<form class="ui form" action="/admin/orders/create" method="POST">

			<div class="field" align="left">
				<label>Cliente: </label>
				<select class="ui selection">
					<option onmouseup="carryData()">Selecione o cliente
				</select>
			</div>

			<div class="field">
				<label>Implemento</label>
				<select class="ui selection"></select>
			</div>

			<div class="field">
				<label>Fazenda:</label>
				<select class="ui selection"></select>
			</div>

			<div class="field">
				<label>Status:</label>
				<select class="ui selection"></select>
			</div>

			<div class="field">
				<label>Situação:</label>
				<input type="text" name="txsituation">
			</div>

			<div class="field">
				<label>Problema:</label>
				<input type="text" name="txproblem">
			</div>
			
		</form>
		
	</div>
</div>