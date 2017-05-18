<?php
/**
 * DateRangePickerColumn
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

class DateRangePickerColumn extends \tangniyuqi\zui\grid\DataColumn
{
	/**
     * @inheritdoc
     */
	//public $filterInputOptions = ['class' => 'form-control input-sm'];

	public $filterWidgetOptions = [];

	public $format = ['date', 'php:Y-m-d'];

	/**
     * @inheritdoc
     */
	public function init()
	{
		parent::init();

		$filterWidgetOptions = [
			//'autoUpdateOnInit' => true,
			'convertFormat' => true,
			//'presetDropdown' => true, //default ranges => [],
			'pluginOptions' => [
				'allowClear' => true,
				'autoclose' => true,
				'opens' => 'left',
				'ranges' => [
					'今天' => ["moment().startOf('day')", "moment()"],
					'昨天' => ["moment().startOf('day').subtract(1,'days')", "moment().startOf('day').subtract(1,'days')"],
					'三天内' => ["moment().startOf('day').subtract(3,'days')", "moment()"],
					'7天内' => ["moment().startOf('day').subtract(7, 'days')", "moment()"],
					'本周内' => ["moment().startOf('week')", "moment()"],
					'本月' => ["moment().startOf('month')", "moment().endOf('month')"],
					'上个月' => ["moment().subtract(1, 'month').startOf('month')", "moment().subtract(1, 'month').endOf('month')"],
					//'两月内' => ["moment().subtract(1, 'month').startOf('month')", "moment()"],
				],
    			'startDate' => date('Y-m-01'),
        		'endDate' => date('Y-m-d'),
				'alwaysShowCalendars' => true,
				'locale' => ['format' => 'Y-m-d', 'separator' => ' to '],
			],
		];

		$this->filterWidgetOptions = array_merge_recursive($filterWidgetOptions, $this->filterWidgetOptions);
	}

	/**
     * @inheritdoc
     */
	protected function renderFilterCellContent()
    {
		if (is_string($this->filter)) {
			return $this->filter;
		}

		$model = $this->grid->filterModel;

		if ($this->filter !== false && $model instanceof Model && $this->attribute !== null && $model->isAttributeActive($this->attribute)) {
			$error = '';

			if ($model->hasErrors($this->attribute)) {
				Html::addCssClass($this->filterOptions, 'has-error');
				$error = ' '.Html::error($model, $this->attribute, $this->grid->filterErrorOptions);
			}

			return $this->myWidget($model).$error; // Html::activeTextInput($model, $this->attribute, $this->
		} else {
			return parent::renderFilterCellContent();
		}
	}

	/**
     * @inheritdoc
     */
	public function myWidget($model)
    {
		$options = array_merge_recursive(
			[
				'model' => $model,
				'attribute' => $this->attribute,
                'options' => $this->filterInputOptions
			],

			$this->filterWidgetOptions
		);

		return \kartik\daterange\DateRangePicker::widget($options);
	}
}