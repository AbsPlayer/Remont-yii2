<?php

namespace app\components\controllers;

use yii\web\Controller;
use app\models\Categories;
use app\models\Grups;
use app\models\Products;
use app\models\Units;

class CommonController extends Controller
    {

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
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
        {
        return $this->render('@app/views/site/contact');
        }

    public function actionProduction()
        {
        $categories = Categories::find()->orderBy('CategoryName ASC')->all();

        return $this->render('@app/views/site/production', [
                    'categories' => $categories,
        ]);
        }

    public function actionGrups($cid = 0)
        {
        $category = Categories::find()->where('CategoryID = :cid', [':cid' => $cid])->one();
        $grups = Grups::find()->orderBy('GrupName')->where('CategoryID = :cid', [':cid' => $cid])->all();

        return $this->render('@app/views/site/grups', [
                    'category' => $category,
                    'grups' => $grups,
        ]);
        }

    public function actionProducts($gid = 0)
        {
        $grup = Grups::find()->where('GrupID = :gid', [':gid' => $gid])->one();
        $category = Categories::find()->where('CategoryID = :cid', [':cid' => $grup->CategoryID])->one();
        $products = Products::find()->where('GrupID = :gid', [':gid' => $gid])->all();

        return $this->render('@app/views/site/products', [
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

        return $this->render('@app/views/site/product', [
                    'category' => $category,
                    'grup' => $grup,
                    'product' => $product,
                    'unit' => $unit,
        ]);
        }

    public function actionRal()
        {
        return $this->render('@app/views/site/ral');
        }

    }
