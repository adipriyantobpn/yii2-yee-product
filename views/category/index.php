<?php

use yeesoft\grid\GridPageSize;
use yeesoft\grid\GridView;
use yeesoft\helpers\Html;
use yeesoft\product\models\Category;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel yeesoft\product\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yee/media', 'Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/product', 'Products'), 'url' => ['/product/default/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="product-category-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?= Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('yee', 'Add New'), ['/product/category/create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12 text-right">
                    <?= GridPageSize::widget(['pjaxId' => 'product-category-grid-pjax']) ?>
                </div>
            </div>

            <?php Pjax::begin(['id' => 'product-category-grid-pjax']) ?>

            <?= GridView::widget([
                'id' => 'product-category-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'product-category-grid',
                    'actions' => [Url::to(['bulk-delete']) => Yii::t('yee', 'Delete')]
                ],
                'columns' => [
                    ['class' => 'yii\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'class' => 'yeesoft\grid\columns\TitleActionColumn',
                        'controller' => '/product/category',
                        'title' => function (Category $model) {
                            return Html::a($model->title, ['/product/category/update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'buttonsTemplate' => '{update} {delete}',
                    ],
                    [
                        'attribute' => 'parent_id',
                        'value' => function (Category $model) {

                            if ($parent = $model->getParent()->one() AND $parent->id > 1) {
                                return Html::a($parent->title, ['/product/category/update', 'id' => $parent->id], ['data-pjax' => 0]);
                            } else {
                                return '<span class="not-set">' . Yii::t('yii', '(not set)') . '</span>';
                            }

                        },
                        'format' => 'raw',
                        'filter' => Category::getCategories(),
                        'filterInputOptions' => ['class' => 'form-control', 'encodeSpaces' => true],
                    ],
                    'description:ntext',
                    [
                        'class' => 'yeesoft\grid\columns\StatusColumn',
                        'attribute' => 'visible',
                    ],
                ],
            ]); ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>