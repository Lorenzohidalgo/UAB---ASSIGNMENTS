<header>
	<div class="header">
		<div class="container">
			<div class="logo">
				<a><img src="./img/logo.png" alt="logo" /></a>
			</div>
			<div class="search">
				<form>
					<input class="search_input" type="text" autocomplete="off" placeholder="Type here to search...">
					<button class="btn_search" type="button"><i class="fa fa-search"></i></button>
				</form>
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
									<li class="user_info"><a id="user_info"> My Information <i class="fa fa-address-card" aria-hidden="true"></i></a></li>
									<li class="user_orders"><a id="user_orders"> My Orders <i class="fa fa-list-ul" aria-hidden="true"></i></a></li>';
									if ($_SESSION['is_admin']) {
										echo'<li class="page_admin"><a href="./Administration.php"> Administration <i class="fa fa-cogs" aria-hidden="true"></i></a></li>';
									};
									echo'
									<li class="user_logout"><a id="log_out" href="./controller/log_out.php"> Log Out <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>';
					}else{?>
				<div id="not_logged" class="session">
					<a class="header_login" href="./index.php?login"><i class="fa fa-sign-in" aria-hidden="true"></i> LOGIN </a>
					<a class="header_registration" href="./index.php?register"><i class="fa fa-address-card-o" aria-hidden="true"></i> REGISTER</a>
				</div><?php } ?>
				<a class="cart" href="./cart">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					<span id="cart_badge" class="badge"><?php if(isset($_SESSION['products'])){ echo count($_SESSION['products']); }else{ echo "0" ;}?></span>
				</a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="menu">
			<div class="categories">
				<ul>
					<?php include("./controller/header_categories.php"); ?>
				</ul> 
			</div>
		</div>
	</div>
</header>