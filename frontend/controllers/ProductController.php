<?php

namespace frontend\controllers;

use frontend\components\MyComponent;
use frontend\models\Item;
use frontend\models\ItemSearch;
use Yii;
use yii\data\Pagination;
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

        $query = Item::find();
        $count = $query->count();

        $pages = new Pagination([
            'totalCount' => $count,
            'defaultPageSize' => 10,
        ]);

        $models = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        Yii::$app->myComponent->trigger(MyComponent::EVENT_AFTER_SOMETHING);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'models' => $models,
            'pages' => $pages,
        ]);
    }
}
