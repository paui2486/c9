<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$file=$_POST[file];

if (!unlink($file))
  {
  echo ("Error deleting $file");
  echo("<meta http-equiv=REFRESH CONTENT=5;url=up.html>");//5秒後跳轉up.html
  }
else
  {
  echo ("成功 Deleted $file");
  echo("<meta http-equiv=REFRESH CONTENT=5;url=up.html>");//5秒後跳轉up.html
  }
?>