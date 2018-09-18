<?php
/**
This Example shows how to campaignBounceMessages using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$cid = $campaignId;
$start = 0;
$limit = 25;

$retval = $api->campaignBounceMessages($cid, $start, $limit);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load campaignBounceMessages()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "Messages returned: ". sizeof($retval). "\n";
	foreach($retval as $msg){
        echo $msg['date']." - ".$msg['email']."\n";
        echo substr($msg['message'],0,150)."\n\n";
    }
}