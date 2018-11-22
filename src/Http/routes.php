<?php
/**
 * Created by PhpStorm.
 * User: 南丞
 * Date: 2018/11/21
 * Time: 15:44
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

Route::group(['prefix' => 'pfinal', 'middleware' => ['web']], function () {
    Route::get('example', '\Pfinal\PfinalWebuploader\Http\Controllers\PfinalWebuploaderController@getExample');
    Route::post('upload', '\Pfinal\PfinalWebuploader\Http\Controllers\PfinalWebuploaderController@postUploadPicture');

});