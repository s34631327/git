<?php session_start(); ?>
<?php 
	include 'name.php';
	date_default_timezone_set("Asia/Taipei");
	$perpage = 7;
	if(isset($_POST['delno'])){
		$delno = $_POST['delno'];
		$str = "delete from burger where bgNO = $delno";
		$select = $con->prepare($str);
		$select->execute();
		$str = "select * from burger";
		$select = $con->prepare($str);
		$select->execute();
		$bgtotal = $select->rowCount();
		if($bgtotal % $perpage==0){
			$_POST['bgpage'] = $_POST['bgpage'] -1;
		}
	}
	if(isset($_POST['changesure'])){
		$newbgname = $_POST['newbgname'];
		$newbgNT = $_POST['newbgNT'];
		$changesure = $_POST['changesure'];
		$str2 = "UPDATE `burger` SET `burger` = '$newbgname',`bgNT` = '$newbgNT' WHERE `bgNO` = '$changesure'";
		$select2 = $con->prepare($str2);
		$select2->execute();
	}
	// ----------計算漢堡頁數----------
	$str = "select * from burger";
	$select = $con->prepare($str);
	$select->execute();
	$bgtotal = $select->rowCount();
	$totalpage = ceil($bgtotal/$perpage);
	//----------漢堡頁數----------
	if(!isset($_POST['bgpage']))
		$bgpage = 1;
	else
		$bgpage = $_POST['bgpage'];
	$start = ($bgpage-1) * $perpage;
	if(isset($_POST['changeno'])){
		$changeno = $_POST['changeno'];
	}
	$str = "select * from burger order by bgNT limit $start, $perpage";
	$select = $con->prepare($str);
	$select->execute();
	$member = $select->fetchAll(PDO::FETCH_ASSOC);
	echo "目前頁數:".$bgpage;
	echo "總共:".$bgtotal."個漢堡";
	echo '從'.$start.'開始';
	// ----------如何更改漢堡----------
	// ----------更改幾號漢堡----------
	// if(isset($_POST['changeno'])){
		// $changeno = $_POST['changeno'];
	// }
	// ----------刪除漢堡----------
	// if(isset($_POST['delno'])){
		// $delno = $_POST['delno'];
		// $str2 = "DELETE FROM `burger` WHERE `bgno` = $delno";
		// $select2 = $con->prepare($str2);
		// $select2->execute();
	// }
	// ----------漢堡頁數----------
	// ----------排序漢堡----------
	// if(isset($_POST['bgorderby'])&&$_POST['bgorderby']==1){
		// $bgorderby = $_POST['bgorderby'];
		// $str2 = "select * from burger order by bgNT DESC limit $start, $perpage";
	// }
	// else{
		// $bgorderby = 2;
		// $str2 = "select * from burger order by bgNT limit $start, $perpage";
	// }
	// echo "bgorderby:".$bgorderby;
	// ----------排序漢堡----------
	// $select2 = $con->prepare($str2);
	// $select2->execute();
	// $member = $select2->fetchAll(PDO::FETCH_ASSOC);
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
				<th><a href="#">漢堡名稱</a></th>
				<th><a href="#">金額</a></th>
				<th><a href="#"></a></th>
				<?php if(isset($changeno)) 
						echo '<th></th>'; ?>
			</tr>
			<?php
				if($bgpage==$totalpage){						//若為最末頁
					for($i=0;$i<$bgtotal-$start;$i++){
						if($i%2==0)
							echo '<tr class="grey">';
						else	
							echo '<tr>';
						echo "<td>{$member[$i]['burger']}</td>";
						echo "<td>{$member[$i]['bgNT']}</td>";
							echo sprintf('<td class="btn btn-outline-danger btn-sm" onclick="bgdel(%d,%d)">刪除</td>',$member[$i]['bgNO'],$bgpage);
						if(isset($changeno)){
							if($changeno==$member[$i]['bgNO']){
								echo '<td>新名稱:<input type="text" id="burgername" size="10%">';
								echo '<td>新價錢:<input type="text" id="burgerNT" size="1%"></td>';
								echo sprintf('<td><button type="button" class="btn btn-outline-primary btn-sm" onclick="bgchange2(%d)">確定更改</button>',$member[$i]['bgNO']);
							}	
						}
						else{
							echo sprintf('<td class="btn btn-outline-info btn-sm" onclick="bgchange(%d,%d)">更改</td>',$member[$i]['bgNO'],$bgpage);
						}
						echo '</tr>';
					}
				}
				else{
					for($i=0;$i<$perpage;$i++){
						if($i%2==0)
							echo '<tr class="grey">';
						else	
							echo '<tr>';
						echo "<td>{$member[$i]['burger']}</td>";
						echo "<td>{$member[$i]['bgNT']}</td>";
							echo sprintf('<td class="btn btn-outline-danger btn-sm" onclick="bgdel(%d,%d)">刪除</td>',$member[$i]['bgNO'],$bgpage);
						if(isset($changeno)){
							if($changeno==$member[$i]['bgNO']){
								echo '<td>新名稱:<input type="text" id="burgername" size="10%">';
								echo '<td>新價錢:<input type="text" id="burgerNT" size="1%"></td>';
								echo sprintf('<td><button type="button" class="btn btn-outline-primary btn-sm" onclick="bgchange2(%d)">確定更改</button>',$member[$i]['bgNO']);
							}	
						}
						else{
							echo sprintf('<td class="btn btn-outline-info btn-sm" onclick="bgchange(%d,%d)">更改</td>',$member[$i]['bgNO'],$bgpage);
						}
						echo '</tr>';
					}
				}
				echo '</table>';
				for($i=1;$i<=$totalpage;$i++){
					if($bgpage==$i)
						echo $i;
					else
						echo sprintf('<a href="#" onclick="bgpage(%d)">%d</a>',$i,$i);
				}
	?>
	</body>
</html>