<?php 

	namespace Sisweb\Model;
	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * 
	 */
	class Person extends Model{
		
		public function save(){
			$database = new Database();
			$database->select("INSERT INTO tb_persons
					(id, txname, txlastname, nurg, nuphone)
				VALUES
					(id, txname, txlastname, nurg, nuphone)",
				[
					"id"=>$this->setid(),
					"txname"=>$this->settxname(),
					"txlastname"=>$this->settxlastname(),
					"nurg"=>$this->setnurg(),
					"nuphone"=>$this->setnuphone()
				]);
		}

		public function update(){
			$database = new Database();
		}

		public function delete(){
			$database = new Database();
		}

		public function read()
		{
			# code...
		}

		public function get(){
			$database = new Database();
		}
		
	}//Fim da CLasse Person




 ?>