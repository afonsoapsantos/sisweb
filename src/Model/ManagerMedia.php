<?php

    namespace Sisweb\Model;
    use \Sisweb\DB\Database;
    use \Sisweb\Model;

    class ManagerMedia extends Model {

        public function create(){
            $db = new Database();
            $data = $db->select(
                "INSERT INTO tb_managermedia
                (id, customerfk, requestfk, mediafk, orderfk, createdat, updatedat)
                VALUES (:id, :customerfk, :requestfk, :mediafk, :orderfk, :createdat, :updatedat)",
                [
                    ":id"=>$this->getid(),
                    ":customerfk"=>$this->getcustomerfk(),
                    ":requestfk"=>$this->getrequestfk(),
                    ":mediafk"=>$this->getmediafk(),
                    ":orderfk"=>$this->getorderfk(),
                    ":createdat"=>$this->getcreatedat(),
                    ":updatedat"=>$this->getupdatedat(),
                ]
            );
            $this->setData($data[0]);
            $this->setSuccess("Created");
        }

        public function read(){
            $db = new Database();
            return $db->select(
                "SELECT * FROM tb_managermedia;"
            );
        }

        public function update(){
            $db = new Database();
            $data = $db->query(
                "UPDATE tb_managermedia
                SET id=:id, customerfk=:customerfk, requestfk=:requestfk, mediafk=:mediafk, 
                    orderfk=:orderfk, createdat=:createdat, updatedat=:updatedat",
                [
                    ":id"=>$this->setid(),
                    ":customerfk"=>$this->setcustomerfk(),
                    ":requestfk"=>$this->setrequestfk(),
                    ":mediafk"=>$this->setmediafk(),
                    ":orderfk"=>$this->setorderfk(),
                    ":createdat"=>$this->setcreatedat(),
                    ":updatedat"=>$this->setupdatedat(),
                ]
            );
            $this->setData($data[0]);
            $this->setSuccess("Updated");
        }

        public function delete(){
            $db = new Database();
            $db->select(
                "DELETE FROM tb_managermedia AS mm WHERE mm.id = :id",
                [
                    ":id"=>$this->getid()
                ]
            );
            $this->setSuccess("Deleted");
        }

        public function get(){
            $db = new Database();
            $db->select(
                "SELECT * FROM tb_managermedia AS mm WHERE mm.id = :id",
                [
                    ":id"=>$this->getid()
                ]
            );
        }

        public function search(){
            $db = new Database();
            $db->select(
                ""
            );
        }

    }

?>