<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
 
//引入一個檔案即可
require_once('/home/ubuntu/workspace/workspace/PHPExcel/Classes/PHPExcel.php');// 輸出用
require_once('/home/ubuntu/workspace/workspace/PHPExcel/Classes/PHPExcel/IOFactory.php');//讀取用
//檔案路徑
$inputFileName = 'filename.xls';
 
//檔案類型 (不是副檔名，而是 Excel5, Excel2007, CSV, Excel2003XML 這種字串)
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
 
/**  Create a new Reader of the type that has been identified  **/
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
 
/**  Load $inputFileName to a PHPExcel Object  **/
$objPHPExcel = $objReader->load($inputFileName);
$sheetCount = $objPHPExcel->getSheetCount();
$sheetNames = $objPHPExcel->getSheetNames();
 
$sheet = $objPHPExcel->getActiveSheet(0); //讀取第一個工作表(編號從 0 開始)
$colString = $sheet->getHighestColumn(); //最大欄位的英文代號
$highestColumns = PHPExcel_Cell::columnIndexFromString($colString); //最大欄位的數字編號。A=0, B=1, C=2....
$highestRows = $sheet->getHighestRow(); //最高行數。從1開始
 
for($s = 0; $s<$sheetCount; $s++){
    $objPHPExcel->setActiveSheetIndex($s);
    $sheet = $objPHPExcel->getActiveSheet();
    $colString = $sheet->getHighestColumn(); //最大欄位的英文代號
    $highestColumns = PHPExcel_Cell::columnIndexFromString($colString); //最大欄位的數字編號。A=0, B=1, C=2....
    $highestRows = $sheet->getHighestRow(); //最高行數。從1開始
     
    $SheetName = $sheetNames[$s];
    $excelData[$s]['SheetName'] = $SheetName;
     
    //欄位標題
    $v = null;
    for ($c = 0; $c < $highestColumns; $c++) { // 0 = A欄
        $v = trim($sheet->getCellByColumnAndRow($c, 1)->getValue());
        if(!empty($v)){
            $excelData[$s]['Titles'][] = $v;
        }
    }
     
    //資料
    $startRowNum = 2; //資料列從第2行開始。可自訂
    for ($r = $startRowNum; $r <= $highestRows; $r++) { // $r = 行數
        $i = $r-$startRowNum; // $i = 第1維陣列索引
        for ($c = 0; $c < 2; $c++) { //$c = 第2維陣列 = 欄位編號
            $v = trim($sheet->getCellByColumnAndRow($c, $r)->getValue());
            if(!empty($v)){
                $excelData[$s]['Data'][$i][$c] = $v;
            }
        }
    }
     
     
}
echo "<pre>",print_r($excelData,1),"</pre>";
 
//寫入檔案
$filename = $SheetName . ".txt"; //檔案名稱
$fp = @fopen("$filename","w+"); //開啟檔案，要是沒有檔案將建立一份
foreach($excelData[$s]['Data'] as $row){
    $str = '"' . $row[0] . '"' . ':"' . $row[1] . '"' . "\r\n";
    fputs($fp, $str);
}
fclose($fp); //關閉檔案