<?php
	require_once("/moixero-home/tdiw/tdiw-r4/public_html/model/db_functions.php");

	if (session_status() == PHP_SESSION_NONE){
		session_start();
	}

	// GETS THE CLIENT INFORMATION BY THE USERNAME
	$user = get_user($_SESSION['username']);
  	$user = $user->fetch();
  	
  	// SHOWS CLIENT INFORMATION
  	require("/moixero-home/tdiw/tdiw-r4/public_html/view/user_info_view.php");
?>