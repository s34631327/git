<?php 
	include 'name.php';
	date_default_timezone_set("Asia/Taipei");
	$date = date("Y-m-d H:i:s");
	if(isset($_POST['addbgNT'])&&isset($_POST['addbg'])&&isset($_POST['addbgmktime'])){
		$addbgNT = $_POST['addbgNT'];
		$addbg = $_POST['addbg'];
		$addbgmktime = $_POST['addbgmktime'];
		$str = "insert into burger (burger,bgNT,maketime,changetime) values ('$addbg',$addbgNT,'$addbgmktime','$date')";
		$select = $con->prepare($str);
		$select->execute();
	}
?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--width=device-width 表示寬度是設備屏幕的寬度。initial-scale=1 表示初始的縮放比例。shrink-to-fit=no 自動適應手機屏幕的寬度。-->
	<!-- 新 Bootstrap4 核心 CSS 文件 -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<!-- jQuery文件。務必在bootstrap.min.js 之前引入 -->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-3.3.1.js" ></script>
	<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
	<!-- popper.min.js 用於彈窗、提示、下拉菜單 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>訂餐系統</title>
	<style>
		.grey{
			background-color:lightgrey
		}
		table{
			border:1px black solid; 
			text-align:center;
		}
	</style>
	</head>
	<body>
		新增漢堡:<input type="text" id="addbg">
		價錢:<input type="text" id="addbgNT">
		製作時間:<input type="text" id="addbgmktime"><br><br>
		<button type="button" class="btn btn-outline-primary btn-sm" onclick="addmenu2()">確定新增</button>
	<script type="text/javascript" src="scripts/XMLHttpRequest.js"></script>
	</body>
</html>