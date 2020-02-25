<?php session_start(); ?>
<?php
	include 'name.php';
	date_default_timezone_set("Asia/Taipei");
	// $con->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER );
	$date = date("Y-m-d H:i:s");
	$str = "select * from meal";
	$select = $con->prepare($str);
	$select->execute();
	$total = $select->rowCount();
	$perpage = 7;
	$totalpage = ceil($total/$perpage);
	$select->closeCursor();
	if(!isset($_POST['mealpage'])){
		$mealpage = 1;
	}
	else{
		$mealpage = $_POST['mealpage'];
	}
	$start = ($mealpage-1) * $perpage;
	if(isset($_POST['changeno'])&&isset($_POST['changevalue'])){
		$status = $_POST['changevalue'];
		$changeno = $_POST['changeno'];
		$str = "update meal set status = $status where mealNO = $changeno";
		$select = $con->prepare($str);
		$select->execute();
	}
	echo $mealpage;
	echo '從:'.$start.'開始';
	$str = "select * from meal order by ordertime limit $start, $perpage";
	$select = $con->prepare($str);
	$select->execute();
	$member = $select->fetchAll(PDO::FETCH_ASSOC);
	echo '現在時間:'.$date.'<br>';
	// echo '<pre>',print_r($member[0]['account']),'</pre>';
	echo '總共'.$total.'筆訂單';
	// print($total);
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
		.narrow{
			width:10%
		}
		.grey{
			background-color:lightgrey
		}
		table{
			border:1px solid black; 
			text-align:center
		}
	</style>
	</head>
	<body>
		<table>
			<tr>
				<th><a href="#">帳號</a></th>
				<th><a href="#">姓名</a></th>
				<th><a href="#">訂購餐點</a></th>
				<th><a href="#">金額</a></th>
				<th><a href="#">訂購時間</a></th>
				<th><a href="#">預計取餐</a></th>
				<th><a href="#">狀態</a></th>
				<th><a href="#">操作</a></th>
			</tr>
			<?php	
			if($mealpage==$totalpage){ //若為最末頁
					for($i=0;$i<$total-$start;$i++){
						if($i%2==0)
							echo '<tr class="grey">';
						else	
							echo '<tr>';
						echo "<td>{$member[$i]['account']}</td>";
						echo "<td>{$member[$i]['name']}</td>";
						echo "<td>{$member[$i]['meal']}</td>";
						echo "<td>{$member[$i]['NT']}</td>";
						echo "<td>{$member[$i]['ordertime']}</td>";
						echo "<td>{$member[$i]['taketime']}</td>";
						 //1=餐點準備中 , 2=等候取餐 , 3=完成取餐 , 其他=餐點已取消
						if($member[$i]['status']==1){
							echo '<td style="color:#00bfff">餐點準備中</td>';
							echo sprintf('<td><select id="statuschange" onchange="statuschange(%d,%d,%d)">
								  <option value="1" selected>餐點準備中</option>
								  <option value="2">等候取餐</option>
								  <option value="3">完成取餐</option>
								  <option value="4">取消餐點</option>
								</select></td>',$member[$i]['mealNO'],$i,$mealpage);
						}
						elseif($member[$i]['status']==2){
							echo '<td style="color:green">等候取餐</td>';
							echo sprintf('<td><select id="statuschange" onchange="statuschange(%d,%d,%d)">
								  <option value="1">餐點準備中</option>
								  <option value="2"selected>等候取餐</option>
								  <option value="3">完成取餐</option>
								  <option value="4">取消餐點</option>
								</select></td>',$member[$i]['mealNO'],$i,$mealpage);
						}
						elseif($member[$i]['status']==3){
							echo '<td style="color:green">完成取餐</td>';
							echo sprintf('<td><select id="statuschange" onchange="statuschange(%d,%d,%d)">
								  <option value="1">餐點準備中</option>
								  <option value="2">等候取餐</option>
								  <option value="3" selected>完成取餐</option>
								  <option value="4">取消餐點</option>
								</select></td>',$member[$i]['mealNO'],$i,$mealpage);
						}
						else{
							echo '<td style="color:red">餐點已取消</td>';
							echo sprintf('<td><select id="statuschange" onchange="statuschange(%d,%d,%d)">
								  <option value="1">餐點準備中</option>
								  <option value="2">等候取餐</option>
								  <option value="3">完成取餐</option>
								  <option value="4" selected>取消餐點</option>
								</select></td>',$member[$i]['mealNO'],$i,$mealpage);
						}
						echo '</tr>';
					}
				}//---------------------------------------------------------------------------------------------
				else{
					for($i=0;$i<$perpage;$i++){
						if($i%2==0)
							echo '<tr class="grey">';
						else	
							echo '<tr>';
						echo "<td>{$member[$i]['account']}</td>";
						echo "<td>{$member[$i]['name']}</td>";
						echo "<td>{$member[$i]['meal']}</td>";
						echo "<td>{$member[$i]['NT']}</td>";
						echo "<td>{$member[$i]['ordertime']}</td>";
						echo "<td>{$member[$i]['taketime']}</td>";
						 //1=餐點準備中 , 2=等候取餐 , 3=完成取餐 , 其他=餐點已取消
						if($member[$i]['status']==1){
							echo '<td style="color:#00bfff">餐點準備中</td>';
							echo sprintf('<td><select id="statuschange" onchange="statuschange(%d,%d,%d)">
								  <option value="1" selected>餐點準備中</option>
								  <option value="2">等候取餐</option>
								  <option value="3">完成取餐</option>
								  <option value="4">取消餐點</option>
								</select></td>',$member[$i]['mealNO'],$i,$mealpage);
						}
						elseif($member[$i]['status']==2){
							echo '<td style="color:green">等候取餐</td>';
							echo sprintf('<td><select id="statuschange" onchange="statuschange(%d,%d,%d)">
								  <option value="1">餐點準備中</option>
								  <option value="2"selected>等候取餐</option>
								  <option value="3">完成取餐</option>
								  <option value="4">取消餐點</option>
								</select></td>',$member[$i]['mealNO'],$i,$mealpage);
						}
						elseif($member[$i]['status']==3){
							echo '<td style="color:green">完成取餐</td>';
							echo sprintf('<td><select id="statuschange" onchange="statuschange(%d,%d,%d)">
								  <option value="1">餐點準備中</option>
								  <option value="2">等候取餐</option>
								  <option value="3" selected>完成取餐</option>
								  <option value="4">取消餐點</option>
								</select></td>',$member[$i]['mealNO'],$i,$mealpage);
						}
						else{
							echo '<td style="color:red">餐點已取消</td>';
							echo sprintf('<td><select id="statuschange" onchange="statuschange(%d,%d,%d)">
								  <option value="1">餐點準備中</option>
								  <option value="2">等候取餐</option>
								  <option value="3">完成取餐</option>
								  <option value="4" selected>取消餐點</option>
								</select></td>',$member[$i]['mealNO'],$i,$mealpage);
						}
						echo '</tr>';
					}
				}
				echo '</table>';
				for($i=1;$i<=$totalpage;$i++){
					if($mealpage==$i)
						echo $i;
					else
						echo sprintf('<a href="#" onclick="mealpage(%d)">%d</a>',$i,$i);
				}
			?>
	</body>
</html>