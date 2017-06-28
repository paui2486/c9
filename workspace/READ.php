<?php
    require 'PDOCON.php';
    $ID = null;
    if ( !empty($_GET['ID'])) {
        $ID = $_REQUEST['ID'];
    }
     
    if ( null==$ID ) {
        header("Location: pdoindex.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM translation where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($ID));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<meta charset="utf-8">

</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read a Customer</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="panel panel-primary">
                        <label class="control-label">ID</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['ID'];?>
                            </label>
                        </div>
                      </div>
                      <div class="panel panel-primary">
                        <label class="control-label">NAME</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['name'];?>
                            </label>
                        </div>
                      </div>
                      <div class="panel panel-primary">
                        <label class="control-label">ENG</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['eng'];?>
                            </label>
                        </div>
                      </div>
                      <div class="panel panel-primary">
                        <label class="control-label">CHI</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['chi'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn btn-danger" href="pdoindex.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>