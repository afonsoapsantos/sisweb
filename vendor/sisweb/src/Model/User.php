<?php 

	namespace Sisweb\Model;

	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	class User extends Person {

		const SESSION = "User";
		const SECRET = "Sisweb_recvery_6";
		const ERROR = "UserError";
		const ERROR_REGISTER = "UserErrorRegister";
		const SUCCESS = "UserSucesss";
		const ATTEMPTS = 0;

		public static function getFromSession(){
			$user = new User();
			if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 0) {
				$user->setData($_SESSION[User::SESSION]);
			}
			return $user;
		}

		public static function login($login, $password){
			$database = new Database();
			$results = $database->select(
				"SELECT * FROM tb_users as us, tb_userstype as ut 
					WHERE us.txlogin = :LOGIN AND us.fkusertype = ut.idusertype",
				array(
					":LOGIN"=>$login
				)
			);
			if (count($results) === 0)
			{
				throw new \Exception("Usuário inexistente ou senha inválida.");
			}

			$data = $results[0];

			if ($password === $data["txpassword"])
			{
				$user = new User();
				$data['txlogin'] = utf8_encode($data['txlogin']);
				$user->setData($data);
				$_SESSION[User::SESSION] = $user->getValues();
				$fkstatususer = (int)$_SESSION[User::SESSION]["fkstatususer"];
				if ($fkstatususer != 1) {
					throw new \Exception("Acesso não Autorizado");
				}
				return $user;
			} else {
				throw new \Exception("Usuário inexistente ou senha inválida.");
			}
		}

		public static function verifyLogin($type){
			if (!User::checkLogin($type)) {
				if ($type) {
					header("Location: /login");
				} else {
					header("Location: /login");
				}
				exit;
			}
		}

		public static function checkLogin($type){
			if (
				!isset($_SESSION[User::SESSION])
				||
				!$_SESSION[User::SESSION]
				||
				!(int)$_SESSION[User::SESSION]["iduser"] > 0
			) {
				//Não está logado
				return false;
			} else {
				if ($type === (int)$_SESSION[User::SESSION]['fkusertype']) {
					return true;
				} else if ($type === false) {
					return true;
				} else {
					return false;
				}
			}
		}

		public static function logout(){
			$_SESSION[User::SESSION] = NULL;
		}

		public static function validateAdmin(){
			$fkusertype = (int)$_SESSION[User::SESSION]["fkusertype"];
			$fkstatususer = (int)$_SESSION[User::SESSION]["fkstatususer"];
			if ($fkstatususer != 1) {
				User::logout();
			}
			User::verifyLogin((int)$fkusertype);
			if($fkusertype != 1){
				User::logout();
			}
		}

		public static function validateManager(){
			$usertype = (int)$_SESSION[User::SESSION]["fkusertype"];
			$fkstatususer = (int)$_SESSION[User::SESSION]["fkstatususer"];
			User::verifyLogin((int)$usertype);
			if ($fkstatususer != 1) {
				User::logout();
			}
			if($usertype != 2){
				User::logout();
			}
		}

		public static function validateTechnical(){
			$fkusertype = (int)$_SESSION[User::SESSION]["fkusertype"];
			$fkstatususer = (int)$_SESSION[User::SESSION]["fkstatususer"];
			if ($fkstatususer != 1) {
				User::logout();
			}
			User::verifyLogin((int)$fkusertype);
			if($fkusertype != 3){
				User::logout();
			}
		}

		public static function validateCustomer(){
			$fkusertype = (int)$_SESSION[User::SESSION]["fkusertype"];
			$fkstatususer = (int)$_SESSION[User::SESSION]["fkstatususer"];
			if ($fkstatususer != 1) {
				User::logout();
			}
			User::verifyLogin((int)$fkusertype);
			if($fkusertype != 4){
				User::logout();
			}
		}

		public static function validateFarmWorker(){
			$fkusertype = (int)$_SESSION[User::SESSION]["fkusertype"];
			$fkstatususer = (int)$_SESSION[User::SESSION]["fkstatususer"];
			if ($fkstatususer != 1) {
				User::logout();
			}
			User::verifyLogin((int)$fkusertype);
			if($fkusertype != 5){
				User::logout();
			}
		}

		public static function listAllUser(){
			$database = new Database();
			return $database->select(
				"SELECT * FROM tb_users us
					INNER JOIN tb_userstype ut ON us.fkusertype = ut.idusertype 
					INNER JOIN tb_status su ON us.fkstatususer = su.idstatus 
					ORDER BY us.iduser;");
		}

		public static function listAllAdmins(){
			$database = new Database();

			return $database->select(
				"SELECT * FROM tb_users us 
					INNER JOIN tb_statususer su ON us.fkstatususer = su.pkstatus
					INNER JOIN tb_userstype ut ON us.fkusertype = ut.idusertype
					WHERE us.fkusertype = 1;"
			);
		}

		public static function listAllManagers(){
			$database = new Database();

			return $database->select(
				"SELECT * FROM tb_users us 
					INNER JOIN tb_statususer su ON us.fkstatususer = su.pkstatus
					INNER JOIN tb_userstype ut ON us.fkusertype = ut.idusertype
					WHERE us.fkusertype = 2;"
			);
		}

		public static function listUsersByManager(){
			$database = new Database();
			return $results = $database->query(
				"CREATE TEMPORARY TABLE IF NOT EXISTS a AS(SELECT * FROM tb_users us WHERE us.fkusertype = 1);CREATE TEMPORARY TABLE IF NOT EXISTS b AS(SELECT * FROM tb_users us WHERE us.fkusertype = 2);CREATE TEMPORARY TABLE IF NOT EXISTS c AS(SELECT * FROM tb_users us EXCEPT (SELECT * FROM a));CREATE TEMPORARY TABLE IF NOT EXISTS d AS(SELECT * FROM c EXCEPT (SELECT * FROM b));SELECT * FROM d
					INNER JOIN tb_statususer su ON su.pkstatus = d.fkstatususer
					INNER JOIN tb_userstype ut ON ut.idusertype = d.fkusertype;"
			);
		}

		public static function listAllTechnical(){
			$database = new Database();

			return $database->select(
				"SELECT * FROM tb_users us 
					INNER JOIN tb_statususer su ON us.fkstatususer = su.pkstatus
					INNER JOIN tb_userstype ut ON us.fkusertype = ut.idusertype
					WHERE us.fkusertype = 3;"
			);
		}

		public static function listAllCustomers(){
			$database = new Database();

			return $database->select(
				"SELECT * FROM tb_users us 
					INNER JOIN tb_statususer su ON us.fkstatususer = su.pkstatus
					INNER JOIN tb_userstype ut ON us.fkusertype = ut.idusertype
					WHERE us.fkusertype = 4;"
			);
		}

		public static function listAllFarmWorker(){
			$database = new Database();

			return $database->select(
				"SELECT * FROM tb_users us 
					INNER JOIN tb_statususer su ON us.fkstatususer = su.pkstatus
					INNER JOIN tb_userstype ut ON us.fkusertype = ut.idusertype
					WHERE us.fkusertype = 5;"
			);
		}

		public static function listUsersTypes(){
			$database = new Database();
			$userstypes = $database->select("SELECT * FROM tb_userstype;");
			return $userstypes;
		}

		public static function listStatusUser(){
			$database = new Database();
			$status = $database->select("SELECT * FROM tb_statususer;");
			return $status;
		}

		public function getMaxId(){
			$database = new Database();
			$idmax = $database->select("SELECT MAX(iduser) FROM tb_users;");
			foreach ($idmax as $key => $value) {
				$iduser = $value['max'];
			}
			$idm = $iduser + 1;
			$this->setiduser($idm);
		}

		public function saveUser(){
			$database = new Database();
			
			$this->getMaxId();

			$results = $database->select(
				"INSERT INTO tb_users(iduser, txlogin, txpassword, fkusertype, fkstatususer, dtregisteruser)
				VALUES (:iduser, :login, :password, :fkusertype, :fkstatususer, :dtregisteruser);",array(
					":iduser"=>$this->getiduser(),
					":login"=>$this->gettxlogin(),
					":password"=>$this->gettxpassword(),
					":fkusertype"=>$this->getfkusertype(),
					":fkstatususer"=>$this->getfkstatususer(),
					":dtregisteruser"=>$this->getdtregisteruser()
				));
			$this->setData($results[0]);	
		}

		public function getUser($iduser){
			$database = new Database();
			$results = $database->select("SELECT * FROM tb_users WHERE iduser = :iduser", array(
				":iduser"=>$iduser
			));

			if(count($results) === 0){
				throw new \Exception("Sem dados");
			}

			$this->setData($results[0]);
		}

		public function updateUser(){
			$database = new Database();
			$results = $database->select(
				"UPDATE tb_users 
					SET txlogin=:login, txpassword=:password, fkusertype=:fkusertype, 
						fkstatususer=:fkstatususer, dtregisteruser=:dtregisteruser
					WHERE iduser = :iduser;",
				array(
					":iduser"=>$this->getiduser(),
					":login"=>$this->gettxlogin(),
					":password"=>$this->gettxpassword(),
					":fkusertype"=>$this->getfkusertype(),
					":fkstatususer"=>$this->getfkstatususer(),
					":dtregisteruser"=>$this->getdtregisteruser()
				));
			$this->setData($results[0]);
		}

		public function deleteUser(){
			$database = new Database();
			$database->query("DELETE FROM tb_users WHERE iduser = :iduser", array(
				":iduser"=>$this->getiduser()
			));
		}

		/*
		public static function getForgot($email, $inadmin = true){
		    $database = new Database();
		    $results = $database->select("
		         SELECT *
		         FROM tb_persons a
		         INNER JOIN tb_users b USING(idperson)
		         WHERE a.desemail = :email;
		     ", array(
		         ":email"=>$email
		    ));
		    if (count($results) === 0){
		        throw new \Exception("Não foi possível recuperar a senha.");
		    } else {
		         $data = $results[0];
		         $results2 = $database->select("CALL sp_userspasswordsrecoveries_create(:iduser, :desip)", array(
		             ":iduser"=>$data['iduser'],
		             ":desip"=>$_SERVER['REMOTE_ADDR']
		        ));
		        if (count($results2) === 0){
		             throw new \Exception("Não foi possível recuperar a senha.");
		        } else {
		             $dataRecovery = $results2[0];
		             $iv = random_bytes(openssl_cipher_iv_length('aes-256-cbc'));
		             $code = openssl_encrypt($dataRecovery['idrecovery'], 'aes-256-cbc', User::SECRET, 0, $iv);
		             $result = base64_encode($iv.$code);
		             if ($inadmin === true) {
		                 $link = "http://www.hcodecommerce.com.br/admin/forgot/reset?code=$result";
		             } else {
		                 $link = "http://www.hcodecommerce.com.br/forgot/reset?code=$result";
		             } 
		             $mailer = new Mailer($data['desemail'], $data['desperson'], "Redefinir senha da Hcode Store", "forgot", array(
		                 "name"=>$data['desperson'],
		                 "link"=>$link
		             )); 
		             $mailer->send();
		             return $link;
		        }
		    }
		}

		public static function validForgotDecrypt($result){
		     $result = base64_decode($result);
		     $code = mb_substr($result, openssl_cipher_iv_length('aes-256-cbc'), null, '8bit');
		     $iv = mb_substr($result, 0, openssl_cipher_iv_length('aes-256-cbc'), '8bit');;
		     $idrecovery = openssl_decrypt($code, 'aes-256-cbc', User::SECRET, 0, $iv);
		     $database = new Database();
		     $results = $database->select("
		         SELECT *
		         FROM tb_userspasswordsrecoveries a
		         INNER JOIN tb_users b USING(iduser)
		         INNER JOIN tb_persons c USING(idperson)
		         WHERE
		         a.idrecovery = :idrecovery
		         AND
		         a.dtrecovery IS NULL
		         AND
		         DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW();
		     ", array(
		         ":idrecovery"=>$idrecovery
		     ));
		    if (count($results) === 0){
		         throw new \Exception("Não foi possível recuperar a senha.");
		    } else {
		         return $results[0];
		    }
		}

		public static function getForgot($email){
			$database = new Database();

			$results = $database->select(
				"SELECT * FROM tb_users u, tb_person pe WHERE u.iduser = pe.userfk AND pe.email = :email", array(
					":email"=>$email
				)
			);

			if (count($results) === 0){
				throw new \Exception("Não foi possivel recuperar a senha!");
			}else{
				$data = $results[0];

				$idr = $database->select("SELECT MAX(idrecovery) FROM tb_passwordsrecoveries;");
				foreach ($idr as $key => $value) {
					$idre = $value['max'];
				}

				$idrec = $idre + 1;

				$resultrecovery = $database->select("INSERT INTO tb_passwordsrecoveries (idrecovery, userfk, nuip, dtrecovery, dtregister) 
					VALUES (:idrecovery, :userfk, :nuip, :dtrecovery, :dtregister)", array(
						":idrecovery"=>$idrec, 
						":userfk"=>$data['iduser'], 
						":nuip"=>$_SERVER["REMOTE_ADDR"], 
						":dtrecovery"=>date("d/m/Y"), 
						":dtregister"=>date("d/m/Y")
					));


				if(count($resultrecovery) === 0){
					throw new \Exception("Não foi possivel recuperar a senha");
				}else{
					$dataRecovery = $resultrecovery[0];

					$code = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, User::SECRET, $dataRecovery["idrecovery"], MCRYPT_MODE_ECB));

					$link = "http://www.sisweb.com.br/forgot/reset?code=$code";

					$mailer = new Mailer(
						$data["email"], $data["txfirstnameperson"], "Redefinir senha", "forgot",
						array(
							"name"=>$data["txfirstnameperson"],
							"link"=>$link
						) 
					);

					$mailer->send();

					return $data;
				}

			}
		}
		*/

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

		public static function setAttempts($num){
			$_SESSION[User::ATTEMPTS] = $num;
		}

		public static function getAttempts(){
			$attempts = (isset($_SESSION[User::ATTEMPTS]) 
				&& $_SESSION[User::ATTEMPTS]) ? $_SESSION[User::ATTEMPTS] : $_SESSION[User::ATTEMPTS];
			return $attempts;
		}

		public static function setErrorRegister($msg){
			$_SESSION[User::ERROR_REGISTER] = $msg;
		}

		public static function getErrorRegister(){
			$msg = (isset($_SESSION[User::ERROR_REGISTER]) && $_SESSION[User::ERROR_REGISTER]) ? $_SESSION[User::ERROR_REGISTER] : '';
			User::clearErrorRegister();
			return $msg;
		}

		public static function clearErrorRegister(){
			$_SESSION[User::ERROR_REGISTER] = NULL;
		}

		public static function checkLoginExist($login){
			$database = new Database();
			$results = $database->select("SELECT * FROM tb_users WHERE txlogin = :txlogin", [
				':txlogin'=>$login
			]);
			return (count($results) > 0);
		}

	}//Fim da classe

 ?>