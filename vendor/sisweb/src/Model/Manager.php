<?php 

	namespace Sisweb\Model;
	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * 
	 */
	class Manager extends Model {


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
		
	}


 ?>