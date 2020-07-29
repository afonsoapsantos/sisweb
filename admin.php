<?php

	use \Sisweb\PageAdmin;
	use \Sisweb\Model\Person;
	use \Sisweb\Model\User;
	use \Sisweb\Model\Administrator;
	use \Sisweb\Model\Customer;
	use \Sisweb\Model\Manager;
	use \Sisweb\Model\Technician;
	use \Sisweb\Model\Farmworker;
	use \Sisweb\Model\Request;
	use \Sisweb\Model\Provider;
	use \Sisweb\Model\Product;
	use \Sisweb\Model\Service;
	use \Sisweb\Model\Implement;
	use \Sisweb\Model\Farm;
	use \Sisweb\Model\File;
	use \Sisweb\Model\Media;
	use \Sisweb\Model\Order; 

	## Rotas do Adminsitrador do sistema
	##Usuário master
	$app->get("/admin", function() {
	    
	    User::validateAdmin();

		$page = new PageAdmin();
		$page->setTpl("index", [
			"user"=>$_SESSION[User::SESSION]
		]);

	});

	//Users
	$app->get('/admin/users', function() {
	    User::validateAdmin();
	    $users = User::listAllUser();
		$page = new PageAdmin();
		$page->setTpl("users",array(
			"users"=>$users
		));
	});

	$app->get('/admin/users/admins', function() {
	    
	    User::validateAdmin();
	    $admins = Administrator::listAllAdmins();
		$page = new PageAdmin();
		$page->setTpl("users-admins",array(
			"admins"=>$admins
		));
	});

	$app->get("/admin/users/managers", function (){
		User::validateAdmin();

		$page = new PageAdmin();
		$page->setTpl("users-managers");
	});

	$app->get("/admin/users/technical", function (){
		User::validateAdmin();

		$technical = User::listAllTechnical();

		$page = new PageAdmin();
		$page->setTpl("users-technical", [
			"technical"=>$technical
		]);
	});

	$app->get("/admin/users/customers", function (){
		User::validateAdmin();

		$userscustomers = User::listAllCustomers();

		$page = new PageAdmin();
		$page->setTpl("users-customers",[
			"userscustomers"=>$userscustomers
		]);
	});

	$app->get("/admin/users/customers/create", function(){
		User::validateAdmin();

		$userstypes = User::listUsersTypes();

		$page = new PageAdmin();
		$page->setTpl("users-customers-create",[
			"userstypes"=>$userstypes
		]);		
	});

	$app->get("/admin/users/farmworker", function (){
		User::validateAdmin();

		$page = new PageAdmin();
		$page->setTpl("users-farmworker");
	});

	$app->get("/admin/users/consult", function(){
		User::validateAdmin();
		$users = User::listAllUser();
		$page = new PageAdmin();
		$page->setTpl("users-select",array(
			"users"=>$users
		));
	});

	$app->post("/admin/users/consult", function(){
		User::validateAdmin();
		$users = User::listAllUser();
		$page = new PageAdmin();
		$page->setTpl("users-select",array(
			"users"=>$users
		));
	});

	$app->get("/admin/users/create", function (){
		User::validateAdmin();
		$userstypes = User::listUsersTypes();
		$status = User::listStatusUser();
		$page = new PageAdmin();
		$page->setTpl("users-create", array(
			"userstypes"=>$userstypes,
			"status"=>$status
		));
	});

	$app->post("/admin/users/create", function(){
		User::validateAdmin();
		$user = new User();
		$user->setData($_POST);
		$user->setdtregisteruser(date("Y-m-d"));
		$user->saveUser();
		header("Location: /admin/users");
		exit;
	});

	$app->get("/admin/users/:pkuser/delete", function ($pkuser){
		User::validateAdmin();
		$user = new User();
		$user->getUser((int)$pkuser);
		$user->deleteUser();

		header("Location: /admin/users");
		exit;
	});

	$app->get("/admin/users/:pkuser", function ($pkuser){
		User::validateAdmin();
		$user = new User();
		$userstypes = User::listUsersTypes();
		$status = User::listStatusUser();
		$user->getUser((int)$pkuser);
		$page = new PageAdmin();
		$page->setTpl("users-update", array(
			"user"=>$user->getValues(),
			"userstypes"=>$userstypes,
			"status"=>$status
		));
		exit;
	});

	$app->post("/admin/users/:pkuser", function ($pkuser){
		User::validateAdmin();
		$user = new User();
		$user->getUser((int)$pkuser);
		$user->setData($_POST);
		$user->updateUser();
		header("Location: /admin/users");
		exit;
	});

	//Fim dos métodos de Usuário

	//Solicitações

	$app->get("/admin/requests", function(){
		User::validateAdmin();

		$requests = Request::listRequestsAdmin();
		$page = new PageAdmin();
		$page->setTpl("requests", array(
			"requests"=>$requests
		));
	});

	//fim das solicitações

	//Rotas para Ordens de Serviços
	$app->get("/admin/requests/generate/order/:idrequest", function($idrequest){
		User::validateAdmin();
		$request = new Request();
		$request->setidrequest($idrequest);
		$request->get();
		$page = new PageAdmin();
		$page->setTpl("generate-order", array(
			"request"=>$request->getValues(),
			"error"=>Order::getError()
		));
		exit;
	});

	$app->get("/admin/orders", function(){
		User::validateAdmin();

		$orders = Order::listAll();
		$page = new PageAdmin();
		$page->setTpl("orders",[
			"orders"=>$orders,
			"error"=>Order::getError(),
			"success"=>Order::getSuccess()
		]);
	});

	$app->get("/admin/orders/customer/select", function(){
		User::validateAdmin();

		$customers = Customer::listAllCustomers();

		$page = new PageAdmin();
		$page->setTpl("customer-select", [
			'customers'=>$customers
		]);
	});

	$app->get("/admin/orders/create/:idcustomer", function($idcustomer){
		User::validateAdmin();

		$customer = new Customer();
		$customer->getCustomer($idcustomer);
		#$customer->setData($data);
		var_dump($customer);
	});

	$app->post("/admin/orders/create", function(){
		User::validateAdmin();
		try {
			$idrequest = (int)$_POST["requestfk"];
			$request = new Request();
			$request->setidrequest($idrequest);
			$request->read();
			$request->setstatusfk((int)3);
			$order = new Order();
			$order->getMaxIdOrder();
			$order->setData($_POST);
			var_dump($order);
			$order->insert();
			$request->update();
			$medias = Media::listAllByRequest($order->getrequestfk());
			$amount = count($medias);
			for ($i=0; $i < $amount; $i++) { 
				$media = new Media();
				$media->getMaxIdorder();
				$media->setData($medias[$i]);
				$media->setorderfk($order->getidorder());
				$media->setdtmedia(date("Y-m-d"));
				$media->insertMediaOrder();
			}
			header("Location: /admin/orders");
			Order::setError("");
		} catch (Exception $e) {
			Order::setError($e->getMessage());
			header("Location: /admin/requests/generate/order/$idrequest");
		}
		exit;
	});

	$app->get("/admin/services", function(){
		User::validateAdmin();

		$services = Service::listAll();

		$page = new PageAdmin();
		$page->setTpl("services",[
			"services"=>$services
		]);
	});

	$app->get("/admin/services/create", function(){
		User::validateAdmin();
		$page = new PageAdmin();
		$page->setTpl("services-create");
	});

	$app->post("/admin/services/create", function(){
		User::validateAdmin();
		$service = new Service();
		$service->getMaxId();
		$service->setData($_POST);
		$service->insert();
		header("Location: /admin/services");
		exit;
	});

	$app->get("/admin/services/update/:pkservice", function($pkservice){
		User::validateAdmin();

		$service = new Service();
		$service->setpkservice($pkservice);
		$service->get();
		$page = new PageAdmin();
		$page->setTpl("services-update",[
			"service"=>$service->getValues()
		]);
	});

	$app->post("/admin/services/update/:pkservice", function($pkservice){
		User::validateAdmin();
		$service = new Service();
		$service->setpkservice($pkservice);
		$service->get();
		$service->setData($_POST);
		$service->update();
		header("Location: /admin/services");
		exit;
	});

	$app->get("/admin/services/delete/:pkservice", function($pkservice){
		User::validateAdmin();

		$service = new Service();
		$service->setpkservice($pkservice);
		$service->get();
		$service->delete();
		header("Location: /admin/services");
		exit;
	});

	$app->get("/admin/technical", function(){
		User::validateAdmin();
		$page = new PageAdmin();
		$page->setTpl("technical");
	});

	$app->get("/admin/providers", function(){
		User::validateAdmin();
		$providers = Provider::listAll();
		$page = new PageAdmin();
		$page->setTpl("providers", array(
			"providers"=>$providers
		));
	});

	$app->get("/admin/providers/create", function(){
		User::validateAdmin();
		$page = new PageAdmin();
		$page->setTpl("providers-create");
	});

	$app->post("/admin/providers/create", function(){
		User::validateAdmin();
		$provider = new Provider();
		$idprovider = Provider::maxId();
		$provider->setidprovider($idprovider);
		$provider->settxcorporatename($_POST["txcorporatename"]);
		$provider->settxfantasyname($_POST["txfantasyname"]);
		$provider->setnucnpj((int)$_POST["nucnpj"]);
		$provider->setnustateregistration((int)$_POST["nustateregistration"]);
		$provider->setnumunicipalregistration((int)$_POST["numunicipalregistration"]);
		$provider->saveProvider();
		header("Location: /admin/providers");
		exit;
	});

	$app->get("/admin/products", function(){
		User::validateAdmin();
		$product = Product::listAll();
		$page = new PageAdmin();
		$page->setTpl("products", array(
			"product"=>$product
		));
	});

	$app->get("/admin/products/create", function(){
		User::validateAdmin();
		$page = new PageAdmin();
		$page->setTpl("products-create");
	});

	## Fim das rotas do ADMIN


 ?>