<?php
/**
* 浏览器友好的变量输出
* @param mixed $var 变量
* @param boolean $echo 是否输出 默认为True 如果为false 则返回输出字符串
* @param string $label 标签 默认为空
* @param boolean $strict 是否严谨 默认为true
* @return void|string
*/
if (!function_exists('dump')){
    
    function dump($var, $echo = true, $label = null, $strict = true) {
       
    static $has_dump;

    if(!$has_dump){
        header('Content-Type:text/html; charset=utf-8');
    }

    $has_dump = true;

    $label = ($label === null) ? '' : rtrim($label) . ' ';
    
    if (!$strict) {
        if (ini_get('html_errors')) {
            $output = '<pre>' . $label . htmlspecialchars(print_r($var, true), ENT_QUOTES) . '</pre>';
        } else {
            $output = '<pre>' . $label . print_r($var, true) . '</pre>';
        }
    } else {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        if (!extension_loaded('xdebug')) {
            $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        }
    }
    
    if ($echo) {
        echo($output);
        return null;
    } else
        return $output;
    }
}

