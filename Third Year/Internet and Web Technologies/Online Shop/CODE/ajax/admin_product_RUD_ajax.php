<?php
require_once('../model/db_functions.php');

// SETS ERROR HANDLING VARIABLES
$error  = 0;
$not_updated = 0;



if(isset($_POST['id'])){
    $id = $_POST['id'];

    // GETS THE SPECIFIC PRODUCT
    $ProId      = test_input($id);
    $result     = getProductbyId($ProId);
    $product    = $result->fetch();

}else{

    // DETECTS ERROR
    $error      = 1;
    
}


// CHECKS IF ITS A VALID NAME AND IF IT WAS CHANGED
if(isset($_POST['name']) && $_POST['name'] != "" && $_POST['name'] != $product['name']){

    $name               = $_POST['name'];

}else{

    // DETECTS NAME NOT UPDATED
    $name               = $product['name'];
    $not_updated        = $not_updated + 1;
}

// CHECKS IF ITS A VALID CATEGORY AND IF IT WAS CHANGED
if(isset($_POST['category']) && $_POST['category'] != "" && $_POST['category'] != $product['category_id']){

    $category_id        = $_POST['category'];
    
}else{

    // DETECTS CATEGORY NOT UPDATED
    $category_id        = $product['category_id'];
    $not_updated        = $not_updated + 1;
}


// CHECKS IF ITS A VALID DESCRIPTION AND IF IT WAS CHANGED
if(isset($_POST['description']) && $_POST['description'] != "" && $_POST['description'] != $product['description']){

    $description        = $_POST['description'];

}else{

    // DETECTS DESCRIPTION NOT UPDATED
    $description        = $product['description'];
    $not_updated        = $not_updated + 1;
}


// CHECKS IF ITS A VALID LARGE DESCRIPTION AND IF IT WAS CHANGED
if(isset($_POST['large_description']) && $_POST['large_description'] != "" && $_POST['large_description'] != $product['large_description']){

    $large_description  = $_POST['large_description'];

}else{

    // DETECTS LARGE DESCRIPTION NOT UPDATED
    $large_description  = $product['large_description'];
    $not_updated        = $not_updated + 1;
}


// CHECKS IF ITS A VALID PRICE AND IF IT WAS CHANGED
if(isset($_POST['price']) && $_POST['price'] != "" && $_POST['price'] != $product['price']){

    $price              = $_POST['price'];

}else{

    // DETECTS PRICE NOT UPDATED
    $price              = $product['price'];
    $not_updated        = $not_updated + 1;
}


// CHECKS IF ITS A VALID STOCK AND IF IT WAS CHANGED
if(isset($_POST['stock']) && $_POST['stock'] != "" && $_POST['stock'] != $product['stock']){

    $stock              = $_POST['stock'];

}else{

    // DETECTS STOCK NOT UPDATED
    $stock              = $product['stock'];
    $not_updated        = $not_updated + 1;
}


// CHECKS IF ANY ATRIBUTE WAS CHANGED AND IF AN ERROR OCURRED
if(!$error && $not_updated < 6){

    // UPDATES PRODUCT
    update_Product($id, $name, $category_id, $description, $large_description, $price, $stock);
}

// REDIRECTS
header("Location: http://deic-dc0.uab.cat/~tdiw-r4/Administration.php?product=".$id);
?>