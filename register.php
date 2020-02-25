<?php session_start(); ?>
<?php
	date_default_timezone_set("Asia/Taipei");
	$account = $_POST["account"];
	$passwd = $_POST["passwd"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$tel = $_POST["tel"];
	$check = $_POST['check'];
	$check2 = $_SESSION['check'];
	$date = date("Y-m-d H:i:s");
	$link=mysqli_connect("localhost","root","","ordering2");	//設定資料庫連線 
	mysqli_set_charset($link, "utf8");	
	if (!$link)
	  {
	  die('Could not connect:'.mysql_error());
	  }
	$sql = "INSERT INTO account (name,account,pw,tel,email,date) VALUES ('$name','$account','$passwd','$tel','$email','$date')";
	if($account == null){
		echo '註冊失敗! 帳號不能為空';
	}
	elseif($email == null){
		echo '註冊失敗! email不能為空';
		}
	elseif($tel == null){
		echo '註冊失敗! tel不能為空';
		}
	elseif($account != null && $passwd == null){
		echo '註冊失敗! 密碼不能為空';
		}
	elseif($check!=$check2){
			echo "驗證碼錯誤";
		}
	elseif(!(mysqli_query($link,$sql))){
			echo "帳號重複, 請重新輸入";
		}
	else{
		$result = @mysqli_query($link,$sql);
		echo '註冊成功!';
		echo '<meta http-equiv=REFRESH CONTENT=0.1;>';
		}
	mysqli_close($link);   
?>