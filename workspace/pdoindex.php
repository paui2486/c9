<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>ENG</th>
                      <th>CHI</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'PDOCON.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM translation ORDER BY id DESC';
                   
                   $result=$pdo->prepare($sql);// 優良示範
                   $result->execute();
                   
                   while($row = $result->fetch(PDO::FETCH_OBJ)){
                            echo '<tr>';
                            echo '<td>'. $row->ID."\n".'</td>';
                            echo '<td>'. $row->eng."\n".'</td>';
                            echo '<td>'. $row->chi."\n".'</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>