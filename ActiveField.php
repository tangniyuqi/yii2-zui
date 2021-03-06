<?php
/**
 * ActiveField
 *
 *@package vendor.tangniyuqi.yii2-zui
 *@author tangming <tangniyuqi@163.com>
 *@copyright DNA <http://www.Noooya.com/>
 *@version 1.0.0
 *@since 2017-05-18 Create
 *@todo N/A
 */
namespace tangniyuqi\zui;

use yii\helpers\Html;

class ActiveField extends \yii\bootstrap\ActiveField
{
    /**
     * 根据bootstrap3 form-control-static 设置一个form field 静态文本
     * A radio button list is like a checkbox list, except that it only allows single selection.
     * @param array $options options (name => config) for the radio button list.
     * @return $this the field object itself
     */
    public function staticInput($options = [])
    {
        if (!isset($options['value'])) {
            $value = Html::getAttributeValue($this->model, $this->attribute);
        } else {
            $value = $options['value'];
            unset($options['value']);
        }

        if(!isset($options['class'])) $options['class'] = 'form-control-static';

        $this->parts['{input}'] = Html::tag('p', $value, $options );

        return $this;
    }
}