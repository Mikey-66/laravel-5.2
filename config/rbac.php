<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



return [
    
    /*
    |--------------------------------------------------------------------------
    | Roles 角色
    |--------------------------------------------------------------------------
    |
    */
    
    'roles' => [
        [
            'name' => 'admin',
            'display_name' => '超级管理员',
            'description' => '后台最高权限用户',
        ],
        
        [
            'name' => 'editor',
            'display_name' => '编辑',
            'description' => '内容编辑人员',
        ],
        
    ],
    
    
    'permissions' => [
        'article' =>[
            'alias' => '文章管理',
            'actions' => [
                'index' => '文章列表', 'add' => '添加文章'
            ]
        ],
        
        'goods' =>[
            'alias' => '商品管理',
            'actions' => [
                'index' => '商品列表', 'add' => '添加商品'
            ]
        ]
    ]
    
    
];