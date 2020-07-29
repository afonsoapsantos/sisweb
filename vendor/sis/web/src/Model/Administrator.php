<?php 

	namespace Sisweb\Model;
	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * Criada em 15/10/2019
	 * Classe que instancia o objeto do tipo adminisitrador e suas funções
	 */
	class Administrator extends User{
		

		public function listAdmins()
		{
			$database = new Database();

			return $database->select("SELECT * FROM tb_users u, tb_userstype ut, tb_status s WHERE u.usertype = 1 AND u.usertype = ut.idusertype AND u.statususer = s.idstatus ORDER BY u.iduser;");
		}
		
	}


 ?>