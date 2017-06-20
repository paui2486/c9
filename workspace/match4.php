<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
 
//如要讀取 引入讀取檔案即可
require_once('/home/ubuntu/workspace/workspace/PHPExcel/Classes/PHPExcel.php');// 輸出用
//require_once('/home/ubuntu/workspace/workspace/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');// 輸出用
require_once('/home/ubuntu/workspace/workspace/PHPExcel/Classes/PHPExcel/IOFactory.php');//讀取用

$today = (date("Ymd"));

$objPHPExcel = new PHPExcel(); //實作一個 PHPExcel

$objPHPExcel->getProperties()->setCreator("PHP") //建立者
        ->setLastModifiedBy("PHP")//上次修改
        ->setTitle("Title標題") //標題
        ->setSubject("Subject副標題")//副標題
        ->setDescription("Description說明")//說明
        ->setKeywords("Keywords關鍵字")//關鍵字
        ->setCategory("Category分類");//分類
$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true); 
//設定操作中的工作表
$objPHPExcel->setActiveSheetIndex(0); //指定目前要編輯的工作表 ，預設0是指第一個工作表
$sheetX = $objPHPExcel->getActiveSheet();

//將工作表命名
$sheetX->setTitle('第一張表');//第一個工作表 名稱

//// 這以上是存檔需要的宣告 以下是讀檔必備的資料
//檔案路徑

$inputFileName = 'filename.xlsx';
$inputFileName1 = 'FV.xlsx';

$inputFileType = PHPExcel_IOFactory::identify($inputFileName);// 讓程式自動判別副檔名
$inputFileType1 = PHPExcel_IOFactory::identify($inputFileName1);// 讓程式自動判別副檔名

$reader = PHPExcel_IOFactory::createReader($inputFileType); // 讀取2007 excel 檔案
$reader1 = PHPExcel_IOFactory::createReader($inputFileType1); // 讀取2007 excel 檔案

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
    for ($column = 0; $column <= 1; $column++) {//看你有幾個欄位 橫的
        $val = $sheet->getCellByColumnAndRow($column, $row)->getValue();
        //$val1 = $sheet1->getCellByColumnAndRow($column, $row)->getValue();
        
        // 開始比對 這是一對一 且欄位相同但是我需秋的是一對多 例如A.EXCEL的A1 比對完B.EXCEL 的A1~AXX
        if($val != null){
            
    for ($row1 = 0; $row1 <= $highestRow; $row1++) {
        for ($column1 = 0; $column1 <= 0; $column1++) {
        $val1 = $sheet1->getCellByColumnAndRow($column1, $row1)->getValue();
        
            if($val ==$val1){
               //echo $inputFileName.'欄位'.$column.$row.'等於'.$inputFileName1.'欄位'.$column1.$row1;
               $sheetX->setCellValue("D".($row),$inputFileName.'欄位'.$column.$row.'等於'.$inputFileName1.'欄位'.$column1.$row1);
            }else{
                
            }
            }
                
        }
            
        }else{
            echo '<br>';
        }
        
        
    }
    echo "<br />";
}
// 存檔必須宣告的必要資訊

$filename = urlencode($today);
ob_end_clean();

$filename = $filename.'.xlsx';

header("Content-type: text/html; charset=utf-8");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=".$filename);
header("Cache-Control: max-age=0");

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
$objWriter->save('filenameX.xlsx');// 另存成指定檔名

exit;

?>