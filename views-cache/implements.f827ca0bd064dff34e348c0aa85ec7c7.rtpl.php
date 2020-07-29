<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Implementos</title>
<div class="field" id="margin">
	<div class="field">	
		<div class="ui horizontal divider">Menu</div>
		<div class="ui buttons">
	      	<a class="ui green button" href="/customer/implements/create">
	        	<i class="plus icon"></i>Novo Implemento
	      	</a>
	      	<a class="ui green button" href="/customer/implements">
	        	<i class="list icon"></i>Implementos
	      	</a>
	    </div>
	</div><br>
	<div class="field">
		<?php if( $error != '' ){ ?>
			<div class="field">
				<div class="ui negative message">
					<div class="header"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
				</div>
			</div>
		<?php } ?>
		<?php if( $sucess != '' ){ ?>
			<div class="field" style="top: 2px;">
				<div class="ui success message">
					<div class="header"><?php echo htmlspecialchars( $sucess, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
				</div>
			</div>
		<?php } ?>
		<div class="ui horizontal divider">Implementos</div>
		<table class="ui stackable very basic table">
			<thead align="center">
				<th>Codigo</th>
				<th>Nome</th>
				<th>Modelo</th>
				<th>Tipo</th>
				<th>Ano</th>
				<th>Descrição</th>
				<th>Opções</th>
			</thead>
			<tbody align="center">
				<?php $counter1=-1;  if( isset($implements) && ( is_array($implements) || $implements instanceof Traversable ) && sizeof($implements) ) foreach( $implements as $key1 => $value1 ){ $counter1++; ?>
				<tr>
					<td><?php echo htmlspecialchars( $value1["idimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["txnameimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["txmodelimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["txtype"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["nuanofabricacaoimp"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["txdescricaoimp"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td style="width: 200px;">
						<a class="circular ui green icon button" href="/customer/implements/update/<?php echo htmlspecialchars( $value1["idimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
							<i class="edit icon"></i>
						</a>
						<a class="circular ui red icon button" onclick="return confirm('Deseja realmente excluir?')" href="/customer/implements/delete/<?php echo htmlspecialchars( $value1["idimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
							<i class="delete icon"></i>
						</a>
						<a class="circular ui icon button" href="/customer/implements/consult/<?php echo htmlspecialchars( $value1["idimplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				        	<i class="info icon"></i>
				      	</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div><br>
</div><br>
</div>