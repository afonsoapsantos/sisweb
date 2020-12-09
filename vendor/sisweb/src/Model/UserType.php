<?php 

    namespace Sisweb\Model;
    use \Sisweb\Model;
    use \Sisweb\DB\Database;


    class UserType extends Model{

        public function read(){
            $database = new Database();
			$userstypes = $database->select("SELECT * FROM tb_userstype;");
			return $userstypes;
        }
        
        public function update(){
            # code...
        }

        public function save(){
            # code...
        }

        public function delete(){
            # code...
        }
        
        public function get(){
            # code...
        }

    }

?>