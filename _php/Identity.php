<?php

interface Identity{
    
public static function validate($username, $password);
    
public static function logout();

public static function isLogin();

public static function autoLogin();
    
}
