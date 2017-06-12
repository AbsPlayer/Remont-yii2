<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Users;
use app\models\Units;
use app\models\Products;
use app\models\Grups;
use app\models\Categories;
use yii\helpers\Url;

class SiteController extends Controller
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
     * @inheritdoc
     */
    public function actions()
        {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
        }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
        {
        return $this->render('index');
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

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
        {
        return $this->render('contact');
        }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
        {
        return $this->render('about');
        }

    public function actionProduction()
        {
        $categories = Categories::find()->orderBy('CategoryName ASC')->all();

        return $this->render('production', [
                    'categories' => $categories,
        ]);
        }

    public function actionGrups($cid = 0)
        {
        $category = Categories::find()->where('CategoryID = :cid', [':cid' => $cid])->one();
        $grups = Grups::find()->orderBy('GrupName')->where('CategoryID = :cid', [':cid' => $cid])->all();

        return $this->render('grups', [
                    'category' => $category,
                    'grups' => $grups,
        ]);
        }

    public function actionProducts($gid = 0)
        {
        $grup = Grups::find()->where('GrupID = :gid', [':gid' => $gid])->one();
        $category = Categories::find()->where('CategoryID = :cid', [':cid' => $grup->CategoryID])->one();
        $products = Products::find()->where('GrupID = :gid', [':gid' => $gid])->all();

        return $this->render('products', [
                    'category' => $category,
                    'grup' => $grup,
                    'products' => $products,
        ]);
        }

    public function actionProduct($pid = 0)
        {
        $product = Products::find()->where('ProductID = :pid', [':pid' => $pid])->one();
        $grup = Grups::find()->where('GrupID = :gid', [':gid' => $product->GrupID])->one();
        $category = Categories::find()->where('CategoryID = :cid', [':cid' => $grup->CategoryID])->one();
        $unit = Units::find()->where('UnitID = :uid', [':uid' => $product->UnitID])->one();

        return $this->render('product', [
                    'category' => $category,
                    'grup' => $grup,
                    'product' => $product,
                    'unit' => $unit,
        ]);
        }

    public function actionRal()
        {
        return $this->render('ral');
        }

    }
