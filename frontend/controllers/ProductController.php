<?php

namespace frontend\controllers;

use frontend\models\ItemSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class ProductController extends \yii\web\Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['index'],
                    'rules' => [[
                        'allow' => true,
                        'roles' => ['@'],
                    ]]
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        Yii::$app->myComponent->trigger(\frontend\components\MyComponent::EVENT_AFTER_SOMETHING);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
