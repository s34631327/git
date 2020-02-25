<?php
	try{
		$con = new PDO('mysql:host=localhost;dbname=ordering2;charset=utf8','root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));  
		// $con-> setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL );
		}catch (PDOException $e){
			die($e->getMessage());
		}
	date_default_timezone_set("Asia/Taipei");
	$date = date("Y-m-d H:i:s");
	$a = array("","椒麻雞腿漢堡","雙層培根起士","黃金豬排漢堡","藍帶起士漢堡",
	"厚片牛排漢堡","醬燒豬排漢堡","鮮炸花枝漢堡","原味卡啦雞堡","辣味卡啦雞堡",
	"黑胡椒里肌堡","日式魚排漢堡","和風雞排漢堡","香檸雞柳漢堡","馬鈴薯佐花生",
	"燻雞肉漢堡","豬柳肉漢堡","香雞肉漢堡","牛肉漢堡","雞肉漢堡","豬肉漢堡","培根漢堡",
	"火腿漢堡","夾蛋漢堡");
	$b = ["椒麻雞腿漢堡","雙層培根起士"];
	// for($i=1;$i<=14;$i++){
		// $str = "INSERT INTO `burger`(`bgNO`, `burger`, `bgNT`,maketime,changetime) VALUES ($i,'$a[$i]',50,3,'$date')";
		// $select = $con->prepare($str);
		// $select->execute();
	// }
	// echo json_encode($a, JSON_UNESCAPED_UNICODE);
	$str = "select burger,bgNT,maketime from burger order by bgNT desc";
	$select = $con->prepare($str);
	$select->execute();
	$member = $select->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($member, JSON_UNESCAPED_UNICODE);
?>