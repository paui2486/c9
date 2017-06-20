<?php
$fp = fopen("excel.xls", "w");
$content="Col1 \tCol2 \tCol3\n";
$content.="Col4 \tCol5 \tCol6\n";
$content.="Col7 \tCol8 \tCol9\n";
fputs($fp, $content);
fclose($fp);
?>