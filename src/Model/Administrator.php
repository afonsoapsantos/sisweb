<?php 

	namespace Sisweb\Model;
	use \Sisweb\DB\Database;
	use \Sisweb\Model\User;

	/**
	 * Criada em 15/10/2019
	 * Classe que instancia o objeto do tipo adminisitrador e suas funções
	 */
	class Administrator extends User {

		const ERROR = "error";
		const Success = "success";

		/**
		 * Registra o usuário do tipo administrador da empresa
		 * Função que insere na tabela
		 */
		public function create(){
			#Registra o usuário do tipo administrador
			$db = new Database();
			$db->select("INSERT INTO tb_administrators 
					(id, txname, txlastname, createdat, updatedat)
				VALUES 
					(:id, :txname, :txlastname, :createdat, :updatedat)", 
			[
				":id"=>$this->setid(),
				":txname"=>$this->settxname(),
				":txlastname"=>$this->settxlastname(),
				":createdat"=>$this->setcreatedat(),
				":updatedat"=>$this->setupdatedat()
			]);

			$this->setSuccess("Created!");
		}

		public function read(){
			$db = new Database();
			return $db->select(
				"SELECT * FROM tb_users us 
					INNER JOIN tb_statususer su ON us.fkstatus = su.pkstatus
					INNER JOIN tb_userstype ut ON us.fkusertype = ut.idusertype
					WHERE us.fkusertype = 1;"
			);
		}

		public static function validateAdmin(){
			$fkusertype = (int)$_SESSION[User::SESSION]["fkusertype"];
			$fkstatus = (int)$_SESSION[User::SESSION]["fkstatus"];
			if ($fkstatus != 1) {
				User::logout();
			}
			User::verifyLogin((int)$fkusertype);
			if($fkusertype != 1){
				User::logout();
			}
		}
	}


 ?>