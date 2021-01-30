<?php

    namespace Sisweb\DB\Migrations;
    use \Sisweb\DB\Migrations\Migration;

    class UserMigration extends Migration {

        public function up()
        {
           $this->schema()->create('tb_users', function($table){ 
                $table->increments('id');
                $table->string('txlogin');
                $table->string('txpassword'); 
                $table->integer('fkusertype'); 
                $table->integer('fkstatus'); 
                $table->timestamps();
           });
        }

        public function down()
        {
            $this->schema->drop('tb_users');
        }

    }

?>