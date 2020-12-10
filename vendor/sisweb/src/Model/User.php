<?php 

	namespace Sisweb\Model;
	use \Sisweb\DB\Database;

	class User extends Person {

		const SESSION = "User";
		const SECRET = "Sisweb_recovery_6";
		const ERROR = "UserError";
		const ERROR_REGISTER = "UserErrorRegister";
		const SUCCESS = "UserSucesss";
		const ATTEMPTS = 0;

		public static function getFromSession(){
			$user = new User();
			if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['id'] > 0) {
				$user->setData($_SESSION[User::SESSION]);
			}
			return $user;
		}

		public static function login($login, $password){
			$database = new Database();
			$results = $database->select(
				"SELECT * FROM tb_users as us, tb_userstype as ut 
					WHERE us.txlogin = :LOGIN AND us.fkusertype = ut.id",
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
				!(int)$_SESSION[User::SESSION]["id"] > 0
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

		public static function validate() {
			$fkusertype = (int)$_SESSION[User::SESSION]["fkusertype"];
			$fkstatususer = (int)$_SESSION[User::SESSION]["fkstatususer"];

			if ($fkstatususer == 1 && $fkusertype < 5  && $fkusertype > 1) {
				User::logout();
			} else {
				return $fkusertype;
			}
		}

		public function getMaxId(){
			$database = new Database();
			$idmax = $database->select("SELECT MAX(id) FROM tb_users;");
			foreach ($idmax as $key => $value) {
				$id = $value['max'];
			}
			$idm = $id + 1;
			$this->setiduser($idm);
		}

		public function read(){
			$database = new Database();
			return $database->select(
				"SELECT * FROM tb_users us
					INNER JOIN tb_userstype ut ON us.fkusertype = ut.idusertype 
					INNER JOIN tb_status su ON us.fkstatususer = su.idstatus 
					ORDER BY us.id;");
		}

		public function create(){
			$database = new Database();

			$data = $database->select(
				"INSERT INTO tb_users(id, txlogin, txpassword, fkusertype, fkstatususer, dtregisteruser)
				VALUES (:id, :txlogin, :txpassword, :fkusertype, :fkstatususer, :dtregisteruser);",array(
					":id"=>$this->getiduser(),
					":txlogin"=>$this->gettxlogin(),
					":txpassword"=>$this->gettxpassword(),
					":fkusertype"=>$this->getfkusertype(),
					":fkstatususer"=>$this->getfkstatususer(),
					":dtregisteruser"=>$this->getdtregisteruser()
				));
			$this->setData($data[0]);
			$this->setSuccess("created");
		}

		public function get(){
			$database = new Database();
			$results = $database->select("SELECT * FROM tb_users AS u WHERE u.id = :id", array(
				":id"=>$this->getid()
			));

			if(count($results) === 0){
				throw new \Exception("Usuário não ecnocontrado");
			}

			$this->setData($results[0]);
		}

		public function update(){
			$database = new Database();
			$data = $database->select(
				"UPDATE tb_users 
					SET txlogin=:login, txpassword=:password, fkusertype=:fkusertype, 
						fkstatususer=:fkstatususer, dtregisteruser=:dtregisteruser
					WHERE id = :id;",
				array(
					":id"=>$this->getiduser(),
					":login"=>$this->gettxlogin(),
					":password"=>$this->gettxpassword(),
					":fkusertype"=>$this->getfkusertype(),
					":fkstatususer"=>$this->getfkstatususer(),
					":dtregisteruser"=>$this->getdtregisteruser()
				));
			$this->setData($data[0]);
			$this->setSuccess("Updated");
		}

		public function delete(){
			$database = new Database();
			$database->query("DELETE FROM tb_users WHERE id = :id", array(
				":id"=>$this->getiduser()
			));
			$this->setSuccess("Usuário deletado");
		}

		public static function getUsersPage($page = 1, $itemsPerPage = 6){
			$start = ($page - 1) * $itemsPerPage;
			
			$database = new Database();
			$results = $database->select("
				SELECT * FROM tb_users us
					INNER JOIN tb_userstype ut ON us.fkusertype = ut.idusertype 
					INNER JOIN tb_status su ON us.fkstatususer = su.idstatus 
					ORDER BY us.id
					OFFSET $start 
					LIMIT $itemsPerPage
			");

			$resultTotal = $database->select("
				SELECT COUNT(*) AS nrtotal FROM tb_users;
			");

			return [
				'data'=>$results,
				'total'=>$resultTotal[0]['nrtotal'],
				'pages'=>ceil($resultTotal[0]['nrtotal'] / $itemsPerPage)
			];
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
		         $results2 = $database->select("CALL sp_userspasswordsrecoveries_create(:id, :desip)", array(
		             ":id"=>$data['id'],
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
		         INNER JOIN tb_users b USING(id)
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
				"SELECT * FROM tb_users u, tb_person pe WHERE u.id = pe.userfk AND pe.email = :email", array(
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
						":userfk"=>$data['id'], 
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