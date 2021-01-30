<?php

    namespace Sisweb\DB\Migrations;
    use \Sisweb\DB\Migrations\Migration;

    class ServiceMigration extends Migration {

        public function up()
        {
           $this->schema()->create('tb_services', function($table){
               // Auto-increment id 
                $table->increments('id');
                $table->string('txnameservice');
                $table->string('txdescriptionservice');
                $table->timestamps();
           });
        }

        public function down()
        {
            $this->schema->drop('tb_services');
        }

    }

?>