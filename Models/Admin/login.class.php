<?php
require_once("connexion.php");

Class Login
{

    
    public function getLogs()
    {
        $db = getConnection();
        $add = $db->prepare("SELECT * FROM tbl_logs");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }
      
    public function getLog($fdate, $tdate)
    {
        $db = getConnection();
        $add = $db->prepare("SELECT * FROM tbl_logs where created_at BETWEEN '$fdate' and '$tdate' ");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }
    
}
?>