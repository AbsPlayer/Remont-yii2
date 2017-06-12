<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Users".
 *
 * @property integer $UserID
 * @property integer $PermissionID
 * @property string $UserName
 * @property string $UserPassword
 *
 * @property Permissions $permission
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PermissionID'], 'integer'],
            [['UserName', 'UserPassword'], 'string', 'max' => 50],
            [['PermissionID'], 'exist', 'skipOnError' => true, 'targetClass' => Permissions::className(), 'targetAttribute' => ['PermissionID' => 'PermissionID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UserID' => 'User ID',
            'PermissionID' => 'Permission ID',
            'UserName' => 'User Name',
            'UserPassword' => 'User Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermission()
    {
        return $this->hasOne(Permissions::className(), ['PermissionID' => 'PermissionID']);
    }
}
