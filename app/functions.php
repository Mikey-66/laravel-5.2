<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists('show')){
    function show($var, $echo = true, $label = null, $strict = true) {
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


