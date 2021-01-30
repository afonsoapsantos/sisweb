<?php

	namespace Sisweb\Model;

	use Sisweb\Model;
	use \Sisweb\DB\Database; 

	/**
	 * 
	 */
	class FarmWorker extends Model{

		const ERROR = "FarmWorkerError";
		const SUCCESS = "FarmWorkerSuccess";

		public static function validateFarmWorker(){
			$fkusertype = (int)$_SESSION[User::SESSION]["fkusertype"];
			$fkstatususer = (int)$_SESSION[User::SESSION]["fkstatususer"];
			if ($fkstatususer != 1) {
				User::logout();
			}
			User::verifyLogin((int)$fkusertype);
			if($fkusertype != 5){
				User::logout();
			}
		}
		
		public static function listAllByCustomer($pkcustomer){
			$database = new Database();

			$results = $database->select(
				"SELECT fe.*, cs.idcustomer, ads.* FROM tb_farmsemployees fe
					INNER JOIN tb_addresses ads ON ads.userfk = fe.userfk
					INNER JOIN tb_customers cs ON cs.idcustomer = fe.customerfk
					INNER JOIN tb_customers cs1 ON cs1.idcustomer = :pkcustomer;", array(
						"pkcustomer"=>$pkcustomer
					)
			);

			return $results;
		}

		public static function listAll(){
			$database = new Database();

			return $database->select(
				"SELECT * FROM tb_users us 
					INNER JOIN tb_statususer su ON us.fkstatususer = su.pkstatus
					INNER JOIN tb_userstype ut ON us.fkusertype = ut.idusertype
					WHERE us.fkusertype = 5;"
			);
		}

		public function get($id){
			$database = new Database();
			$results = $database->select(
				"SELECT * FROM public.tb_farmsemployees fe 
					WHERE fe.id = :id", array(
						":id"=>$id
					)
			);

			$this->setData($results[0]);
		}

		public function getMaxId(){
			$database = new Database();
			$idm = $database->select("SELECT MAX(pkfarmworker) FROM public.tb_farmsemployees;");
			foreach ($idm as $key => $value) {
				$idmax = $value['max'];
			}

			$pkfarmworker = $idmax + 1;

			$this->setpkfarmworker($pkfarmworker);
		}

		public function save(){
			$database = new Database();
			$this->getMaxId();
			$results = $database->query(
				"INSERT INTO public.tb_farmsemployees(pkfarmworker, txname, txlastname, txfuncao, customerfk, userfk)
					VALUES (:pkfarmworker, :txname, :txlastname, :txfuncao, :customerfk, :userfk);", array(
						":pkfarmworker"=>$this->getpkfarmworker(),
						":txname"=>$this->gettxname(),
						":txlastname"=>$this->gettxlastname(),
						":txfuncao"=>$this->gettxfuncao(),
						":customerfk"=>$this->getcustomerfk(),
						":userfk"=>$this->getuserfk()
					)
			);
		}

		public function update(){
			$database = new Database();
			$results = $database->query(
				"UPDATE public.tb_farmsemployees
				    SET txname = :txname, txlastname = :txlastname, txfuncao = :txfuncao, customerfk = :customerfk, userfk = :userfk
					WHERE pkfarmworker = :pkfarmworker;",array(
						":pkfarmworker"=>$this->getpkfarmworker(),
						":txname"=>$this->gettxname(),
						":txlastname"=>$this->gettxlastname(),
						":txfuncao"=>$this->gettxfuncao(),
						":customerfk"=>$this->getcustomerfk(),
						":userfk"=>$this->getuserfk()
					)
			);
		}

		public function delete(){
			$database = new Database();
			$results = $database->query("DELETE FROM public.tb_farmsemployees WHERE pkfarmworker = 	:pkfarmworker", array(
				":pkfarmworker"=>$this->getpkfarmworker()
			));
		}

		public static function setError($msg){
			$_SESSION[FarmWorker::ERROR] = $msg;
		}

		public static function getError(){
			$msg = (isset($_SESSION[FarmWorker::ERROR]) && $_SESSION[FarmWorker::ERROR]) ? $_SESSION[FarmWorker::ERROR] : '';
			FarmWorker::clearError();
			return $msg;
		}

		public static function clearError(){
			$_SESSION[FarmWorker::ERROR] = NULL;
		}

		public static function setSuccess($msg){
			$_SESSION[FarmWorker::SUCCESS] = $msg;
		}

		public static function getSuccess(){
			$msg = (isset($_SESSION[FarmWorker::SUCCESS]) && $_SESSION[FarmWorker::SUCCESS]) ? $_SESSION[FarmWorker::SUCCESS] : '';
			FarmWorker::clearSuccess();
			return $msg;
		}

		public static function clearSuccess(){
			$_SESSION[FarmWorker::SUCCESS] = NULL;
		}
		
	}


 ?>