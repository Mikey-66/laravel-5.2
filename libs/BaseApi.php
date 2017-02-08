<?php
namespace Libs;

class BaseApi {
    /**
    * 获取内容中所有图片
    * @param String $content
    */
   static function getContentImg($content){
        $arr = array();
        $tps = basename(Yii::app()->params['img_upload_dir']);

        $content = str_replace(array('&quot;', '&lt;', '&gt;'), array('"', '<', '>'), $content);
        $pat = '/<img.+src=[\'\"]?.+[\'\"]?.*>/SU';
        preg_match_all($pat, $content, $matches);

        if( isset($matches[0]) && is_array($matches[0]) ){

                $pat = '/src=[\'\"](.*)[\'\"]/SiU';
                foreach ($matches[0] as $v){
                    preg_match($pat, $v, $src);
                    $src = trim($src[1]);

                    if(strstr($src, '/'.$tps.'/')){
                            $arr[] = $src;
                    }
                }
        }
        return $arr;
     }

    /**
     * 更新图文容图片
     * @param String $content
     * @param Array/String $oldImg
     * @param Array/String $newImg
     * @return String
     */
    static function updateContentImg($content, $oldImg, $newImg){
        $content = str_replace(array('&quot;', '&lt;', '&gt;'), array('"', '<', '>'), $content);

        return str_replace($oldImg, $newImg, $content);
    }
}
