<?php
/**
 * Breadcrumbs
 *
 *@package vendor.tangniyuqi.yii2-zui
 *@author tangming <tangniyuqi@163.com>
 *@copyright DNA <http://www.Noooya.com/>
 *@version 1.0.0
 *@since 2017-05-18 Create
 *@todo N/A
 */
namespace tangniyuqi\zui;

class Breadcrumbs extends \yii\widgets\Breadcrumbs
{
	/**
     * @inheritdoc
     */
    public $tag = 'div';

    public $homeLink;

    public $options = ['id' => 'crumbs'];

    public $itemTemplate = "&nbsp;<i class=\"icon-angle-right\"></i>{link}\n";

    public $activeItemTemplate = "&nbsp;<i class=\"icon-angle-right\"></i>{link}\n";
}