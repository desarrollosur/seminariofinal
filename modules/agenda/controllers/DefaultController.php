<?php

namespace app\modules\agenda\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

class DefaultController extends Controller
{
    
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
    public function actionIndex()
    {
        $servicios = \app\models\Servicio::find()->activo()->all();
        return $this->render('index', ['servicios'=>$servicios]);
    }
}
