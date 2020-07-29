<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Nova Fazenda</title>
<div class="ui segment">
	<div class="field">	
		<div class="ui horizontal divider">Menu</div>
		<div class="ui buttons">
	      	<a class="ui green button" href="/customer/farms/create">
	        	<i class="plus icon"></i>Nova Fazenda
	      	</a>
	      	<a class="ui green button" href="/customer/farms">
	        	<i class="list icon"></i>Listar Fazendas
	      	</a>
	    </div>
	</div>
	<br>
	<div class="field" align="left" id="margin"	>
		<h2 class="ui header dividing" align="center">Nova Fazenda</h2>
		<?php if( $error != '' ){ ?>
			<div class="ui negative message" align="center">
				<div class="header"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
			</div>
		<?php } ?>
		<?php if( $sucess != '' ){ ?>
			<div class="ui sucess message" align="center">
				<div class="header"><?php echo htmlspecialchars( $sucess, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
			</div>
		<?php } ?>
		<form class="ui form" action="/customer/farms/create" method="POST">

			<div class="field">
				<label>Nome da Fazenda: </label>
				<input type="text" name="txnamefarm" placeholder="Ex: Fazenda São José">
			</div>

			<div class="field">
				<label>Descrição da Fazenda: </label>
				<input type="text" name="txdescriptionfarm" placeholder="Ex: Fazenda de Millho">
			</div>

			<div class="ui horizontal divider">Endereço</div>

			<div class="field">
				<label>Nome endereço: </label>
				<input type="text" name="txnameaddress">
			</div>

			<div class="field">
				<label>Bairro: </label>
				<input type="text" name="txneighborhood">
			</div>

			<div class="field">
				<label>Cidade: </label>
				<select class="ui selection" name="cityfk">
					<option>Selecione</option>
					<?php $counter1=-1;  if( isset($cities) && ( is_array($cities) || $cities instanceof Traversable ) && sizeof($cities) ) foreach( $cities as $key1 => $value1 ){ $counter1++; ?><option value="<?php echo htmlspecialchars( $value1["pkcity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["txnamecity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option><?php } ?>
				</select>
			</div>

			<div class="field">
				<label>Estado: </label>
				<select class="ui selection" name="statefk">
					<option>Selecione</option>
					<?php $counter1=-1;  if( isset($states) && ( is_array($states) || $states instanceof Traversable ) && sizeof($states) ) foreach( $states as $key1 => $value1 ){ $counter1++; ?><option value="<?php echo htmlspecialchars( $value1["pkstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["txnamestate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["txabbreviation"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option><?php } ?>
				</select>
			</div>

			<div class="field">
				<label>Complemento: </label>
				<input type="text" name="txcomplement">
			</div>

			<div class="field" align="center">
				<div class="ui buttons">
					<button class="ui green button" type="submit">Salvar</button>
					<a class="ui black button" href="/customer/farms">Cancelar</a>
				</div>
			</div>
		</form>
	</div>
</div>