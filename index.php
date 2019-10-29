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
use \Sisweb\Model\Person;
use \Sisweb\Model\User;
use \Sisweb\Model\Administrator;
use \Sisweb\Model\Customer;
use \Sisweb\Model\Manager;
use \Sisweb\Model\Technician;
use \Sisweb\Model\Farmworker;
use \Sisweb\Model\Request;

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

$app->get("/admin/users/consult", function(){
	User::verifyLogin();
	$users = User::listAll();
	$page = new PageAdmin();
	$page->setTpl("users-select",array(
		"users"=>$users
	));
});

$app->get("/admin/users/create", function (){
	User::verifyLogin();
	$userstypes = User::listUsersTypes();
	$page = new PageAdmin();
	$page->setTpl("users-create", array(
		"userstypes"=>$userstypes
	));
});

$app->post("/admin/users/create", function(){
	User::verifyLogin();
	$user = new User();

	if($_POST['usertype'] === "1"){
		$_POST['usertype'] = 1;
	}else if($_POST['usertype'] === "2"){
		$_POST['usertype'] = 2;
	}else if ($_POST['usertype'] === "3") {
		$_POST['usertype'] = 3;
	}elseif ($_POST['usertype'] === "4") {
		$_POST['usertype'] = 4;
	}elseif ($_POST['usertype'] === "5") {
		$_POST['usertype'] = 5;
	}
	$user->setData($_POST);
	$user->saveUser();
	header("Location: /admin/users");
	exit;
});

$app->get("/admin/users/:iduser/delete", function ($iduser){
	User::verifyLogin();
	$user = new User();
	$user->getUser((int)$iduser);
	$user->deleteUser();

	header("Location: /admin/users");
	exit;
});

$app->get("/admin/users/:iduser", function ($iduser){
	User::verifyLogin();
	$user = new User();
	$userstypes = User::listUsersTypes();
	$status = User::listStatusUser();
	$user->getUser((int)$iduser);
	$page = new PageAdmin();
	$page->setTpl("users-update", array(
		"user"=>$user->getValues(),
		"userstypes"=>$userstypes,
		"status"=>$status
	));
	exit;
});

$app->post("/admin/users/:iduser", function ($iduser){
	User::verifyLogin();
	$user = new User();
	$user->getUser((int)$iduser);
	$user->setData($_POST);
	$user->updateUser();
	header("Location: /admin/users");
	exit;
});

$app->get("/admin/sql/create", function(){
	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("sql-create");
});

$app->get("/admin/requests", function(){
	User::verifyLogin();
	$requests = Request::listRequests();
	$page = new PageAdmin();
	$page->setTpl("requests");
});

$app->get("/admin/requests/create", function(){
	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("requests-create");
});

$app->get("/admin/technical", function(){
	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("technical");
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