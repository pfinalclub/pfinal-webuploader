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
use Illuminate\Support\Facades\Storage;

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

    public function postUploadPicture(Request $request)
    {
        $res = '';
        $upload_type = config('pfinal-uploader.server.upload_type', 'local');
        switch ($upload_type) {
            case 'local':
                $res = $this->_set_local_uploader($request);
                break;
        }
        if ($res) {
            return response()->json(['code' => 200, 'msg' => '上传成功', 'data' => $res]);
        }
        return response()->json(['code' => 200, 'msg' => '上传失败', 'data' => $res]);
    }

    private function _set_local_uploader($request)
    {
        $local = config('pfinal-uploader.server.upload_img_mode.local');
        if ($request->isMethod('post')) {
            $file = $request->file('file');
            //dd($file);
            if ($file->isValid()) {
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $type = $file->getClientMimeType();     // image/jpeg
                //TODO 文件类型做过滤

                $filename = isset($local['filename']) ? $local['filename'] . '/' . uniqid() . '.' . $ext : date('Y/m/d/ H-i-s') . '-' . uniqid() . '.' . $ext;
                $filePath = isset($local['filePath']) ?: 'uploads';
                $res = Storage::putFileAs($filePath, $file, $filename);
                if ($res) {
                    return $res;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}