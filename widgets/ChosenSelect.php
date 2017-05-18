<?php
/**
 * ChosenSelect
 *
 *@package vendor.tangniyuqi.yii2-zui.widgets
 *@author tangming <tangniyuqi@163.com>
 *@copyright DNA <http://www.Noooya.com/>
 *@version 1.0.0
 *@since 2017-05-18 Create
 *@todo N/A
 */
namespace tangniyuqi\zui\widgets;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use tangniyuqi\zui\ChosenAsset;

class ChosenSelect extends \yii\widgets\InputWidget
{
    /**
     * @inheritdoc
     */
    public $multiple = true;

    public $items = [];

    public $pluginOptions = ['no_results_text' => '没有找到', 'allow_single_deselect' => true, 'search_contains' => true];

    /**
     * @inheritdoc
     */
	public function init()
    {
        parent::init();
        $options['multiple'] = $this->multiple;
        $options['class'] = 'chosen-select form-control';
        $options['data-placeholder'] = '请选择...';
        $options['tabindex'] = '2';

		$this->options =  ArrayHelper::merge($options, $this->options);
        $this->pluginOptions = Json::encode($this->pluginOptions);

		ChosenAsset::register($this->getView());
	}

    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();
        $this->createJs();

        echo Html::activeListBox($this->model, $this->attribute, $this->items, $this->options);
    }

    /**
     * @inheritdoc
     */
    public function createJs()
    {
        $ID = Html::getInputId($this->model, $this->attribute);

        $script = '
            if ($.fn.chosen) {
                $("#' . $ID . '").chosen(' . $this->pluginOptions . ');
            }
        ';

        $this->view->registerJs($script, \yii\web\View::POS_READY);
    }
}