<?php
namespace Libs;

class CSXCore {
    /**
     * 返回数组中某一元素为主键的一个新数组
     * @param type $result 输入数组
     * @param type $field  新数组的键   需要是唯一的值，否则会造成数据丢失
     * @return type
     */
    static function set_array_key($result, $field = 'id') {
        if (!is_array($result) || count($result) <= 0)
            return array();
        $list = array();
        foreach ($result as $key => $val) {
            $list[$val[$field]] = $val;
        }
        return $list;
    }
    
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
    
    /**
     * 递归无限级分类【先序遍历算】，获取任意节点下所有子孩子
     * @param array $arrCate 待排序的数组
     * @param int $parent_id 父级节点
     * @param int $level 层级数
     * @return array $arrTree 排序后的数组
     */
    static function getMenuTree($arrCat, $parent_id = 0, $level = 0)
    {
        static  $arrTree = array(); //使用static代替global
        
        if(empty($arrCat)) return false;
        $level++;
        foreach($arrCat as $key => $value)
        {
            if($value['pid' ] == $parent_id)
            {
                $value[ 'level'] = $level;
                $arrTree[] = $value;
                unset($arrCat[$key]); //注销当前节点数据，减少已无用的遍历
                self::getMenuTree($arrCat, $value[ 'id'], $level);
            }
        }

        return $arrTree;
    }
}

