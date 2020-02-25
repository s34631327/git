<?php session_start(); ?>
<?php
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
	<script type="text/javascript" src="scripts/XMLHttpRequest.js"></script>
	<title>訂餐系統</title>
		<style>
			.nav-link{ cursor: pointer; }
		</style>
	</head>
		<script>
			var name2 = '<?php echo $name; ?>';
		</script>
	<body>
		<div class="container-fluid sticky-top">
			<nav class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mynav" >
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-collapse collapse" id="mynav">
					<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link" href="administrator.php"><img src="burger.png" width="25"></a></li>
						<li class="nav-item"><a class="nav-link" href="Home.php"><span class="fa fa-user"></span>回首頁</a></li>
						<li class="nav-item"><a class="nav-link" onclick="accountList()"><span class="fa fa-user"></span>帳號管理</a></li>
						<li class="nav-item"><a class="nav-link" onclick="mealList()"><span class="fa fa-shopping-cart"></span>訂單查詢</a></li>
						<li class="nav-item"><a class="nav-link" onclick="menuchange()"><span class="fa fa-wrench"></span>菜單修改</a></li>
						<li class="nav-item"><a class="nav-link" onclick="addmenu()"><span class="fa fa-wrench"></span>菜單新增</a></li>
					</ul>
				</div>
				<div class="p-2 relative">
					<?php echo "$name";  ?>,&nbsp;你好
					<?php if($name != "訪客") { echo "<a href=\"logout.php\">登出</a>"; }?>
				</div>
			</nav>
			<hr>
		</div>
		
		<div class="container-fluid">
			<div id="show">
			</div>
		</div>
		
		<script>
		//----------帳號管理----------
		function accountList(){
			xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","accountList.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send();
		}
		function accountdel(delNO){
			xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","accountList.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("delNO="+delNO);
		}
		function lock(lockNO,acpage,status){
			xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","accountList.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("lockNO="+lockNO+"&acpage="+acpage+"&status="+status);
		}
		function acpage(p){
			xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","accountList.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("acpage="+p);
		}
		//----------訂單查詢----------
		function mealList(){
			xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","mealList.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send();
		}
		function mealpage(p){
			xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","mealList.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("mealpage="+p);
		}
		function statuschange(changeno,i,p){
			changevalue = document.getElementsByTagName("select")[i].value;
			xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","mealList.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("changevalue="+changevalue+"&changeno="+changeno+"&mealpage="+p);
		}
		//----------菜單修改----------
		function menuchange(){
			xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","menuchange.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send();
		}
		function bgpage(p){
			xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","menuchange.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("bgpage="+p);
		}
		function bgdel(delno,bgpage){
			xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","menuchange.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("delno="+delno+"&bgpage="+bgpage);
		}
		function bgchange(changeno,bgpage){
			xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","menuchange.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("changeno="+changeno+"&bgpage="+bgpage);
		}
		function bgchange2(changeno){
			xmlhttp.onreadystatechange=function(){
				newbgname=document.getElementById("burgername").value;
				newbgNT=document.getElementById("burgerNT").value;
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","menuchange.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("newbgname="+newbgname+"&newbgNT="+newbgNT+"&changesure="+changeno);
		}
		//----------新增菜單----------
		function addmenu(){
			xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","addmenu.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send();
		}
		function addmenu2(){
			addbg=document.getElementById("addbg").value;
			addbgNT=document.getElementById("addbgNT").value;
			addbgmktime=document.getElementById("addbgmktime").value;
			xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show").innerHTML=xmlhttp.responseText;
				alert('新增成功');
				}
			}
			xmlhttp.open("POST","addmenu.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("addbg="+addbg+"&addbgNT="+addbgNT+"&addbgmktime="+addbgmktime);
		}
		// function bgorderby(bgorderby){
			// xmlhttp.onreadystatechange=function(){
			// if (xmlhttp.readyState==4 && xmlhttp.status==200){
				// document.getElementById("show").innerHTML=xmlhttp.responseText;
				// }
			// }
			// xmlhttp.open("POST","menuchange.php",true);
			// xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			// xmlhttp.send("bgorderby="+bgorderby);
		// }
		</script>
	</body>
</html>