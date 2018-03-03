<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Get It Done</title>
		<link rel="icon" type="image/png" href="./img/logo.png" />
		<link rel="stylesheet" type="text/css" href="./css/main.css" />
	</head>
	<body>
		<?php include("./template/header.php"); ?>
		<main class="container">
			<section class="catalog" id="catalog">
				<?php 
				if(isset($_GET['register']) && !isset($_SESSION['id'])){
					require_once("./controller/registration.php");
				}elseif(isset($_GET['login']) && !isset($_SESSION['id'])){
					require_once("./controller/login.php");
				}elseif(isset($_GET['user_info']) && isset($_SESSION['id'])){
					require_once("./controller/user_info.php");
				}elseif(isset($_GET['user_orders']) && isset($_SESSION['id'])){
					require_once("./controller/user_orders.php");
				}elseif(isset($_GET['cart'])){
					require_once("./controller/cart_list.php");
				}else{
					require_once("./controller/catalog.php");
				}?>
			</section>
		</main>
		<?php include("./template/footer.php"); ?>
		<script src="./js/jquery-3.1.1.min.js" type="text/javascript"></script>
		<script src="./js/catalog.js" type="text/javascript"></script>
		<script src="./js/registration.js" type="text/javascript"></script>
		<script src="./js/user_dropdown.js" type="text/javascript"></script>
		<script src="./js/cart.js" type="text/javascript"></script>
		<script src="./js/user_orders.js" type="text/javascript"></script>
	</body>
</html>