<?php
	require_once("/moixero-home/tdiw/tdiw-r4/public_html/model/db_functions.php");

	// GETS ALL CATEGORIES
	$result = getCategories();

	// TURNS TABLE INTO MATRIX
	while ($row=$result->fetch()) {

		$categories[] = $row;

	}

	// SHOWS CATEGORIES
	require("/moixero-home/tdiw/tdiw-r4/public_html/view/header_categories_view.php");
?>