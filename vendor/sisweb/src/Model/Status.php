<?php 

    namespace Sisweb\Model;
    use \Sisweb\Model;
    use \Sisweb\DB\Database;

    class Status extends Model {

        public function save()
        {
            # code...
        }

        public function update()
        {
            # code...
        }

        public function read(){
			$database = new Database();
			$data = $database->select("SELECT * FROM tb_status;");
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