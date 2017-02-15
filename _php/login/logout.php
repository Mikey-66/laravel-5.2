<?php
require dirname(dirname(__FILE__)) . '/helper.php';
require dirname(dirname(__FILE__)) . '/dbLink.class.php';
require dirname(dirname(__FILE__)) . '/UserIdentity.php';

$userIdentity = new UserIdentity();
$userIdentity->logout();

header('Location:login.php');
exit;

