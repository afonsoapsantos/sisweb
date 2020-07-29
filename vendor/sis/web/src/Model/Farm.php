<?php 

	namespace Sisweb\Model;
	
	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * 
	 */
	class Farm extends Model {

		const ERROR = "FarmError";
		const SUCCESS = "FarmSucesss";
		
		public static function getFarmByCustomer($idcustomer){
			
			$database = new Database();

			$data = $database->select(
				"SELECT * FROM tb_farms fs 
					INNER JOIN tb_addresses ads ON ads.idaddress = fs.addressfarmfk
					INNER JOIN tb_cities cts ON cts.pkcity = ads.cityfk
					INNER JOIN tb_states sts ON sts.pkstate = ads.statefk
 					WHERE fs.customerfk = :idcustomer", array(
				":idcustomer"=>$idcustomer
			));

			return $data;

		}

		public function getMaxId(){
			$database = new Database();
			$idm = $database->select("SELECT MAX(idfarm) FROM tb_farms;");
			foreach ($idm as $key => $value) {
				$idmax = $value['max'];
			}

			$idfarm = $idmax + 1;

			$this->setidfarm($idfarm);
		}

		public function get() {
			$database = new Database();

			$data = $database->select(
				"SELECT * FROM tb_farms fs WHERE fs.idfarm = :idfarm", array(
				":idfarm"=>$this->getidfarm()
			));

			$this->setData($data[0]);
		}

		public function insert(){
			$database = new Database();
			$this->getMaxID();
			$results = $database->select(
				"INSERT INTO public.tb_farms (idfarm, txnamefarm, txdescriptionfarm, addressfarmfk, customerfk) VALUES(:idfarm, :txnamefarm, :txdescriptionfarm, :addressfarmfk, :customerfk)", array(
					":idfarm"=>$this->getidfarm(), 
					":txnamefarm"=>$this->gettxnamefarm(), 
					":txdescriptionfarm"=>$this->gettxdescriptionfarm(), 
					":addressfarmfk"=>$this->getaddressfarmfk(), 
					":customerfk"=>$this->getcustomerfk()
				)
			);
			$this->setSuccess("Inclusão realizada com sucesso");
		}

		public function update(){
			$database = new Database();
			$results = $database->query(
				"UPDATE public.tb_farms SET txnamefarm = :txnamefarm, txdescriptionfarm = :txdescriptionfarm, addressfarmfk = :addressfarmfk, customerfk = :customerfk
				WHERE idfarm = :idfarm;", array(
					":idfarm"=>$this->getidfarm(),
					":txnamefarm"=>$this->gettxnamefarm(),
					":txdescriptionfarm"=>$this->gettxdescriptionfarm(),
					":addressfarmfk"=>$this->getaddressfarmfk(),
					":customerfk"=>$this->getcustomerfk()
				)
			);
			$this->setSuccess("Alteração realizada com sucesso");
		}

		public function delete(){
			$database = new Database();
			$results = $database->select(
				"DELETE FROM public.tb_farms fs WHERE fs.idfarm = :idfarm", array(
					":idfarm"=>$this->getidfarm()
				)
			);
			$this->setSuccess("Exclusão realizada com sucesso");
		}

		public static function setSuccess($msg){
			$_SESSION[Farm::SUCCESS] = $msg;
		}

		public static function getSuccess(){
			$msg = (isset($_SESSION[Farm::SUCCESS]) && $_SESSION[Farm::SUCCESS]) ? $_SESSION[Farm::SUCCESS] : '';
			Farm::clearSuccess();
			return $msg;
		}

		public static function clearSuccess(){
			$_SESSION[Farm::SUCCESS] = NULL;
		}

		public static function setError($msg){
			$_SESSION[Farm::ERROR] = $msg;
		}

		public static function getError(){
			$msg = (isset($_SESSION[Farm::ERROR]) && $_SESSION[Farm::ERROR]) ? $_SESSION[Farm::ERROR] : '';
			Farm::clearError();
			return $msg;
		}

		public static function clearError(){
			$_SESSION[Farm::ERROR] = NULL;
		}
		
	}//fim da classe



 ?>