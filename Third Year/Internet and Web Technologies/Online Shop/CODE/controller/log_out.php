<?php

	if (session_status() == PHP_SESSION_NONE){
		session_start();
	}

	// DESTROYS SESSION FOR LOGG OUT
	session_destroy();

	// REDIRECTS TO INDEX
	header("Location: http://deic-dc0.uab.cat/~tdiw-r4/index.php");
?>


