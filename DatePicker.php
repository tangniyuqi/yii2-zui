<?php
/**
 * DatePicker
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
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class DatePicker extends \kartik\date\DatePicker
{
    /**
     * @inheritdoc
     */
    const CALENDAR_ICON = '<i class="icon icon-calendar"></i>';

    /**
     * @inheritdoc
     */
    protected function renderAddon(&$options, $type = 'picker')
    {
        if ($options === false) {
            return '';
        }

        if (is_string($options)) {
            return $options;
        }

        $icon = ($type === 'picker') ? 'calendar' : 'remove';
        Html::addCssClass($options, 'input-group-addon kv-date-' . $icon);
        $icon = '<i class="icon icon-' . ArrayHelper::remove($options, 'icon', $icon) . '"></i>';
        $title = ArrayHelper::getValue($options, 'title', '');

        if ($title !== false && empty($title)) {
            $options['title'] = ($type === 'picker') ? Yii::t('kvdate', 'Select date') :
                Yii::t('kvdate', 'Clear field');
        }

        return Html::tag('span', $icon, $options);
    }
}