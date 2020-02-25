<?php session_start(); ?>
<?php
	include 'name.php';
	$email=$_POST['email'];
	$str = "select * from account";
	$select = $con->prepare($str);
	$select->execute();
	$member = $select->fetchAll(PDO::FETCH_ASSOC);
	foreach($member as $key => $value){
		foreach($value as $key2 => $value2){
			if($key2 == 'email'){
				if($email == $value2){
					echo 'email已註冊';
					exit();
				}
			}
		}
	}
	require("class.phpmailer.php");
	mb_internal_encoding('UTF-8');  
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true; // turn on SMTP authentication
	$mail->Username = "s34631327@gmail.com";
	$mail->Password = "IROTJTYN1246";
	$mail->FromName = "CHEN";
	$webmaster_email = "XXX@gmail.com"; 
	//回覆信件至此信箱
	// $email="s34631327@gmail.com";
	$email=$_POST['email'];
	// 收件者信箱
	$name="CHEN2";
	// 收件者的名稱or暱稱
	$mail->From = $webmaster_email;
	$mail->AddAddress($email,$name);
	$mail->AddReplyTo($webmaster_email,"Squall.f");
	//這不用改
	$mail->WordWrap = 50;
	//每50行斷一次行
	//$mail->AddAttachment("/XXX.rar");
	// 附加檔案可以用這種語法(記得把上一行的//去掉)
	$mail->IsHTML(true); // send as HTML
	$mail->Subject = "中文";  	// 信件標題
	$check = rand(10000,99999);
	$mail->Body = "驗證碼:".$check;
	$_SESSION['check'] = $check;
	//信件內容(html版，就是可以有html標籤的如粗體、斜體之類)
	$mail->AltBody = "信件內容"; 
	//信件內容(純文字版)
	if(!$mail->Send()){
		echo "寄信發生錯誤：" . $mail->ErrorInfo;
		//如果有錯誤會印出原因
	}
	else{ 
		echo "寄信成功";
	}
?>