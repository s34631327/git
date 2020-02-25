<?php 
	try{
		$con = new PDO('mysql:host=localhost;dbname=ordering2;charset=utf8','root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));  
	}catch (PDOException $e){
		die($e->getMessage());
	}
	date_default_timezone_set("Asia/Taipei");
	$str = "select taketime from meal order by taketime desc limit 1";
	$select = $con->prepare($str);
	$select->execute();
	$member = $select->fetchAll(PDO::FETCH_ASSOC);
	$maketime = $_POST['maketime'];
	$taketimemm = $maketime *60 ;
	$nowmm = strtotime("now");
	$lasttaketime = "{$member[0]['taketime']}";
	// echo 'taketimemm:<br>'.$taketimemm.'<br>';
	// echo $maketime;
	// echo time().'<br>';
	// echo $nowmm.'<br>';
	// echo date('Y-m-d H:i:s',time()).'<br>';
	// echo date('Y-m-d H:i:s',$taketimemm).'<br>';
	// echo $lasttaketime.'<br>';
	// echo 123;
	if(strtotime($lasttaketime)<=strtotime("now")){
		echo date('H:i',time() + $maketime * 60);
		// echo 321;
	}
	else{
		echo date('H:i',strtotime($lasttaketime) + $maketime * 60);
		// echo $lasttaketime;
	}
	// else{
		// echo '其他';
	// }
		
?>