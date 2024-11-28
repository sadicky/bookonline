<?php
function getConnection()
{
	$db = new PDO("mysql:host=localhost;dbname=bookapp", "root", "");
	// $db = new PDO("mysql:host=sql308.infinityfree.com;dbname=if0_36839138_fms", "if0_36839138", "sadicky123");
	return $db;
}

 function getUserIp() {
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		return $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		return $_SERVER['REMOTE_ADDR'];
	}
}

function getUserAgent() {
	return $_SERVER['HTTP_USER_AGENT'];
}

 function getHost(){
	return gethostbyaddr(getUserIp());
}



 function setLog($action,$desc){

	 $ip =getUserIp();
	 $agent =getUserAgent();
	 $host =getHost();
   
	$db = getConnection();
	$add = $db->prepare("INSERT INTO tbl_logs (ip,agent,host,descriptions,action) VALUES (?,?,?,?,?)");
	$addline = $add->execute(array($ip,$agent,$host,$action,$desc));
	return $addline;

}


function setLogout($action,$desc,$date){

	$ip =getUserIp();
	$agent =getUserAgent();
	$host =getHost();
  
   $db = getConnection();
   $add = $db->prepare("INSERT INTO tbl_logs (ip,agent,host,descriptions,action,deconnect_at) VALUES (?,?,?,?,?,?)");
   $addline = $add->execute(array($ip,$agent,$host,$action,$desc,$date));
   return $addline;

}
