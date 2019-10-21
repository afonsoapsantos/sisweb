<?php 

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Sisweb\Page;
use \Sisweb\PageAdmin;
use \Sisweb\PageCustomer;
use \Sisweb\PageManager;
use \Sisweb\PageTechnical;
use \Sisweb\PageFarmworker;
use \Sisweb\Model\User;
use \Sisweb\Model\Administrator;
use \Sisweb\Model\Customer;
use \Sisweb\Model\Manager;
use \Sisweb\Model\Technician;
use \Sisweb\Model\Farmworker;

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get("/", function() {
    
	$page = new Page();

	$page->setTpl("index");

});

$app->get("/login", function() {
    
	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);
	$page->setTpl("login");

});

$app->get("/register", function() {
    
	$page = new Page();
	$page->setTpl("register");

});

$app->post("/login", function() {

	$user = new User();
	$user = User::login($_POST["login"],$_POST["password"]);
	$usertype = $user->getusertype();
	if($usertype === NULL){
		$usertype = 0;
	}
	switch ($usertype) {
		case 1:
			header("Location: /admin");
			break;
		case 2:
			header("Location: /manager");
			break;
		case 3:
			header("Location: /tec");
			break;
		case 4:
			header("Location: /customer");
			break;
		case 5:
			header("Location: /farmworker");
			break;
		case 0:
			header("Locatio: /login");
			break;
		default:
			header("Location: /login");
			break;
	}
	exit;

});

## Rota de logout geral do sistema
$app->get("/logout", function() {

	User::logout();
	header("Location: /login");
	exit;

});

## Rotas do Adminsitrador do sistema
##Usuário master
$app->get("/admin", function() {
    
    User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("index");

});

$app->get('/admin/users', function() {
    
    User::verifyLogin();
    $users = User::listAll();
	$page = new PageAdmin();
	$page->setTpl("users",array(
		"users"=>$users
	));
});

$app->get("/admin/users/create", function (){
	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("users-create");
});

$app->post("/admin/users/create", function(){
	User::verifyLogin();
	$user = new User();
	$user->setData($_POST);
	$user->save();
	header("/admin/users");
	exit;
});

$app->get("/admin/users/:iduser/delete", function (){
	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("");
});

$app->get("/admin/users/:iduser", function ($iduser){
	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("users-update");
});

$app->post("/admin/users/:iduser", function (){
	User::verifyLogin();
});

$app->get("/admin/sql/create", function(){
	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("sql-create");
});
## Fim das rotas do ADMIN

##Rotas do GERENTE

$app->get("/manager", function(){
	User::verifyLogin();
	$page = new PageManager();
	$page->setTpl("index");
});

##Fim das rotas do GERENTE

## Rotas do usuário CLIENTE no sistema
$app->get("/customer", function() {
    
    User::verifyLogin();
	$page = new PageCustomer();
	$page->setTpl("index");

});

$app->get("/customer/store", function(){
	User::verifyLogin();
	$page = new PageCustomer();
	$page->setTpl("customer-store");
});

## Fim das Rotas do CLIENTE

$app->run();

 ?>