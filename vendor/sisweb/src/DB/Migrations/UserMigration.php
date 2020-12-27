<?php

    namespace Sisweb\DB\Migrations;
    use Sisweb\DB\Migrations\Capsules;
    
    class UserMigration extends Capsules {

        public function createTable()
        {
            $this->schema()->create('users', function ($table) {
                $table->increments('id')->nullable();
                $table->char('txlogin', 50)->nullable();
                $table->char('txpasword', 16)->nullable();
                $table->integer('usertypefk')->nullable();
                $table->integer('statusfk')->nullable();
                $table->date('createdat')->nullable();
                $table->date('updatedat');
            });
        }

        public function dropTable()
        {
            $this->schema()->dropIfExits('users');
        }

    }

?>