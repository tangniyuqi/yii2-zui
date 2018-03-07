<?php
/**
 * DataColumn
 *
 *@package vendor.tangniyuqi.yii2-zui.grid
 *@author tangming <tangniyuqi@163.com>
 *@copyright DNA <http://www.Noooya.com/>
 *@version 1.0.0
 *@since 2017-04-19 Create
 *@todo N/A
 */
namespace tangniyuqi\zui\grid;

use Yii;
use yii\helpers\Html;

class DataColumn extends \yii\grid\DataColumn
{
    /**
     * @inheritdoc
     */
    public $defaultfilterCss = 'form-control-sm input-sm';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->filterInputOptions, $this->defaultfilterCss);

        if ($this->attribute == 'id' && !isset($this->headerOptions['style'])) {
            $this->headerOptions['style'] = 'width:80px';
        }
    }
}