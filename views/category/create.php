<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yeesoft\product\models\Category */

$this->title = Yii::t('yee/media', 'Create Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/product', 'Products'), 'url' => ['/product/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/product', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yee', 'Create');
?>

<div class="product-category-create">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>