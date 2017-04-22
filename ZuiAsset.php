<?php
/**
 * AppAsset
 *
 *@package tangniyuqi.yii2-zui
 *@author tangming <tangniyuqi@163.com>
 *@copyright DNA <http://www.Noooya.com/>
 *@version 1.0.0
 *@since 2017-03-29 Create
 *@todo N/A
 */
namespace tangniyuqi\zui;

use Yii;
use yii\web\Cookie;

class ZuiAsset extends \yii\web\AssetBundle
{
    /**
     * @inheritdoc
     */
    public $css = [
        'theme/zui/css/min.css',
        'theme/default/style.css',
    ];

    public $js = [
        'js/zui/min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->sourcePath = dirname(__FILE__).DIRECTORY_SEPARATOR.'assets';
        //$this->cssOptions = ['name' => 'zui'];

        if (Yii::$app->id != 'console') {
            $this->setTheme();
        };
    }

    /**
     * $this->setTheme() 非Yii2 config['components']['view']['theme']['basePath']的视图路径, 而是zui自身主题的切换
     */
    private function setTheme()
    {
        $theme = 'lightblue'; //default
        $themeName = Yii::$app->request->get('theme');
        $cookies = Yii::$app->request->cookies;

        if ($themeName) {
            $theme = $themeName;
        } elseif ($cookies->has('theme')) {
            $theme = $cookies['theme'];
        }

        $this->css[] = 'theme/'.$theme.'/style.css';

        Yii::$app->response->cookies->add(new Cookie([
            'name' => 'theme',
            'value' => $theme,
        ]));
    }
}