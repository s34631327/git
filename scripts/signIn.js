			
			if(name2 != "訪客"){
				$(".login").hide();
			}
			
			$('#login').dialog({
				autoOpen:false,draggable:false,modal:true,resizable:false, overlay:{opacity: 0.7, background: "#FF8899" },
				buttons:[{text:'登入',click:function(){
						 
							var account = document.getElementById("account").value;
							var passwd = document.getElementById("passwd").value;
							xmlhttp.onreadystatechange=function()
							{
								if (xmlhttp.readyState==4 && xmlhttp.status==200)
								{
									document.getElementById("signInShow").innerHTML=xmlhttp.responseText;
								}
							}
							xmlhttp.open("GET","signIn.php?account="+account+"&passwd="+passwd,true);
							xmlhttp.send();
						}},
						{text:'取消',click:function(){$(this).dialog('close');}}
						],
						position: {my: "center",at: "left+600px top+300px",of:window}
								});
			$('#register').dialog({
				autoOpen:false,draggable:false,modal:true,resizable:false,
				buttons:[{text:'註冊',click:function(){
							var account2 = document.getElementById("account2").value;
							var passwd2 = document.getElementById("passwd2").value;
							var name = document.getElementById("name").value;
							var email = document.getElementById("email").value;
							var tel = document.getElementById("tel").value;
							var check = document.getElementById("check").value;
							xmlhttp.onreadystatechange=function()
							{
								if (xmlhttp.readyState==4 && xmlhttp.status==200)
								{
									document.getElementById("signInShow2").innerHTML=xmlhttp.responseText;
								}
							}
							xmlhttp.open("POST","register.php",true);
							xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
							xmlhttp.send("account="+account2+"&passwd="+passwd2+"&email="+email+"&name="+name+"&tel="+tel+"&check="+check);
						}},
						{text:'取消',click:function(){$(this).dialog('close');}}
						]
								});
			$('.login').click(function(){
				$('#login').dialog('open');
				$('#register').dialog('close');
			});
			$('.register').click(function(){
				$('#register').dialog('open');
				$('#login').dialog('close');
			});
			document.getElementById("checkbt").onclick = function() {
				var email = document.getElementById("email").value;
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("signInShow2").innerHTML=xmlhttp.responseText;
					}
				}
				xmlhttp.open("POST","check.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("email="+email);
			};