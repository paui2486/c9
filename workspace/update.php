<?php
        require 'PDOCON.php';
        $id = $_GET['id'];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM translation where ID = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_OBJ);
        Database::disconnect();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<meta http-equiv="Content-Type" content="text/html" charset = "utf-8">
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>輸入翻譯對照</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php" method="post">
                      <div class="control-group <?php echo !empty($IDError)?'error':'';?>">
                        <label class="control-label">ID</label> 
                          <div class="controls">
                            <input name="ID" type="text"  placeholder="輸入ID" value="<?php echo $id;?>">
                            <?php if (!empty($IDError)): ?>
                                <span class="help-inline"><?php echo $IDError;?></span>
                            <?php endif; ?>
                        </div>
                        <label class="control-label">名稱</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="輸入名稱" value="<?php echo $data->name ;?>">
                            <?php if (!empty($IDError)): ?>
                                <span class="help-inline"><?php echo $IDError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($engError)?'error':'';?>">
                        <label class="control-label">英文原文</label>
                        <div class="controls">
                            <input name="eng" type="text" placeholder="輸入英文" size="35" value="<?php echo $data->eng ;?>">
                            <?php if (!empty($engError)): ?>
                                <span class="help-inline"><?php echo $engError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($chiError)?'error':'';?>">
                        <label class="control-label">中文翻譯</label>
                        <div class="controls">
                            <input name="chi" type="text"  placeholder="輸入中文" size="35" value="<?php echo $data->chi ;?>">
                            <?php if (!empty($chiError)): ?>
                                <span class="help-inline"><?php echo $chiError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn btn-danger" href="pdoindex.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>


<?php
    //require 'PDOCON.php';
    
     
    /*if ( null==$id ) {
        header("Location: pdoindex.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM translation where ID = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($XD));
        $data = $q->fetch(PDO::FETCH_OBJ);
        Database::disconnect();
    }*/
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $engError = null;
        $chiError = null;
         
        // keep track post values
        $name  = $_POST['name'];
        $eng = $_POST['eng'];
        $chi = $_POST['chi'];
        $ID = $_POST['ID']; 
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter 名稱';
            $valid = false;
        }
         
        if (empty($eng)) {
            $engError = 'Please enter 英文';
            $valid = false;
        }
         
        if (empty($chi)) {
            $chiError = 'Please enter 中文';
            $valid = false;
        }
        
        if (empty($ID)) {
            $chiError = 'Please enter ID';
            $valid = false;
        }
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE translation  set name = ?, eng = ?, chi =? WHERE ID = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$eng,$chi,$ID));
            
            Database::disconnect();
            header("Location: pdoindex.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM translation where ID = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($ID));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $name = $data['name'];
        $eng = $data['eng'];
        $chi = $data['chi'];
         
        Database::disconnect();
    }
?>