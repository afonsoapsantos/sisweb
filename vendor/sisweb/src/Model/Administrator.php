<?php 

	namespace Sisweb\Model;
	use \Sisweb\DB\Database;
	use \Sisweb\Model\User;

	/**
	 * Criada em 15/10/2019
	 * Classe que instancia o objeto do tipo adminisitrador e suas funções
	 */
	class Administrator extends User {
		

		public function save()
		{
			#Registra o usuário do tipo administrador

			$database = new Database();

			$database->select("INSERT INTO tb_administrators 
					(id, txname, txlastname, )
				VALUES 
					(id, txname, txlastname, )", [

			]);


			$user = new User();
			$user->save();
		}

		public static function read(){
			$database = new Database();

			return $database->select(
				"SELECT * FROM tb_users us 
					INNER JOIN tb_statususer su ON us.fkstatususer = su.pkstatus
					INNER JOIN tb_userstype ut ON us.fkusertype = ut.idusertype
					WHERE us.fkusertype = 1;"
			);
		}

		public static function validateAdmin(){
			
			//$type - passar argumento na função
			// if ($type != 1) {
			// 	User::logout();
			// }

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
		
	}


 ?>