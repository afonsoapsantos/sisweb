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

		public static function validateTechnical(){
			$fkusertype = (int)$_SESSION[User::SESSION]["fkusertype"];
			$fkstatususer = (int)$_SESSION[User::SESSION]["fkstatususer"];
			if ($fkstatususer != 1) {
				User::logout();
			}
			User::verifyLogin((int)$fkusertype);
			if($fkusertype != 3){
				User::logout();
			}
		}

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

		public function read(){
			$database = new Database();

			return $database->select(
				"SELECT * FROM tb_users us 
					INNER JOIN tb_statususer su ON us.fkstatususer = su.pkstatus
					INNER JOIN tb_userstype ut ON us.fkusertype = ut.idusertype
					WHERE us.fkusertype = 3;"
			);
		}

	}

 ?>