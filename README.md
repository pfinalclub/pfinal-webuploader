# webuploader for Laravel

> `pfinal-webuploader` 基于webuploader 封装的 laravel上传图片扩展包， 轻量、简洁、易用、开源免费。

[![Latest Stable Version](https://poser.pugx.org/nancheng/pfinal-webuploader/v/stable)](https://packagist.org/packages/nancheng/pfinal-webuploader)
[![Total Downloads](https://poser.pugx.org/nancheng/pfinal-webuploader/downloads)](https://packagist.org/packages/nancheng/pfinal-webuploader)
[![Latest Unstable Version](https://poser.pugx.org/nancheng/pfinal-webuploader/v/unstable)](https://packagist.org/packages/nancheng/pfinal-webuploader)
[![License](https://poser.pugx.org/nancheng/pfinal-webuploader/license)](https://packagist.org/packages/nancheng/pfinal-webuploader)

## 兼容版本

本扩展包经过测试，适配 `Laravel 5.1` 以上稳定版本（`5.0` 版本理论上也是可行的，但未经测试）。

## 安装与配置

在 `composer.json` 新增 `"nancheng/pfinal-webuploader": "dev-master"` 依赖，然后执行： `composer update` 操作。

依赖安装完毕之后，在 `app.php` 中添加：

```php
'providers' => [
        Pfinal\PfinalWebuploader\PfinalWebuploaderServiceProvider::class,
],
```

然后，执行下面 `artisan` 命令，发布该扩展包配置等项。

```bash
php artisan vendor:publish --force
```

现在您可以访问 `/pfinal/example` 路由，不出意外，您可以看到扩展包提供的示例页面。

图片默认会上传到本地 `public/uploads` 目录下；相关功能配置位于 `config/pfinal-uploader.php` 文件中。

## 使用说明

在 `blade` 模版里面使用下面三个方法：`pf_css()` 、`pf_js()` 、`pf_field()` 和 `pf_config()` 。

```html
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {!! pf_css() !!}
    {!! pf_js() !!}
</head>
<body>

<div id="content">

</div>

{!! pf_field("#content") !!}
{!! pf_config(['display','delete']) !!}
<script>
    console.log(uploader)
</script>
</body>
</html>

```

----
技术能力有限, 欢迎大家吐槽。持续更新中
