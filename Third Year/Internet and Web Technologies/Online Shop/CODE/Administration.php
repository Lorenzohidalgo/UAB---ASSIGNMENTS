<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Get It Done - Admin</title>
		<link rel="icon" type="image/png" href="./img/logo.png" />
		<link rel="stylesheet" type="text/css" href="./css/main.css" />
	</head>
	<body>
		<?php 
			if (session_status() == PHP_SESSION_NONE){
			session_start();
			}
			if (!$_SESSION['is_admin']){
			header("Location: http://deic-dc0.uab.cat/~tdiw-r4/index.php");
			}
		
		include("./template/admin_header.php"); ?>
		<main class="container">
			<section class="catalog" id="catalog">
				<?php 
				if(isset($_GET['new_product']) ){
					require_once("./controller/admin_new_product.php");
				}elseif(isset($_GET['orders']) ){
					require_once("./controller/admin_orders.php");
				}else{
					require_once("./controller/admin_products.php");
				}?>
			</section>
		</main>
		<?php include("./template/footer.php"); ?>
		<script src="./js/jquery-3.1.1.min.js" type="text/javascript"></script>
		<script src="./js/user_dropdown.js" type="text/javascript"></script>
		<script src="./js/admin_products.js" type="text/javascript"></script>
		<script src="./js/user_orders.js" type="text/javascript"></script>
		<script src="./js/admin_categories.js" type="text/javascript"></script>
	</body>
</html>