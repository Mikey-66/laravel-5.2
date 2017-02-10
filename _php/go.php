<?php
require 'helper.php';
$host = "127.0.0.1";
$dbName = "laravel5";
$username = "root";
$password = "123456";

$link = @mysql_connect($host, $username, $password) or die('can not link to mysql : ' . mysql_error());
mysql_select_db($dbName) or die('can not select db : ' . mysql_error());

//function getCate($pid){
//    $sql = "select * from category where pid ={$pid}";
//    $resource = mysql_query($sql);
//    $result = [];
//    while ($row = mysql_fetch_assoc($resource)){
//        $result[] = $row;
//    }
//    return $result;
//}
//
//$run1 = getCate(13);
//
//dump($run1);exit;

function sourceCate($pid, &$result){
    static $count=0;
    $count++;
    dump($count);
    $sql = "select * from category where pid ={$pid}";
    $resource = mysql_query($sql);
    while ($row = mysql_fetch_assoc($resource)){
        $row['son'] = sourceCate($row['id'], $result);
        $result[] = $row;
    }
    
    return $result;
}
$result = [];
$data = sourceCate(0, $result);

dump($data);
