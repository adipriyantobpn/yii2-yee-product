<?php

namespace yeesoft\product\models;

use omgdef\multilingual\MultilingualTrait;
use paulzi\nestedintervals\NestedIntervalsQueryTrait;


/**
 * This is the ActiveQuery class for [[Product]].
 *
 * @see Product
 */
class CategoryQuery extends \yii\db\ActiveQuery
{

    use MultilingualTrait;
    use NestedIntervalsQueryTrait;


    /**
     * @inheritdoc
     * @return Product[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Product|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
