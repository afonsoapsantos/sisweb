<?php 

namespace Sisweb\DB;
	
class Database {

	const HOSTNAME = "localhost";
	const USERNAME = "postgres";
	const PASSWORD = "Senha";
	const DBNAME = "sisweb";
	const PORT = "5432";
	
	private $conn;
	
	public function __construct(){
		$this->conn = new \PDO("pgsql:dbname=".Database::DBNAME.";host=".Database::HOSTNAME.";port=".Database::PORT, 
			Database::USERNAME,
			Database::PASSWORD
		);
	}
	
	private function setParams($statement, $parameters = array()){
		foreach ($parameters as $key => $value) {
			$this->bindParam($statement, $key, $value);
		}
	}
	
	private function bindParam($statement, $key, $value){
		$statement->bindParam($key, $value);
	}
	
	public function query($rawQuery, $params = array()){	
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
	}
	
	public function select($rawQuery, $params = array()):array{
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}



 ?>
