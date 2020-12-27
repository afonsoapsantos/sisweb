<?php
    namespace Sisweb\DB\Migrations;
    use Illuminate\Database\Capsule\Manager;
    
    class Capsules extends Manager {

        public function __construct()
        {
            $this->addConnection([
                'driver'    => 'pgsql',
                'host'      => 'localhost',
                'database'  => 'sisweb',
                'username'  => 'postgres',
                'password'  => 'ASO97dpi9vb',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ]);
        }

    }

?>