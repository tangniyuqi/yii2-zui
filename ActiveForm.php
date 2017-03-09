<?php
namespace tangniyuqi\zui;

/**
 * @package tangniyuqi.zui.ActiveForm
 * @copyright DNA <http://www.Noooya.com/>
 * @version 1.0.0
 * @author tangniyuqi@163.com
 * @since 1.0
 */
class ActiveForm extends \yii\bootstrap\ActiveForm
{

    public $fieldClass = 'tangniyuqi\zui\ActiveField';
    public $layout = 'horizontal';
    public $method = 'POST';
    public $errorCssClass = 'has-error';
    public $fieldConfig = [
        'template' => '{label}<div class="col-sm-5">{input}{error}{hint}</div>',
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-5',
        ],
        'labelOptions' => ['class' => 'col-sm-2 control-label'],
    ];
}
