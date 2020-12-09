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
					(id, txname, txlastname, nurg, nucpf, email, nucellphone dtregister)
				VALUES
					(:id, :txname, :txlastname, :nurg, :nucpf, :email, :nucellphone :dtregister)",
				[
					":id"=>$this->setid(),
					":txname"=>$this->settxname(),
					":txlastname"=>$this->settxlastname(),
					":nurg"=>$this->setnurg(),
					":nucpf"=>$this->setnucpf(),
					":email"=>$this->setemail(),
					":nucellphone"=>$this->setnucellphone(),
					":dtregister"=>$this->setdtregister()
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