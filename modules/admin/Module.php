<?php

namespace app\modules\admin;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function beforeAction($action)
    {

        if (!parent::beforeAction($action))
        {
            return false;
        }

        if (!\Yii::$app->user->isGuest)
        {
            return true;
        }
        else
        {
            \Yii::$app->getResponse()->redirect(\Yii::$app->getHomeUrl());
            return false;
        }
    }
}
