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
			$data = $db->select("SELECT * FROM tb_status;");
			return $data;
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