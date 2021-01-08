<?php

    namespace Sisweb\DB\Migrations;
    use \Sisweb\DB\Migrations\Migration;

    class FarmMigration extends Migration {

        public function up()
        {
           $this->schema()->create('tb_farms', function($table){
                $table->integer('idfarm');
                $table->character('txnamefarm');
                $table->character('txdescriptionfarm');
                $table->integer('addressfk');
                $table->integer('customerfk');
                $table->timestamps();

                $table->primary('id');
           });
        }

        public function down()
        {
            $this->schema()->drop('tb_farms');
        }

    }

?>