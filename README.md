# Yii2 ZUI #

----------

一个基于Yii2 + Zui v1.5 定制开源前端实践，帮助你快速构建现代跨屏应用。

ZUI项目网站： http://zui.sexy/ 。

## 描述 ##

- 轻量级整合；
- 易于定制，有多个版本供选择，主要版本包含大部分特性，额外的内容按需加载。

### 安装
Either run

```
$ php composer.phar require tangniyuqi/yii2-zui "*"
```

or add

```
"tangniyuqi/yii2-zui": "*"
```

to the ```require``` section of your `composer.json` file.


### 配置相关
```php

app/AppAsset.php;
<?php
class AppAsset extends AssetBundle {
```
    public $depends = [
		'yii\web\YiiAsset',
		'tangniyuqi\zui\ZuiAsset',
	];
}