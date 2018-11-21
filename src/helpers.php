<?php
/**
 * Created by PhpStorm.
 * User: 运营部
 * Date: 2018/11/21
 * Time: 16:25
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


function pfw_css()
{
    return '<!--wangEditor css--><link rel="stylesheet" type="text/css" href="/vendor/pfinal/pfinalWebuploader/dist/webuploader.css">';
}

function pfw_js($using_min = true)
{
    if ($using_min) {
        return '<script type="text/javascript">
    window.jQuery || document.write(unescape("%3Cscript%20type%3D%22text/javascript%22%20src%3D%22//cdn.bootcss.com/jquery/3.2.1/jquery.min.js%22%3E%3C/script%3E"));
</script>
<!--wangEditor js-->
<script type="text/javascript" src="/vendor/pfinal/pfinalWebuploader/dist/webuploader.js"></script>';
    } else {
        return '<script type="text/javascript">
    window.jQuery || document.write(unescape("%3Cscript%20type%3D%22text/javascript%22%20src%3D%22//cdn.bootcss.com/jquery/3.2.1/jquery.min.js%22%3E%3C/script%3E"));
</script>
<!--wangEditor js-->
<script type="text/javascript" src="/vendor/pfinal/pfinalWebuploader/dist/webuploader.js"></script>';
    }
}