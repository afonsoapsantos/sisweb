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

		public function getMaxId(){
			$db = new Database();
			$idm = $db->select("SELECT MAX(id) FROM tb_cashmovement");
            foreach ($idm as $key => $value) {
				$max = $value['max'];
			}
			$id = $max + 1;
			$this->setid($id);
		}
		
		public function create(){
			$db = new Database();

			$results = $db->select(
				"INSERT INTO public.tb_cashmovement(id, txdescription, typepayid, nuday, monthid, nuyear, balance, createdat, updatedat)
				VALUES (:id, :txdescription, :typepayid, :nuday, :monthid, :nuyear, :balance, :createdat, :updatedat);",
				[
					":id"=>$this->getid(),
					":txdescription"=>$this->gettxdescription(),
					":typepayid"=>$this->gettypepayid(),
					":nuday"=>$this->getnuday(),
					":monthid"=>$this->getmonthid(),
					":nuyear"=>$this->getnuyear(),
					":balance"=>$this->getbalance(),
					":createdat"=>$this->getcreatedat(),
					":updatedat"=>$this->getupdatedat()
				]
			);

			$this->setSuccess("Created!");
		}

		public function delete(){
			$db = new Database();
			$data = $db->select(
				"DELETE FROM tb_cashmovement AS cm WHERE cm.id = :id", [
					":id"=>$this->getid()
				]
			);
			$this->setSuccess("Deleted!");
		}

		/*
		* Altera o registro
		*/
		public function update(){
			$db = new Database();
			$data = $db->select(
				"UPDATE tb_cashmovement
					SET id=:id, txdescription=:txdescription,typepayid=:typepayid, nuday=:nuday, monthid=:monthid,
						nuyear=:nuyear, price=:price, createdat=:createdat, updatedat=:updatedat",
				[
					":id"=>$this->getid(),
					":txdescription"=>$this->gettxdescription(),
					":typepayid"=>$this->gettypepayid(),
					":nuday"=>$this->getnuday(),
					":monthid"=>$this->getmonthid(),
					":nuyear"=>$this->getnuyear(),
					":price"=>$this->getprice(),
					":createdat"=>$this->getcreatedat(),
					":updatedat"=>$this->getupdatedat()
				]
			);

			$this->setData($data);
			$this->setSuccess("Alterado com Sucesso!");
		}
		
		/*
		* Lê os registros da tabela
		*/
		public function read(){
			$db = new Database();
			return $db->select(
				"SELECT * FROM tb_cashmovement"
			);
		}

		/*
		* Busca um registro da tabela
		*/
		public function get(){
			$db = new Database();

			$data = $db->select(
				"SELECT * FROM tb_cashmovement AS cm WHERE cm.id = :id", [
					":id"=>$this->getid()
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