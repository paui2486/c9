<?php
// 燈入頁
?>
<!DOCTYPE html>
<html>
    <head>
        
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
        
        
        <title>登入首頁</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript">
            function onCheck()
            {
                if(document.getElementById("input-id").value=="")
                {
                    document.getElementById("msg-id").innerHTML="帳號不可為空";
                }
                else
                {
                    document.getElementById("msg-id").innerHTML="";
                }
                if(document.getElementById("input-password").value=="")
                {
                    document.getElementById("msg-password").innerHTML="密碼不可為空";
                }
                else
                {
                    document.getElementById("msg-password").innerHTML="";
                }
                if(document.getElementById("input-id").value!=""&&document.getElementById("input-password").value!="")
                {
                    document.getElementById("form-login").action="connect.php";
                    document.getElementById("form-login").submit();
                }
            }
        </script>
    </head>
    <body background ="">
	<div align = "center">
	<a><font color='blue' size='8'>目川線上翻譯系統</font></a>
	</div>
        <form id="form-login" name="form" method="post">
            <table align="center">
                <tr align="center">
                    <td align="center">帳號</td>
                    <td align="center"><input id="input-id" name="name" type="text" onkeyup="value=value.replace(/[\W]/g,'') " 
　　 onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"
　　 ID="Text1" /></td>
                    <td><div id="msg-id" class="alert"></div></td>
                </tr>
                <tr align="center">
                    <td align="center">密碼</td>
                    <td ><input id="input-password" name="pwd" type="password" onkeyup="value=value.replace(/[\W]/g,'') " 
　　 onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"
　　 ID="Text2" /></td>
                    <td><div id="msg-password" class="alert"></div></td>
                </tr>
				
            </table>
			<div align="center">
            <button onclick='onCheck()'>登入</button>
			</div>
        </form>
    </body>
</html>
