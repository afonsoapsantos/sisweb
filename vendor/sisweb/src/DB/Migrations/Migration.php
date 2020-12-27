<?php

    namespace Sisweb\DB\Migrations;
    use Sisweb\DB\Migrations\UserMigration;

    class Migration {

        public function __construct()
        {
            $mu = new UserMigration();
            $mu->dropTable();   
            $mu->createTable();   
        }

    }

?>