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
			$db = new Database();
			$idm = $db->select("SELECT MAX(id) FROM tb_requests;");
			foreach ($idm as $key => $value) {
				$idmax = $value['max'];
			}

			$id = $idmax+1;

			$this->setid($id);
		}

		public static function listRequests($idcustomer){
			$db = new Database();
			return $db->select("SELECT * FROM tb_requests rs
				INNER JOIN tb_statusrequest sr ON sr.pkstatus = rs.statusfk
				WHERE rs.customerfk = :idcustomer", array(
				":idcustomer"=>$idcustomer
			));
		}

		public static function listRequestsAdmin(){
			$db = new Database();
			return $db->select(
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
			$db = new Database();
			$results = $db->select(
				"SELECT * FROM tb_requests rs 
					INNER JOIN tb_implements ims ON ims.idimplement = rs.implementfk
					INNER JOIN tb_customers cs ON cs.idcustomer = rs.customerfk
					INNER JOIN tb_farms fs ON fs.idfarm = rs.farmfk
					INNER JOIN tb_statusrequest sr ON sr.pkstatus = rs.statusfk
					WHERE rs.id = :pkrequest;", array(
				":pkrequest"=>$pkrequest
			));

			$this->setData($results[0]);
		}

		public function read(){
			$db = new Database();
			$results = $db->select(
				"SELECT * FROM tb_requests rs WHERE id = :id", array(
					":id"=>$this->getid()
				)
			);

			$this->setData($results[0]);
		}

		public function get(){
			$db = new Database();
			$results = $db->select(
				"SELECT * FROM public.tb_requests rs 
					INNER JOIN public.tb_customers cs ON cs.idcustomer = rs.customerfk
					INNER JOIN tb_implements ips ON ips.idimplement = rs.implementfk
					INNER JOIN tb_farms fs ON fs.idfarm = rs.farmfk
					WHERE rs.id = :id", array(
					":id"=>$this->getid()
				)
			);

			$this->setData($results[0]);
		}

		public static function getStatus(){

			$db = new Database();

			return $db->select("SELECT * FROM tb_statusrequest;");
		}

		public static function listCustomerImplement(){
			$db = new Database();
			return $db->select(
				"SELECT * FROM tb_users us, tb_implements is, tb_customers cs 
					WHERE us.id = cs.userfk 
						AND cs.idcustomer = is.customerfk;"
			);
		}

		public function insertRequest(){
			$db = new Database();
			$this->getMaxId();
			$results = $db->select(
				"INSERT INTO public.tb_requests(id, txsituation, txproblem, customerfk, farmfk, implementfk, statusfk)
				VALUES (:id, :txsituation, :txproblem, :customerfk, :farmfk, :implementfk, :statusfk);", 
				array(
					":id"=>$this->getid(),
					":txsituation"=>$this->gettxsituation(),
					":txproblem"=>$this->gettxproblem(),
					":customerfk"=>$this->getcustomerfk(),
					":farmfk"=>$this->getfarmfk(),
					":implementfk"=>$this->getimplementfk(),
					":statusfk"=>$this->getstatusfk()
				));
		}

		public function update(){
			$db = new Database();
			$results = $db->select(
				"UPDATE tb_requests 
					SET txsituation = :txsituation, txproblem = :txproblem, customerfk = :customerfk, farmfk = :farmfk, implementfk = :implementfk, statusfk = :statusfk
					WHERE id = :id", array(
					":id"=>$this->getid(),
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
			$db = new Database();
			$this->verifyStatus();
			$results = $db->select(
				"DELETE FROM tb_requests rs WHERE rs.id = :id", array(
					":id"=>$this->getid()
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