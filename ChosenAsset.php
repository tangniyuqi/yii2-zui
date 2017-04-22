<?php
namespace tangniyuqi\zui;

use Yii;
use yii\web\AssetBundle;

/**
 * @author tangniyuqi@163.com
 * @since 1.0
 */
class ChosenAsset extends \yii\web\AssetBundle
{
	public $css = [
        'js/jquery/chosen/min.css',
	];

	public $js = [
        'js/jquery/chosen/min.js',
	];

    public $depends = [
        'tangniyuqi\zui\ZuiAsset',
    ];

	public function init()
    {
        parent::init();

        $this->sourcePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
    }
}