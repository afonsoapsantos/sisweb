<?php if(!class_exists('Rain\Tpl')){exit;}?><div id="page-admin-index">
	
	<div class="container">
		<h1>Seja Bem Vindo(a) <?php echo htmlspecialchars( $user["txlogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!</h1>
		
		<aside>
			<header class="vertical-menu">
				<a href="#" class="item">Inicio</a>
				<a href="#" class="item">Relatórios</a>
				<a href="#" class="item">Gráficos</a>
				<a href="#" class="item">Analises</a>
				<a href="#" class="item">Quadros</a>
				<a href="#" class="item">Agendas</a>
			</header>
		</aside>

	</div>

</div>