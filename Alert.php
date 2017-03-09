<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace tangniyuqi\zui;

/**
 * @package tangniyuqi.zui.Alert
 * @copyright DNA <http://www.Noooya.com/>
 * @version 1.0.0
 * @author tangniyuqi@163.com
 * @since 1.0
 */
use yii\helpers\Json;
class Alert extends \yii\bootstrap\Widget
{
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - $key is the name of the session flash variable
     * - $value is the bootstrap alert type (i.e. danger, success, info, warning)
     */
    public $alertTypes = [
        'error' => 'icon icon-exclamation-sign',
        'danger' => 'icon icon-exclamation-sign',
        'success' => 'icon icon-ok-sign',
        'info' => 'icon icon-info-sign',
        'warning' => 'icon icon-warning-sign',
    ];



    /**
     * @var array the options for rendering the close button tag.
     */
    public $closeButton = [];

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
                    /* initialize css class for each alert box */
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

    public function createJs($content, $options)
    {
        $options = Json::encode($options);
        $script = '
            var flashMessage = $.zui.messager.show("' . $content . '", ' . $options .');
            flashMessage.show();
        ';

        $this->view->registerJs($script, \yii\web\View::POS_READY);

    }
}
