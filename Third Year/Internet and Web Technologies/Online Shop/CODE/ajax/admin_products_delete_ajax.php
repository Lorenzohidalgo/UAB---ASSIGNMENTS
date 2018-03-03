<?php
require_once('../model/db_functions.php');

// ERROR HANDLING VARIABLE
$delete         = 0;

// CHECKS THE PRODUCT ID
if(isset($_GET['product'])){

	// SAVES THE ID AND VALIDATES FOR DELETING
    $Prod_id    = $_GET['product'];
    $delete     = 1;

}

// CHECK IF ITS VALIDATED FOR DELETING
if($delete){

	// DELETES PRODUCT
    delete_product($Prod_id);
}

// REDIRECT
header("Location: http://deic-dc0.uab.cat/~tdiw-r4/Administration.php");
?>