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


if (!function_exists('array_tree')){
    function array_tree($arr){
        static $tree=[];
        $obj = current($arr);
        foreach ($arr as $key => $item){
            if (!in_array($item, $tree)){
                $tree[] = $item;
            }
        }
    }
}


if (!function_exists('generateTree')){
    function generate_tree($items, $primary_key = 'id', $child_key = "pid", $child_html = "_child") {
        $tree = array();
        foreach ($items as $item) {
            if (isset($items[$item[$child_key]])) {
                $items[$item[$child_key]][$child_html][$items[$item[$primary_key]][$primary_key]] = &$items[$item[$primary_key]];
            } else {
                $tree[$items[$item[$primary_key]][$primary_key]] = &$items[$item[$primary_key]];
            }
        }
        return $tree;
    }
}


if (!function_exists('test')){
    function test($a=0){
        static $result=array();
        $a++;
        if ($a<10) {
          $result[]=$a;
          test($a);
        }
        return $result;
    }
}


