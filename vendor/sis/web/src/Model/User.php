<?php 

	namespace Sisweb\Model;

	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	class User extends Person {

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
				throw new \Exception("Usuário inexistente ou senha inválida.");
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

			return $database->select("SELECT * FROM tb_users u, tb_userstype ut, tb_status s WHERE u.usertype = ut.idusertype AND u.statususer = s.idstatus ORDER BY u.iduser;");
		}

		public static function listUsersTypes()
		{
			$database = new Database();
			$userstypes = $database->select("SELECT * FROM tb_userstype;");
			return $userstypes;
		}

		public static function listStatusUser(){
			$database = new Database();
			$status = $database->select("SELECT * FROM tb_status;");
			return $status;
		}

		public function saveUser(){
			$database = new Database();
			#$id = $database->select("SELECT MAX(iduser) FROM tb_users;");
			#foreach ($id as $key => $value) {
			#	$iduser = $value['max'];
			#}
			#$this->setiduser($iduser);

			$results = $database->select(
				"INSERT INTO tb_users(txlogin, txpassword, usertype, dtregisteruser, statususer)
				VALUES (:login, :password, :usertype, :dtregisteruser, :status);",array(
					":login"=>$this->gettxlogin(),
					":password"=>$this->gettxpassword(),
					":usertype"=>$this->getusertype(),
					":dtregisteruser"=>$this->getdtregisteruser(),
					":status"=>$this->getstatususer()
				));
			$this->setData($results[0]);	
		}

		public function getUser($iduser){
			$database = new Database();
			$results = $database->select("SELECT * FROM tb_users WHERE iduser = :iduser", array(
				":iduser"=>$iduser
			));

			$this->setData($results[0]);
		}

		public function updateUser(){
			$database = new Database();
			$results = $database->select(
				"UPDATE tb_users SET txlogin=:login, 
									txpassword=:password, usertype=:usertype, 
									dtregisteruser=:dtregisteruser, statususer=:status
					WHERE iduser = :iduser;",
				array(
					":iduser"=>$this->getiduser(),
					":login"=>$this->gettxlogin(),
					":password"=>$this->gettxpassword(),
					":usertype"=>$this->getusertype(),
					":dtregisteruser"=>$this->getdtregisteruser(),
					":status"=>$this->getstatususer()
				));
			echo " Resutls: ".var_dump($results);
			$this->setData($results[0]);
		}

		public function deleteUser(){
			$database = new Database();
			#$iduser = $this->getiduser();
			$database->query("DELETE FROM tb_users WHERE iduser = :iduser", array(
				":iduser"=>$this->getiduser()
			));
		}

	}//Fim da classe

 ?>