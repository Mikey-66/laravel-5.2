<?php
session_start();
require 'Identity.php';
class UserIdentity implements Identity{
    
    private $user;
    
    public static function validate($username, $password) {
        $username = mysql_real_escape_string($username);
        $sql = "select * from s_user where username='{$username}'";
        $res = mysql_query($sql);
        $user = mysql_fetch_assoc($res);

        if (!$user){
            return '用户不存在';
        }
        
        if ($user['password'] != md5($password)){
            return '密码不正确';
        }
        
        $salt = 'zfg@3d^&*ff#$zzqs@!';
        $userinfo = [
            'id' => $user['id'],
            'username' => $user['username']
        ];
        
        $auth_token = md5(base64_encode( md5(json_encode($userinfo) . $salt) ) . $salt);
        
        $_SESSION['user_username'] = $user['username'];
        $_SESSION['user_id'] = $user['id'];
        
        setcookie('user_username', $user['username'], time()+3600);
        setcookie('user_id', $user['id'], time()+3600);
        setcookie('auth_token', $auth_token, time()+3600);
        
        return true;
    }
    


    public static function logout(){
        unset($_SESSION['user_username']);
        unset($_SESSION['user_id']);
        setcookie('user_id', null, time()-100);
        setcookie('user_username', null, time()-100);
        setcookie('auth_token', null, time()-100);
    }
    
    public static function isLogin() {
        if ( isset($_SESSION['user_username']) && isset($_SESSION['user_id']) && isset($_COOKIE['user_username']) 
            && isset($_COOKIE['user_id']) && isset($_COOKIE['auth_token']) ){
            if ( $_SESSION['user_username'] == $_COOKIE['user_username'] && $_SESSION['user_id'] == $_COOKIE['user_id'] ){
                $userinfo = [
                    'id' => $_SESSION['user_id'],
                    'username' => $_SESSION['user_username']
                ];
                $salt = 'zfg@3d^&*ff#$zzqs@!';
                $auth_token = md5(base64_encode( md5(json_encode($userinfo) . $salt) ) . $salt);
                return $auth_token == $_COOKIE['auth_token'];
            }
        }
        
        return false;
    }


    public static function autoLogin() {
        if ( isset($_COOKIE['user_username']) && isset($_COOKIE['user_id']) && isset($_COOKIE['auth_token']) ){
                $userinfo = [
                    'id' => $_COOKIE['user_id'],
                    'username' => $_COOKIE['user_username']
                ];
                
                $salt = 'zfg@3d^&*ff#$zzqs@!';
                $auth_token = md5(base64_encode( md5(json_encode($userinfo) . $salt) ) . $salt);
                
                if ( $auth_token == $_COOKIE['auth_token'] ) {
                    $_SESSION['user_id'] = $_COOKIE['user_id'];
                    $_SESSION['user_username'] = $_COOKIE['user_username'];
                }
        }
    }

}

