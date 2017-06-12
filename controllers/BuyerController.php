<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Units;
use app\models\Products;
use app\models\Grups;
use app\models\Categories;
use yii\web\NotFoundHttpException;
use yii\db\Query;
use yii\web\UploadedFile;

class BuyerController extends \yii\web\Controller
    {

    public $layout = 'buyer';

    public function actionIndex()
        {

        return $this->render('index');
        }

    public function actionProduction()
        {
        $categories = Categories::find()->all();

        return $this->render('production', [
                    'categories' => $categories,
        ]);
        }

    public function actionContact()
        {

        return $this->render('contact');
        }

    public function actionUnits()
        {

        $model = new Units();

        if ($model->load(Yii::$app->request->post()) && $model->validate())
            {
            $model->save();
            $this->redirect(['units']);
            }

        $units = Units::find()->orderBy('UnitName ASC')->all();

        return $this->render('units', [
                    'units' => $units,
                    'model' => $model,
        ]);
        }

    public function actionCategories($cid = 0)
        {
        $model = new Categories();

        if (Yii::$app->request->post())
            {
            if (Yii::$app->request->post()['cancel'] !== NULL)
                {
                $this->redirect(['categories']);
                }

            if (Yii::$app->request->post()['edit'] !== NULL)
                {
                $cid = (int) Yii::$app->request->post()['edit'];
                }

            if (Yii::$app->request->post()['add'] !== NULL)
                {
                $model->CategoryName = Yii::$app->request->post()['Categories']['CategoryName'];
                $model->CategoryInfo = Yii::$app->request->post()['Categories']['CategoryInfo'];
                $model->save();
                $this->redirect(['categories']);
                }

            if (Yii::$app->request->post()['update'] !== NULL)
                {
                $cid = (int) Yii::$app->request->post()['update'];
                $model = $this->findModelCategory($cid);
                $model->CategoryName = Yii::$app->request->post()['CategoryName'];
                $model->CategoryInfo = Yii::$app->request->post()['CategoryInfo'];
                $model->save();
                $this->redirect(['categories']);
                }
            }

        $categories = Categories::find()->orderBy('CategoryName ASC')->all();

        return $this->render('categories', [
                    'categories' => $categories,
                    'model' => $model,
                    'cid' => $cid,
        ]);
        }

    public function actionGrups($gid = 0)
        {
        $model = new Grups();
        $model_category = new Categories();

        if (Yii::$app->request->post())
            {
            if (Yii::$app->request->post()['cancel'] !== NULL)
                {
                $this->redirect(['grups']);
                }
            if (Yii::$app->request->post()['edit'] !== NULL)
                {
                $gid = (int) Yii::$app->request->post()['edit'];
                }
            if (Yii::$app->request->post()['add'] !== NULL)
                {

                $model->GrupName = Yii::$app->request->post()['Grups']['GrupName'];
                $model->GrupInfo = Yii::$app->request->post()['Grups']['GrupInfo'];
                $model->CategoryID = (int) Yii::$app->request->post()['Categories']['CategoryID'];
                $model->save();
                $this->redirect(['grups']);
                }
            if (Yii::$app->request->post()['update'] !== NULL)
                {
                $gid = (int) Yii::$app->request->post()['update'];
                $model = $this->findModelGrup($gid);
                $model->GrupName = Yii::$app->request->post()['GrupName'];
                $model->GrupInfo = Yii::$app->request->post()['GrupInfo'];
                $model->save();
                $this->redirect(['grups']);
                }
            }

        $grups = (new Query())->select(['*'])->
                from(['Grups', 'Categories'])->
                where('Grups.CategoryID = Categories.CategoryID')->
                orderBy('Categories.CategoryName ASC, Grups.GrupName ASC')->
                all();
        $categories = Categories::find()->orderBy('CategoryName')->all();

        return $this->render('grups', [
                    'grups' => $grups,
                    'categories' => $categories,
                    'model' => $model,
                    'model_category' => $model_category,
                    'gid' => $gid,
        ]);
        }

    public function actionProducts()
        {
        $products = (new Query())->select(['*'])->
                from(['Products'])->
                leftJoin('Grups', 'Products.GrupID = Grups.GrupID')->
                leftJoin('Categories', 'Grups.CategoryID = Categories.CategoryID')->
                orderBy('Categories.CategoryName ASC, Grups.GrupName ASC, Products.ProductName ASC')->
                all();

        return $this->render('products', [
                    'products' => $products,
        ]);
        }

    public function actionProduct($pid = 0)
        {
        $model = new Products();

        $grups = Grups::find()->orderBy('GrupName ASC')->all();
        $categories = Categories::find()->orderBy('CategoryName ASC')->all();
        $units = Units::find()->orderBy('UnitName')->all();

        $product = (new Query())->select(['*'])->
                from(['Products'])->
                leftJoin('Grups', 'Products.GrupID = Grups.GrupID')->
                leftJoin('Categories', 'Grups.CategoryID = Categories.CategoryID')->
                where('ProductID = :pid', [':pid' => $pid])->
                orderBy('Categories.CategoryName ASC, Grups.GrupName ASC, Products.ProductName ASC')->
                one();

        if (Yii::$app->request->post())
            {

            if (Yii::$app->request->post()['cancel'] !== NULL)
                {
                $this->redirect(['products']);
                }
            if ((Yii::$app->request->post()['add'] !== NULL) OR ( Yii::$app->request->post()['update'] !== NULL))
                {

                if (Yii::$app->request->post()['update'] !== NULL)
                    {
                    $pid = (int) Yii::$app->request->post()['update'];
                    $model = $this->findModelProduct($pid);
                    $img_product_big_image = $model->ProductBigImage;
                    $img_product_small_image = $model->ProductSmallImage;
                    }

                if (UploadedFile::getInstanceByName('ProductImage'))
                    {
                    if (is_uploaded_file(UploadedFile::getInstanceByName('ProductImage')->tempName))
                        {
                        move_uploaded_file(UploadedFile::getInstanceByName('ProductImage')->tempName, "./images/big/" . UploadedFile::getInstanceByName('ProductImage')->name);
                        $this->ResizeImage("./images/big/" . UploadedFile::getInstanceByName('ProductImage')->name, 292);
                        $file = file_get_contents("./images/big/" . UploadedFile::getInstanceByName('ProductImage')->name);
                        $handle = fopen("./images/small/" . UploadedFile::getInstanceByName('ProductImage')->name, 'a');
                        fwrite($handle, $file);
                        fclose($handle);
                        $this->ResizeImage("./images/small/" . UploadedFile::getInstanceByName('ProductImage')->name, 61);
                        $img_product_big_image = '../images/big/' . UploadedFile::getInstanceByName('ProductImage')->name;
                        $img_product_small_image = '../images/small/' . UploadedFile::getInstanceByName('ProductImage')->name;
                        }
                    }

                $model->GrupID = (int) Yii::$app->request->post()['GrupID'];
                $model->UnitID = (int) Yii::$app->request->post()['UnitID'];
                $model->ProductName = Yii::$app->request->post()['ProductName'];
                $model->ProductPrice = Yii::$app->request->post()['ProductPrice'];
                $model->ProductMarga = Yii::$app->request->post()['ProductMarga'] / 100;
                $model->ProductInfo = Yii::$app->request->post()['ProductInfo'];
                $model->ProductBigImage = $img_product_big_image;
                $model->ProductSmallImage = $img_product_small_image;

                $model->save();
                $this->redirect(['products']);
                }
            }

        return $this->render('product', [
                    'product' => $product,
                    'grups' => $grups,
                    'categories' => $categories,
                    'units' => $units,
                    'pid' => $pid,
        ]);
        }

    protected function findModelCategory($id)
        {
        if (($model = Categories::findOne($id)) !== null)
            {
            return $model;
            } else
            {
            throw new NotFoundHttpException('The requested page does not exist.');
            }
        }

    protected function findModelGrup($id)
        {
        if (($model = Grups::findOne($id)) !== null)
            {
            return $model;
            } else
            {
            throw new NotFoundHttpException('The requested page does not exist.');
            }
        }

    protected function findModelProduct($id)
        {
        if (($model = Products::findOne($id)) !== null)
            {
            return $model;
            } else
            {
            throw new NotFoundHttpException('The requested page does not exist.');
            }
        }

    private function ResizeImage($inputFilename, $new_side)   //изменение размера изображений
        {
        $imagedata = getimagesize($inputFilename);
        $w = $imagedata[0];
        $h = $imagedata[1];
        if ($h > $w)
            {
            $new_w = ($new_side / $h) * $w;
            $new_h = $new_side;
            } else
            {
            $new_h = ($new_side / $w) * $h;
            $new_w = $new_side;
            }
        $im2 = ImageCreateTrueColor($new_w, $new_h);
        $image = ImageCreateFromJpeg($inputFilename);
        imagecopyResampled($im2, $image, 0, 0, 0, 0, $new_w, $new_h, $imagedata[0], $imagedata[1]);
        imagejpeg($im2, $inputFilename);
        }

    }
