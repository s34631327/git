<?php
	try{
		$con = new PDO('mysql:host=localhost;dbname=ordering2;charset=utf8','root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));  
	}catch (PDOException $e){
		die($e->getMessage());
	}
	@$name = $_SESSION['name'];
	if(!isset($name)){
		$name = "訪客";
	}
?>