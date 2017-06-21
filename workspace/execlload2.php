<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
 
//引入一個檔案即可
require_once('/home/ubuntu/workspace/workspace/PHPExcel/Classes/PHPExcel.php');// 輸出用
require_once('/home/ubuntu/workspace/workspace/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');// 輸出用
require_once('/home/ubuntu/workspace/workspace/PHPExcel/Classes/PHPExcel/IOFactory.php');//讀取用
//檔案路徑
$inputFileName = 'FV.xlsx';

$reader = PHPExcel_IOFactory::createReader('Excel2007'); // 讀取2007 excel 檔案
$PHPExcel = $reader->load($inputFileName); // 檔案名稱 需已經上傳到主機上
$sheet = $PHPExcel->getSheet(0); // 讀取第一個工作表(編號從 0 開始)

//$sheetCount = $PHPExcel->getSheetCount(); // 取得總工作表數 
$HighestColumn = $sheet->getHighestColumn(); //最大欄位的英文代號?
$highestRow = $sheet->getHighestRow(); // 取得總列數 數字編號。A=0, B=1, C=2

$TotalColumn = (ord($HighestColumn)-(64));// 將"任意"字符轉換為 ASCII 碼: 這裡是將G轉換71-64=7 

//echo '總共 '.$HighestColumn;

echo '總共 '.$highestRow.' 列';
echo '總共 '.$TotalColumn.' 行';
// 一次讀取一列
for ($row = 0; $row <= $highestRow; $row++) {
    for ($column = 0; $column <= $TotalColumn; $column++) {//看你有幾個欄位
        $val = $sheet->getCellByColumnAndRow($column, $row)->getValue();
        echo $val.' ';
    }
    echo "<br />";
}


?>