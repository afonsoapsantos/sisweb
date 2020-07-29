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

<?php if( $error != '' ){ ?>
    <div class="field" id="margin">
        <div></div>
        <div class="ui negative message">
            <div class="header"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
        </div>
    </div>
<?php } ?>

<?php if( $success != '' ){ ?>
    <div class="field" id="margin">
        <div></div>
        <div class="ui success message">
            <div class="header"><?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
        </div>
    </div>
<?php } ?>

<div class="ui horizontal divider">Nova Solicitação</div>
<div class="field" align="left" style="margin-left: 60px; margin-right: 60px;">
	<form class="ui form" method="POST" action="/customer/requests/update/<?php echo htmlspecialchars( $request["idrequest"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" accept-charset="utf-8">
		<div class="field">
			<label class="ui black label">Cliente</label>
			<input class="ui label" readonly="true" value="<?php echo htmlspecialchars( $request["txcorporatename"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            <input type="hidden" name="idcustomer" value="<?php echo htmlspecialchars( $request["idcustomer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
		</div>

		<div class="field">
			<label class="ui black label">Implemento:</label>
			<select class="ui selection" name="idimplement">
				<option>Selecione o implemento</option>
                <?php $counter1=-1;  if( isset($implements) && ( is_array($implements) || $implements instanceof Traversable ) && sizeof($implements) ) foreach( $implements as $key1 => $value1 ){ $counter1++; ?>
                    <option value="<?php echo htmlspecialchars( $value1["idimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idimplement"] == $request["implementfk"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["txnameimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>
			</select>
		</div>

        <div class="field">
            <label class="ui black label">Fazenda:</label>
            <select class="ui selection" name="idfarm">
                <option>Selecione a fazenda</option>
                <?php $counter1=-1;  if( isset($farms) && ( is_array($farms) || $farms instanceof Traversable ) && sizeof($farms) ) foreach( $farms as $key1 => $value1 ){ $counter1++; ?>
                    <option value="<?php echo htmlspecialchars( $value1["idfarm"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["idfarm"] == $request["farmfk"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["txnamefarm"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>
            </select>
        </div>

        <input type="hidden" name="statusfk" value="4">

		<div class="field">
    		<label class="ui black label">Problema:</label>
    		<textarea rows="2" required name="txproblem"><?php echo htmlspecialchars( $request["txproblem"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
    	</div>

        <div class="field">
            <label class="ui black label">Situação:</label>
            <textarea rows="2" required name="txsituation"><?php echo htmlspecialchars( $request["txsituation"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
        </div>

        <div class="field" align="center">
            <div class="ui buttons">
                <button class="ui green button" type="submit"><i class="save icon"></i>Alterar</button>
                <a href="/customer/requests" class="ui red button">Cancelar</a>
            </div>
        </div><br>
	</form><br>
</div>