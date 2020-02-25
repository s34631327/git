<?php session_start(); ?>
<?php
	$link=mysqli_connect("localhost","root","","ordering2");	//設定資料庫連線 
	mysqli_set_charset($link, "utf8");	
	if (!$link)
	  {
	  die('Could not connect:'.mysql_error());
	  }
	$account = $_GET['account'];
	$passwd = $_GET['passwd'];
	$sql = "SELECT * FROM account where account = '$account'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);
	
	if($account != null && $passwd != null && $row['account'] == $account && $row['pw'] == $passwd)
	{
		if($account=="a34631327"){
			echo '<meta http-equiv=REFRESH CONTENT=0.1;url=administrator.php>';
			echo '管理員登入成功!';
			$_SESSION['name'] = $row['name'];
		}
		elseif($account=="a14769369"){
			echo '<meta http-equiv=REFRESH CONTENT=0.1;url=store.php>';
			echo '店家登入成功!';
			$_SESSION['name'] = $row['name'];
		}
		elseif($row['status'] != 1){
			echo '登入失敗,帳號封鎖中';
		}
		else{
			$_SESSION['name'] = $row['name'];
			echo '登入成功!';
			echo '<meta http-equiv=REFRESH CONTENT=0.1;>';
		}
	}
	elseif($account == null){
		echo '登入失敗! 帳號不能為空';
	}
	elseif($account != null && $passwd != null && $row['account'] == $account && $row['pw'] != $passwd){
		 echo '登入失敗! 密碼錯誤';
	}
	elseif($account != null && $passwd == null){
		 echo '登入失敗! 密碼不能為空';
	}
	else{
        echo '登入失敗! 帳號錯誤';
	}
	mysqli_close($link);   
?>