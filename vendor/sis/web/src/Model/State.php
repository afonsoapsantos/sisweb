<?php 

	namespace Sisweb\Model;
	
	use \Sisweb\Model;
	use \Sisweb\DB\Database; 

	/**
	 * 
	 */
	class State extends Model {
		
		public function listAll() {
			$database = new Database();
			return $results = $database->select("SELECT * FROM public.tb_states;");
		}
		
	}

 ?>