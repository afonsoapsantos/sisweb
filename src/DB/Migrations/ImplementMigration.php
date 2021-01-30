<?php

    namespace Sisweb\DB\Migrations;
    use \Sisweb\DB\Migrations\Migration;

    class ImplementMigration extends Migration {

        public function up()
        {
            $this->schema()->create('tb_implements', function($table){
                $table->increments('id');
                $table->character('txnameimp');
                $table->character('txmodelimp');
                $table->integer('categoryfk');
                $table->integer('');

                // "(idimplement, txnameimplement, txmodelimplement, 
                // txtype, nuanofabricacaoimp, txdescricaoimp, customerfk)"
            });
        }

        public function down()
        {
            $this->schema()->drop('tb_implements');
        }

    }


?>