<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_in_order".
 *
 * @property int $id
 * @property int $shop_order_id
 * @property int $product_id
 */
class ProductsInOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_in_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shop_order_id', 'product_id'], 'required'],
            [['shop_order_id', 'product_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_order_id' => 'Shop Order ID',
            'product_id' => 'Product ID',
        ];
    }
}
