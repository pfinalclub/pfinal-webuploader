<?php


function pf_css()
{
    return '<!--webuploader css--><link rel="stylesheet" type="text/css" href="/vendor/pfinalWebuploader/dist/webuploader.css"><!--pf_style css--><link href="https://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"><link rel="stylesheet" type="text/css" href="/vendor/pfinalWebuploader/dist/css/pf_style.css">';
}


function pf_js($option = [])
{
    if (count($option) <= 0) {
        return '<script type="text/javascript">window.jQuery || document.write(unescape("%3Cscript%20type%3D%22text/javascript%22%20src%3D%22//cdn.bootcss.com/jquery/3.2.1/jquery.min.js%22%3E%3C/script%3E"));</script><script type="text/javascript" src="/vendor/pfinalWebuploader/dist/webuploader.js"></script><script  src="/vendor/pfinalWebuploader/dist/pf_web.js"></script>';
    } else {
        $js_list = '<script type="text/javascript">window.jQuery || document.write(unescape("%3Cscript%20type%3D%22text/javascript%22%20src%3D%22//cdn.bootcss.com/jquery/3.2.1/jquery.min.js%22%3E%3C/script%3E"));</script>';
        foreach ($option as $item) {
            if (file_exists(public_path('/vendor/pfinalWebuploader/dist/webuploader.' . $item . '.js'))) {
                $js_list .= '<script type="text/javascript" src="/vendor/pfinalWebuploader/dist/webuploader.' . $item . '.js"></script>';
            } else {
                return '<span class="btn btn-success">参数传递有误</span>';
            }
        }
        return $js_list;
    }
}

function pf_field($el = '')
{
    # 给 $el 这个节点添加视图
    $html = <<<PF
    <div id="wrapper"><div id="container"><div id="uploader"><div class="queueList"><div id="dndArea" class="placeholder"><div id="filePicker"></div><p>或将照片拖到这里，单次最多可选300张</p></div></div><div class="statusBar" style="display:none;"><div class="progress"><span class="text">0%</span><span class="percentage"></span></div><div class="info"></div><div class="btns"><div id="filePicker2"></div><div class="uploadBtn">开始上传</div></div></div></div></div></div>
PF;
    if ($el) {
        $script = "<script>$('$el').append('$html')</script>";
    } else {
        $script = "<script>$(body).append('$html')</script>";
    }
    return $script;

}