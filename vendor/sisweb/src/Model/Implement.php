<?php 

	namespace Sisweb\Model;
	
	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * 
	 */
	class Implement extends User {

		const ERROR = "ImplementError";
		const SUCESS = "ImplementSucess";
		
		public static function listImplements(){

		}//Fim do método de listar

		public function get(){
			$db = new Database();
			$data = $db->select(
				"SELECT * FROM tb_implements AS ims 
					WHERE ims.id = :id", 
				[
					":id"=>$this->getid()
				]
				
			);

			$this->setData($data[0]);
		}

		public static function getImplementByCustomer($idcustomer){
			$db = new Database();
			$data = $db->select("SELECT * FROM tb_implements ims WHERE ims.customerfk = :idcustomer", array(
				":idcustomer"=>$idcustomer
			));

			return $data;

		}

		public function getMaxId(){
			$db = new Database();
			$idm = $db->select("SELECT MAX(idimplement) FROM tb_implements;");
			foreach ($idm as $key => $value) {
				$idmax = $value['max'];
			}

			$idimplement = $idmax + 1;

			$this->setidimplement($idimplement);
		}

		public function verifyPost($post){
			
			if($post["txnameimplement"] === ''){
				#var_dump($post);
				throw new \Exception("Fornceça o nome do implemento");	
			}

			if($post["txmodelimplement"] === ''){
				#var_dump($post);
				throw new \Exception("Fornceça o modelo do implemento");	
			}

			if($post["txtype"] === ''){
				#var_dump($post);
				throw new \Exception("Fornceça o tipo do implemento");	
			}

			if($post["nuanofabricacaoimp"] === ''){
				#var_dump($post);
				throw new \Exception("Fornceça o ano de fabricação do implemento");	
			}

		}

		public function insert(){
			$db = new Database();
			$this->getMaxId();
			$results = $db->query(
				"INSERT INTO public.tb_implements
						(idimplement, txnameimplement, txmodelimplement, txtype, nuanofabricacaoimp, txdescricaoimp, customerfk)
					VALUES (:idimplement, :txnameimplement, :txmodelimplement, :txtype, :nuanofabricacaoimp, :txdescricaoimp, :customerfk);", array(
						":idimplement"=>$this->getidimplement(), 
						":txnameimplement"=>$this->gettxnameimplement(), 
						":txmodelimplement"=>$this->gettxmodelimplement(), 
						":txtype"=>$this->gettxtype(), 
						":nuanofabricacaoimp"=>$this->getnuanofabricacaoimp(), 
						":txdescricaoimp"=>$this->gettxdescricaoimp(), 
						":customerfk"=>$this->getcustomerfk()
					)
			);
		}

		public function update(){
			$db = new Database();
			$results = $db->query(
				"UPDATE public.tb_implements SET  
					txnameimplement = :txnameimplement, txmodelimplement = :txmodelimplement, txtype = :txtype, nuanofabricacaoimp = :nuanofabricacaoimp, txdescricaoimp = :txdescricaoimp, customerfk = :customerfk
					WHERE idimplement = :idimplement;", array(
						":idimplement"=>$this->getidimplement(), 
						":txnameimplement"=>$this->gettxnameimplement(), 
						":txmodelimplement"=>$this->gettxmodelimplement(), 
						":txtype"=>$this->gettxtype(), 
						":nuanofabricacaoimp"=>$this->getnuanofabricacaoimp(), 
						":txdescricaoimp"=>$this->gettxdescricaoimp(), 
						":customerfk"=>$this->getcustomerfk()
					)
			);
		}

		public function delete(){
			$db = new Database();
			$results = $db->select(
				"DELETE FROM public.tb_implements ims WHERE ims.idimplement = :idimplement",array(
					":idimplement"=>$this->getidimplement()
				)
			);
		}

		public static function setSuccess($msg){
			$_SESSION[Implement::SUCCESS] = $msg;
		}

		public static function getSuccess(){
			$msg = (isset($_SESSION[Implement::SUCCESS]) && $_SESSION[Implement::SUCCESS]) ? $_SESSION[Implement::SUCCESS] : '';
			Implement::clearSuccess();
			return $msg;
		}

		public static function clearSuccess(){
			$_SESSION[Implement::SUCCESS] = NULL;
		}

		public static function setError($msg){
			$_SESSION[Implement::ERROR] = $msg;
		}

		public static function getError(){
			$msg = (isset($_SESSION[Implement::ERROR]) && $_SESSION[Implement::ERROR]) ? $_SESSION[Implement::ERROR] : '';
			Implement::clearError();
			return $msg;
		}

		public static function clearError(){
			$_SESSION[Implement::ERROR] = NULL;
		}
		
	}//Fim da classe



 ?>