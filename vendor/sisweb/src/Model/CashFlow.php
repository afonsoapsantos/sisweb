<?php 

    namespace Sisweb\Model;
    use \Sisweb\Model;
    use \Sisweb\Model\CashMovement;
	use \Sisweb\DB\Database;

    /**
	 * Criada em 19/11/2020
	 * Classe que instancia o objeto do tipo CashFlow - Fluxo de caixa
	 */
    class CashFlow extends Model {

        public function __construct()
        {
            $db = new Database();
            // Função que ira fazer toda vez para verificar se o mês foi fechado 
            // para registrar ou verifica se há novo lançamento de movimento de caixa

            //Pegando o ultimo registro
            $cashmovement = new CashMovement();
            $cashmovement->getMaxId();
            $cashmovement->setid($cashmovement->getid() - 1);
            $cashmovement->get();

        }

        public function getMaxId()
        {
            $db = new Database();
            $idcf = $db->select("SELECT MAX(id) FROM tb_cashflows");
            foreach ($idcf as $key => $value) {
				$idm = $value['max'];
			}
			$id = $idm + 1;
			$this->setid($id);
        }

        public function create(){
            //Insere o registro se o mês for fechado
            $db = new Database();
            $cashFlow = $db->select("INSERT INTO public.tb_cashflows 
                    (id, numonth, txtype, vlprice, createdat, updatedat)
                VALUES 
                    (:id, :numonth, :txtype, :vlprice, :createdat, :updatedat)",
                [
                    ":id"=>$this->getid(),
                    ":numonth"=>$this->getnumonth(),
                    ":txtype"=>$this->gettxtype(),
                    ":vlprice"=>$this->getvlprice(),
                    ":createdat"=>$this->getcreatedat(),
                    ":updatedat"=>$this->getupdatedat()
                ]
            );

            $this->setData($cashFlow);

            $this->setSuccess("Cadastro efetuado com Sucesso!");
        }

        public function get()
        {
            # Busca apenas um registro de um mês especifico
            $db = new Database();
            $data = $db->select("SELECT * FROM tb_cashflows AS cf WHERE cf.id =", [
                ":id"=>$this->getid()
            ]);
            if(count($data) === 0){
				throw new \Exception("Sem dados");
			}

			$this->setData($data[0]);
        }

        public function read()
        {
            #Retorna todos os meses de acordo com o ano
            $db = new Database();
            $results = $db->select("SELECT * FROM tb_cashflows");
            return $results;
        }

        public function update()
        {
            $db = new Database();
        }

        public function delete()
        {
            $db = new Database();

			$data = $db->select(
				"DELETE FROM tb_cashflows AS cf WHERE cf.id = :id", [
					":id"=>$this->getid()
				]
			);

			$this->setSuccess("Registro Deletado!");
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