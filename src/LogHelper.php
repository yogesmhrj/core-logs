<?php

include __DIR__."/config.php";

class LogHelper{

	private static $__LOG_PATH = __DIR__."/../";

	private static $__LOG_DIR = "core-logs";

	private static $__LOG_FILE = "log.txt";


	private static function getFileLocation(){

		$logDir = self::$__LOG_PATH.self::$__LOG_DIR;

		if(!file_exists($logDir)){
			mkdir($logDir,0777);
		}

		return $logDir."/".self::$__LOG_FILE;

	}

	private static function openFile(){

		$logFile = self::getFileLocation();

		return fopen($logFile,"a+");

	}

	private static function log($type,$message){

		$date = date("Y-m-d H:i:s");

		$file = self::openFile();

		fwrite($file,"[||".$date."||]".$type."|".$message."\n\n");

		fclose($file);
	}

	public static function error($message){

		self::log("error",$message);

	}

	public static function debug($message){

		self::log("debug",$message);

	}

	public static function info($message){

		self::log("info",$message);

	}

	public static function get(){

		$fileContents = file_get_contents(self::getFileLocation());

		$logLines = explode("[||",$fileContents);

		$logArray = [];	

		foreach($logLines as $logLine){

			$logParts = explode("||]",$logLine);

			if(count($logParts) == 2){

				$logData = explode("|",$logParts[1]);

				$logArray[] = [
					'date' => $logParts[0],
					'type' => $logData[0],
					'message' => $logData[1]
				];
			}

		}

		return $logArray;

	}

}