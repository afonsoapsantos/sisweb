<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Sisweb - Solicitações</title>
  	<div class="ui buttons">
	      	<a class="ui green button" href="/admin/requests/select">
	        	<i class="user plus icon"></i>Nova Solcitação
	      	</a>
	      	<a class="ui green button" href="/admin/requests">
	        	<i class="users icon"></i>Listar Solcitação
	      	</a>
	      	<a class="ui green button" href="/admin/requests/consult">
	        	<i class="id card icon"></i>Consultar Solcitação
	      	</a>
	    </div>
	    <br><br>
	    <div class="ui field" style="margin-right: 60px; margin-left: 60px;">
	    	<div class="ui horizontal divider">Nova Solicitação</div>
	    	
	    	<form class="ui form" method="POST" action="/admin/request/create">
		    	
		    	<div align="left" class="field">
		    		<div class="field">
		    			<label class="ui grey label">Cliente:</label>
				    	<label class="ui label"></label>
		    		</div>

		    		<label></label>

			    	<div class="field">
			    		<label class="ui label">Implemento:</label>
				    	<select class="ui selection">
				    		<option>Selecione o implemento</option>
				    		<option value=""> - </option>
				    	</select>
			    	</div>
			    	
			    	<div class="field">
			    		<label class="ui label">Problema:</label>
			    		<textarea rows="2" required name="txproblem"></textarea>
			    	</div>

			    	<div class="field">
			    		<label class="ui label">Fotos:</label>
			    		<input type="file" multiple="multiple" name="images[]">
			    	</div>

			    	<div class="field">
			    		<label class="ui label">Áudios:</label>
			    		<input type="file" multiple="multiple" name="audios[]">
			    	</div>

			    	<div class="field">
			    		<label class="ui label">Videos:</label>
			    		<input type="file" multiple="multiple" name="videos[]">
			    	</div>

			    </div>

		    	<br/>
		    	<div align="center" class="ui buttons">
		    		<button class="ui green button" type="submit">Salvar</button>
		    	</div>

		    </form>

	    </div>
