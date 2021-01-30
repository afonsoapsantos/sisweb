<?php

    namespace Sisweb\DB\Migrations;
    use \Sisweb\DB\Migrations\Migration;

    class ProductMigration extends Migration {

        public function up()
        {
           $this->schema()->create('tb_products', function($table){
                $table->increments('id');
           });
        }

        public function down()
        {
            $this->schema->drop('tb_products');
        }

    }

?>