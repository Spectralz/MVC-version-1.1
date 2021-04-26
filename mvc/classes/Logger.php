<?php

namespace classes;

use Throwable;

class Logger extends \Exception
{
    public static $errorFile;
    public static $errorLine;
    public static $errorMessage;
    public static $type;


    public function __construct($type = "" , $message = "",$code = 0, Throwable $previous = null )
    {
        parent::__construct($message, $code, $previous);
        self::$errorFile = $this->getFile();
        self::$errorLine = $this->getLine();
        self::$errorMessage = $this->getMessage();
        self::$type = $type;
    }

    // catch Exceptions
    public static function log()
    {
        $time = date('d-m-Y H:i:s');
        $text_error = $time.";\t ".self::$type.": ".self::$errorMessage.";\t Line: ".self::$errorLine.";\t File: ".self::$errorFile;
        error_log($text_error.PHP_EOL, 3 , "eror_log.txt");
    }

    // catch 'Not catch' Exceoptions
    public static function traceLog($message , $trace)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $time = date('d-m-Y H:i:s');
        $text_error = $time.";\t Message: ".$message.";\t Info: ".$trace;
        error_log($text_error.PHP_EOL, 3 , "eror_fatal_log.txt");

    }

}