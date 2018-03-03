<header>
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="./index.php"><img src="./img/logo.png" alt="logo" /></a>
			</div>
			<div class="search">
				<h1><i class="fa fa-terminal" aria-hidden="true"></i> Administration Site</h1>
			</div>
			<div class="toolbar">
			<?php if(session_status() == PHP_SESSION_NONE){
					session_start();
				}
				if(isset($_SESSION['id'])){
					echo '<div id="logged_in" class="session">
							<a id="user_dropdown_activate">'.$_SESSION['firstname'].' '.$_SESSION['lastname'].' <i class="fa fa-caret-down"></i></a>
							<div id="user_dropdown" class="user_dropdown">
								<ul>
									<li class="user_info"><a id="user_info" href="./index.php?user_info"> My Information <i class="fa fa-address-card" aria-hidden="true"></i></a></li>
									<li class="user_orders"><a id="user_orders" href="./index.php?user_orders"> My Orders <i class="fa fa-list-ul" aria-hidden="true"></i></a></li>';
									if ($_SESSION['is_admin']) {
										echo'<li class="page_admin"><a href="./Administration.php"> Administration <i class="fa fa-cogs" aria-hidden="true"></i></a></li>';
									};
									echo'
									<li class="user_logout"><a id="log_out" href="./controller/log_out.php"> Log Out <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>';
					}?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="menu">
			<div class="categories">
				<ul>
					<li ><a href="./Administration.php" class="admin_category_current" >Current Products </a></li>
					<li ><a href="./Administration.php?new_product" class="admin_category_add" >Add New Product  </a></li>
					<li ><a  href="./Administration.php?orders" class="admin_category_order" >Order Management </a></li>
				</ul> 
			</div>
		</div>
	</div>
</header>