<?php
/**
 * Created by PhpStorm.
 * User: 运营部
 * Date: 2018/11/21
 * Time: 15:45
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

namespace Pfinal\PfinalWebuploader\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PfinalWebuploaderController extends Controller
{
    public function getExample()
    {
        //return 123;
        //return view('pfinal-uploader::example');
        if (config('app.debug', false)) {
            return view('pfinal-webuploader::example');
        } else {
            return 'You can see the example page only in DEBUG mode!';
        }
    }
}