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

		public function getMaxId()
		{
			$db = new Database();
			$max = $db->select("SELECT MAX(idfarm) FROM tb_farms;");
			foreach ($max as $key => $value) {
				$idmax = $value['max'];
			}

			$idfarm = $idmax + 1;

			$this->setidfarm($idfarm);
		}

		public function create()
		{
			$db = new Database();
			$results = $db->select(
				"INSERT INTO public.tb_farms (idfarm, txnamefarm, txdescriptionfarm, addressfarmfk, customerfk) VALUES(:idfarm, :txnamefarm, :txdescriptionfarm, :addressfarmfk, :customerfk)", array(
					":idfarm"=>$this->getidfarm(), 
					":txnamefarm"=>$this->gettxnamefarm(), 
					":txdescriptionfarm"=>$this->gettxdescriptionfarm(), 
					":addressfarmfk"=>$this->getaddressfarmfk(), 
					":customerfk"=>$this->getcustomerfk()
				)
			);
			$this->setSuccess("Created");
		}

		public function read()
		{
			$db = new Database();

			$data = $db->select(
				"SELECT * FROM tb_farms AS fs WHERE fs.idfarm = :idfarm", array(
				":idfarm"=>$this->getidfarm()
			));

			$this->setData($data[0]);
		}

		public function update()
		{
			$db = new Database();
			$results = $db->query(
				"UPDATE public.tb_farms SET txnamefarm = :txnamefarm, txdescriptionfarm = :txdescriptionfarm, addressfarmfk = :addressfarmfk, customerfk = :customerfk
				WHERE idfarm = :idfarm;", array(
					":idfarm"=>$this->getidfarm(),
					":txnamefarm"=>$this->gettxnamefarm(),
					":txdescriptionfarm"=>$this->gettxdescriptionfarm(),
					":addressfarmfk"=>$this->getaddressfarmfk(),
					":customerfk"=>$this->getcustomerfk()
				)
			);
			$this->setSuccess("Updated");
		}

		public function delete()
		{
			$db = new Database();
			$results = $db->select(
				"DELETE FROM public.tb_farms fs WHERE fs.idfarm = :idfarm", array(
					":idfarm"=>$this->getidfarm()
				)
			);
			$this->setSuccess("Deleted");
		}

		public function search($parameter)
		{
			$db = new Database();
			$data = $db->select(
				"SELECT * FROM tb_farms as tfs
					INNER JOIN tb_address AS tads ON tads.idaddres = tfs.addressfk
					INNER JOIN tb_customer AS tcr ON tcr.idcustomer = tfs.customerfk
					WHERE tfs.txnamefarm = :parameter
					OR tfs.txdescription = :parameter
					OR tfs.addresfk = :parameter
					OR tfs.customerfk = :parameter", 
					[
						":parameter"=>$parameter
					]
			);
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