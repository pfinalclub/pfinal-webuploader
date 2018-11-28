<?php


function pf_css()
{
    return '<!--webuploader css--><link rel="stylesheet" type="text/css" href="/vendor/pfinalWebuploader/dist/webuploader.css"><!--pf_style css--><link href="https://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"><link rel="stylesheet" type="text/css" href="/vendor/pfinalWebuploader/dist/css/pf_style.css">';
}

function pf_js($option = [])
{
    if (count($option) <= 0) {
        return '<script type="text/javascript">window.jQuery || document.write(unescape("%3Cscript%20type%3D%22text/javascript%22%20src%3D%22//cdn.bootcss.com/jquery/3.2.1/jquery.min.js%22%3E%3C/script%3E"));</script><script type="text/javascript" src="/vendor/pfinalWebuploader/dist/webuploader.js"></script>';
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
    $type = config('pfinal-uploader.view.type_view', 2);
    switch ($type) {
        case 1:
            $html = <<<PF_1
    <div id="wrapper"><div id="container"><div id="uploader"><div class="queueList"><div id="dndArea" class="placeholder"><div id="filePicker"></div><p>或将照片拖到这里，单次最多可选300张</p></div></div><div class="statusBar" style="display:none;"><div class="progress"><span class="text">0%</span><span class="percentage"></span></div><div class="info"></div><div class="btns"><div id="filePicker2"></div><div class="uploadBtn">开始上传</div></div></div></div></div></div>
PF_1;
            break;
        case 2:
            $html = <<<PF_2
<div id="picker">选择文件</div><div class="queueList"></div>
PF_2;
            break;
    }
    if ($el) {
        $script = "<script>$('$el').append('$html')</script>";
    } else {
        $script = "<script>$(body).append('$html')</script>";
    }
    return $script;
}

function pf_config($option = [], $el = "#picker", $callback = '')
{
    $type_view = config('pfinal-uploader.view.type_view', 2);
    $upload_img_server = config('pfinal-uploader.server.upload_img_server', '/pfinal/example/upload');
    switch ($type_view) {
        case 1:
            $result = _set_uploader_to($el, $upload_img_server, $option, $callback);
            break;
        case 2:
            $result = _set_uploader($el, $upload_img_server, $option, $callback);
            break;
    }
    return $result;
}


function _set_uploader($el, $upload_img_server, $option, $callback)
{
    $accept = config('pfinal-uploader.view.accept', '');
    $thumb = config('pfinal-uploader.view.thumb', '');
    $auto = config('pfinal-uploader.view.automatic_upload', false);
    $multiple = config('pfinal-uploader.view.multiple', false);
    $fileNumLimit = config('pfinal-uploader.view.fileNumLimit', 300);
    $token = csrf_token();
    $thumbnail = config('pfinal-uploader.view.thumbnail', []);

    $script = "
    <script type='text/javascript'>
    var uploader = WebUploader.create({
        swf:'/vendor/pfinalWebuploader/dist/Uploader.swf',
        server:'$upload_img_server',
        auto:'$auto',
        formData :{
            _token :\"{$token}\"
        },
        ";
    $script .= "pick:{id:'$el',multiple:'$multiple'},";
    $script .= "fileNumLimit:$fileNumLimit,";
    if ($accept) {
        $script .= "accept:'$accept'";
    }
    $script .= " });";
    $operation = ['display', 'delete', 'progress', 'error'];
    $display = $delete = $progress = $error = false;
    if (count($option) > 0) {
        foreach ($option as $item) {
            if (!in_array($item, $operation)) {
                echo('<span style="color: red;font-size: 12px;">参数传递错误,暂未提供服务</span>');
                break;
            }
            $$item = true;
        }
    }
    if ($display) {
        $script .= "
uploader.on( 'fileQueued', function( file ) {
    var li = $(
            '<div id=\"' + file.id + '\" class=\"file-item thumbnail image_list \">";
        if ($delete) {
            $script .= "<div class=\"operation_page\"><span class=\"upload_reset\"><i class=\"fa fa-trash-o\"></i></span></div>";
        }
        $script .= "<img>' +
            '</div>'
            ),img = li.find('img');$(\".queueList\").append( li );
 uploader.makeThumb( file, function( error, src ) {
        if ( error ) {
            img.replaceWith('<span>不能预览</span>');
            return;
        }
        img.attr( 'src', src );
    },";
        if (count($thumbnail) > 0) {
            $script .= "" . $thumbnail['thumbnailWidth'] . "," . $thumbnail['thumbnailHeight '] . ");});";
        } else {
            $script .= "110, 110 );";
        }
    }
    if ($delete) {
        $script .= 'del_img(file);' . _del_img();
    }
    $script .= "});";
    $script .= _set_value($callback);
    $script .= '</script > ';
    return $script;
}

function _set_value($callback = "")
{
    $html = "
uploader.on('uploadSuccess', function (file, response) {
console.log(response)
            if (response.code == 200) {
                $(\"#\" + file.id).attr('data_val', response.data);
                //del_img(file);
            ";
    if (!$callback) {
        $html .= $callback . "(file)";
    }

    $html .= "} else {
                $('#' + file.id).remove();
            }
        });
";
    return $html;
}


function _del_img()
{
    $script = "function del_img(file) {
            $(\"#\" + file.id + \"  .upload_reset\").on('click', function () {
                uploader.removeFile(file);
                var _index = $(this);
                // console.log($(this).parent().attr('data_val'))
                var img_name = $(this).parent().parent().attr('data_val');
                ";
    //TODO ajax 删除服务器上上传的图片
    $script .= "_index.parent().parent().remove() })}";
    return $script;
}

function _set_uploader_to($el, $upload_img_server, $option, $callback)
{
    $token = csrf_token();
    $script = file_get_contents(public_path('/vendor/pfinalWebuploader/dist/pf_web.js'));
    $script = preg_replace('/server:(.*),/U', "server:'$upload_img_server',", $script);
    $script = preg_replace('/_token:(.*),/U', "_token:'$token',", $script);
    //dd($script);
    return '<script>' . $script . '</script>';
}