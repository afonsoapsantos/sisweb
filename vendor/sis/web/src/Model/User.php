<?php 

	namespace Sisweb\Model;

	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	class User extends Model {

		const SESSION = "User";

		public static function login($login, $password){

			$database =  new Database();

			$results = $database->select("SELECT * FROM tb_users WHERE txlogin = :LOGIN",array(
				":LOGIN"=>$login
			));

			if(count($results) === 0 ){
				throw new \Exception("Usuário inexistente ou senha inválida.");	
			}

			$data = $results[0];

			if($password === $data["txpassword"]){
				$user = new User();
				$user->setData($data);
				$_SESSION[User::SESSION] = $user->getValues();
				return $user;
			} else {
				return $msg = "Usuário ou senha inválidos";
				header("Location: /login");
				#throw new \Exception("Usuário inexistente ou senha inválida.");
			}

		}

		public static function verifyLogin($usertype = true) {
			if(!isset($_SESSION[User::SESSION]) || 
				!$_SESSION[User::SESSION] || 
				!(int)$_SESSION[User::SESSION]["iduser"] > 0 ||
				(bool)$_SESSION[User::SESSION]["usertype"] !== $usertype
			){
				header("Location: /login");
				exit;
			}else if($usertype === 1 ){

			}
		}

		public static function logout(){
			$_SESSION[User::SESSION] = NULL;
		}

		public static function listAll(){
			$database = new Database();

			return $database->select("SELECT * FROM tb_users u, tb_userstype ut WHERE u.usertype = ut.idusertype ORDER BY iduser");
		}

		private function maxId(){
			$database = new Database();
			$id = $database->select("SELECT MAX(iduser) FROM tb_users");
			return $id;
		}

		public function saveUser(){
			$database = new Database();
			$iduser = maxId()+1;
			$user->setiduser($iduser);
			echo "iduser".$iduser;
			$results = $database->query(
				"INSERT INTO tb_users(iduser, txlogin, txpassword, txstatususer, usertype, dtregisteruser)
				VALUES (:ID, :LOGIN, :PASSWORD, :STATUS, USERTYPE, DTREGISTERUSER);",array(
					":ID"=>$this->getiduser(),
					":LOGIN"=>$this->gettxlogin(),
					":PASSWORD"=>$this->gettxpassword(),
					":STATUS"=>$this->getstatususer(),
					":USERTYPE"=>$this->getusertype(),
					"DTREGISTERUSER"=>$this->getdetregisteruser()
				));
			$this->setData($results[0]);	
		}

	}//Fim da classe

 ?>