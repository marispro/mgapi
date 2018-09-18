<?php
/**
This Example shows how to suppressedListBatchSubscribe using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$batch = array();
$batch[] = array('EMAIL'=>$my_email);
$batch[] = array('EMAIL'=>$boss_man_email);

$double_optin = true;
$update_existing = false;

$retval = $api->suppressedListBatchSubscribe($batch);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load suppressedListBatchSubscribe()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "success:".$retval['success_count']."\n";
	echo "errors:".$retval['error_count']."\n";
	foreach($retval['errors'] as $val){
		echo "\t*".$val['email']. " failed\n";
		echo "\tcode:".$val['code']."\n";
		echo "\tmsg :".$val['message']."\n\n";
	}
}
