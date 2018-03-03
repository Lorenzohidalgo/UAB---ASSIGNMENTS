<?php
	require_once("/moixero-home/tdiw/tdiw-r4/public_html/model/db_functions.php");

	// RESULT HANDLING VARIABLES
	$LongDesc 	= false;
	$Full 		= false;

	// CHECKS IF THE CIENT IS LOOCKING FOR A SPECIFIC PRODUCT
	if (isset($_GET['product'])){

		// GETS PRODUCT BY ID
		$ProId 		= test_input($_GET['product']);
		$result 	= getProductbyId($ProId);

		// SETS HANDLING VARIABLE
		$Full 	= true;

	// CHECKS IF THE CIENT IS LOOCKING FOR A SPECIFIC CATEGORY
	}elseif (isset($_GET['category'])){

		// GETS PRODUCTS BY CATEGORY
		$CatId 	= test_input($_GET['category']);
		$result = getProductsbyCategory($CatId);

	// CHECKS IF THE CLIENT IS SEARCHING BY A SPECIFIC STRING
	}elseif (isset($_GET['search'])) {

		// GETS PRODUCT BY STRING SEARCH
		$Search = test_input($_GET['search']);
		$result = getProductsbySearch($Search);

		// SETS HANDLING VARIABLE
		$LongDesc = true;

	// DEFAULT ACTION
	}else{

		// GETS ALL PRODUCTS
		$result = getAllProducts();

	}

	// TURNS TABLE INTO MATRIX
	while ($row=$result->fetch()) {

		$products[] = $row;

	}


	// CHECKS IF IT NEEDS TO SHOW FULL PRODUCT INFO
	if ($Full) {

		// GETS PRODUCT CARTEGORY NAME
		$result		= getCategoryName($products[0]['category_id']);
		$CatNames	= $result -> fetch();
		$CatName 	= $CatNames['name'];

	}

	// CHECKS IF THERE IS ANY PRODUCT TO SHOR
	if (isset($products)) {

		// SHOW PRODUCTS
		require("/moixero-home/tdiw/tdiw-r4/public_html/view/catalog_view.php");

	}else{

		// SETS ERROR MESSAGE
		echo "<div class='registration_page'><div style='text-align: center'><i class='fa fa-exclamation-triangle fa-5x' aria-hidden='true' style='color: red'></i><p style='font-weight: bold'>It looks like we don't find what you're looking for, please try again later</p></div></div>";
		
	}
?>