<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Users;
//use app\models\Units;
use app\models\Products;
use app\models\Grups;
//use app\models\Categories;
use yii\helpers\Url;
use app\components\controllers\CommonController;

class SiteController extends CommonController
    {

    public $data;
    public $model_login;

    /**
     * @inheritdoc
     */
    public function __construct($id, $module, $config = array())
        {
        parent::__construct($id, $module, $config);

        $count_offer = 2; // количество товаров в Актуальном предложении
        $index = 0;
        $array = [];
        $products = Products::find()->orderBy('ProductID')->all();
        foreach ($products as $product)
            {
            $array[$index] = $product->ProductID;
            $index++;
            }

// Случайная выборка товаров для актуального предложения
        $rand_keys = array_rand(array_flip($array), $count_offer);
        $actualoffers = Products::find()->where(['in', 'ProductID', $rand_keys])->all();

        $act_offs = [];
        foreach ($actualoffers as $actualoffer)
            {
            $act_offs [] = ['ProductID' => $actualoffer->ProductID,
                'ProductName' => $actualoffer->ProductName,
                'ProductBigImage' => $actualoffer->ProductBigImage,
                'GrupName' => Grups::find()->where('GrupID = :gid', [':gid' => $actualoffer->GrupID])->one()->GrupName
            ];
            }

        $this->model_login = new LoginForm();

        $this->data = [
            'act_offs' => $act_offs,
            'model_login' => $this->model_login,
        ];
        }

    public function behaviors()
        {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
        }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
        {

        if (!Yii::$app->user->isGuest)
            {
            return $this->goHome();
            }

        $model = $this->model_login;

        if ($model->load(Yii::$app->request->post()) && $model->login())
            {
            return $this->redirect('/admin');
            }
        return $this->render('index');
        }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
        {

        Yii::$app->user->logout();

        return $this->redirect(Url::home());
        }

    }
