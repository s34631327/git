<?php session_start(); 	
	include 'name.php';
	if(!isset($_GET['page'])){
		$page = 1;
	}
	else{
		$page = $_GET['page'];
	}
	if(isset($_GET['delNO'])){
		$delNO = $_GET['delNO'];
		$str = "UPDATE `meal` SET `status` = 4 where `mealNO` = '$delNO'";
		$select = $con->prepare($str);
		$select->execute();
	}
	$perpage = 7;
	$start = ($page-1) * $perpage;
	$str = "select * from meal where name = '$name'";
	$select = $con->prepare($str);
	$select->execute();
	$mymealtotal = $select->rowCount();
	if($page==1){
		if($mymealtotal>$perpage){
			$str2 = "select * from meal where name = '$name' order by ordertime desc limit $start,$perpage";
		}
		else{
			$str2 = "select * from meal where name = '$name' order by ordertime desc limit $start,$mymealtotal";
		}
	}
	else{
		$ab = $mymealtotal-$start;
		$str2 = "select * from meal where name = '$name' order by ordertime desc limit $start,$ab";	
	}
	$select2 = $con->prepare($str2);
	$select2->execute();
	$member = $select2->fetchAll(PDO::FETCH_ASSOC);
	$totalpage = ceil($mymealtotal/$perpage);
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
	<link rel="stylesheet" href="css/signIn.css" />

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
		<script>
			var name2 = '<?php echo $name; ?>';
		</script>
	</head>
	<body>
		<div class="container-fluid sticky-top">
			<nav class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mynav" >
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-collapse collapse" id="mynav">
					<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link" href="Home.php"><img src="burger.png" width="30"></a></li>
						<li class="nav-item"><a class="nav-link" href="newList.php"><span class="fa fa-plus"></span>最新消息</a></li>
						<li class="nav-item"><a class="nav-link"><span class="fa fa-home"></span>關於店家</a></li>
						<li class="nav-item"><a class="nav-link" href="orderList.php"><span class="fa fa-shopping-cart"></span>餐點介紹</a></li>
						<li class="nav-item"><a class="nav-link" href="qaList.php"><span class="fa fa-search"></span>常見問題</a></li>
						<li class="nav-item"><a class="nav-link"><span class="fa fa-envelope"></span>顧客專區</a></li>
						<li class="nav-item login"><a class="nav-link"><span class="fa fa-user"></span>會員登入</a></li>
						<li class="nav-item register"><a class="nav-link"><span class="fa fa-user-plus"></span>會員註冊</a></li>
						<?php 
						if($name=="管理員") 
							echo '<li class="nav-item"><a class="nav-link" href="administrator.php"><span class="fa fa-user-plus"></span>管理員頁面</a></li>'; 
						elseif($name=="王大明店家") 
							echo '<li class="nav-item"><a class="nav-link" href="store.php"><span class="fa fa-user-plus"></span>店家頁面</a></li>'; 
						else{
							if(($name!="管理員")&&($name!="訪客")){
								echo '<li class="nav-item"><a class="nav-link" href="myordermeal.php"><span class="fa fa-cart-plus"></span>我的訂單</a></li>'; 
								echo '<li class="nav-item"><a class="nav-link" href="changemydata.php"><span class="fa fa-address-book"></span>修改個人資料</a></li>'; 
							}
						}
						?>
					</ul>
				</div>
				<div class="p-2 relative">
					<?php echo "$name";  ?>,&nbsp;你好
					<?php if($name != "訪客") { echo "<a href=\"logout.php\">登出</a>"; }?>
				</div>
			</nav>
			<hr>
		</div>
		
		<?php include("signIn.html"); ?>
		<p id="demo"></p>
		<table cellpadding="8">
			<tr>
				<th><a href="#">訂購餐點</a></th>
				<th><a href="#">訂購時間</a></th>
				<th><a href="#">預計取餐時間</a></th>
				<th><a href="#">總金額</a></th>
				<th><a href="#">狀態</a></th>
				<th><a href="#">操作</a></th>
				<th onclick="myFunction()"><a href="#">修改訂單</a></th>
			</tr>
			<?php
				if($page==$totalpage){						//若為最末頁
					for($i=0;$i<$mymealtotal-$start;$i++){
						if($i%2==0)
							echo '<tr class="grey">';
						else	
							echo '<tr>';
						echo "<td>{$member[$i]['meal']}</td>";
						echo "<td>{$member[$i]['ordertime']}</td>";
						echo "<td>{$member[$i]['taketime']}</td>";
						echo "<td>{$member[$i]['NT']}</td>";
						if($member[$i]['status']==1){
							echo '<td style="color:#00bfff">餐點準備中</td>';
							echo sprintf('<td><a href="myordermeal.php?delNO=%d"><button class="btn btn-outline-danger btn-sm">%s</button></a></td>',$member[$i]['mealNO'],'取消訂單');
							echo sprintf('<td><a href="orderList.php?chgNO=%d"><button class="btn btn-outline-info btn-sm">%s</button></a></td>',$member[$i]['mealNO'],'修改訂單');
						}
						elseif($member[$i]['status']==2){
							echo '<td style="color:green">等候取餐</td>'; //1=餐點準備中 , 2=等候取餐 , 3=完成取餐 , 其他=餐點已取消
							echo '<td></td>';
							echo '<td></td>';
						}
						elseif($member[$i]['status']==3){
							echo '<td style="color:green">完成取餐</td>';
							echo '<td></td>';
							echo '<td></td>';
						}
						else{
							echo '<td style="color:red">餐點已取消</td>';
							echo '<td></td>';
							echo '<td></td>';
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
						echo "<td>{$member[$i]['meal']}</td>";
						echo "<td>{$member[$i]['ordertime']}</td>";
						echo "<td>{$member[$i]['taketime']}</td>";
						echo "<td>{$member[$i]['NT']}</td>";
						if($member[$i]['status']==1){
							echo '<td style="color:#00bfff">餐點準備中</td>';
							echo sprintf('<td><a href="myordermeal.php?delNO=%d"><button class="btn btn-outline-danger btn-sm">%s</button></a></td>',$member[$i]['mealNO'],'取消訂單');
							echo sprintf('<td><a href="orderList.php?chgNO=%d"><button class="btn btn-outline-info btn-sm">%s</button></a></td>',$member[$i]['mealNO'],'修改訂單');
						}
						elseif($member[$i]['status']==2){
							echo '<td style="color:green">等候取餐</td>';
							echo '<td></td>';
							echo '<td></td>';
						}
						elseif($member[$i]['status']==3){
							echo '<td style="color:green">完成取餐</td>';
							echo '<td></td>';
							echo '<td></td>';
						}
						else{
							echo '<td style="color:red">餐點已取消</td>';
							echo '<td></td>';
							echo '<td></td>';
						}
						echo '</tr>';
					}
				}
				echo '</table>';
				for($i=1;$i<=$totalpage;$i++){
					if($page==$i)
						echo $i;
					else
						echo sprintf('<a href="myordermeal.php?page=%d">%d</a>',$i,$i);
				}
			?>
		<script type="text/javascript" src="scripts/XMLHttpRequest.js"></script>
		<script type="text/javascript" src="scripts/signIn.js"></script>
		<script>
			function delmeal(page){
					xmlhttp.onreadystatechange=function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200){
						document.getElementById("show").innerHTML=xmlhttp.responseText;
					}
				}
					xmlhttp.open("POST","myaccount.php",true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send("page="+page);
			}
			function changemenu(){
				alert(123);
			}
		</script>
	</body>
</html>