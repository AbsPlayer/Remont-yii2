<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Categories".
 *
 * @property integer $CategoryID
 * @property string $CategoryName
 * @property string $CategoryRectImage
 * @property string $CategoryInfo
 *
 * @property GrupsToCategories[] $grupsToCategories
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CategoryName'], 'string', 'max' => 50],
            [['CategorySmallImage', 'CategoryInfo'], 'string', 'max' => 200],
            [['CategoryName'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CategoryID' => 'Category ID',
            'CategoryName' => 'Category Name',
            'CategoryRectImage' => 'Category Rect Image',
            'CategoryInfo' => 'Category Info',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupsToCategories()
    {
        return $this->hasMany(GrupsToCategories::className(), ['CategoryID' => 'CategoryID']);
    }
}
