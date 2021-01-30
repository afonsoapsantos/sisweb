<?php

    namespace Sisweb\DB\Migrations;
    use Illuminate\Database\Capsule\Manager as Capsule;
    use Illuminate\Events\Dispatcher;
    use Illuminate\Container\Container;

    class Migration extends Capsule {

        public function __construct() {
            $this->capsule = new Capsule;
            $this->capsule->addConnection([
                'driver'    => 'pgsql',
                'host'      => 'localhost',
                'port'      => '5432',
                'database'  => 'sisweb',
                'username'  => 'postgres',
                'password'  => 'ASO97dpi9vb',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ]);

            //$this->setEventDispatcher(new Dispatcher(new Container));

            // Make this Capsule instance available globally via static methods... (optional)
            //$this->setAsGlobal();

            // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
            //$this->bootEloquent();
            
            $this->schema = $this->capsule->schema();

        }

    }

?>