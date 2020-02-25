<?php session_start(); 
	include 'name.php';
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
	<script>
		var name2 = '<?php echo $name; ?>';
	</script>

	<title>訂餐系統</title>
		<style>
		</style>
	</head>
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
		<!-- bootstrap .text-truncate -->
		<div class="container-fluid">
			<hr>
			<h3 class="text-primary d-flex flex-column align-items-center">常見問題</h3>
			<hr width="50%">
			
			<div class="row">
				<div class="col-md-3 offset-md-3">
					<span class="ui-icon ui-icon-help"></span><b class="text-danger">公司是否可隨時解決店家問題？</b>
				</div>
				<div class="col-md-3">
					<span class="ui-icon ui-icon-help"></span><b class="text-danger">契約多久簽一次？</b>	
				</div>
			</div>
			<div class="row m-2">
				<div class="col-md-3 offset-md-3">
					<small>協助店家，解決問題，是總部的責任，如店家有營業上的問題可隨時與公司聯絡。</small>
				</div>
				<div class="col-md-3">
					<small>總部合約書第七條規定簽約一次有效時間二年。</small>
				</div>
			</div>
			
			<hr width="50%">
			<div class="row">
				<div class="col-md-3 offset-md-3">
					<span class="ui-icon ui-icon-help"></span><b class="text-danger">賣公司以外的產品嗎？</b>
				</div>
				<div class="col-md-3">
					<span class="ui-icon ui-icon-help"></span><b class="text-danger">開店後不久店東換人營業，需...</b>	
				</div>
			</div>
			<div class="row m-2">
				<div class="col-md-3 offset-md-3">
					<small>應以公司商品為主，如果加盟主本身有拿手絕活，可以納入考慮，來路不明之物料，店東...</small>
				</div>
				<div class="col-md-3">
					<small>事先需告知總部，經總部同意重新簽約，專利商標授權並接受公司安排教育訓練，酌收...</small>
				</div>
			</div>
			
			<hr width="50%">
			<div class="row">
				<div class="col-md-3 offset-md-3">
					<span class="ui-icon ui-icon-help"></span><b class="text-danger">早餐市場是否已飽和？</b>
				</div>
				<div class="col-md-3">
					<span class="ui-icon ui-icon-help"></span><b class="text-danger">生意不佳，公司如何協助?</b>	
				</div>
			</div>
			<div class="row m-2">
				<div class="col-md-3 offset-md-3">
					<small>十幾年前，很多人皆認為早餐市場已飽和，但至今每天都有早餐店開店，為何？(沒有飽和...</small>
				</div>
				<div class="col-md-3">
					<small>不同商圈有不同屬性，加盟主生意不佳，公司可協助辦理促銷活動，但費用由加盟主自行...</small>
				</div>
			</div>
			
			<hr width="50%">
			<div class="row">
				<div class="col-md-3 offset-md-3">
					<span class="ui-icon ui-icon-help"></span><b class="text-danger">可以ㄧ人開店嗎？公司可否代找？</b>
				</div>
				<div class="col-md-3">
					<span class="ui-icon ui-icon-help"></span><b class="text-danger">開幕支援可增加天數嗎？</b>	
				</div>
			</div>
			<div class="row m-2">
				<div class="col-md-3 offset-md-3">
					<small>早餐店基本人手需兩位(煎台、工作台)，如只有個人開店，生意做不起來，一定要請助手...</small>
				</div>
				<div class="col-md-3">
					<small>加盟主接受公司完整教育訓練14天(訓練教室4天、店務實習7天、開幕前後支援3天)後...</small>
				</div>
			</div>
			
			<hr width="50%">
			<div class="row">
				<div class="col-md-3 offset-md-3">
					<span class="ui-icon ui-icon-help"></span><b class="text-danger">獨資或合資哪一項比較好？差別...</b>
				</div>
				<div class="col-md-3">
					<span class="ui-icon ui-icon-help"></span><b class="text-danger">專案金額費用是否全部做到好？</b>	
				</div>
			</div>
			<div class="row m-2">
				<div class="col-md-3 offset-md-3">
					<small>如果資金充裕沒問題，公司建議獨資比較好，可減少爭議，如需合資其對象選擇最理想...</small>
				</div>
				<div class="col-md-3">
					<small>早餐需求店面坪數約15~20坪左右，一般店面大小、工程施工程度不一，總部設專案一定...</small>
				</div>
			</div>
			<hr width="50%">
			<div class="row">
				<div class="col-md-3 offset-md-3">
					<span class="ui-icon ui-icon-help"></span><b class="text-danger">店面要多大？租金多少算合理...</b>
				</div>
				<div class="col-md-3">
					<span class="ui-icon ui-icon-help"></span><b class="text-danger">早餐店需丙級廚師證照嗎？</b>	
				</div>
			</div>
			<div class="row m-2">
				<div class="col-md-3 offset-md-3">
					<small>早餐一般店面坪數約15~25坪之間，租金多寡視地點商圈而定，如社區型(新、舊之分...</small>
				</div>
				<div class="col-md-3">
					<small>早餐需求店面坪數約15~依衛生署規定，餐飲業歸類為行業八大類別之一，需有廚師...</small>
				</div>
			</div>
			
		</div>
		
		<?php include("signIn.html"); ?>
		
		<script type="text/javascript" src="scripts/signIn.js"></script>
		<script type="text/javascript" src="scripts/XMLHttpRequest.js"></script>
	</body>
</html>