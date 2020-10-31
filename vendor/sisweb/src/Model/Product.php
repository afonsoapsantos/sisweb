<?php 

	namespace Sisweb\Model;

	use Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * 
	 */
	class Product extends Model{
		
		public static function listAll(){
			$database = new Database();

			return $database->select(
				"SELECT * FROM tb_products ps 
					INNER JOIN tb_brands bs ON ps.fkbrandproduct = bs.pkbrand
					ORDER BY txnameproduct;"
			);
		}

	}


 ?>