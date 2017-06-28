<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

class Database //DB
{
    private static $dbName = 'c9' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'paui';
    private static $dbUserPassword = '28835328';
     
    private static $cont  = null;//清除狀態
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName.";"."charset=utf8", self::$dbUsername, self::$dbUserPassword);  //charset
          

        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}

?>