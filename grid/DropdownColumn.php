<?php
/**
 * DropdownColumn
 *
 *@package vendor.tangniyuqi.yii2-zui.grid
 *@author tangming <tangniyuqi@163.com>
 *@copyright DNA <http://www.Noooya.com/>
 *@version 1.0.0
 *@since 2017-05-18 Create
 *@todo N/A
 */
namespace tangniyuqi\zui\grid;

use Yii;
use yii\base\Model;
use yii\helpers\Html;

class DropdownColumn extends \tangniyuqi\zui\grid\DataColumn
{
    /**
     * @inheritdoc
     */
    //可配置全局 const PROMPT_LABEL = '- 不限 -'; 来显示不限选项
    /*
    必须配置对应 模型
    $model->getArray()[$attribute] = [];
    如:
    public function getArray()
    {
        return [
            'display' => [1 => '显示', 0 => '不显示'],
            'status' => [1 => '正常', 0 => '禁用'],
            'delete' => [0 => '正常', 1 => '删除'],
        ];
    }

    */
    public $prompt = '- 不限 -';

    /**
     * @inheritdoc
     */
	public function init()
    {
        $attribute = $this->attribute;
        $model = $this->grid->filterModel;

        if(!$this->filter) {
            $class = get_parent_class($model);
            $this->filter = (new $class)->getArray()[$attribute];
            $this->filterInputOptions =  ['prompt' => $this->prompt, 'class' => 'form-control input-sm'];
        }

        parent::init();
	}

    /**
     * @inheritdoc
     */
    public function getDataCellValue($model, $key, $index)
    {
        $value = parent::getDataCellValue($model, $key, $index);

        if ($value !== null) {
            $attribute = $this->attribute;

            if (isset($model->getArray()[$attribute][$value])) {
                return $model->getArray()[$attribute][$value];
            }

            return $value;
        }

        return '';
    }
}