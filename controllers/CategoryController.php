<?php

namespace yeesoft\product\controllers;

use yeesoft\controllers\admin\BaseController;

/**
 * CategoryController implements the CRUD actions for yeesoft\product\models\Category model.
 */
class CategoryController extends BaseController
{
    public $modelClass = 'yeesoft\product\models\Category';
    public $modelSearchClass = 'yeesoft\product\models\search\CategorySearch';
    public $disabledActions = ['view', 'bulk-activate', 'bulk-deactivate'];

    protected function getRedirectPage($action, $model = null)
    {
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