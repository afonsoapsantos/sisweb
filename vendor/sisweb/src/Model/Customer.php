<?php 

	namespace Sisweb\Model;

	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * 
	 */
	class Customer extends User {

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

		public static function validateCustomer(){
			$fkusertype = (int)$_SESSION[User::SESSION]["fkusertype"];
			$fkstatususer = (int)$_SESSION[User::SESSION]["fkstatususer"];
			if ($fkstatususer != 1) {
				User::logout();
			}
			User::verifyLogin((int)$fkusertype);
			if($fkusertype != 4){
				User::logout();
			}
		}
		
		public static function read(){
			$database = new Database();

			return $database->select(
				"SELECT * FROM tb_users us 
					INNER JOIN tb_statususer su ON us.fkstatususer = su.pkstatus
					INNER JOIN tb_userstype ut ON us.fkusertype = ut.idusertype
					WHERE us.fkusertype = 4;"
			);
		}
	
	}


 ?>