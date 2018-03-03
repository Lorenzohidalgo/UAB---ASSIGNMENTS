<?php
require_once('../model/db_functions.php');

// CHECKS THE PRODUCT NAME
if(isset($_POST['name'])){
    $name = $_POST['name'];
}

// CHECKS THE PRODUCT CATEGORY ID
if(isset($_POST['category'])){
    $category_id = $_POST['category'];
}

// CHECKS THE PRODUCT DESCRIPTION
if(isset($_POST['description'])){
    $description = $_POST['description'];
}

// CHECKS THE PRODUCT LARGE DESCRIPTION
if(isset($_POST['large_description'])){
    $large_description = $_POST['large_description'];
}

// CHECKS THE PRODUCT PRICE
if(isset($_POST['price'])){
    $price = $_POST['price'];
}

// CHECKS THE PRODUCT STOCK
if(isset($_POST['stock'])){
    $stock = $_POST['stock'];
}

// SETS THE PATH WHERE WE WANT TO SAVE THE IMAGE
$target_dir = "../img/products/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

// SETS THE IMAGE SOURCE FOR DB SAVING
$img_src = 'img/products/'.basename($_FILES["fileToUpload"]["name"]);

// RETRIEVES THE FILE TYPE AND SETS ERROR HANDLING VARIABLE
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uploadOk = 1;

// CHECKS IF THE FILE ALREADY EXISTS
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// CHECKS IF THE FILE FORMAT IS ACCEPTED
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// CHECK IF AN ERROR OCURRED
if ($uploadOk == 0) {

    // SETS ERROR MESSAGE
    echo "Sorry, your file was not uploaded.";

} else {

    // UPLOADS FILE AND CHACKS IF SUCCESSFULL
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        // ADDS PRODUCT TO THE DB AND REDIRECTS TO THE ADMINISTRATION.PHP SITE
        addProduct($name, $category_id, $description, $large_description, $price, $stock, $img_src);
        header("Location: http://deic-dc0.uab.cat/~tdiw-r4/Administration.php");
    } else {

        // SETS ERROR MESSAGE
        echo "Sorry, there was an error uploading your file.";
    }
}
?>