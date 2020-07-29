<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="ui segment">
	<div class="field" id="margins">
		<div class="ui horizontal divider">Iniciar Serviço</div>
		<?php if( $success != '' ){ ?>
		<div class="ui success message">
		<div class="header"><?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
		</div>
		<?php } ?>
		<?php if( $error != '' ){ ?>
		<div class="ui negative message">
		<div class="header"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
		</div>
		<?php } ?>
		<div class="field" align="left">
			<form class="ui form" action="/technical/orders/start/<?php echo htmlspecialchars( $order["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST">
				<div class="field">
					<label>Descrição:</label>
					<input type="text" readonly="true" name="" value="<?php echo htmlspecialchars( $order["txdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				</div>
				<div class="field">
					<label>Local:</label>
					<input type="text" readonly="true" name="" value="<?php echo htmlspecialchars( $order["txlocation"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				</div>
				<div class="field">
					<label>Cliente:</label>
					<input type="text" readonly="true" name="customer" value="<?php echo htmlspecialchars( $order["txcorporatename"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					<input type="hidden" name="" value="<?php echo htmlspecialchars( $order["customerfk"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				</div>
				<div class="field">
					<label>Cliente:</label>
					<input type="text" readonly="true" name="customer" value="<?php echo htmlspecialchars( $order["txnamefarm"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					<input type="hidden" name="" value="<?php echo htmlspecialchars( $order["farmfk"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				</div>
				<div class="field">
					<label>Implemento</label>
					<input type="text" readonly="true" name="txnameimplement" value="<?php echo htmlspecialchars( $order["txnameimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					<input type="hidden" value="<?php echo htmlspecialchars( $order["implementfk"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				</div>
				<div class="field">
					<label>Status:</label>
					<input type="text" readonly="true" name="txnamestatus" value="<?php echo htmlspecialchars( $order["txnamestatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					<input type="hidden" name="statusfk" value="2">
				</div>
				<div class="ui stackable grid">
					<div class="eight wide column">
						<div class="field">
							<label>Data de inicio:</label>
							<input type="date" readonly="true" name="dtstart" value="<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						</div>
					</div>
					<div class="eight wide column">
						<div class="field">
							<label>Hora de inicio:</label>
							<input type="time" readonly="true" name="hrstart" value="<?php echo htmlspecialchars( $hora, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						</div>
					</div>
				</div>
				<br>		
				<div class="field">
					<label>Técnico</label>
					<input type="text" readonly="true" name="" value="<?php echo htmlspecialchars( $technician["txnametec"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					<input type="hidden" name="technicianfk" value="<?php echo htmlspecialchars( $technician["pktechnician"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				</div><br>
				<div class="field" align="center">
					<div class="ui buttons">
						<button class="ui green button" type="submit">Iniciar Serviço</button>
						<a class="ui red button" href="/technical/orders"><i class="delete icon"></i>Cancelar</a>
					</div>
				</div><br>
			</form>
		</div>
	</div>
</div>