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

class Alert extends \yii\bootstrap\Widget
{
	/**
     * @inheritdoc
     */
	public $alertTypes = [
		'error' => 'alert-danger',
		'danger' => 'alert-danger',
		'success' => 'alert-success',
		'info' => 'alert-info',
		'warning' => 'alert-warning',
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

		foreach ($flashes as $type => $data) {
			if (isset($this->alertTypes[$type])) {
				$data = (array) $data;

				foreach ($data as $i => $message) {
					$this->options['class'] = $this->alertTypes[$type] . $appendCss;
					//$this->options['id'] = $this->getId() . '-' . $type . '-' . $i;

					if (is_array($message)) {
						$message = implode($message, '<br>');
					}

					echo \yii\bootstrap\Alert::widget([
						'body' => $message,
						'closeButton' => $this->closeButton,
						'options' => $this->options,
					]);
				}

				$session->removeFlash($type);
			}
		}
	}
}