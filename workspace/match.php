<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
 
//如要讀取 引入讀取檔案即可
require_once('/home/ubuntu/workspace/workspace/PHPExcel/Classes/PHPExcel.php');// 輸出用
require_once('/home/ubuntu/workspace/workspace/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');// 輸出用
require_once('/home/ubuntu/workspace/workspace/PHPExcel/Classes/PHPExcel/IOFactory.php');//讀取用
//檔案路徑
$inputFileName = 'filename.xls';
$inputFileName1 = '【T】15-16_NANI20170613_16篇_NANI.xls';

$reader = PHPExcel_IOFactory::createReader('Excel2007'); // 讀取2007 excel 檔案
$reader1 = PHPExcel_IOFactory::createReader('Excel2007'); // 讀取2007 excel 檔案

$PHPExcel = $reader->load($inputFileName); // 檔案名稱 需已經上傳到主機上
$PHPExcel1 = $reader->load($inputFileName1); // 檔案名稱 需已經上傳到主機上



$sheet = $PHPExcel->getSheet(0); // 讀取第一個工作表(編號從 0 開始)
$sheet1 = $PHPExcel1->getSheet(0); // 讀取第一個工作表(編號從 0 開始)


$HighestColumn = $sheet->getHighestColumn(); //最大欄位的英文代號 第一行=A 第二行=B 這裡是G
$HighestColumn1 = $sheet1->getHighestColumn(); //最大欄位的英文代號 第一行=A 第二行=B

$highestRow = $sheet->getHighestRow(); // 取得總列數 數字編號。A=0, B=1, C=2
$highestRow1 = $sheet1->getHighestRow(); // 取得總列數 數字編號。A=0, B=1, C=2

$TotalColumn = (ord($HighestColumn)-(64));// 將"任意"字符轉換為 ASCII 碼: 這裡是將G轉換71-64=7 
$TotalColumn1 = (ord($HighestColumn1)-(64));


echo '總共 '.$TotalColumn.' 行<br>';
echo '總共 '.$highestRow.' 列<br>';

// 一次讀取一列
for ($row = 0; $row <= $highestRow; $row++) {//直的
    for ($column = 0; $column <= $TotalColumn; $column++) {//看你有幾個欄位 橫的
        $val = $sheet->getCellByColumnAndRow($column, $row)->getValue();
        echo $val.' ';
    }
    echo "<br />";
}
echo '<br>'.'以下是第2份EXECL了<br>';

echo '總共 '.$TotalColumn1.' 行<br>';
echo '總共 '.$highestRow1.' 列<br>';

for ($row = 0; $row <= $highestRow1; $row++) {//直的
    for ($column = 0; $column <= $TotalColumn1; $column++) {//看你有幾個欄位 橫的
        $val = $sheet1->getCellByColumnAndRow($column, $row)->getValue();
        echo $val.' ';
    }
    echo "<br />";
}
?>