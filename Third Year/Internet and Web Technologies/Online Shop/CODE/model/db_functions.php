<?php

	// CREATES A CONNECTION WITH THE DB
    function connectDB(){
        $servername = "localhost";
        $username 	= "tdiw-r4";
        $password 	= "CENSORED";
        $dbname 	= "tdiw-r4";

		try {
			// Create connection
			$conn 	= new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8mb4', $username, $password);
		} catch (PDOException $e) {
			//If connection failed
			echo 'Connection failed: '.$e->getMessage();
		}

        return $conn;
    }

    // RETURNS CLEAN INPUTS TO AVOID SQL-INJECTION
    function test_input($data) {
	  $data 	= trim($data);
	  $data 	= stripslashes($data);
	  $data 	= htmlspecialchars($data);
	  return 	$data;
	}

	// RETURNS ALL CATEGORIES
    function getCategories() {
		$conn 	= connectDB();
		$sth 	= $conn->prepare("	SELECT id, name 
									FROM `category`");
		$sth 	->execute();
		
		return 	$sth;
	}

	// RETURNS THE NAME OF A SPECIFIC CATEGORY
	function getCategoryName($id){
		$conn 	= connectDB();
		$sth 	= $conn -> prepare("	SELECT name
										FROM `category`
										WHERE `id` = ?");
		$sth 	-> execute(array($id));

		return 	$sth;
	}

	// RETURNS ALL PRODUCTS THAT ARE IN STOCK
	function getAllProducts(){
		$conn 	= connectDB();
		$sth 	= $conn->prepare("	SELECT id, name, description, price, stock, img_src 
									FROM `product` 
									WHERE `stock`>0");
		$sth 	->execute();
		
		return 	$sth;
	}

	// RETURNS PRODUCT BY ID IF IT IS IN STOCK
	function getProductbyId($id){
		$conn 	= connectDB();
		$sth 	= $conn->prepare("	SELECT * 
									FROM `product` 
									WHERE `stock` > 0 AND `id` = ?");
		$sth 	->execute(array($id));

		return 	$sth;
	}

	// RETURNS ALL PRODUCTS FROM A CATEGORY IF IT IS IN STOCK
	function getProductsbyCategory($CatId){
		$conn 	= connectDB();
		$sth 	= $conn->prepare("	SELECT id, name, description, price, stock, img_src 
									FROM `product` 
									WHERE `stock`>0 AND `category_id`=?");
		$sth 	-> execute(array($CatId));
		
		return 	$sth;
	}

	// RETURNS PRODUCT BY A CERTAIN STRING SEARCH
	function getProductsbySearch($Search){
		$conn 	= connectDB();
		$sth 	= $conn->prepare("	SELECT * 
									FROM `product` 
									WHERE `name` LIKE ? OR 
									`description` LIKE ? OR
									`large_description` LIKE ? AND `stock`>0");
		$Search = '%'.$Search.'%';
		$Search = str_replace(" ", "%", $Search);
		$sth 	-> execute(array($Search, $Search, $Search));

		return 	$sth;
	}

	// REGISTERS A NEW USER
	function register($firstname, $lastname, $birthday, $address, $town, $postal_code, $telephone, $email, $credit_card, $username, $password){
		$conn 	= connectDB();
		$sth 	= $conn -> prepare('INSERT INTO `clients` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `birthday`, `address`, `town`, `postal_code`, `telephone`, `credit_card`, `is_admin`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0)');
		$sth 	-> execute(array($username, $password, $firstname, $lastname, $email, $birthday, $address, $town, $postal_code, $telephone, $credit_card));
	}

	// RETURNS FALSE OR 0 IF THE USERNAME OR EMAIL IS ALREADY IN USE
	function unique_user($username, $email){
		$conn 	= connectDB();
		$sth 	= $conn 	-> prepare('SELECT count(*)
										FROM `clients`
										WHERE `email`	= ?');
		$sth 	-> execute(array($email));

		if($sth -> fetchColumn() >= 1){
			return false;
		} else {
			$sth 	= $conn 	-> prepare('SELECT count(*)
											FROM `clients`
											WHERE `username` = ?');
			$sth 	-> execute(array($username));
			return 	(!$sth -> fetchColumn() >= 1);
		}
	}

	// RETURNS THE USER INFO FROM AN ESPECIFIC USER BY USERNAME
	function get_user($username){
		$conn 	= connectDB();
		$sth 	= $conn 	-> prepare('SELECT *
										FROM `clients`
										WHERE `username` = ?');
		$sth 	-> execute(array($username));
		return 	$sth ;
	}

	// RETURNS THE USER INFO FROM AN ESPECIFIC USER BY ID
	function getUserbyId($id){
		$conn 	= connectDB();
		$sth 	= $conn 	-> prepare('SELECT *
										FROM `clients`
										WHERE `id` = ?');
		$sth 	-> execute(array($id));
		return 	$sth ;
	}

	// MODIFYS AN USER
	function modify_all($firstname, $lastname, $birthday, $address, $town, $postal_code, $telephone, $credit_card, $password, $username){
		$conn 	= connectDB();
		$sth 	= $conn 	-> prepare('UPDATE `clients`
										SET `firstname` = ?, `lastname` = ?, `birthday` = ?, `address` = ?, `town` = ?, `postal_code` = ?, `telephone` = ?, `credit_card` = ?, `password` = ?
										WHERE `username` = ?');
		$sth 	-> execute(array($firstname, $lastname, $birthday, $address, $town, $postal_code, $telephone, $credit_card, $password, $username));
	}

	// MODIFYS AN USER EXCEPT FOR THE PASSWORD
	function modify_exceptPassword($firstname, $lastname, $birthday, $address, $town, $postal_code, $telephone, $credit_card, $username){
		$conn 	= connectDB();
		$sth 	= $conn 	-> prepare('UPDATE `clients`
										SET `firstname` = ?, `lastname` = ?, `birthday` = ?, `address` = ?, `town` = ?, `postal_code` = ?, `telephone` = ?, `credit_card` = ?
										WHERE `username` = ?');
		$sth 	-> execute(array($firstname, $lastname, $birthday, $address, $town, $postal_code, $telephone, $credit_card, $username));
	}

	// ADDS A NEW PRODUCT
	function addProduct($name, $category_id, $description, $large_description, $price, $stock, $img_src){
		$conn 	= connectDB();
		$sth 	= $conn -> prepare('INSERT INTO `product` (`id`, `name`, `category_id`, `description`, `large_description`, `price`, `stock`, `img_src`)
									VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)');
		$sth 	-> execute(array($name, $category_id, $description, $large_description, $price, $stock, $img_src));
	}

	// UPDATES THE PRODUCT INFO
	function update_Product($id, $name, $category_id, $description, $large_description, $price, $stock){
		$conn 	= connectDB();
		$sth 	= $conn 	-> prepare('UPDATE `product`
										SET `name` = ?, `category_id` = ?, `description` = ?, `large_description` = ?, `price` = ?, `stock` = ?
										WHERE `id` = ?');
		$sth 	-> execute(array($name, $category_id, $description, $large_description, $price, $stock, $id));
	}

	// DELETES THE PRODUCT
	function delete_product($Prod_id){
		$conn 	= connectDB();
		$sth 	= $conn 	-> prepare('DELETE 
										FROM `product`
										WHERE `id` = ?');
		$sth 	-> execute(array($Prod_id));
	}

	// CREATES AN ORDER
	function createSale($user_id, $shipping_address, $order_date, $total_price){
		$conn 	= connectDB();
		$sth 	= $conn -> prepare('INSERT INTO `order` (`id`, `user_id`, `shipping_address`, `order_date`, `total_price`)
									VALUES (NULL, ?, ?, ?, ?)');
		$sth 	-> execute(array($user_id, $shipping_address, $order_date, $total_price));
	}

	// RETURNS ORDER ID FROM AN ORDER DONE FROM A USER IN A CERTAIN DATE
	function getOrderID($user_id, $order_date){
		$conn 	= connectDB();
		$sth 	= $conn 	-> prepare('SELECT `id`
										FROM `order`
										WHERE `user_id` = ? AND `order_date` = ?');
		$sth 	-> execute(array($user_id, $order_date));
		return 	$sth;
	}

	// STORE THE PRODUCT INFORMATION TO AN ESPECIFIC ORDER
	function productToSale($product_id, $order_id, $product_price, $product_amount, $product_name, $product_description){
		$conn 	= connectDB();
		$sth 	= $conn -> prepare('INSERT INTO `order_products` (`product_id`, `order_id`, `product_price`, `product_amount`,`product_name`,`product_description`)
									VALUES (?, ?, ?, ?, ?, ?)');
		$sth 	-> execute(array($product_id, $order_id, $product_price, $product_amount, $product_name, $product_description));
	}

	// RETURNS ALL ORDERS SAVED IN THE DB
	function getAllOrders(){
		$conn 	= connectDB();
		$sth 	= $conn 	-> prepare('SELECT *
										FROM `order`');
		$sth 	-> execute();
		return 	$sth;
	}

	// RETURNS ALL ORDERS MADE BY THE USER
	function getOrders($user_id){
		$conn 	= connectDB();
		$sth 	= $conn 	-> prepare('SELECT *
										FROM `order`
										WHERE `user_id` = ? ');
		$sth 	-> execute(array($user_id));
		return 	$sth;
	}

	// RETURNS THE ORDER WITH THE SAME ID
	function getOrderbyId($order_id){
		$conn 	= connectDB();
		$sth 	= $conn 	-> prepare('SELECT *
										FROM `order`
										WHERE `id` = ? ');
		$sth 	-> execute(array($order_id));
		return 	$sth;
	}


	// RETURNS ALL ORDERED PRODUCTS
	function getOrderProducts($order_id){
		$conn 	= connectDB();
		$sth 	= $conn 	-> prepare('SELECT *
										FROM `order_products`
										WHERE `order_id` = ? ');
		$sth 	-> execute(array($order_id));
		return 	$sth;
	}


	// RETURNS PRODUCT STOCK
	function getStock($prod_id){
		$conn 	= connectDB();
		$sth 	= $conn 	-> prepare('SELECT `stock`
										FROM `product`
										WHERE `id` = ? ');
		$sth 	-> execute(array($prod_id));
		return 	$sth;
	}

	// UPDATES THE PRODUCT STOCK
	function updateStock($prod_id, $stock){
		$conn 	= connectDB();
		$sth 	= $conn 	-> prepare('UPDATE `product`
										SET `stock` = ?
										WHERE `id` = ?');
		$sth 	-> execute(array($stock, $prod_id));
	}
?>