<?php
/**
 * LinkPager
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
use yii\data\Pagination;

class LinkPager extends \yii\widgets\LinkPager
{
    /**
     * @inheritdoc
     */
    public $options = ['class' => 'pager'];

    public $linkOptions = ['class' =>''];

    public $firstPageCssClass = 'previous';

    public $lastPageCssClass = 'last';

    public $prevPageCssClass = 'prev';

    public $nextPageCssClass = 'next';

    public $activePageCssClass = 'active';

    public $disabledPageCssClass = 'disabled';

    public $prevPageLabel = '<i class="icon icon-angle-left"></i>';

    public $nextPageLabel = '<i class="icon icon-angle-right"></i>';

    public $firstPageLabel = '<i class="icon icon-double-angle-left"></i>';

    public $lastPageLabel = '<i class="icon icon-double-angle-right"></i>';

    public $pageCssClass = '';
}