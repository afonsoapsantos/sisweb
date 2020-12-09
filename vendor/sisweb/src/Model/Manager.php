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

		public static function read(){
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
		
	}


 ?>