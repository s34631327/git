<?php session_start(); 
	unset($_SESSION['name']);
	echo '<meta http-equiv=REFRESH CONTENT=0;url=Home.php>';
?>
