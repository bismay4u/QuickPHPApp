<?php
if(!defined('ROOT')) exit('No direct script access allowed');

if(!function_exists("printArray")) {
	function printArray($obj) {
		return printObj($obj);
	}
	function printObj($obj) {
		if(is_array($obj)) {
			echo "<pre>";
			print_r($obj);
			echo "</pre>";
		} else {
			echo "<p>{$obj}</p>";
		}
	}
	
	function getConfig($cfg) {
		$cfg=explode(".", $cfg);
		if(count($cfg)<2) return "";

		if(isset($_SESSION['JSONCONFIG']) && isset($_SESSION['JSONCONFIG'][$cfg[0]]) && isset($_SESSION['JSONCONFIG'][$cfg[0]][$cfg[1]])) {
			return $_SESSION['JSONCONFIG'][$cfg[0]][$cfg[1]];
		}
		return "";
	}
	
	function loadJSONConfig($configName,$forceReload=false) {
	    $cfgData=array();
	    
	    if($forceReload && isset($_SESSION['JSONCONFIG'][$configName])) unset($_SESSION['JSONCONFIG'][$configName]);
	
	    if(isset($_SESSION['JSONCONFIG'][$configName])) {
	    	$cfgData=$_SESSION['JSONCONFIG'][$configName];
	    } else {
	    	$f=ROOT."{$configName}.json";
			if(file_exists($f)) {
				$data=file_get_contents($f);
				if(strlen($data)>2) {
					$json=json_decode($data,true);
					$fData=array();
					if(isset($json['GLOBALS'])) {
						$fData[]=$json['GLOBALS'];
					}
					if(defined("SITENAME") && isset($json[SITENAME])) {
						$fData[]=$json[SITENAME];
					}
					for ($i=1; $i <count($fData) ; $i++) {
						$fData[0]=array_merge($fData[0],$fData[$i]);
					}
					$cfgData=$fData[0];
					$_SESSION['JSONCONFIG'][$configName]=$cfgData;
				}
			} else {
		      trigger_error("$configName configuration not found, Error In Installation.", E_USER_ERROR);
		    }
	    }
		return $cfgData;
	  }
	
	//Used Generally To Convert UserFormatted Dates To DB Formatted (Y/m/d) dates
	function _date($date=null, $inFormat="*", $outFormat="Y/m/d") {
		if($date=="0000-00-00") return "0000-00-00";
		if($date==null || strlen($date)<=0) return "";
		if($inFormat=="*" || $inFormat=="")  $inFormat="d/m/Y";

		if($inFormat==$outFormat) return $date;

		$dArr=array("d"=>"","m"=>"","Y"=>"","y"=>"","n"=>"","M"=>"","F"=>"");
		$months=array(
				1=>"Jan",2=>"Feb",3=>"Mar",4=>"Apr",
				5=>"May",6=>"Jun",7=>"Jul",8=>"Aug",
				9=>"Sept",10=>"Oct",11=>"Nov",12=>"Dec",
			);
		$monthsFull=array(
				1=>"January",2=>"February",3=>"March",4=>"April",
				5=>"May",6=>"June",7=>"July",8=>"August",
				9=>"September",10=>"October",11=>"November",12=>"December",
			);
		$days=array(
				1=>"Mon",2=>"Teu",3=>"Wed",4=>"Thu",
				5=>"Fri",6=>"Sat",7=>"Sun"
			);
		$daysFull=array(
				1=>"Monday",2=>"Teusday",3=>"Wednesday",4=>"Thursday",
				5=>"Friday",6=>"Saturday",7=>"Sunday"
			);

		$outFormat=str_replace("yy","Y",$outFormat);
		$inFormat=str_replace("yy","Y",$inFormat);

		$dateArr=preg_split("/[\s,:\/]+/",$date);
		$inFormatArr=preg_split("/[\s,:\/]+/",$inFormat);
		$dateStore=array();
		if(count($inFormatArr)!=count($dateArr)) {
			return false;
		}
		foreach($inFormatArr as $key => $value) {
			$dateStore[$value]=$dateArr[$key];
		}
		$dateStore["n"]=intval($dateStore["m"]);
		$dateStore["j"]=intval($dateStore["d"]);
		//$dateStore["D"]=$days[floor($dateStore["j"]%7)];
		$dateStore["M"]=$months[$dateStore["n"]];
		$dateStore["F"]=$monthsFull[$dateStore["n"]];
		$dateStore["y"]=substr($dateStore["Y"], 2);

		$dateStore["w"]=date("w",strtotime("{$dateStore["Y"]}/{$dateStore["m"]}/{$dateStore["d"]}"));
		$dateStore["W"]=date("W",strtotime("{$dateStore["Y"]}/{$dateStore["m"]}/{$dateStore["d"]}"));
		$dateStore["l"]=$days[$dateStore["w"]];
		$dateStore["L"]=$daysFull[$dateStore["w"]];

		$a=preg_split("/[\s,:\/]+/",$outFormat);
		$out=$outFormat;
		foreach($a as $w) {
			$out=str_replace($w, $dateStore[$w], $out);
		}
		return $out;
	}
}
?>
