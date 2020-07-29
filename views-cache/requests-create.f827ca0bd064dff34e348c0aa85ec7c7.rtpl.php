<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb</title>
<div class="field"> 
    <div class="ui horizontal divider">Menu</div>
    <div class="ui buttons">
        <a class="ui green button" href="/customer/requests/create">
            <i class="plus icon"></i>Nova Solcitação
        </a>
        <a class="ui green button" href="/customer/requests">
            <i class="list icon"></i>Solicitações
        </a>
    </div>
</div>

<?php if( $reqError != '' ){ ?>
    <div class="field" id="margin">
        <div></div>
        <div class="ui negative message">
            <div class="header"><?php echo htmlspecialchars( $reqError, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
        </div>
    </div>
<?php } ?>

<?php if( $medError != '' ){ ?>
    <div class="field" id="margin">
        <div></div>
        <div class="ui negative message">
            <div class="header"><?php echo htmlspecialchars( $medError, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
        </div>
    </div>
<?php } ?>

<?php if( $reqSuccess != '' ){ ?>
    <div class="field" id="margin">
        <div></div>
        <div class="ui success message">
            <div class="header"><?php echo htmlspecialchars( $reqSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
        </div>
    </div>
<?php } ?>

<?php if( $medSuccess != '' ){ ?>
    <div class="field" id="margin">
        <div></div>
        <div class="ui success message">
            <div class="header"><?php echo htmlspecialchars( $medSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
        </div>
    </div>
<?php } ?>

<div class="ui horizontal divider">Nova Solicitação</div>
<div class="field" align="left" style="margin-left: 60px; margin-right: 60px;">
	<form class="ui form" method="POST" action="/customer/requests/create" enctype="multipart/form-data" accept-charset="utf-8">
		<div class="field">
			<label class="ui black label">Cliente</label>
			<input class="ui label" readonly="true" value="<?php echo htmlspecialchars( $customer["txcorporatename"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            <input type="hidden" name="idcustomer" value="<?php echo htmlspecialchars( $customer["idcustomer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
		</div>

		<div class="field">
			<label class="ui black label">Implemento:</label>
			<select class="ui selection" name="idimplement">
				<option>Selecione o implemento</option>
                <?php $counter1=-1;  if( isset($implements) && ( is_array($implements) || $implements instanceof Traversable ) && sizeof($implements) ) foreach( $implements as $key1 => $value1 ){ $counter1++; ?>
                    <option value="<?php echo htmlspecialchars( $value1["idimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["txnameimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>
			</select>
		</div>

        <div class="field">
            <label class="ui black label">Fazenda:</label>
            <select class="ui selection" name="idfarm">
                <option>Selecione a fazenda</option>
                <?php $counter1=-1;  if( isset($farms) && ( is_array($farms) || $farms instanceof Traversable ) && sizeof($farms) ) foreach( $farms as $key1 => $value1 ){ $counter1++; ?>
                    <option value="<?php echo htmlspecialchars( $value1["idfarm"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["txnamefarm"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>
            </select>
        </div>

        <input type="hidden" name="statusfk" value="2">

		<div class="field">
    		<label class="ui black label">Problema:</label>
    		<textarea rows="2" required name="txproblem"></textarea>
    	</div>

        <div class="field">
            <label class="ui black label">Situação:</label>
            <textarea rows="2" required name="txsituation"></textarea>
        </div>

    	<div class="field">
    		<label class="ui black label">Midia:</label>
    		<input type="file" multiple="multiple" name="media[]">
    	</div>

        <div class="field" align="center">
            <div class="ui buttons">
                <button class="ui green button" type="submit"><i class="save icon"></i>Gerar Solicitação</button>
                <a href="/customer/requests/create" class="ui red button">Cancelar</a>
            </div>
        </div><br>
	</form><br>
</div>