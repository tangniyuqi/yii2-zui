<?php
/**
 * ActiveForm
 *
 *@package vendor.tangniyuqi.yii2-zui
 *@author tangming <tangniyuqi@163.com>
 *@copyright DNA <http://www.Noooya.com/>
 *@version 1.0.0
 *@since 2017-05-18 Create
 *@todo N/A
 */
namespace tangniyuqi\zui;

class ActiveForm extends \yii\bootstrap\ActiveForm
{
    /**
     * @inheritdoc
     */
    public $fieldClass = 'tangniyuqi\zui\ActiveField';

    public $layout = 'horizontal';

    public $method = 'POST';

    public $errorCssClass = 'has-error';

    /**
     * @inheritdoc
     */
    public $fieldConfig = [
        'template' => '{label}<div class="col-sm-5">{input}{error}{hint}</div>',

        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-5',
        ],

        'labelOptions' => ['class' => 'col-sm-2 control-label'],
    ];
}