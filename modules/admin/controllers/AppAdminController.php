<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

class AppAdminController extends Controller
{
	public function behaviors ()
	{
            return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['admin'],
                'rules' => [
                    [
                        'allow' => TRUE,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => TRUE,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
	}
}