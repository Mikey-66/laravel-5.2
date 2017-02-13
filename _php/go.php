<?php
require 'helper.php';
$host = "127.0.0.1";
$dbName = "laravel";
$username = "root";
$password = "111111";

$link = @mysql_connect($host, $username, $password) or die('can not link to mysql : ' . mysql_error());
mysql_select_db($dbName) or die('can not select db : ' . mysql_error());
//mysql_query("SET NAMES 'utf8'");
mysql_set_charset('utf8');

function sourceCate($pid, $level=0){
    static $result=[];
    $level++;
    $sql = "select * from category where pid ={$pid}";
    $resource = mysql_query($sql);
    while ($row = mysql_fetch_assoc($resource)){
//        dump($row);exit;
        $row['show_name'] = str_repeat('&nbsp;', $level*2) . '|--' . $row['name'];
        $row['level'] = $level;
        $result[] = $row;
        sourceCate($row['id'], $level);
    }
    return $result;
}

/**
 * 获取子孙树
 * @param   array        $data   待分类的数据
 * @param   int/string   $id     要找的子节点id
 * @param   int          $lev    节点等级
 */
 function getSubTree($data , $id = 0 , $lev = 0) {
     static $son = array();

     foreach($data as $key => $value) {
         if($value['pid'] == $id) {
             $value['lev'] = $lev;
             $son[] = $value;
             getSubTree($data , $value['id'] , $lev+1);
         }
     }

     return $son;
 }
 
 $sql = "select * from category";
 $res = mysql_query($sql, $link);
 $result = [];
 while($row = mysql_fetch_assoc($res)){
    $result[] = $row;
 }
 
$data = getSubTree($result);
dump($data);exit;

