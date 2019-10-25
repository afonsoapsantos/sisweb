<?php 

	namespace Sisweb\Model;
	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * 
	 */
	class Request extends Model{
		
		public static function listRequests(){
			$database = new Database();
			return $database->select("SELECT r.*, c.idcustomer, c.txnamecustomer, s.* FROM tb_requests r, tb_customers c, tb_status s");
		}

		public function saveRequest()
		{
			# code...
		}

		public function updateRequest()
		{
			# code...
		}
		
	}

 ?>