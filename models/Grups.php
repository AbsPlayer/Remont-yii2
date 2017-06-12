<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Grups".
 *
 * @property integer $GrupID
 * @property integer $CategoryID
 * @property string $GrupName
 * @property string $GrupSqImage
 * @property string $GrupRectImage
 * @property string $GrupInfo
 * @property string $GrupMarga
 *
 * @property GrupsToCategories[] $grupsToCategories
 * @property Products[] $products
 */
class Grups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Grups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CategoryID'], 'integer'],
            [['GrupMarga'], 'number'],
            [['GrupName'], 'string', 'max' => 50],
            [['GrupBigImage', 'GrupSmallImage', 'GrupInfo'], 'string', 'max' => 200],
            [['GrupName'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GrupID' => 'Grup ID',
            'CategoryID' => 'Category ID',
            'GrupName' => 'Grup Name',
            'GrupSqImage' => 'Grup Sq Image',
            'GrupRectImage' => 'Grup Rect Image',
            'GrupInfo' => 'Grup Info',
            'GrupMarga' => 'Grup Marga',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupsToCategories()
    {
        return $this->hasMany(GrupsToCategories::className(), ['GrupID' => 'GrupID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['GrupID' => 'GrupID']);
    }
}
