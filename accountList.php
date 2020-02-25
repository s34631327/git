<?php session_start(); ?>
<?php
	include 'name.php';
	date_default_timezone_set("Asia/Taipei");
	$date = date("Y-m-d H:i:s");
	$str = "SELECT * FROM account";
	$select = $con->prepare($str);
	$select->execute();
	// $member = $select->fetchAll(PDO::FETCH_ASSOC);
	$total = $select->rowCount();
	$perpage = 7;
	$totalpage = ceil($total/$perpage);
	if(isset($_POST['delNO'])){
		$delNO = $_POST['delNO'];
		$str = "delete from account where acNO = $delNO";
		$select = $con->prepare($str);
		$select->execute();
	}
	if(isset($_POST['lockNO'])&&isset($_POST['status'])){
		$lockNO = $_POST['lockNO'];
		$status = $_POST['status'];
		$str = "update account set status = $status where acNO = $lockNO";
		$select = $con->prepare($str);
		$select->execute();
	}
	if(!isset($_POST['acpage']))
		$acpage = 1;
	else
		$acpage = $_POST['acpage'];
	echo "目前頁數:".$acpage;
	$start = ($acpage-1) * $perpage;
	$str2 = "select * from account limit $start, $perpage";
	$select2 = $con->prepare($str2);
	$select2->execute();
	$member = $select2->fetchAll(PDO::FETCH_ASSOC);
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
		<table cellpadding="8">
			<tr>
				<th><a href="#">帳號</a></th>
				<th><a href="#">密碼</a></th>
				<th><a href="#">姓名</a></th>
				<th><a href="#">email</a></th>
				<th><a href="#">電話</a></th>
				<th><a href="#">註冊日期</a></th>
				<th><a href="#">狀態</a></th>
				<th><a href="#">操作</a></th>
			</tr>
			<?php
				echo '現在時間:'.$date.'<br>';
				echo '總共'.$total.'筆帳號';
				echo '從'.$start.'開始';
				if($acpage==$totalpage){
					for($i=0;$i<$total-$start;$i++){
						if($i%2==0)
							echo '<tr class="grey">';
						else	
							echo '<tr>';
						echo "<td>{$member[$i]['account']}</td>";
						echo "<td>{$member[$i]['pw']}</td>";
						echo "<td>{$member[$i]['name']}</td>";
						echo "<td>{$member[$i]['email']}</td>";
						echo "<td>{$member[$i]['tel']}</td>";
						echo "<td>{$member[$i]['date']}</td>";
						if($member[$i]['status']==1)
							echo sprintf('<td><a href="#" onclick="lock(%d,%d,%d)">%s</a></td>',$member[$i]['acNO'],$acpage,2,'使用中');
						else
							echo sprintf('<td><a href="#" onclick="lock(%d,%d,%d)">%s</a></td>',$member[$i]['acNO'],$acpage,1,'封鎖中');
						echo sprintf('<td class="btn btn-outline-danger btn-sm" onclick="accountdel(%d)">%s</td>',$member[$i]['acNO'],'刪除');
						echo '</tr>';
					}
				}
				else{
					for($i=0;$i<$perpage;$i++){
						if($i%2==0)
							echo '<tr class="grey">';
						else	
							echo '<tr>';
						echo "<td>{$member[$i]['account']}</td>";
						echo "<td>{$member[$i]['pw']}</td>";
						echo "<td>{$member[$i]['name']}</td>";
						echo "<td>{$member[$i]['email']}</td>";
						echo "<td>{$member[$i]['tel']}</td>";
						echo "<td>{$member[$i]['date']}</td>";
						if($member[$i]['status']==1)
							echo sprintf('<td><a href="#" onclick="lock(%d,%d,%d)">%s</a></td>',$member[$i]['acNO'],$acpage,2,'使用中');
						else
							echo sprintf('<td><a href="#" onclick="lock(%d,%d,%d)">%s</a></td>',$member[$i]['acNO'],$acpage,1,'封鎖中');
						echo sprintf('<td class="btn btn-outline-danger btn-sm" onclick="accountdel(%d)">%s</td>',$member[$i]['acNO'],'刪除');
						echo '</tr>';
					}
				}
				
				echo '</table>';
				for($i=1;$i<=$totalpage;$i++){
					if($acpage==$i)
						echo $i;
					else
						echo sprintf('<a href="#" onclick="acpage(%d)">%d</a>',$i,$i);
				}
	?>
	<script type="text/javascript" src="scripts/XMLHttpRequest.js"></script>
	<script>
		
	</script>
	</body>
</html>