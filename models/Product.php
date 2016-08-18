<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "product".
 *
 * @property integer $p_id
 * @property string $p_name
 * @property string $p_price
 * @property string $p_sku
 * @property string $p_quantity
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'p_price','pro_id',  'p_quantity'], 'required'],
            [['p_name', 'p_quantity'], 'string', 'max' => 255],
            //[['p_sku'], 'file'],
            ['p_name', 'required', 'message' => 'Please enter the product name.'],
            ['p_price', 'in','range' => ['500','100']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_id' => 'Product ID',
            'p_name' => 'Product Name',
            'p_price' => 'Product Price',
            'p_sku' => 'Product Sku',
            'p_quantity' => 'Product Quantity',
            'pro_id' => 'User',
        ];
    }
    public function getOrders()
    {
        // Product has_one person via person.id -> person_id
         return $this->hasOne(PersonalDetail::className(), ['p_id' => 'pro_id']);
//        return "test";
    }

    public function getPerson(){
        return $this->orders->p_name;
    }
}
