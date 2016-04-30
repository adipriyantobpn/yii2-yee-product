<?php
/**
 * @link http://www.yee-soft.com/
 * @copyright Copyright (c) 2015 Taras Makitra
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

namespace yeesoft\product;

use Yii;

/**
 * Product Module For Yee CMS
 *
 * @author Taras Makitra <makitrataras@gmail.com>
 */
class ProductModule extends \yii\base\Module
{
    /**
     * Version number of the module.
     */
    const VERSION = '0.1-a';

    /**
     * Table aliases
     *
     * @var string
     */
    public $product_table          = '{{%product}}';
    public $controllerNamespace = 'yeesoft\product\controllers';
    public $viewList;
    public $layoutList;

    /**
     * Size of thumbnail image of the product.
     *
     * Expected values: 'original' or sizes from yeesoft\media\MediaModule::$thumbs,
     * by default there are: 'small', 'medium', 'large'
     *
     * @var string
     */
    public $thumbnailSize =  'medium';

    /**
     * Default views and layouts
     * Add more views and layouts in your main config file by calling the module
     *
     *   Example:
     *
     *   'product' => [
     *       'class' => 'yeesoft\product\ProductModule',
     *       'viewList' => [
     *           'product' => 'View Label 1',
     *           'product_test' => 'View Label 2',
     *       ],
     *       'layoutList' => [
     *           'main' => 'Layout Label 1',
     *           'dark_layout' => 'Layout Label 2',
     *       ],
     *   ],
     */
    public function init()
    {
        if(in_array($this->thumbnailSize, [])){
            $this->thumbnailSize = 'medium';
        }

        if (empty($this->viewList)) {
            $this->viewList = [
                'product' => Yii::t('yee', 'Product view')
            ];
        }

        if (empty($this->layoutList)) {
            $this->layoutList = [
                'main' => Yii::t('yee', 'Main layout')
            ];
        }

        parent::init();
    }
}