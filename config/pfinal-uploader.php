<?php
/**
 * Created by PhpStorm.
 * User: 南丞
 * Date: 2018/11/21
 * Time: 15:41
 *
 *
 *                      _ooOoo_
 *                     o8888888o
 *                     88" . "88
 *                     (| ^_^ |)
 *                     O\  =  /O
 *                  ____/`---'\____
 *                .'  \\|     |//  `.
 *               /  \\|||  :  |||//  \
 *              /  _||||| -:- |||||-  \
 *              |   | \\\  -  /// |   |
 *              | \_|  ''\---/''  |   |
 *              \  .-\__  `-`  ___/-. /
 *            ___`. .'  /--.--\  `. . ___
 *          ."" '<  `.___\_<|>_/___.'  >'"".
 *        | | :  `- \`.;`\ _ /`;.`/ - ` : | |
 *        \  \ `-.   \_ __\ /__ _/   .-` /  /
 *  ========`-.____`-.___\_____/___.-`____.-'========
 *                       `=---='
 *  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
 *           佛祖保佑       永无BUG     永不修改
 *
 */


return [
    /** 服务端配置 **/
    'server' => [
        'upload_img_server' => '/pfinal/example/upload',
        'upload_img_mode' => [
            'oss' => [
                "WEB_URL" => "",
                "SUCCESS" => 0,
                "ERROR" => -1,
                "OSSKEYID" => "",
                "OSSKEYSECRET" => "",
                "OSSBUCKET" => "",
            ],
            'local' => [
                "filename"=>date('Y/m/d',time())
            ]
        ],
        'upload_type'=>'local'
    ],


    /** 视图层配置 **/
    'view' => [
        'type_view' => 2,
        'automatic_upload' => true,
        'thumbnail'=>[

        ]
    ]
];