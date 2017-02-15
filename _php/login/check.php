<?php
require dirname(dirname(__FILE__)) . '/helper.php';
require dirname(dirname(__FILE__)) . '/dbLink.class.php';
require dirname(dirname(__FILE__)) . '/UserIdentity.php';

$instance = dbLink::getInstance();
$instance->connect();
$link = $instance->getLink();

$username = $_POST['username'];
$password = $_POST['password'];

$userIdentity = new UserIdentity();
$res = $userIdentity->validate($username, $password);

if ($res !==true){
    exit('登录失败' . $res);
}

echo '验证成功, 3秒后跳转个人登录页面...';
header("refresh:3;url=usercenter.php");
exit;

//header('Location: usercenter.php');
//exit;















