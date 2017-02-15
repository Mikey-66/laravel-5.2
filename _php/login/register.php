<?php
require dirname(dirname(__FILE__)) . '/helper.php';
require dirname(dirname(__FILE__)) . '/dbLink.class.php';

if (!session_start()){
    exit('session 启动失败');
}

if (isset($_POST['submit']) && $_POST['submit'] =='submit'){
//    echo '用户提交了表单';
//    exit;
    
    if ($_POST['username'] ===''){
        exit('请填写用户名');
    }
    
    if ($_POST['password'] ===''){
        exit('请填写密码');
    }
    
    if ($_POST['password_confirm'] ===''){
        exit('请填写确认密码');
    }
    
    if ($_POST['password'] !==  $_POST['password_confirm']){
        exit('两次密码不一致');
    }
    
    dbLink::getInstance()->connect();   //  连接数据库
    
    $sql = sprintf("select * from s_user where username = '%s'", mysql_real_escape_string($_POST['username']));
    
    if ( mysql_fetch_assoc(mysql_query($sql)) ){
        exit('用户名已存在');
    }
    
    $password = md5($_POST['password']);
    $created_at = date('Y-m-d H:i:s');
    $username = mysql_real_escape_string($_POST['username']);
    
    $sql = vsprintf("INSERT INTO s_user(username, password, created_at) VALUES('%s', '%s', '%s')", [
        $username, $password, $created_at
    ]);
    
    if (!mysql_query($sql)){
        exit('注册失败:' . mysql_error());
    }
    
    echo '注册成功, 3秒后跳转个人登录页面...';
    header('Location: login.php');
    exit;
}


// 客户端 cookies 
//setcookie('user', 'xiaoK', time()+3600*24*30);
//setcookie('age', '18', time()+3600*24*30);


$html = file_get_contents('register.html');
echo $html;
