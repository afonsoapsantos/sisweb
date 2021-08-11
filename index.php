<?php 

session_start();

require_once("../sisweb/vendor/autoload.php");

$app = new \Slim\Slim();
//$app->addErrorMiddleware(false, true, true);

//$app->config('debug', true);

require_once("functions.php");
require_once("./src/routes/site.php");
require_once("./src/routes/admin.php");
require_once("./src/routes/manager.php");
require_once("./src/routes/customer.php");
require_once("./src/routes/technical.php");
require_once("./src/routes/farmworker.php");

$app->run();

 ?>
