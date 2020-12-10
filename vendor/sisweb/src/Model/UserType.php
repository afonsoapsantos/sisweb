<?php 

    namespace Sisweb\Model;
    use \Sisweb\Model;
    use \Sisweb\DB\Database;


    class UserType extends Model{

        public function read(){
            $db = new Database();
			return $db->select(
                "SELECT * FROM tb_userstype;"
            );
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