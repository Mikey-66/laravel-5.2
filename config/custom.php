<?php
/**
 * web config
 */

//include_once dirname(dirname(__FILE__)) . '/components/SetupApi.php';
//$s = ['name'=>'liujie', 'age'=>18];
//\Libs\SetupApi::setInfo('site_setup', $s);

$ini = \Libs\SetupApi::getInfo('site_setup');
$admin_custom = is_array($ini) ? $ini : [];

$df_custom = [
    
    'img_size'=>[
        'cover'=>[
            'width'=>200,
            'height'=>200
        ]
    ],
    'upload_dir'=>'uploads/temp',
    
    'hah'=>20
    
];
return array_merge($df_custom, $admin_custom);
