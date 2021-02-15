<?php

namespace StoreChain\Entity;

class Logger
{
    private static $logger = null;
    private $fileHandle;

    private function __construct()
    {
        $this->fileHandle = fopen('StoreChain_'.date('d-m-Y').'.txt', 'w');
    }

    public function writeLog($message)
    {
        $date = date('d/m/Y H:i:s');
        fwrite($this->fileHandle, "[$date]: $message\n");
    }

    public static function getLogger()
    {
        if (self::$logger === null) {
            self::$logger = new Logger();
        }
        return self::$logger;
    }

}