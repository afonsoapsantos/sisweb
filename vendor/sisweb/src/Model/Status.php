<?php 

    namespace Sisweb\Model;
    use \Sisweb\Model;
    use \Sisweb\DB\Database;

    class Status extends Model {

        public function create()
        {
            # code...
        }

        public function update()
        {
            # code...
        }

        public function read(){
			$db = new Database();
			return $db->select("SELECT * FROM tb_status;");
        }
        
        public function delete()
        {
            # code...
        }

        public function get()
        {
            # code...
        }

    }

?>