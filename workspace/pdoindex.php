<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<meta charset="utf-8">

</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>ENG</th>
                      <th>CHI</th>
                      <th>NAME</th>
                      <th>Action</th>
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
                            echo '<td>'. $row->name."\n".'</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="READ.php?ID='.$row->ID.'">Read</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update.php?id='.$row->ID.'">Update</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row->ID.'">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div>
  </body>
</html>