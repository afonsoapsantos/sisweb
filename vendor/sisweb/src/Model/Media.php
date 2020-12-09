<?php 

	namespace Sisweb\Model;
	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * 
	 */
	class Media extends Model{

		const ERROR = "MediaError";
		const SUCCESS = "MediaSuccess";
		
		public function getMaxIdRequest(){

			$database = new Database();
			$id = $database->select("SELECT MAX(idmedia) FROM tb_mediarequest;");
			foreach ($id as $key => $value) {
				$idmax = $value['max'];
			}

			$idmedia = $idmax + 1;

			$this->setidmedia($idmedia);
		}

		public function getMaxIdorder(){

			$database = new Database();
			$id = $database->select("SELECT MAX(idmedia) FROM tb_mediaorders;");
			foreach ($id as $key => $value) {
				$idme = (int)$value['max'];
			}

			$idmedia = $idme + 1;

			$this->setidmedia($idmedia);
		}

		public function get(){
			$database = new Database();
			$results = $database->select(
				"SELECT * FROM tb_mediaorders mo WHERE idmedia = :idmedia;",array(
					":idmedia"=>$this->getidmedia()
			));
			$this->setData($results[0]);
		}

		public function getStatus(){
			$database = new Database();
			return $database->select("SELECT * FROM tb_status s WHERE s.idstatus = :idstatus;",
				array(
					":idstatus"=>$this->getidstatus()
				));
		}

		public static function getIdmediaByCustomerRequest($idcustomer, $idrequest){

			$database = new Database();
			$idmedia = $database->select("SELECT idmedia FROM tb_mediarequest mrt WHERE mrt.customerfk = :customerfk AND mrt.requestfk = :requestfk;",
			array(
				":customerfk"=>$idcustomer,
				":requestfk"=>$idrequest
			));
			
			return $idmedia;
		}

		public static function listAllByRequest($pkrequest){
			$database = new Database();
			$results = $database->select(
				"SELECT * FROM tb_mediarequest mr WHERE mr.requestfk = :pkrequest", array(
					":pkrequest"=>$pkrequest
				)
			);

			return $results;
		}

		public static function listAllByOrder($pkorder){
			$database = new Database();
			$results = $database->select(
				"SELECT * FROM tb_mediaorders mo WHERE mo.orderfk = :pkorder", array(
					":pkorder"=>$pkorder
				)
			);

			return $results;
		}
		
		public static function listAllByOrderOpen($pkorder){
			$database = new Database();
			$results = $database->select(
				"SELECT * FROM tb_mediaorders mo 
					INNER JOIN tb_statusorder so ON so.pkstatus = 1
					WHERE mo.requestfk = :pkorder", array(
					":pkorder"=>$pkorder
				)
			);

			return $results;
		}

		public function insertMediaRequest(){
			$database = new Database();
			$results = $database->query(
				"INSERT INTO public.tb_mediarequest(idmedia, txnamemedia, txlocalmedia, txdescription, dtmedia, customerfk, requestfk)
				VALUES (:idmedia, :txnamemedia, :txlocalmedia, :txdescription, :dtmedia, :customerfk, :requestfk);",
				array(
					":idmedia"=>$this->getidmedia(),
					":txnamemedia"=>$this->gettxnamemedia(),
					":txlocalmedia"=>$this->gettxlocalmedia(),
					":txdescription"=>$this->gettxdescription(),
					":dtmedia"=>$this->getdtmedia(),
					":customerfk"=>$this->getcustomerfk(),
					":requestfk"=>$this->getrequestfk()
				));
		}//fim insertMediaRequest

		public function insertMediaOrder(){

			$database = new Database();

			$results = $database->query(
				"INSERT INTO public.tb_mediaorders(idmedia, txnamemedia, txlocalmedia, txdescription, customerfk, orderfk, dtmedia)
				VALUES (:idmedia, :txnamemedia, :txlocalmedia, :txdescription, :customerfk, :orderfk, :dtmedia);",
				array(
					":idmedia"=>$this->getidmedia(),
					":txnamemedia"=>$this->gettxnamemedia(),
					":txlocalmedia"=>$this->gettxlocalmedia(),
					":txdescription"=>$this->gettxdescription(),
					":customerfk"=>$this->getcustomerfk(),
					":orderfk"=>$this->getorderfk(),
					":dtmedia"=>$this->getdtmedia()
				));
		}//fim insertMediaOrder

		public function updateMediaRequest(){
			$database = new Database();
			$results = $database->select();
		}

		public function updateMediaOrder($idorder){
			
		}

		public function deleteMediaRequest($idrequest){
			$database = new Database();
			$results = $database->select("DELETE FROM tb_mediarequest mr WHERE mr.requestfk = :idrequest",array(
				":idrequest"=>$idrequest
			));
		}

		public function deleteMediaOrder($idorder){
			$database = new Database();
			$results = $database->select("DELETE FROM tb_mediarequest mr WHERE mr.orderfk = :idorder",array(
				":idorder"=>$idorder
			));
		}

		public static function setSuccess($msg){
			$_SESSION[Media::SUCCESS] = $msg;
		}

		public static function getSuccess(){
			$msg = (isset($_SESSION[Media::SUCCESS]) && $_SESSION[Media::SUCCESS]) ? $_SESSION[Media::SUCCESS] : '';
			Media::clearSuccess();
			return $msg;
		}

		public static function clearSuccess(){
			$_SESSION[Media::SUCCESS] = NULL;
		}

		public static function setError($msg){
			$_SESSION[Media::ERROR] = $msg;
		}

		public static function getError(){
			$msg = (isset($_SESSION[Media::ERROR]) && $_SESSION[Media::ERROR]) ? $_SESSION[Media::ERROR] : '';
			Media::clearError();
			return $msg;
		}

		public static function clearError(){
			$_SESSION[Media::ERROR] = NULL;
		}

	}


 ?>