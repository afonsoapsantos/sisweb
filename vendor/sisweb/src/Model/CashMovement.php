<?php 

	namespace Sisweb\Model;
	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * Criada em 18/11/2020
	 * Classe que instancia o objeto do tipo CashMovement - Fluxo de caixa
	 */
	class CashMovement extends Model{

		const SUCCESS = "cashMovementSucess";
		const ERROR  = "cashMovementError";
		
		public function insert()
		{
			$database = new Database();

			$results = $database->select(
				"INSERT INTO public.tb_cashmovement(idmovement, day, monthid, year, price)
				VALUES (:idmovement, :day, :monthid, :year, :price);", array(	
					":idmovement"=>$this->getidmovement(),
					":day"=>$this->getday(),
					":monthid"=>$this->getmonthid(),
					":year"=>$this->getyear(),
					":price"=>$this->getprice()
				)
			);

			$this->setSuccess("Cadastro efetuado com Sucesso!");
		}

		public function delete()
		{
			$database = new Database();

			$data = $database->select(
				""
			);
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