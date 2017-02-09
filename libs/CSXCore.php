<?php
namespace Libs;

class CSXCore {
    
    static function list_to_tree_recursion($list, $pk, $pid, $child = '_child', $root = 0) {
        // 创建Tree
        $tree = array();
        if (is_array($list)) {
            // 创建基于主键的数组引用
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] = & $list[$key];
            }
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId = $data[$pid];
                if ($root == $parentId) {
                    $tree[] = & $list[$key];
                } else {
                    if (isset($refer[$parentId])) {
                        $parent = & $refer[$parentId];
                        $parent[$child][] = & $list[$key];
                    }
                }
            }
        }
        return $tree;
    }
    
    static function generate_tree($items, $primary_key = 'id', $child_key = "pid", $child_html = "_child") {
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
    
    static function tree($arr,$pid=0,$lev=0){
        static $list = array();
        foreach($arr as $v){
            if($v['pid']==$pid){
                $list[] = $v;
                self::tree($arr,$v['id'],$lev+1);
            }
        }
        return $list;
    }
}

