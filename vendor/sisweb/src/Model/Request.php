<?php 

	namespace Sisweb\Model;
	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * 
	 */
	class Request extends Model{

		const ERROR = "RequestError";
		const SUCCESS = "RequestSuccess";
		
		public function getMaxId(){
			$database = new Database();
			$idm = $database->select("SELECT MAX(idrequest) FROM tb_requests;");
			foreach ($idm as $key => $value) {
				$idmax = $value['max'];
			}

			$id = $idmax+1;

			$this->setidrequest($id);
		}

		public static function listRequests($idcustomer){
			$database = new Database();
			return $database->select("SELECT * FROM tb_requests rs
				INNER JOIN tb_statusrequest sr ON sr.pkstatus = rs.statusfk
				WHERE rs.customerfk = :idcustomer", array(
				":idcustomer"=>$idcustomer
			));
		}

		public static function listRequestsAdmin(){
			$database = new Database();
			return $database->select(
				"SELECT * FROM tb_requests rs
					INNER JOIN tb_customers cs ON rs.customerfk = cs.idcustomer
					INNER JOIN tb_statusrequest sr ON rs.statusfk = sr.pkstatus
					INNER JOIN tb_implements ims ON ims.idimplement = rs.implementfk"
				);
		}

		public function verifyStatus(){
			if($this->getstatusfk() != 2){
				throw new \Exception("Exclusão não permitida");
			}
		}

		public function getRequest($pkrequest){
			$database = new Database();
			$results = $database->select(
				"SELECT * FROM tb_requests rs 
					INNER JOIN tb_implements ims ON ims.idimplement = rs.implementfk
					INNER JOIN tb_customers cs ON cs.idcustomer = rs.customerfk
					INNER JOIN tb_farms fs ON fs.idfarm = rs.farmfk
					INNER JOIN tb_statusrequest sr ON sr.pkstatus = rs.statusfk
					WHERE rs.idrequest = :pkrequest;", array(
				":pkrequest"=>$pkrequest
			));

			$this->setData($results[0]);
		}

		public function read(){
			$database = new Database();
			$results = $database->select(
				"SELECT * FROM tb_requests rs WHERE idrequest = :idrequest", array(
					":idrequest"=>$this->getidrequest()
				)
			);

			$this->setData($results[0]);
		}

		public function get(){
			$database = new Database();
			$results = $database->select(
				"SELECT * FROM public.tb_requests rs 
					INNER JOIN public.tb_customers cs ON cs.idcustomer = rs.customerfk
					INNER JOIN tb_implements ips ON ips.idimplement = rs.implementfk
					INNER JOIN tb_farms fs ON fs.idfarm = rs.farmfk
					WHERE rs.idrequest = :idrequest", array(
					":idrequest"=>$this->getidrequest()
				)
			);

			$this->setData($results[0]);
		}

		public static function getStatus(){

			$database = new Database();

			return $database->select("SELECT * FROM tb_statusrequest;");
		}

		public static function listCustomerImplement(){
			$database = new Database();
			return $database->select(
				"SELECT * FROM tb_users us, tb_implements is, tb_customers cs 
					WHERE us.id = cs.userfk 
						AND cs.idcustomer = is.customerfk;"
			);
		}

		public function insertRequest(){
			$database = new Database();
			$this->getMaxId();
			$results = $database->select(
				"INSERT INTO public.tb_requests(idrequest, txsituation, txproblem, customerfk, farmfk, implementfk, statusfk)
				VALUES (:idrequest, :txsituation, :txproblem, :customerfk, :farmfk, :implementfk, :statusfk);", 
				array(
					":idrequest"=>$this->getidrequest(),
					":txsituation"=>$this->gettxsituation(),
					":txproblem"=>$this->gettxproblem(),
					":customerfk"=>$this->getcustomerfk(),
					":farmfk"=>$this->getfarmfk(),
					":implementfk"=>$this->getimplementfk(),
					":statusfk"=>$this->getstatusfk()
				));
		}

		public function update(){
			$database = new Database();
			$results = $database->select(
				"UPDATE tb_requests 
					SET txsituation = :txsituation, txproblem = :txproblem, customerfk = :customerfk, farmfk = :farmfk, implementfk = :implementfk, statusfk = :statusfk
					WHERE idrequest = :idrequest", array(
					":idrequest"=>$this->getidrequest(),
					":txsituation"=>$this->gettxsituation(),
					":txproblem"=>$this->gettxproblem(),
					":customerfk"=>$this->getcustomerfk(),
					":farmfk"=>$this->getfarmfk(),
					":implementfk"=>$this->getimplementfk(),
					":statusfk"=>$this->getstatusfk()
				));
			$this->setSuccess("Alteração realizada com sucesso!");
		}
		
		public function delete(){
			$database = new Database();
			$this->verifyStatus();
			$results = $database->select(
				"DELETE FROM tb_requests rs WHERE rs.idrequest = :idrequest", array(
					":idrequest"=>$this->getidrequest()
			));
			$this->setSuccess("Exclusão realizada com sucesso!");
		}

		public static function setError($msg){
			$_SESSION[Request::ERROR] = $msg;
		}

		public static function getError(){
			$msg = (isset($_SESSION[Request::ERROR]) && $_SESSION[Request::ERROR]) ? $_SESSION[Request::ERROR] : '';
			Request::clearError();
			return $msg;
		}

		public static function clearError(){
			$_SESSION[Request::ERROR] = NULL;
		}

		public static function setSuccess($msg){
			$_SESSION[Request::SUCCESS] = $msg;
		}

		public static function getSuccess(){
			$msg = (isset($_SESSION[Request::SUCCESS]) && $_SESSION[Request::SUCCESS]) ? $_SESSION[Request::SUCCESS] : '';
			Request::clearSuccess();
			return $msg;
		}

		public static function clearSuccess(){
			$_SESSION[Request::SUCCESS] = NULL;
		}

	}//Fim da classe

 ?>