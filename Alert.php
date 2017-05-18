<?php
/**
 * Alert
 *
 *@package vendor.tangniyuqi.yii2-zui
 *@author tangming <tangniyuqi@163.com>
 *@copyright DNA <http://www.Noooya.com/>
 *@version 1.0.0
 *@since 2017-05-18 Create
 *@todo N/A
 */
namespace tangniyuqi\zui;

use yii\helpers\Json;

class Alert extends \yii\bootstrap\Widget
{
    /**
     * @inheritdoc
     */
    public $alertTypes = [
        'error' => 'icon icon-exclamation-sign',
        'danger' => 'icon icon-exclamation-sign',
        'success' => 'icon icon-ok-sign',
        'info' => 'icon icon-info-sign',
        'warning' => 'icon icon-warning-sign',
    ];

    /**
     * @inheritdoc
     */
    public $closeButton = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $session = \Yii::$app->session;
        $flashes = $session->getAllFlashes();
        $appendCss = isset($this->options['class']) ? ' ' . $this->options['class'] : '';

        if(!isset($this->options['placement'])) $this->options['placement'] = 'top';

        foreach ($flashes as $type => $data) {
            if (isset($this->alertTypes[$type])) {
                $data = (array) $data;

                foreach ($data as $i => $message) {
                    if($type == 'error') $type = 'warning';

                    $this->options['type'] = $type ;// $this->alertTypes[$type] . $appendCss;
                    $this->options['icon'] = $this->alertTypes[$type];

                    if (is_array($message)) {
                        $message = implode($message, '<br>');
                    }

                    unset($this->options['id'],$this->options['class']);

                    $this->createJs($message, $this->options);
                }

                $session->removeFlash($type);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function createJs($content, $options)
    {
        $options = Json::encode($options);

        $script = '
            var flashMessage = $.zui.messager.show("'.$content.'", '.$options.');
            flashMessage.show();
        ';

        $this->view->registerJs($script, \yii\web\View::POS_READY);
    }
}