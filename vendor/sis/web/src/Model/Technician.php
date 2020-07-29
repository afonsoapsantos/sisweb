<?php 

	namespace Sisweb\Model;
	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * 
	 */
	class Technician extends Model {

		const SUCCESS = "TechnicianSucess";
		const ERROR  = "TechnicianError";

		public function get(){
			$database = new Database();
			$results = $database->select("SELECT * FROM tb_technicians ts WHERE ts.pktechnician = :pktechnician;",array(
				":pktechnician"=>$this->getpktechnician()
			));
			$this->setData($results[0]);
		}

		public function getByUser($pkuser){
			$database = new Database();
			$results = $database->select("SELECT * FROM tb_technicians ts WHERE ts.userfk = :pkuser;",array(
				":pkuser"=>$pkuser
			));
			$this->setData($results[0]);
		}

	}

 ?>