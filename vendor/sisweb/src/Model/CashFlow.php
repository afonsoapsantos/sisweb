<?php 

    namespace Sisweb\Model;
	use \Sisweb\Model;
	use \Sisweb\DB\Database;

    /**
	 * Criada em 19/11/2020
	 * Classe que instancia o objeto do tipo CashFlow - Fluxo de caixa
	 */
    class CashFlow extends Model {

        public function __construct()
        {
         // Função que ira fazer toda vez para verificar se o mês foi fechado 
         // para registrar ou verifica se há novo lançamento de movimento de caixa
        }

        public function insert()
        {
            //Insere o registro se o mês for fechado
            $database = new Database();
        }

        public function get()
        {
            # Busca apenas um registro de um mês especifico
        }

        public function read()
        {
            #Retorna todos os meses de acordo com o ano
            $database = new Database();
        }

        public function update()
        {
            $database = new Database();
        }

        public function delete()
        {
            $database = new Database();
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