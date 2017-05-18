<?php
/**
 * ChosenAsset
 *
 *@package vendor.tangniyuqi.yii2-zui
 *@author tangming <tangniyuqi@163.com>
 *@copyright DNA <http://www.Noooya.com/>
 *@version 1.0.0
 *@since 2017-05-18 Create
 *@todo N/A
 */
namespace tangniyuqi\zui;

use Yii;

class ChosenAsset extends \yii\web\AssetBundle
{
    /**
     * @inheritdoc
     */
	public $css = [
        'js/jquery/chosen/min.css',
	];

    /**
     * @inheritdoc
     */
	public $js = [
        'js/jquery/chosen/min.js',
	];

    /**
     * @inheritdoc
     */
    public $depends = [
        'tangniyuqi\zui\ZuiAsset',
    ];

    /**
     * @inheritdoc
     */
	public function init()
    {
        parent::init();

        $this->sourcePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
    }
}