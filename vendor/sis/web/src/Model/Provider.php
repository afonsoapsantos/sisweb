<?php 

	namespace Sisweb\Model;
	use Sisweb\Model;
	use Sisweb\DB\Database;

	/**
	 * 
	 */
	class Provider extends Model{

		const ERROR = "ProviderError";
		const SUCCESS = "ProviderSuccess";
		
		public static function listAll(){
			
			$database = new Database();
			return $database->select("SELECT * FROM tb_providers");

		}//Fim do método listAll

		//Funçao para pegar id
		public function getMaxId(){
			$database = new Database();
			$idr = $database->select("SELECT MAX(idprovider) FROM tb_providers;");
			foreach ($idr as $key => $value) {
				$idre = $value['max'];
			}
			$idprovider = $idre + 1;
			$this->setidprovider($idprovider);
		}

		public function get(){
			$database = new Database();
			$results = $database->select("SELECT * FROM tb_providers ps WHERE ps.idprovider = :idprovider", array(
				":idprovider"=>$this->getidprovider()
			));

			$this->setData($results[0]);
		}

		//Método para criar Provider
		public function insert(){
			$database = new Database();
			$results = $database->select(
				"INSERT INTO public.tb_providers (idprovider, txcorporatename, txfantasyname, nucnpj, nustateregistration, numunicipalregistration) VALUES (:idprovider,:txcorporatename,:txfantasyname, 
						:nucnpj,:nustateregistration, :numunicipalregistration);", 
				array(
					":idprovider"=>$this->getidprovider(),
					":txcorporatename"=>$this->gettxcorporatename(),
					":txfantasyname"=>$this->gettxfantasyname(),
					":nucnpj"=>$this->getnucnpj(),
					":nustateregistration"=>$this->getnustateregistration(),
					":numunicipalregistration"=>$this->getnumunicipalregistration()
			));
			$this->setSuccess("Inclusão realizada!");
		}// FIm do método salvar

		public function update(){
			$database = new Database();
			$results = $database->select(
					"UPDATE public.tb_providers SET txcorporatename = :txcorporatename, txfantasyname = :txfantasyname, nucnpj = :nucnpj, nustateregistration = :nustateregistration, numunicipalregistration = :numunicipalregistration
							WHERE idprovider = :idprovider;", 
					array(
						":idprovider"=>$this->getidprovider(),
						":txcorporatename"=>$this->gettxcorporatename(),
						":txfantasyname"=>$this->gettxfantasyname(),
						":nucnpj"=>$this->getnucnpj(),
						":nustateregistration"=>$this->getnustateregistration(),
						":numunicipalregistration"=>$this->getnumunicipalregistration()
				));
			$this->setSuccess("Alterado com sucesso!");
		}

		public function delete(){
			$database = new Database();
			$results = $database->select("DELETE FROM tb_providers ps WHERE ps.idprovider = :idprovider", array(
				":idprovider"=>$this->getidprovider()
			));
			$this->setSuccess("Deletado com sucesso!");
		}

		public static function setError($msg){
			$_SESSION[Provider::ERROR] = $msg;
		}

		public static function getError(){
			$msg = (isset($_SESSION[Provider::ERROR]) && $_SESSION[Provider::ERROR]) ? $_SESSION[Provider::ERROR] : '';
			Provider::clearError();
			return $msg;
		}

		public static function clearError(){
			$_SESSION[Provider::ERROR] = NULL;
		}

		public static function setSuccess($msg){
			$_SESSION[Provider::SUCCESS] = $msg;
		}

		public static function getSuccess(){
			$msg = (isset($_SESSION[Provider::SUCCESS]) && $_SESSION[Provider::SUCCESS]) ? $_SESSION[Provider::SUCCESS] : '';
			Provider::clearSuccess();
			return $msg;
		}

		public static function clearSuccess(){
			$_SESSION[Provider::SUCCESS] = NULL;
		}

	}//Fim da CLasse Provider


 ?>