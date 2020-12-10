<?php 

	namespace Sisweb\Model;
	use \Sisweb\Model;
	use \Sisweb\DB\Database;

	/**
	 * 
	 */
	class Order extends Model {

		const SUCCESS = "OrderSucess";
		const ERROR  = "OrderError";

		public function verifyOrder($id){
			$db = new Database();
			$verify = $db->select("SELECT * FROM tb_orders os WHERE os.requestfk = :id", array(
				":id"=>$id
			));

			if(count($verify) != 0){
				throw new \Exception("Ordem para essa solicitação já gerada");
			}
		}

		public function getMaxid(){

			$db = new Database();
			$idm = $db->select("SELECT MAX(id) FROM tb_orders;");
			foreach ($idm as $key => $value) {
				$max = $value['max'];
			}
			$id = $max + 1;
			$this->setid($id);

		}

		public function get(){
			$db = new Database();
			$get = $db->select(
				"SELECT * FROM tb_orders os 
					WHERE id = :id;",array(
				":id"=>$this->getid()
			));
			$this->setData($get[0]);
		}

		public function create(){
			$db = new Database();
			$this->verifyOrder((int)$this->getrequestfk());
			$results = $db->select(
				"INSERT INTO public.tb_orders (id, txdescription, txlocation, customerfk, farmfk, implementfk, statusfk, requestfk)
					VALUES (:id, :txdescription, :txlocation, :customerfk, :farmfk, :implementfk, :statusfk, :requestfk);", 
					array(
						":id"=>$this->getid(),
						":txdescription"=>$this->gettxdescription(),
						":txlocation"=>$this->gettxlocation(),
						":customerfk"=>$this->getcustomerfk(),
						":farmfk"=>$this->getfarmfk(),
						":implementfk"=>$this->getimplementfk(),
						":statusfk"=>$this->getstatusfk(),
						":requestfk"=>$this->getrequestfk()
					));
			$this->setSucess("Cadastro efetuado com Sucesso!");
		}

		public static function read(){
			$db = new Database();
			return $db->select(
				"SELECT * FROM public.tb_orders os
					INNER JOIN tb_farms fs ON fs.idfarm = os.farmfk
					INNER JOIN tb_implements ips ON ips.idimplement = os.implementfk
					INNER JOIN tb_statusorders so ON so.pkstatus = os.statusfk;"
			);
		}

		public function update(){
			$db = new Database();
			$update = $db->select(
				"UPDATE public.tb_orders 
					SET statusfk= :statusfk, technicianfk = :technicianfk, dtstart = :dtstart,
						dtend = :dtend, hrend = :hrend, hrstart = :hrstart 
					WHERE id = :id;",
				[
					":statusfk"=>$this->getstatusfk(),
					":technicianfk"=>$this->gettechnicianfk(),
					":dtstart"=>$this->getdtstart(),
					":dtend"=>$this->getdtend(),
					":hrend"=>$this->gethrend(),
					":hrstart"=>$this->gethrstart(),
					":id"=>$this->getid()
				]
			);
			$this->setSucess("Updated!");
		}

		public function delete(){
			$db = new Database();
			$db->select("DELETE FROM tb_orders AS o WHERE o.id = :id", 
				[
					":id"=>$this->getid()
				]
			);
		}

		public function getOrder(){
			$db = new Database();
			$results = $db->select(
				"SELECT * FROM tb_orders os 
					INNER JOIN tb_customers cs ON cs.idcustomer = os.customerfk
					INNER JOIN tb_implements ips ON ips.idimplement = os.implementfk
					INNER JOIN tb_farms fs ON fs.idfarm = os.farmfk
					INNER JOIN tb_statusorders so ON so.pkstatus = os.statusfk
					WHERE id = :id;",array(
				":id"=>$this->getid()
			));
			$this->setData($results[0]);
		}

		public function listOrdersOpen(){
			$db = new Database();
			return $results = $db->select(
				"SELECT * FROM public.tb_orders os
					INNER JOIN tb_farms fs ON fs.idfarm = os.farmfk
					INNER JOIN tb_implements ips ON ips.idimplement = os.implementfk
					INNER JOIN tb_statusorders so ON so.pkstatus = os.statusfk
					WHERE so.pkstatus = 1;"
			);
		}		

		public function getOrderByTechnician($pktechnician){
			$db = new Database();
			$results = $db->select(
				"SELECT * FROM tb_orders os 
					INNER JOIN tb_customers cs ON cs.idcustomer = os.customerfk
					INNER JOIN tb_implements ips ON ips.idimplement = os.implementfk
					INNER JOIN tb_farms fs ON fs.idfarm = os.farmfk
					INNER JOIN tb_statusorders so ON so.pkstatus = os.statusfk
					WHERE os.technicianfk = :pktechnician",array(
						":pktechnician"=>$pktechnician
				)
			);

			return $results;
		}

		public static function listOrdersByCustomer($idcustomer){
			$db = new Database();
			$results = $db->select(
				"SELECT * FROM tb_orders os 
					INNER JOIN tb_statusorders so ON so.pkstatus = os.statusfk
					INNER JOIN tb_farms fs ON fs.idfarm = os.farmfk
					INNER JOIN tb_implements ips ON ips.idimplement = os.implementfk
					INNER JOIN tb_requests rs ON rs.idrequest = os.requestfk
					INNER JOIN tb_customers cs ON cs.idcustomer = rs.customerfk
					WHERE cs.idcustomer = :idcustomer", array(
						":idcustomer"=>$idcustomer
					));
			return $results;
		}

		public static function setError($msg){
			$_SESSION[Order::ERROR] = $msg;
		}
	
		public static function getError(){
			$msg = (isset($_SESSION[Order::ERROR]) && $_SESSION[Order::ERROR]) ? $_SESSION[Order::ERROR] : '';
			Order::clearError();
			return $msg;
		}

		public static function clearError(){
			$_SESSION[Order::SUCCESS] = NULL;
		}

		public static function setSuccess($msg){
			$_SESSION[Order::SUCCESS] = $msg;
		}
	
		public static function getSuccess(){
			$msg = (isset($_SESSION[Order::SUCCESS]) && $_SESSION[Order::SUCCESS]) ? $_SESSION[Order::SUCCESS] : '';
			Order::clearSuccess();
			return $msg;
		}

		public static function clearSuccess(){
			$_SESSION[Order::SUCCESS] = NULL;
		}

	}

 ?>