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

		public function getMaxIdOrder(){
			$database = new Database();
			$id = $database->select("SELECT MAX(idorder) FROM tb_orders;");
			foreach ($id as $key => $value) {
				$ido = $value['max'];
			}

			$idorder = $ido + 1;

			$this->setidorder($idorder);
		}

		public function read(){
			$database = new Database();
			$results = $database->select(
				"SELECT * FROM tb_orders os 
					WHERE idorder = :idorder;",array(
				":idorder"=>$this->getidorder()
			));
			$this->setData($results[0]);
		}

		public function getOrder(){
			$database = new Database();
			$results = $database->select(
				"SELECT * FROM tb_orders os 
					INNER JOIN tb_customers cs ON cs.idcustomer = os.customerfk
					INNER JOIN tb_implements ips ON ips.idimplement = os.implementfk
					INNER JOIN tb_farms fs ON fs.idfarm = os.farmfk
					INNER JOIN tb_statusorders so ON so.pkstatus = os.statusfk
					WHERE idorder = :idorder;",array(
				":idorder"=>$this->getidorder()
			));
			$this->setData($results[0]);
		}

		public function listAll(){
			$database = new Database();
			return $results = $database->select(
				"SELECT * FROM public.tb_orders os
					INNER JOIN tb_farms fs ON fs.idfarm = os.farmfk
					INNER JOIN tb_implements ips ON ips.idimplement = os.implementfk
					INNER JOIN tb_statusorders so ON so.pkstatus = os.statusfk;"
			);
		}

		public function listOrdersOpen(){
			$database = new Database();
			return $results = $database->select(
				"SELECT * FROM public.tb_orders os
					INNER JOIN tb_farms fs ON fs.idfarm = os.farmfk
					INNER JOIN tb_implements ips ON ips.idimplement = os.implementfk
					INNER JOIN tb_statusorders so ON so.pkstatus = os.statusfk
					WHERE so.pkstatus = 1;"
			);
		}		

		public function verifyOrder($pkrequest){
			$database = new Database();
			$results = $database->select("SELECT * FROM tb_orders os WHERE os.requestfk = :pkrequest", array(
				":pkrequest"=>$pkrequest
			));

			if(count($results) != 0){
				throw new \Exception("Ordem para essa solicitação já gerada");
			}
		}
		
		public function insert(){
			$database = new Database();
			$this->verifyOrder((int)$this->getrequestfk());
			$results = $database->select(
				"INSERT INTO public.tb_orders (idorder, txdescription, txlocation, customerfk, farmfk, implementfk, statusfk, requestfk)
					VALUES (:idorder, :txdescription, :txlocation, :customerfk, :farmfk, :implementfk, :statusfk, :requestfk);", 
					array(
						":idorder"=>$this->getidorder(),
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

		public function updateStart(){
			$database = new Database();
			$results = $database->select(
				"UPDATE public.tb_orders SET statusfk= :statusfk, technicianfk = :technicianfk, dtstart = :dtstart, dtend = :dtend, hrend = :hrend, hrstart = :hrstart WHERE idorder = :idorder;", 
					array(":statusfk"=>$this->getstatusfk(),
						":technicianfk"=>$this->gettechnicianfk(),
						":dtstart"=>$this->getdtstart(),
						":dtend"=>$this->getdtend(),
						":hrend"=>$this->gethrend(),
						":hrstart"=>$this->gethrstart(),
						":idorder"=>$this->getidorder()
					));
			$this->setSucess("Alterado com Sucesso!");
		}

		public function delete(){
			$database = new Database();
			$results = $database->select("");
		}

		public function getOrderByTechnician($pktechnician)
		{
			$database = new Database();
			$results = $database->select(
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
			$database = new Database();
			$results = $database->select(
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