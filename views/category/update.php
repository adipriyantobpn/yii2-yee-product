<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yeesoft\product\models\Category */

$this->title = Yii::t('yee/media', 'Update Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/product', 'Products'), 'url' => ['/product/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/product', 'Categories'), 'url' => ['/product/category/index']];
$this->params['breadcrumbs'][] = Yii::t('yee', 'Update');
?>
<div class="product-category-update">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>