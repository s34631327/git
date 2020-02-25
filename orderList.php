<?php session_start(); 
	include 'name.php';
	if(isset($_GET['chgNO'])){
		$chgNO = $_GET['chgNO'];
		$str = "select * from meal where mealNO = $chgNO";
		$select = $con->prepare($str);
		$select->execute();
		$member = $select->fetchAll(PDO::FETCH_ASSOC);
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
	<link rel="stylesheet" href="css/signIn.css" />
	<script>
		var name2 = '<?php echo $name; ?>';
	</script>
	<title>訂餐系統</title>
		<style>
			 #accordion-resizer {
				padding: 10px;
				width: 700px;
				height: 600px;
			  }
			.fixed {
				position: fixed;
				bottom: 0px;
				right: 0px;
				border-style:ridge;
			}
			#accordion div input{
				width:15%
			}
		</style>
	</head>
	<body onload="menu()">
		
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
		<!-- orderList -->
		<div id="accordion-resizer">
			<div id="accordion">
					<h3>漢堡類(內含蛋)</h3>
				<div id="bgshow">
				</div>
					<h3>超值套餐&nbsp;&nbsp;&nbsp;(主餐任選一項+點心任選一項+飲料)</h3>
				<div>
					
				</div>
					<h3>吐司類(內含蛋)</h3>
				<div>
				</div>
					<h3>蛋餅類</h3>
				<div>
					<ol>
						<li>雙層培根起士(NT$50):<input type="number">個</li>
					</ol>
				</div>
					<h3>抓餅類</h3>
				<div>
					<ol>
						<li>雙層培根起士(NT$50):<input type="number">個</li>
					</ol>
				</div>
					<h3>披薩類(需等10分鐘)</h3>
				<div>
					<ol>
						<li>雙層培根起士(NT$50):<input type="number">個</li>
					</ol>
				</div>
				<h3>點心類</h3>
				<div>
					<ol>
						<li>雙層培根起士(NT$50):<input type="number">個</li>
					</ol>
				</div>
				<h3>素食類</h3>
				<div>
					<ol>
						<li>雙層培根起士(NT$50):<input type="number">個</li>
					</ol>
				</div>
				<h3>飲料/牛乳/養生飲品</h3>
				<div>
					<ol>
						<li>雙層培根起士(NT$50):<input type="number">個</li>
					</ol>
				</div>
			</div>
		</div>
		<div class="fixed">
			<p>小計&nbsp;<span id="subtotal">0</span>&nbsp;元</p>
			<button id="order" class="btn btn-primary btn-sm" >我要訂餐</button>
			<button class="btn btn-primary btn-sm" onclick="cancel()">清除</button>
		</div>
		
		<div id="orderShow" title="您選擇的餐點為:" style="background-color:#e3f2fd">
			<div id="orderShow2">
			</div>
			<div id="orderShow3" style="text-align:center; font-size:small; color:red">
			</div>
		</div>
		
		<?php include("signIn.html"); ?>
		
		<script>
			function menu(){
				xmlhttp.onreadystatechange=function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200){
							burger = JSON.parse('{"burger":'+xmlhttp.responseText+'}');
							// newburger = JSON.parse('{"newburger":[{"burger":"椒麻雞腿漢堡","bgNT":"50"},{"burger":"雙層培根起士","bgNT":"50"}]}');
							bglength = burger.burger.length;
							bglength2 = Math.round(bglength/2);
							// bglength3 = bglength-bglength2;
							// document.getElementById("bgshow").innerHTML=burger.burger[0].burger;
							bgfinal = "";
							bgfinal2 = "";
							for(i=0;i<bglength2;i++){
								bg2 = JSON.stringify(burger.burger[i].burger);
								finallen2 =bg2.length;
								bgfinal2 += '<li>'+bg2.slice(1,finallen2-1)+JSON.stringify(burger.burger[i].bgNT)+':<input type="number" name="burGerNum" min="0">個</li>';
							}
							for(i=bglength2;i<bglength;i++){
								bg = JSON.stringify(burger.burger[i].burger);
								finallen2 =bg.length;
								bgfinal += '<li>'+bg.slice(1,finallen2-1)+JSON.stringify(burger.burger[i].bgNT)+':<input type="number" name="burGerNum" min="0">個</li>';
							}
							document.getElementById("bgshow").innerHTML ='<table><tr><td><ul>'+bgfinal2+'</ul></td><td><ul>'+bgfinal+'</ul></td></tr></table>';
							// document.getElementById("bgshow").innerHTML =bglength3;
							burGerNum=document.getElementsByName("burGerNum");
							// burGerName=document.getElementsByName("burGerName");
							subtotal=document.getElementById("subtotal");
							// document.getElementById("test").innerHTML =bigbg;
							for(var j=0;j<bglength;j++){
								burGerNum[j].addEventListener('change', calc);
								burGerNum[j].value = "0";
							}
							chgorderbg = '<?php if(isset($_GET['chgNO'])) echo $member[0]['orderbg']; else echo "null"; ?>';
							chgorderbgnum = '<?php if(isset($_GET['chgNO'])) echo $member[0]['orderbgnum']; else echo "null"; ?>';
							if(chgorderbg){
								chgorderbg2 = new Array();
								chgorderbgnum2 = new Array();
								finalchg = new Array();
								chgorderbg2 = chgorderbg.split(",");
								chgorderbgnum2 = chgorderbgnum.split(",");
								chglen = chgorderbg2.length;
								for(i=0;i<chglen-1;i++){
									finalbglen = chgorderbg2[i].length;
									finalchg[i] = chgorderbg2[i].substring(1,finalbglen-1);
									for(var j=0;j<bglength;j++){
										if(finalchg[i]==burger.burger[j].burger){
											burGerNum[j].value=chgorderbgnum2[i];
										}
									}
								}
								calc();
							}
						}
					}
					xmlhttp.open("GET","menu.php",true);
					xmlhttp.send();
			}
			$('#orderShow').dialog({
				autoOpen:false,draggable:false,modal:true,resizable:false,
				buttons:[{text:'確認訂餐',click:function(){
							xmlhttp.onreadystatechange=function()
							{
								if (xmlhttp.readyState==4 && xmlhttp.status==200)
								{
									alert(xmlhttp.responseText);
									// document.getElementById("orderShow3").innerHTML=xmlhttp.responseText;
									window.location.replace("myordermeal.php");
								}
							}
							NowDate = new Date();
							y = NowDate.getFullYear();
							M = NowDate.getMonth()+1;
							d = NowDate.getDate();
							taketimelast = y+'-'+M+'-'+d+' '+ taketime;
							xmlhttp.open("POST","order.php",true);
							xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
							xmlhttp.send("msg="+msg+"&NT="+money+"&taketime="+taketimelast+"&orderbg="+orderbg+"&orderbgnum="+orderbgnum);
							<?php 
								if(isset($_GET['chgNO'])){
									$str = "delete from meal where mealNO = $chgNO";
									$select = $con->prepare($str);
									$select->execute();
								}
							?>
						}},
						{text:'取消',click:function(){$(this).dialog('close');}}
						]
						});
			function cancel(){
				var v =burGerNum[i];
				for(var i=0;i<bglength;i++){
					burGerNum[i].value = 0;
					subtotal.innerHTML = 0;
					}
				}
			$('#order').click(function(){
				// msg = "";
				// bigbg = new Array();
				// for(var i=0;i<bglength;i++){
					// bigbg[i] = JSON.stringify(burger.burger[i].burger);
					// var burGerName_Show =bigbg[i]; 
					// var burGerNum_Show =burGerNum[i].value; 
					// if ( burGerNum_Show == 0){
						// continue ;
					// }
					// msg += burGerName_Show + " " + burGerNum_Show + "個<br>";
				// }
				// --------------------------------------
				
				// alert(taketimemin);
				// alert(maketime);
				// alert(NowDate);
				// alert(NowDate2);
				// h = NowDate.getHours();
				// m = NowDate.getMinutes();
				// s = NowDate.getSeconds();
				// taketime = y+'-'+M+'-'+d+' '+h+':'+m+':'+s;
				$('#orderShow').dialog('open');
			});
			function calc(){
				money = 0;
				smallbg = new Array();
				msg = "";
				maketime = 0;
				orderbg = "";
				orderbgnum = "";
				bigbg = new Array();
				for(i=0;i<bglength;i++){
					if(burGerNum[i].value != 0){
						bigbg[i] = JSON.stringify(burger.burger[i].burger);
						smallbg[i] = burger.burger[i].maketime;
						money += parseInt(burGerNum[i].value) * parseInt(burger.burger[i].bgNT);
						maketime += parseInt(smallbg[i]) * parseInt(burGerNum[i].value);
						msg += bigbg[i] + burGerNum[i].value + "個<br>";
						orderbg += bigbg[i] +',';
						orderbgnum += burGerNum[i].value +',';
						continue;
					}
				}
				subtotal.innerHTML = money;//-----------
				// taketimemm = maketime * 1000 * 60;
				// taketimemin = maketime;
				// NowDate = new Date(taketimemm);
				// NowDate2 = new Date();
				xmlhttp.onreadystatechange=function()
					{
						if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							taketime=xmlhttp.responseText;
							document.getElementById("orderShow2").innerHTML = msg + '總金額為:' + money + '<br>' + '預計取餐時間為:' + taketime;
						}
					}
					xmlhttp.open("POST","orderShowTime.php",true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send("maketime="+maketime);
			}
			$(function(){
				$( "#accordion" ).accordion({heightStyle:"fill"});
			});
					
			$(function(){
				$( "#accordion-resizer" ).resizable({
				  minHeight: 140,
				  minWidth: 200,
				  resize: function() {
					$( "#accordion" ).accordion( "refresh" );
				  }
				});
			});
		</script>
		<script type="text/javascript" src="scripts/signIn.js"></script>
		<script type="text/javascript" src="scripts/XMLHttpRequest.js"></script>
	</body>
</html>