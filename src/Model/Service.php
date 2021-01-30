<?php 

	namespace Sisweb\Model;

	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * Classe para instanciamento de Serviços
	 */
	class Service extends Model{
		
		public function create(){
			$db = new Database();
			$data = $db->query(
				"INSERT INTO tb_services (id, txname, txdescription, 
							price, createdat, updatedat)
					VALUES (:id, :txname, :txdescription, 
							:price, :createdat, :updatedat);", 
				[
					":id"=>$this->getid(),
					":txname"=>$this->gettxname(),
					":txdescription"=>$this->gettxdescription(),
					":price"=>$this->getprice(),
					":createdat"=>$this->getcreatedat(),
					":updatedat"=>$this->getupdatedat()
				]
			);

			$this->setData($data[0]);
			$this->setSuccess("Created");

		}//Fim método create

		public function update(){
			$db = new Database();
			$results = $db->select("UPDATE tb_services 
				SET txname = :txname, txdescription = :txdescription, 
					price = :price, createdat=:createdat, updatedat=:updatedat
				WHERE id = :id;",
				[
					":id"=>$this->getid(),
					":txname"=>$this->gettxname(),
					":txdescription"=>$this->gettxdescription(),
					":price"=>$this->getprice(),
					":createdat"=>$this->getcreatedat(),
					":updatedat"=>$this->getupdatedat()
				]
			);

		}//Fim método update

		public function delete(){
			$db = new Database();
			$results = $db->select("DELETE FROM tb_services ss WHERE ss.id = :id",array(
				":id"=>$this->getid()
			));
		}//Fim método delete

		public function get(){
			$db = new Database();
			$results = $db->select(
				"SELECT * FROM tb_services WHERE id = :id", array(
				":id"=>$this->getid()
			));

			if($results[0] === 0 ){
				throw new \Exception("Não ecnocontrado");
			}

			$data = $results[0];
			$this->setData($data);
		}//Fim método get

		public function getMaxId(){
			$db = new Database();
			$idmax = $db->select("SELECT MAX(id) FROM tb_services;");
			foreach ($idmax as $key => $value) {
				$idm = $value['max'];
			}
			$id = $idm + 1;
			$this->setid($id);
		}//Fim método getMaxId

		public function listAll(){
			$db = new Database();
			return $db->select("SELECT * FROM tb_services;");		
		}//Fim método listAll
		
		public static function getServicesPage($page = 1, $itemsPerPage = 3 )
		{
			$start = ($page - 1) * $itemsPerPage;
			
			$db = new Database();
			$results = $db->select("
				SELECT * FROM tb_services
					OFFSET $start 
					LIMIT $itemsPerPage
			");

			$resultTotal = $db->select("
				SELECT COUNT(*) AS nrtotal FROM tb_services;
			");

			return [
				'data'=>$results,
				'total'=>$resultTotal[0]['nrtotal'],
				'pages'=>ceil($resultTotal[0]['nrtotal'] / $itemsPerPage)
			];
		}

	}//Fim da Classe Service


 ?>