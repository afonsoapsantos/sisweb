<?php 

	namespace Sisweb\Model;
	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * 
	 */
	class Person extends Model{
		
		public function save(){
			$database = new Database();
			$database->select("INSERT INTO tb_persons
					(id, txname, txlastname, nurg, nucpf, email, nucellphone dtregister)
				VALUES
					(:id, :txname, :txlastname, :nurg, :nucpf, :email, :nucellphone :dtregister)",
				[
					":id"=>$this->setid(),
					":txname"=>$this->settxname(),
					":txlastname"=>$this->settxlastname(),
					":nurg"=>$this->setnurg(),
					":nucpf"=>$this->setnucpf(),
					":email"=>$this->setemail(),
					":nucellphone"=>$this->setnucellphone(),
					":dtregister"=>$this->setdtregister()
				]);
		}

		public function update(){
			$database = new Database();
			$data = $database->select(
				"UPDATE tb_persons
					SET txname=:txname, txlastname=:txlastname, nurg=:nurg,
						nucpf=:nucpf, email=:email, nucellphone=:nucellphone, dtregister=:dtregister 
					WHERE id=:id
				", [
					":id"=>$this->getid(),
					":txname"=>$this->gettxname(),
					":txlastname"=>$this->gettxlastname(),
					":nurg"=>$this->getnurg(),
					":nucpf"=>$this->getnucpf(),
					":email"=>$this->getemail(),
					":nucellphone"=>$this->getnucellphone(),
					":dtregister"=>$this->getdtregister()
				]
			);
		}

		public function delete(){
			$database = new Database();
			$database->select(
				"DELETE FROM tb_persons AS ps WHERE ps.id = :id", [
					":id"=>$this->getid()
				]
			);

			$this->setSuccess("Registro Deletado");
		}

		public function read(){
			$database = new Database();
			return $database->select(
				"SELECT * FROM tb_persons ps ORDER by ps.id"
			);
		}

		public function get(){
			$database = new Database();
			$database->select(
				"SELECT * FROM tb_persons ps WHERE ps.id = :id", [
					":id"=>$this->getid()
				]
			);
		}
		
		public static function setError($msg){
			$_SESSION[User::ERROR] = $msg;
		}

		public static function getError(){
			$msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';
			User::clearError();
			return $msg;
		}

		public static function clearError(){
			$_SESSION[User::ERROR] = NULL;
		}

		public static function setSuccess($msg){
			$_SESSION[User::SUCCESS] = $msg;
		}

		public static function getSuccess(){
			$msg = (isset($_SESSION[User::SUCCESS]) && $_SESSION[User::SUCCESS]) ? $_SESSION[User::SUCCESS] : '';
			User::clearSuccess();
			return $msg;
		}

		public static function clearSuccess(){
			$_SESSION[User::SUCCESS] = NULL;
		}

	}//Fim da CLasse Person




 ?>