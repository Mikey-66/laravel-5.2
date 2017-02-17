<?php
header('Content-type:application/json; charset=utf-8');

$data = [
	['name'=>'蒲映','age'=>20, 'gender'=>'m'],
	['name'=>'任小快','age'=>18, 'gender'=>'f'],
	['name'=>'刘杰','age'=>20, 'gender'=>'m'],
	['name'=>'刘登','age'=>30, 'gender'=>'m']
];

//print_r($data);exit;
echo json_encode($data);


        











?>