<?php
	require_once("/moixero-home/tdiw/tdiw-r4/public_html/model/db_functions.php");

	// RESULT HANDLING VARIABLE
	$Full 		= false;

	// CHECKS IF THE ADMIN IS LOOCKING FOR A SPECIFIC PRODUCT
	if (isset($_GET['product'])){

		// GETS PRODUCT BY ID
		$ProId 		= test_input($_GET['product']);
		$result 	= getProductbyId($ProId);
		$Full 	= true;

	// CHECKS IF THE ADMIN IS LOOCKING FOR A SPECIFIC CATEGORY
	}elseif (isset($_GET['category']) && $_GET['category'] != ""){

		// GETS PRODUCTS BY ID
		$CatId = test_input($_GET['category']);
		$result = getProductsbyCategory($CatId);

	// DEFAULT ACTION
	}else{

		// GETS ALL PRODUCT
		$result = getAllProducts();

	}

	// TURNS TABLE INTO MATRIX
	while ($row=$result->fetch()) {

		$products[] = $row;

	}

	// CHECKS IF IT NEEDS TO SHOW THE FULL PRODUCT INFO
	if(!$Full){

		require("/moixero-home/tdiw/tdiw-r4/public_html/view/admin_products_table_view.php");

	}else{

		// GETS THE CATEGORY NAME
		$product = $products[0];
		$result		= getCategoryName($product['category_id']);
		$CatNames	= $result -> fetch();
		$CatName 	= $CatNames['name'];

		// SHOWS FULL PRODUCT INFO
		require("/moixero-home/tdiw/tdiw-r4/public_html/view/admin_products_detail_view.php");
	}
?>