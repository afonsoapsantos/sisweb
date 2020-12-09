<?php

    namespace Sisweb\Model;
    use \Sisweb\DB\Database;
    use \Sisweb\Model;

    class ManagerMedia extends Model {

        public function create(){
            $database = new Database();
            $data = $database->select(
                "INSERT INTO tb_managermedia
                (id, customerfk, requestfk, orderfk, createdat, updatedat)
                VALUES (:id, :customerfk, :requestfk, :orderfk, :createdat, :updatedat)",
                [
                    ":id"=>$this->setid(),
                    ":customerfk"=>$this->setcustomerfk(),
                    ":requestfk"=>$this->setrequestfk(),
                    ":orderfk"=>$this->setorderfk(),
                    ":createdat"=>$this->setcreatedat(),
                    ":updatedat"=>$this->setupdatedat(),
                ]
            );
            $this->setData($data[0]);
            $this->setSuccess("Created");
        }

        public function read(){
            $database = new Database();
            return $database->select(
                "SELECT * FROM tb_managermedia;"
            );
        }

        public function update(){
            $database = new Database();
            $data = $database->query(
                "UPDATE tb_managermedia
                SET id=:id, customerfk=:customerfk, requestfk=:requestfk, 
                    orderfk=:orderfk, createdat=:createdat, updatedat=:updatedat",
                [
                    ":id"=>$this->setid(),
                    ":customerfk"=>$this->setcustomerfk(),
                    ":requestfk"=>$this->setrequestfk(),
                    ":orderfk"=>$this->setorderfk(),
                    ":createdat"=>$this->setcreatedat(),
                    ":updatedat"=>$this->setupdatedat(),
                ]
            );
            $this->setData($data[0]);
            $this->setSuccess("Updated");
        }

        public function delete(){
            $database = new Database();
            $database->select(
                "DELETE FROM tb_managermedia AS mm WHERE mm.id = :id",
                [
                    ":id"=>$this->getid()
                ]
            );
            $this->setSuccess("Deleted");
        }

        public function get(){
            $database = new Database();
            $database->select(
                "SELECT * FROM tb_managermedia AS mm WHERE mm.id = :id",
                [
                    ":id"=>$this->getid()
                ]
            );
        }

    }

?>