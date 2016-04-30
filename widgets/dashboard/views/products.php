<?php

use yeesoft\helpers\Html;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */
?>

    <div class="pull-<?= $position ?> col-lg-<?= $width ?> widget-height-<?= $height ?>">
        <div class="panel panel-default dw-widget">
            <div class="panel-heading"><?= Yii::t('yee/product', 'Products Activity') ?></div>
            <div class="panel-body">

                <?php if (count($recentProducts)): ?>
                    <div class="clearfix">
                        <?php foreach ($recentProducts as $product) : ?>
                            <div class="clearfix dw-product">

                                <div class="clearfix">
                                    <div style="float: right">
                                        <a class="dot-left"><?= HtmlPurifier::process($product->author->username); ?></a>
                                        <span class="dot-left dot-right"><?= "{$product->publishedDate}" ?></span>
                                    </div>
                                    <div>
                                        <?= Html::a(HtmlPurifier::process($product->title), ['product/default/view', 'id' => $product->id]) ?>
                                    </div>
                                </div>

                                <div class="dw-product-content">
                                    <?= HtmlPurifier::process(mb_substr(strip_tags($product->content), 0, 200, "UTF-8")); ?>
                                    <?= (strlen(strip_tags($product->content)) > 200) ? '...' : '' ?>
                                </div>

                            </div>

                        <?php endforeach; ?>
                    </div>

                    <div class="dw-quick-links">
                        <?php $list = [] ?>
                        <?php foreach ($products as $product) : ?>
                            <?php $list[] = Html::a("<b>{$product['count']}</b> {$product['label']}", $product['url']); ?>
                        <?php endforeach; ?>
                        <?= implode(' | ', $list) ?>
                    </div>

                <?php else: ?>
                    <h4><em><?= Yii::t('yee/product', 'No products found.') ?></em></h4>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php
$css = <<<CSS
.dw-widget{
    position:relative;
    padding-bottom:15px;
}
.dw-product {
    border-bottom: 1px solid #eee;
    margin: 7px;
    padding: 0 0 5px 5px;
}
.dw-product-content {
    font-size: 0.9em;
    text-align: justify;
    margin: 10px 0 5px 0;
}
.dw-quick-links{
    position: absolute;
    bottom:10px;
    left:0;
    right:0;
    text-align: center;
}
CSS;

$this->registerCss($css);
?>