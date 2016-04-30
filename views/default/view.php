<?php

use yeesoft\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/product', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>

    <div class="panel panel-default">
        <div class="panel-body">

            <?= Html::a(Yii::t('yee', 'Edit'), ['/product/default/update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>

            <?= Html::a(Yii::t('yee', 'Delete'), ['/product/default/delete', 'id' => $model->id], [
                'class' => 'btn btn-sm btn-default',
                'data' => [
                    'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'method' => 'product',
                ],
            ]) ?>

            <?= Html::a(Yii::t('yee', 'Add New'), ['/product/default/create'], ['class' => 'btn btn-sm btn-primary pull-right']) ?>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <h2><?= $model->title ?></h2>
            <?= $model->getThumbnail(['class' => 'thumbnail pull-left', 'style' => 'width: 240px; margin:0 7px 7px 0;']) ?>
            <?= $model->content ?>
        </div>
    </div>


</div>
