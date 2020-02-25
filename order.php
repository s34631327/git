<?php session_start(); ?>
<?php
	try{
		$con = new PDO('mysql:host=localhost;dbname=ordering2;charset=utf8','root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));  
	}catch (PDOException $e){
		die($e->getMessage());
	}
	date_default_timezone_set("Asia/Taipei");
	@$name = $_SESSION['name'];
	if(!isset($name)){
		echo "請先登入";
		}
	else{
		$msg1 = $_POST['msg'];
		$NT = $_POST['NT'];
		$orderbg = $_POST['orderbg'];
		$orderbgnum = $_POST['orderbgnum'];
		$taketime = $_POST['taketime'];
		$msg = str_replace("<br>",", ","$msg1");
		$ordertime = date("Y-m-d H:i:s");
		$str1 = "select * from account where name = '$name'";
		$select = $con->prepare($str1);
		$select->execute();
		$member = $select->fetchAll(PDO::FETCH_ASSOC);
		$account = "{$member[0]['account']}";
		$str2 = "INSERT INTO meal (account,name,meal,NT,ordertime,taketime,orderbg,orderbgnum) VALUES ('$account','$name','$msg',$NT,'$ordertime','$taketime','$orderbg','$orderbgnum')";
		$select2 = $con->prepare($str2);
		$select2->execute();
		echo "訂餐成功";
	}
?>