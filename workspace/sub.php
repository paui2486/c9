<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//require_once('../PHPExcel/Classes/PHPExcel.php');require_once('../PHPExcel/Classes/PHPExcel/IOFactory.php');

//$objPHPExcel = new PHPExcel(); //實作一個 PHPExcel

$data = "This 1-day all-access pass to Universal Studios Japan® provides a variety of world-class entertainment for all ages. Roam the halls of the towering Hogwarts™ castle — or fly above it during a game of quidditch — at The Wizarding World of Harry Potter™, a themed attraction based on the “Harry Potter” book and film series. Then, escape from dinosaurs and man-eating sharks on rides based on the major motion pictures “Jurassic Park” and “Jaws.” Finally, shop on Hello Kitty Fashion Avenue, or play with your favorite “Peanuts” characters at Snoopy Studio™. <br><br><strong>What we love: </strong><br>•	Universal Studios Japan® is ranked fifth among the top amusement/​theme parks in the world. <br>•	All-access pass to Universal Studios Japan®; lunch and dinner meal coupons and transportation to and from the park are included.<br>•	Namba Station, one of Osaka’s major railway stations, is within walking distance of the Hotel Monterey Grasmere Osaka. <br><br><div>Check out this DreamTrip on <strong>";
$data2 =' {
    "glossary": {
        "title": "example glossary",
		"GlossDiv": {
            "title": "S",
			"GlossList": {
                "GlossEntry": {
                    "ID": "SGML",
					"SortAs": "SGML",
					"GlossTerm": "Standard Generalized Markup Language",
					"Acronym": "SGML",
					"Abbrev": "ISO 8879:1986",
					"GlossDef": {
                        "para": "A meta-markup language, used to create markup languages such as DocBook.",
						"GlossSeeAlso": ["GML", "XML"]
                    },
					"GlossSee": "markup"
                }
            }
        }
    }
} ';
$data3 ='<glossary><title>example glossary</title>
  <GlossDiv><title>S</title>
   <GlossList>
    <GlossEntry ID="SGML" SortAs="SGML">
     <GlossTerm>Standard Generalized Markup Language</GlossTerm>
     <Acronym>SGML</Acronym>
     <Abbrev>ISO 8879:1986</Abbrev>
     <GlossDef>
      <para>A meta-markup language, used to create markup
languages such as DocBook.</para>
      <GlossSeeAlso OtherTerm="GML">
      <GlossSeeAlso OtherTerm="XML">
     </GlossDef>
     <GlossSee OtherTerm="markup">
    </GlossEntry>
   </GlossList>
  </GlossDiv>
 </glossary>';
 
 
$data4 = "123<Br>46<BR>789" ;
$data5 = '<span style="font-family: Arial;">This 1-day all-access pass to Universal Studios Japan® provides a variety of world-class entertainment for all ages. Roam the halls of the towering Hogwarts™ castle — or fly above it during a game of quidditch — at The Wizarding World of Harry Potter™, a themed attraction based on the “Harry Potter” book and film series. Then, escape from dinosaurs and man-eating sharks on rides based on the major motion pictures “Jurassic Park” and “Jaws.” Finally, shop on Hello Kitty Fashion Avenue, or play with your favorite “Peanuts” characters at Snoopy Studio™. <br><br><strong>What we love: </strong><br>•	Universal Studios Japan® is ranked fifth among the top amusement/​theme parks in the world. <br>•	All-access pass to Universal Studios Japan®; lunch and dinner meal coupons and transportation to and from the park are included.<br>•	Namba Station, one of Osaka’s major railway stations, is within walking distance of the Hotel Monterey Grasmere Osaka. <br><br><div>Check out this DreamTrip on <strong><a href="https://www.facebook.com/​events/​1712762308975070/" target="_blank">Facebook</a></strong>.</div><br><br><strong>This trip will close by June 10. </strong></span><br>';
 
 // data 想辦法分段
 // data 清除 JSON TAG
 // data 清除 XML TAG
    echo $data5;
    echo "高清未處理".'<br>';
    echo '<br>';
 //根據空格切開
    $data5 = strip_tags($data5);//過濾 程式標籤符號
    
    print_r($data5);
    echo '<br>';
    echo "高清以處理".'<br>';
     echo '<br>';
    // $NewString1 = preg_split("/[\s,]+/", $data5);// 過濾空白
     $NewString1 = preg_split("/\./", $data5);// 過濾.
    print_r($NewString1);
    echo '<br>';
    echo "完整處理".'<br>';
    echo '<br>';
    

    echo "<br>";
    echo count($NewString1);
    
    /*$content = '<strong>Lorem ipsum dolor</strong> sit <img src="test.png" />amet <span class="test" style="color:red">consec<i>tet</i>uer</span>';
    $chars = preg_split('/<[^>]*[^\/]>/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
    print_r($chars);*/
    
    /*function spacify($camel, $glue = ' ') {
    return preg_replace( '/([a-z0-9])([A-Z])/', "$1$glue$2", $camel );
    }

    echo spacify('CamelCaseWords'), '<br>'; // 'Camel Case Words'
    
    echo spacify('IamAmGod'), '<br>'; // 'Camel Case Words'
   
    echo spacify('camelCaseWords'), "\n\n"; // 'camel Case Words'
    */
    
    /*
    $search_expression = "apple bear \"Tom Cruise\" or 'Mickey Mouse' another word ";
    $words = preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", $search_expression, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
    print_r($words);
    */
    
 //echo $data4 ;
    
?>