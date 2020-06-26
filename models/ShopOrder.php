<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_order".
 *
 * @property int $id
 * @property int $number
 * @property string $status
 * @property int $product_id
 */
class ShopOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'status', 'product_id'], 'required'],
            [['number'], 'integer'],

            [['status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'status' => 'Status',
            'product_id' => 'Product ID',
        ];
    }
}
