<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Gerar Ordem</title>

<div class="ui segment">
	<div class="ui horizontal divider">Menu</div>
	<div class="ui buttons">
		<a class="ui green button" href="/manager/requests"><i class="list icon"></i>Solicitações</a>
		<a class="ui green button" href="/manager/orders"><i class="list icon"></i>Ordens</a>
		<a class="ui green button" href="/manager/customers"><i class="list icon"></i>Clientes</a>
	</div>
	<br><br>
	<div>
		<div class="ui horizontal divider">Gerar Ordem de Serviço</div>
		<div class="field" id="margins">
			<?php if( $error != '' ){ ?>
				<div class="ui warning message">
					<div class="header"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>!</div> 
				</div>
			<?php } ?>
		</div><br>
		<form class="ui form" method="POST" action="/manager/orders/create">
			<div class="ui field" id="margins">
				<div align="left" class="field">
					<label class="ui grey label">Cliente: </label>
					<input type="hidden" name="customerfk" value="<?php echo htmlspecialchars( $request["idcustomer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					<input type="text" readonly="true" name="txcorporatename" value="<?php echo htmlspecialchars( $request["txcorporatename"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				</div>

				<div align="left" class="field">
					<label class="ui grey label">Implemento: </label>
					<input type="hidden" name="implementfk" value="<?php echo htmlspecialchars( $request["idimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					<input type="text" name="txnameimplement" readonly="true" value="<?php echo htmlspecialchars( $request["txnameimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				</div>

				<div align="left" class="field">
					<label class="ui grey label">Fazenda: </label>
					<input type="hidden" name="farmfk" value="<?php echo htmlspecialchars( $request["idfarm"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					<input type="text" name="" readonly="true" value="<?php echo htmlspecialchars( $request["txnamefarm"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				</div>

				<div align="left" class="field">
					<label class="ui grey label">Situação: </label>
					<input type="text" readonly="true" name="txlocation" value="<?php echo htmlspecialchars( $request["txsituation"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				</div>

				<div align="left" class="field">
					<label class="ui grey label">Problema: </label>
					<input type="text" readonly="true" name="txdescription" value="<?php echo htmlspecialchars( $request["txproblem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				</div>

				<div class="field" align="left">
					<label class="ui grey label">Status:</label>
					<input type="hidden" name="statusfk" value="1">
					<input type="text" value="Aberta" readonly="true">
				</div>
				<input type="hidden" name="requestfk" value="<?php echo htmlspecialchars( $request["idrequest"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

			</div>

			<div class="ui buttons">
				<button class="ui green button" type="submit"><i class="clipboard icon"></i>Gerar</button>
				<a class="ui red button" href="/manager/requests"><i class="delete icon"></i>Cancelar</a>
			</div><br>	
		</form><br>

	</div>
</div>