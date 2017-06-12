<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Permissions".
 *
 * @property integer $PermissionID
 * @property string $PermissionName
 *
 * @property Users[] $users
 */
class Permissions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Permissions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PermissionName'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PermissionID' => 'Permission ID',
            'PermissionName' => 'Permission Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['PermissionID' => 'PermissionID']);
    }
}
