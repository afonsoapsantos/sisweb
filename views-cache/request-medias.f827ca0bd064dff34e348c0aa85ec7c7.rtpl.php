<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Midia</title>
<div class="ui segment">

	<div class="field" id="margin">
		<div class="ui horizontal divider">Menu</div>
		<div class="ui buttons">
			<a class="ui green button" href="">
				<i class="plus icon"></i>Adicionar Midia
			</a>
			<a class="ui green button" href="">
				<i class="list icon"></i>Midias
			</a>
			<a class="ui green button" href="/customer/requests">
				<i class="list icon"></i>Solicitações
			</a>
		</div>
	</div>

	<div class="field" id="margin">
		<div class="ui horizontal divider">Midias</div>
		<table class="ui very basic table">
			<thead>
				<tr>
					<th>codigo</th>
					<th>Nome</th>
					<th>Local</th>
					<th>descrição</th>
					<th>Registro</th>
					<th>Opções</th>
				</tr>
			</thead>
			<tbody>
				<?php $counter1=-1;  if( isset($medias) && ( is_array($medias) || $medias instanceof Traversable ) && sizeof($medias) ) foreach( $medias as $key1 => $value1 ){ $counter1++; ?>
				<tr>
					<td><?php echo htmlspecialchars( $value1["idmedia"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["txnamemedia"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["txlocalmedia"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["txdescription"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["dtmedia"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td>
						<a class="circular ui icon red button" href="">
							<i class="delete icon"></i>
						</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<br>
</div>