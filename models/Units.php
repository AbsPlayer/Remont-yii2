<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Units".
 *
 * @property integer $UnitID
 * @property string $UnitName
 *
 * @property Products[] $products
 */
class Units extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Units';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UnitName'], 'string', 'max' => 50],
            [['UnitName'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UnitID' => 'Unit ID',
            'UnitName' => 'Unit Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['UnitID' => 'UnitID']);
    }
}
