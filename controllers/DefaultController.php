<?php

namespace yeesoft\product\controllers;

use yeesoft\controllers\admin\BaseController;
use yeesoft\models\User;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class DefaultController extends BaseController
{
    public $modelClass = 'yeesoft\product\models\Product';
    public $modelSearchClass = 'yeesoft\product\models\search\ProductSearch';

    protected function getRedirectPage($action, $model = null)
    {
        if (!User::hasPermission('editProducts') && $action == 'create') {
            return ['view', 'id' => $model->id];
        }

        switch ($action) {
            case 'update':
                return ['update', 'id' => $model->id];
                break;
            case 'create':
                return ['update', 'id' => $model->id];
                break;
            default:
                return parent::getRedirectPage($action, $model);
        }
    }
}