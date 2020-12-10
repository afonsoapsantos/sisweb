<?php

    namespace Sisweb\Model;
    use \Sisweb\Model;
    use \Sisweb\DB\Database;

    class Session extends Model {

        public function create(){
            $db = new Database();
            $data = $db->query(
                "INSERT INTO tb_sessions
                    (id, userfk, statusfk, nutime, createdat, updateat)
                VALUES (:id, :userfk, :statusfk, :nutime, :createdat, :updateat)",
                [
                    ":id"=>$this->getid(),
                    ":userfk"=>$this->getuserfk(),
                    ":statusfk"=>$this->getstatusfk(),
                    ":nutime"=>$this->getnutime(),
                    ":createdat"=>$this->getcreatedat(),
                    ":updatedat"=>$this->getupdatedat()
                ]
            );

            $this->setData($data[0]);
            $this->setScuccess("Created");
        }

        public function read(){
            $db = new Database();
            return $db->select(
                "SELECT * FROM tb_sessions"
            );
        }

        public function update(){
            $db = new Database();
            $data = $db->query(
                "UPDATE tb_sessions
                    SET id=:id, userfk=:userfk, statusfk=:statusfk, nutime=:nutime, 
                        createdat=:createdat, updateat=:updateat)",
                [
                    ":id"=>$this->getid(),
                    ":userfk"=>$this->getuserfk(),
                    ":statusfk"=>$this->getstatusfk(),
                    ":nutime"=>$this->getnutime(),
                    ":createdat"=>$this->getcreatedat(),
                    ":updatedat"=>$this->getupdatedat()
                ]
            );

            $this->setData($data[0]);
            $this->setScuccess("Updated");
        }

        public function delete(){
            $db = new Database();
            $db->select(
                "DELETE * FROM tb_sessions AS se WHERE se.id = :id",
                [
                    ":id"=>$this->getid()
                ]
            );
        }

        public function validate(){
            $db = new Database();
        }

    }

?>