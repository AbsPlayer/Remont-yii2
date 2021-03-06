<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
    {

//    public $id;
//    public $username;
//    public $password;
//    public $authKey;
//    public $accessToken;
//
//    private static $users = [
//        '100' => [
//            'id' => '100',
//            'username' => 'admin',
//            'password' => 'admin',
//            'authKey' => 'test100key',
//            'accessToken' => '100-token',
//        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
//    ];

    public static function tableName()
        {
        return 'Users';
        }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
        {
        return static::findOne($id);
        }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
        {
//        return static::findOne(['access_token' => $token]);
        }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
        {
        return static::findOne(['UserName' => $username]);
        }

    /**
     * @inheritdoc
     */
    public function getId()
        {
        return $this->UserID;
        }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
        {
        return $this->auth_key;
        }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
        {
        return $this->auth_key === $authKey;
        }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
        {
        return $this->UserPassword === sha1(md5($password));
//        return \Yii::$app->security->validatePassword($password, $this->UserPassword);
        }

    }
