<?php session_start(); 
	include 'name.php';
	date_default_timezone_set("Asia/Taipei");
	$newname = $_POST['newname'];
	$pw = $_POST['pw'];
	$pw2 = $_POST['pw2'];
	$tel = $_POST['tel'];
	$email = $_POST['email'];
	if($pw==$pw2){
		$str = "UPDATE `account` SET `name`='$newname',`pw`='$pw',`tel`='$tel',`email`='$email' WHERE `name` = '$name'";
		$select = $con->prepare($str);
		$select->execute();
		echo '修改成功';
	}
	else{
		echo '輸入有誤';
	}
?>