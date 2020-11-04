<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Novo Serviço</title>

<div id="page-admin-services-new">
	
	<div class="container">
		<aside>
			
			<header class="vertical-menu">
				<a href="/admin/services" class="item">Serviços</a>
				<a href="/admin/services/create" class="item">Novo</a>
				<a href="#" class="item">Gráficos</a>
				<a href="#" class="item">Analises</a>
				<a href="#" class="item">Quadros</a>
				<a href="#" class="item">Agendas</a>
			</header>

		</aside>
		<main>
			<h2>Novo Serviço</h2>
			<section>
				<form action="/admin/services/create" method="POST">
					<div class="field">
						<label>Nome do Serviço:</label>
						<input type="text" name="txnameservice">
					</div>
					<div class="field">
						<label>Descrição:</label>
						<input type="text" name="txdescriptionservice">
					</div>
					<div class="field">
						<label>Preço:</label>
						<input type="text" name="vlprice">
					</div>
					<div class="field" align="center">
						<div>
							<button class="ui green button" type="submit">Inserir</button>
							<a class="ui red button" href="/admin/services/create">Cancelar</a>
						</div>
					</div>
				</form>
			</section>

		</main>
	</div>

</div>