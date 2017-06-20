<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
require_once('/home/ubuntu/workspace/workspace/PHPExcel/Classes/PHPExcel.php');
require_once('/home/ubuntu/workspace/workspace/PHPExcel/Classes/PHPExcel/IOFactory.php');



$page = "15-16";//這個翻譯的篇數範圍 可能為單數也可能是複數
$type = "郵輪";//通常為國名 但是也有特殊屬性
$name = "NANI";//人名
$page2 = "16";//這個EXECL真正翻譯的篇數 可能為單數也可能是複數



//$today = "【T】".$page._.$name."(".(date("Ymd"))._.$page2.'篇'.")"._.$name;//都不今日了
$today = "【T】".$page._.$name.(date("Ymd"))._.$page2.'篇'._.$name;//都不今日了
echo $today;
$data = "This 1-day all-access pass to Universal Studios Japan® provides a variety of world-class entertainment for all ages. Roam the halls of the towering Hogwarts™ castle — or fly above it during a game of quidditch — at The Wizarding World of Harry Potter™, a themed attraction based on the “Harry Potter” book and film series. Then, escape from dinosaurs and man-eating sharks on rides based on the major motion pictures “Jurassic Park” and “Jaws.” Finally, shop on Hello Kitty Fashion Avenue, or play with your favorite “Peanuts” characters at Snoopy Studio™. <br><br><strong>What we love: </strong><br>•	Universal Studios Japan® is ranked fifth among the top amusement/​theme parks in the world. <br>•	All-access pass to Universal Studios Japan®; lunch and dinner meal coupons and transportation to and from the park are included.<br>•	Namba Station, one of Osaka’s major railway stations, is within walking distance of the Hotel Monterey Grasmere Osaka. <br><br><div>Check out this DreamTrip on <strong>";
$data = strip_tags($data);//過濾 程式標籤符號
$NewString1 = preg_split("/\./", $data);
    //print_r($NewString1[0]);//第一個分割格
    //echo $NewString1;
    echo "<br>";
    $NC = count($NewString1); //小於等於使用
    

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
$sheet = $objPHPExcel->getActiveSheet();
 
//將工作表命名
$sheet->setTitle('第一張表');//第一個工作表 名稱

/*
//合併儲存格
$sheet->mergeCells('A1:D2');
 
//儲存格內容
$sheet->setCellValue('A1','PHPEXCEL TEST'); //合併後的儲存格，設定時指定左上角那個。
*/
$sheet->getColumnDimension('A')->setWidth(40); //設定欄寬
$sheet->getColumnDimension('B')->setWidth(40); //設定欄寬
$sheet->getColumnDimension('C')->setWidth(40); //設定欄寬

//$sheet->getStyle('A2')->getAlignment()->setTextRotation(-90); //旋轉文字 超沒意義XD

$sheet->setCellValue('A1','         　　 Aquaview Co. Ltd.');
$sheet->setCellValue('A2','　　         目川文化數位股份有限公司');
$sheet->setCellValue('A3','　　          Solution to Creative Learning');
$sheet->setCellValue('B4','TEST');
$sheet->setCellValue('C4','TEST');
$sheet->setCellValue('A5','URL');
$sheet->setCellValue('A6','各語言字數');
$sheet->setCellValue('A7','第幾篇');
$sheet->setCellValue('A8','代碼1');
$sheet->setCellValue('A9','代碼2');
$sheet->setCellValue('B9','TC (繁體版)');
$sheet->setCellValue('C9','SC (簡體版)');
$sheet->setCellValue('A10','文章名稱');

//設定字型(大小、粗細、顏色)  也可參照上面的方法，用陣列的方式設定。
//$sheet->getStyle('A11')->getAlignment()->setWrapText(true);//單格設定 自動換列
//接下來要寫一個 迴圈自動換列

for($i=1;$i<=$NC;$i++){
    
    $sheet->getStyle("A".($i+10))->getAlignment()->setWrapText(true);
    
}

$sheet->getStyle('B4')->getFont()->setName('Candara');
$sheet->getStyle('B4')->getFont()->setSize(16);
$sheet->getStyle('B4')->getFont()->setBold(true);
$sheet->getStyle('B4')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
$sheet->getStyle('B4')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE); //藍色
$sheet->getStyle('C4')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED); //紅色
$sheet->getStyle('C4')->getFont()->getColor()->setARGB('FF0000'); //紅色
$sheet->setCellValue('G2', $today);
$sheet->getStyle('G2')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);

//儲存格內容
for($i=1;$i<=$NC;$i++){
    
    $sheet->setCellValue("A".($i+10),$NewString1[($i-1)]);
    
}

//設定背景顏色單色
$sheet->getStyle('A10:B10')->applyFromArray(
    array('fill'     => array(
                                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                                'color' => array('argb' => 'FF5151')
         ),
         )
    );

// 存檔必須宣告的必要資訊

$filename = urlencode($today);
ob_end_clean();

$filename = $filename.'.xlsx';

header("Content-type: text/html; charset=utf-8");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=".$filename);
header("Cache-Control: max-age=0");

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save('php://output');
$objWriter->save('filename.xlsx');// 另存成指定檔名

exit;

?>