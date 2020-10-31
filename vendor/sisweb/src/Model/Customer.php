<?php 

	namespace Sisweb\Model;

	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * 
	 */
	class Customer extends User {

		public static function listAllCustomers(){
			$database = new Database();
			return $database->select("SELECT * FROM tb_customers;");
		}

		public function getCustomerUser($pkuser){
			
			$database = new Database();

			$results = $database->select("SELECT * FROM tb_customers cs WHERE cs.userfk = :pkuser", array(
				":pkuser"=>$pkuser
			));

			$data = $results[0];

			$this->setData($data);
		}

		public function getCustomer($idcustomer){
			$database = new Database();

			$results = $database->select("SELECT * FROM tb_customers cs WHERE cs.idcustomer = :idcustomer", array(
				":idcustomer"=>$idcustomer
			));

			$this->setData($results[0]);
		}
	
	}


 ?>