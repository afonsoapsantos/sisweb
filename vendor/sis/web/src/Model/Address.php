<?php 

	namespace Sisweb\Model;
	
	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * 
	 */
	class Address extends Model{
		
		const ERROR = "AddressError";
		const SUCCESS = "AddressSuccess";

		public function getMaxId(){
			$database = new Database();
			$idm = $database->select("SELECT MAX(idaddress) FROM tb_addresses;");
			foreach ($idm as $key => $value) {
				$idmax = $value['max'];
			}

			$idaddress = $idmax + 1;

			$this->setidaddress($idaddress);
		}

		public function insert(){
			$database = new Database();
			$this->getMaxId();
			$results = $database->select(
				"INSERT INTO public.tb_addresses(idaddress, txnameaddress, txneighborhood, txcomplement, cityfk, statefk, userfk)
					VALUES (:idaddress, :txnameaddress, :txneighborhood, :txcomplement, :cityfk, :statefk, :userfk);", array(
						":idaddress"=>$this->getidaddress(),
						":txnameaddress"=>$this->gettxnameaddress(),
						":txneighborhood"=>$this->gettxneighborhood(),
						":txcomplement"=>$this->gettxcomplement(),
						":cityfk"=>$this->getcityfk(),
						":statefk"=>$this->getstatefk(),
						":userfk"=>$this->getuserfk()
				)
			);
		}

		public function update(){
			$database = new Database();
			$results = $database->select(
				"UPDATE public.tb_addresses 
					SET  :txnameaddress, :txneighborhood, :txcomplement, :cityfk, :statefk, :userfk
					WHERE :idaddress", array(
					":idaddress"=>$this->getidaddress(),
					":txnameaddress"=>$this->gettxnameaddress(),
					":txneighborhood"=>$this->gettxneighborhood(),
					":txcomplement"=>$this->gettxcomplement(),
					":cityfk"=>$this->getcityfk(),
					":statefk"=>$this->getstatefk(),
					":userfk"=>$this->getuserfk()
				)
			);
		}

		public function delete(){
			$database = new Database();
			$results = $database->query(
				"DELETE FROM public.tb_addresses WHERE idaddress = :idaddress", array(
					":idaddress"=>$this->getidaddress()
				)
			);
		}

		public function read(){
			$database = new Database();
			$results = $database->select("SELECT * FROM tb_addresses adds WHERE adds.idaddress = :idaddress", array(
				":idaddress"=>$this->getidaddress()
			));
		}

		public function readByUser(){
			$database = new Database();
			$results = $database->select("SELECT * FROM public.tb_addresses ads 
				WHERE ads.userfk = :userfk", array(
				":userfk"=>$this->getuserfk()
			));

			$this->setData($results[0]);
		}

		public static function setError($msg){
			$_SESSION[Address::ERROR] = $msg;
		}

		public static function getError(){
			$msg = (isset($_SESSION[Address::ERROR]) && $_SESSION[Address::ERROR]) ? $_SESSION[Address::ERROR] : '';
			Address::clearError();
			return $msg;
		}

		public static function clearError(){
			$_SESSION[Address::ERROR] = NULL;
		}

		public static function setSuccess($msg){
			$_SESSION[Address::SUCCESS] = $msg;
		}

		public static function getSuccess(){
			$msg = (isset($_SESSION[Address::SUCCESS]) && $_SESSION[Address::SUCCESS]) ? $_SESSION[Address::SUCCESS] : '';
			Address::clearSuccess();
			return $msg;
		}

		public static function clearSuccess(){
			$_SESSION[Address::SUCCESS] = NULL;
		}
		
	}


 ?>