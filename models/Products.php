<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Products".
 *
 * @property integer $ProductID
 * @property integer $GrupID
 * @property integer $UnitID
 * @property string $ProductName
 * @property string $ProductPrice
 * @property string $ProductMarga
 * @property string $ProductInfo
 * @property string $ProductBigImage
 * @property string $ProductSmallImage
 *
 * @property Grups $grup
 * @property Units $unit
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GrupID', 'UnitID'], 'integer'],
            [['ProductPrice', 'ProductMarga'], 'number'],
            [['ProductMarga'], 'required'],
            [['ProductName'], 'string', 'max' => 50],
            [['ProductInfo'], 'string', 'max' => 255],
            [['ProductBigImage', 'ProductSmallImage'], 'string', 'max' => 200],
            [['GrupID'], 'exist', 'skipOnError' => true, 'targetClass' => Grups::className(), 'targetAttribute' => ['GrupID' => 'GrupID']],
            [['UnitID'], 'exist', 'skipOnError' => true, 'targetClass' => Units::className(), 'targetAttribute' => ['UnitID' => 'UnitID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ProductID' => 'Product ID',
            'GrupID' => 'Grup ID',
            'UnitID' => 'Unit ID',
            'ProductName' => 'Product Name',
            'ProductPrice' => 'Product Price',
            'ProductMarga' => 'Product Marga',
            'ProductInfo' => 'Product Info',
            'ProductBigImage' => 'Product Big Image',
            'ProductSmallImage' => 'Product Small Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrup()
    {
        return $this->hasOne(Grups::className(), ['GrupID' => 'GrupID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Units::className(), ['UnitID' => 'UnitID']);
    }
}
