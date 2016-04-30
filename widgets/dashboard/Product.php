<?php

namespace yeesoft\product\widgets\dashboard;

use yeesoft\models\User;
use yeesoft\product\models\Product;
use yeesoft\product\models\search\ProductSearch;
use yeesoft\widgets\DashboardWidget;
use Yii;

class Products extends DashboardWidget
{
    /**
     * Most recent product limit
     */
    public $recentLimit = 5;

    /**
     * Product index action
     */
    public $indexAction = 'product/default/index';

    /**
     * Total product options
     *
     * @var array
     */
    public $options;

    public function run()
    {
        if (!$this->options) {
            $this->options = $this->getDefaultOptions();
        }

        if (User::hasPermission('viewProducts')) {
            $searchModel = new ProductSearch();
            $formName = $searchModel->formName();

            $recentProducts = Product::find()->orderBy(['id' => SORT_DESC])->limit($this->recentLimit)->all();

            foreach ($this->options as &$option) {
                $count = Product::find()->filterWhere($option['filterWhere'])->count();
                $option['count'] = $count;
                $option['url'] = [$this->indexAction, $formName => $option['filterWhere']];
            }

            return $this->render('products', [
                'height' => $this->height,
                'width' => $this->width,
                'position' => $this->position,
                'products' => $this->options,
                'recentProducts' => $recentProducts,
            ]);
        }
    }

    public function getDefaultOptions()
    {
        return [
            ['label' => Yii::t('yee', 'Published'), 'icon' => 'ok', 'filterWhere' => ['status' => Product::STATUS_PUBLISHED]],
            ['label' => Yii::t('yee', 'Pending'), 'icon' => 'search', 'filterWhere' => ['status' => Product::STATUS_PENDING]],
        ];
    }
}