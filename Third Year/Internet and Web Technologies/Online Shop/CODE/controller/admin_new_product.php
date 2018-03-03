<?php 
	require_once("/moixero-home/tdiw/tdiw-r4/public_html/model/db_functions.php");

	// GETS CATEGORIES
	$result = getCategories();


	// TURNS TABLE INTO A "MATRIX"
	while ($row=$result->fetch()) {
		$categories[] = $row;
	}
	
	require('/moixero-home/tdiw/tdiw-r4/public_html/view/admin_add_new_product_view.php');

?>