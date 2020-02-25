<?php session_start(); 
	include 'name.php';
?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--width=device-width 表示寬度是設備屏幕的寬度。initial-scale=1 表示初始的縮放比例。shrink-to-fit=no 自動適應手機屏幕的寬度。-->
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
					<a class="narbar-brand" href="Home.php"><img src="burger.png" width="30"></a>
					<ul class="navbar-nav">
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
		<div class="container-fluid" id="show">
			<div class="row">
				<div class="col-6">
					<div>
						<div class="bg-primary rounded pb-1">
						<h3 class="text-white d-flex justify-content-center"><strong>最新消息</strong></h3>
							<div class="mx-2">
								<ul class="list-unstyled bg-white rounded h6">
									<li><a href="#" title="宜蘭城隍8/10隆重開幕">宜蘭城隍8/10隆重開幕<span></span></a></li>
									<li><a href="#" title="中壢龍東店8/2隆重開幕">中壢龍東店8/2隆重開幕</a></li>
									<li><a href="#" title="竹南龍山店4/8隆重開幕">竹南龍山店4/8隆重開幕</a></li>
									<li><a href="#" title="嘉義9/24隆重開幕~~">嘉義9/24隆重開幕~~</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-3">
				</div>
				<div class="col-3">
				</div>
			</div>
		</div>
		<?php include("signIn.html"); ?>
		<script type="text/javascript" src="scripts/signIn.js"></script>
		<script type="text/javascript" src="scripts/XMLHttpRequest.js"></script>
	</body>
</html>