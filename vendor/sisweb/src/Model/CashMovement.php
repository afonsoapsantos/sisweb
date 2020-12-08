<?php 

	namespace Sisweb\Model;
	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * Criada em 18/11/2020
	 * Classe que instancia o objeto do tipo CashMovement - Movimento de caixa
	 */
	class CashMovement extends Model{

		const SUCCESS = "cashMovementSucess";
		const ERROR  = "cashMovementError";

		public function getMaxID()
		{
			$database = new Database();
			$idcm = $database->select("SELECT MAX(id) FROM tb_cashmovement");
            foreach ($idcm as $key => $value) {
				$idm = $value['max'];
			}
			$id = $idm + 1;
			$this->setid($id);
		}
		
		public function save()
		{
			$database = new Database();

			$results = $database->select(
				"INSERT INTO public.tb_cashmovement(id, txdescription, txtype, nuday, monthid, nuyear, price)
				VALUES (:id, :txdescription, :txtype, :nuday, :monthid, :nuyear, :price);", array(	
					":id"=>$this->getid(),
					":txdescription"=>$this->gettxdescription(),
					":txtype"=>$this->gettxtype(),
					":nuday"=>$this->getnuday(),
					":monthid"=>$this->getmonthid(),
					":nuyear"=>$this->getnuyear(),
					":price"=>$this->getprice()
				)
			);

			$this->setSuccess("Cadastro efetuado com Sucesso!");
		}

		public function delete()
		{
			$database = new Database();

			$data = $database->select(
				"DELETE FROM tb_cashmovement AS cm WHERE cm.id = :id", [
					":id"=>$this->getid()
				]
			);

			$this->setSuccess("Registro Deletado!");
		}

		public function update()
		{
			$database = new Database();

			$data = $database->select(
				""
			);
		}
		

		public function read()
		{
			$database = new Database();

			$data = $database->select(
				""
			);
		}

		public function get()
		{
			$database = new Database();

			$data = $database->select(
				"SELECT * FROM tb_cashmovement AS cm WHERE cm.id = :id", [
					":id"=>$this->setid()
				]
			);

			if(count($data) === 0){
				throw new \Exception("Movimento não encontrado!");
			}

			$this->setData($data[0]);
		}

		public static function setError($msg){
			$_SESSION[Order::ERROR] = $msg;
		}
	
		public static function getError(){
			$msg = (isset($_SESSION[Order::ERROR]) && $_SESSION[Order::ERROR]) ? $_SESSION[Order::ERROR] : '';
			Order::clearError();
			return $msg;
		}

		public static function clearError(){
			$_SESSION[Order::SUCCESS] = NULL;
		}

		public static function setSuccess($msg){
			$_SESSION[Order::SUCCESS] = $msg;
		}
	
		public static function getSuccess(){
			$msg = (isset($_SESSION[Order::SUCCESS]) && $_SESSION[Order::SUCCESS]) ? $_SESSION[Order::SUCCESS] : '';
			Order::clearSuccess();
			return $msg;
		}

		public static function clearSuccess(){
			$_SESSION[Order::SUCCESS] = NULL;
		}
		
	}


 ?>