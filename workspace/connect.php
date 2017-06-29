
<?php session_start(); 
require 'PDOCON.php';?>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />

<?php
	
    
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];
    //
    
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM user where name = ? and pwd = ?";
        $result = $pdo->prepare($sql);
        $result->execute(array($name,$pwd));
        $row = $result->fetch(PDO::FETCH_OBJ);
        Database::disconnect();
    //

    if($row->name != $name)
    {
        echo("查無此帳號！");    
        echo("<meta http-equiv=REFRESH CONTENT=1;url=index.php>");
    }
    else
    {

            if($row->name == $name && $row->pwd == $pwd)
            {
                $_SESSION['name'] = $name;
				echo("$name"."<BR>");
                echo("登入成功！");
                {
				echo("<meta http-equiv=REFRESH CONTENT=1;url=up.html>");
				}
            }
            else if($row->pwd != $pwd)
            {
                echo("密碼不符！");
                echo("<meta http-equiv=REFRESH CONTENT=1;url=login.php>");
            }
			
		
    }
?>